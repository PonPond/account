<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Smart Card</title>
</head>

<body>
    <h1>Read Smart Card</h1>
    <form action="{{ url('/smartcard/query') }}" method="POST">
        @csrf
        <label for="query">ตั้งค่า Query สำหรับอ่านข้อมูลบัตรประชาชน:</label><br>
        <input type="checkbox" id="cid" name="query[]" value="cid">
        <label for="cid"> CID</label><br>
        <input type="checkbox" id="name" name="query[]" value="name">
        <label for="name"> Name</label><br>
        <input type="checkbox" id="dob" name="query[]" value="dob">
        <label for="dob"> Date of Birth</label><br>
        <input type="checkbox" id="gender" name="query[]" value="gender">
        <label for="gender"> Gender</label><br><br>
        <button type="submit">Submit</button>
    </form>

    <br>

    <h2>หรือ</h2>

    <button id="readCardButton">อ่านข้อมูลบัตรประชาชน</button>

    <div id="smartcardData"></div>

    <script>
        document.getElementById('readCardButton').addEventListener('click', function() {
            fetch('/smartcard/init', {
                    method: 'GET'
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data);
                    if (data.status === 200) {
                        let html = '<h2>ข้อมูลบัตรประชาชน</h2>';
                        html += '<ul>';
                        for (const key in data.data) {
                            html += '<li><strong>' + key + ':</strong> ' + data.data[key] + '</li>';
                        }
                        html += '</ul>';
                        document.getElementById('smartcardData').innerHTML = html;
                    } else {
                        alert('เกิดข้อผิดพลาด: ' + data.description);
                    }
                })
                .catch(error => {
                    console.error('There has been a problem with your fetch operation:', error);
                });
        });
    </script>
</body>

</html>
