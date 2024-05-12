<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Smartcard\Devices;
use Smartcard\PersonalApplet;
use Smartcard\NhsoApplet;
use Smartcard\Reader as SmartCardReader;
use Illuminate\Support\Facades\Http;

class SmartCardController extends Controller
{
    const EXIST_WHEN_READ_ERROR = true;
    const DEBUG = false;
    const DEFAULT_QUERY = ['cid', 'name', 'dob', 'gender'];
    const ALL_QUERY = ['cid', 'name', 'nameEn', 'dob', 'gender', 'issuer', 'issueDate', 'expireDate', 'address', 'photo', 'nhso', 'laserId'];

    private $query;

    public function __construct()
    {
        $this->query = self::DEFAULT_QUERY;
    }

    public function index() { 
        return view('page.smartCard.read_smartcard');
    }

    public function setQuery(Request $request)
    {
        $this->query = $request->input('query') ?? self::DEFAULT_QUERY;
        Log::info($this->query);
    }

    public function setAllQuery()
    {
        $this->query = self::ALL_QUERY;
        Log::info($this->query);
    }

    public function init()
    {
        try {
            $devices = new Devices();
        } catch (\Exception $ex) {
            $message = "Cannot connect to smartcard device";
            Log::error($message);
            return response()->json([
                'status' => 500,
                'description' => $message,
                'data' => []
            ]);
        }

        $devices->on('device-activated', function ($event) {
            $currentDevices = $event['devices'];
            $device = $event['device'];
            Log::info("Device '$device' activated, devices: $currentDevices");
            foreach ($currentDevices as $prop) {
                Log::info("Devices: $prop");
            }

            $device->on('card-inserted', function ($event) {
                $card = $event['card'];
                $message = "Card '{$card->getAtr()}' inserted into '{$event['device']}'";
                Log::info($message);

                try {
                    $data = $this->readWithRetry($card, 3);
                    if (self::DEBUG) Log::info('Received data', $data);
                    return response()->json([
                        'status' => 200,
                        'description' => 'Success',
                        'data' => $data
                    ]);
                } catch (\Exception $ex) {
                    $message = "Exception: {$ex->getMessage()}";
                    Log::error($message);
                    return response()->json([
                        'status' => 500,
                        'description' => 'Error',
                        'data' => ['message' => $message]
                    ]);
                }
            });

            $device->on('card-removed', function ($event) {
                $message = "Card removed from '{$event['name']}'";
                Log::info($message);
                return response()->json([
                    'status' => 205,
                    'description' => 'Card Removed',
                    'data' => ['message' => $message]
                ]);
            });

            $device->on('error', function ($event) {
                $message = "Incorrect card input";
                Log::info($message);
                return response()->json([
                    'status' => 400,
                    'description' => 'Incorrect card input',
                    'data' => ['message' => $message]
                ]);
            });
        });

        $devices->on('device-deactivated', function ($event) {
            $message = "Device '{$event['device']}' deactivated, devices: [{$event['devices']}]";
            Log::error($message);
            return response()->json([
                'status' => 404,
                'description' => 'Not Found Smartcard Device',
                'data' => ['message' => $message]
            ]);
        });

        $devices->on('error', function ($error) {
            $message = "{$error['error']}";
            Log::error($message);
            return response()->json([
                'status' => 404,
                'description' => 'Not Found Smartcard Device',
                'data' => ['message' => $message]
            ]);
        });
    }

    private function readWithRetry($card, $maxRetry)
    {
        $retryCount = 0;
        while (true) {
            try {
                $data = $this->read($card);
                return $data;
            } catch (\Exception $error) {
                if ($retryCount === $maxRetry || $error->getMessage() === 'Card Reader not connected') {
                    throw $error;
                }
                $retryCount++;
                Sleep::sleep(3000);
                Log::info('Retry read card #', $retryCount);
            }
        }
    }

    private function read($card)
    {
        $req = [0x00, 0xc0, 0x00, 0x00];
        if (substr($card->getAtr(), 0, 4) === Buffer::from([0x3b, 0x67])->toString('hex')) {
            $req = [0x00, 0xc0, 0x00, 0x01];
        }

        try {
            $q = $this->query ? [...$this->query] : [...self::DEFAULT_QUERY];
            $data = [];
            $personalApplet = new PersonalApplet($card, $req);
            $personal = $personalApplet->getInfo(array_filter($q, function ($key) {
                return $key !== 'nhso' || $key !== 'laserId';
            }));
            $data = array_merge($data, $personal);

            if (in_array('nhso', $q)) {
                $nhsoApplet = new NhsoApplet($card, $req);
                $nhso = $nhsoApplet->getInfo();
                $data = array_merge($data, ['nhso' => $nhso]);
            }

            // laserid
            if (in_array('laserId', $q)) {
                $laserId = '';
                try {
                    $laserId = Reader::getLaser($card);
                } catch (\Exception $error) {
                    Log::error('Can not read laserId', $error);
                }
                $data = array_merge($data, ['laserId' => $laserId]);
            }

            return $data;
        } catch (\Exception $ex) {
            throw $ex;
        }
    }
}
