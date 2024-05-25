<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลลูกหนี้ - ข้อมูลใหม่</title>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('{{ route('fetch.smartcard.data') }}')
                .then(response => response.json())
                .then(data => {
                 
                    // Handle the received data here
                    const dataContainer = document.getElementById('data-container');
                    dataContainer.textContent = JSON.stringify(data, null, 2);
                })
                .catch(error => console.error('รีเฟรชเพื่อดึงข้อมูล', error));
        });
        function refreshPage() {
            location.reload();
        }
        
    </script>
</head>
<body>
    <div class="card">
        <div class="card-header pb-0">
            <h6>ข้อมูลลูกหนี้ - ข้อมูลใหม่</h6>
            <button onclick="refreshPage()" class="btn btn-secondary">Refresh Page</button>
        </div>
        <div class="card-body">
            <pre id="data-container">Loading data...</pre>
        </div>
    </div>
</body>
</html>
