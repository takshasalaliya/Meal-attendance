<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Scanner</title>
    <!-- Include Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include html5-qrcode JS -->
    <script src="https://cdn.jsdelivr.net/npm/html5-qrcode/minified/html5-qrcode.min.js"></script>
    <style>
        /* Container Styling */
        body {
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
            max-width: 600px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        /* Scanner Title */
        .scanner-title {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 20px;
        }

        .scanner-instructions {
            font-size: 16px;
            color: #6c757d;
            margin-bottom: 20px;
        }

        #reader {
            margin: 0 auto;
            border: 2px solid #007bff;
            border-radius: 8px;
            width: 100%;
            max-width: 350px;
            height: 200px;
            margin-bottom: 20px;
        }

        /* Center Logout Button */
        .logout-button {
            display: block;
            margin: 20px auto 0; /* Add margin to center and separate it */
            width: 200px;
        }

        .success-message {
            font-size: 18px;
            color: green;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Alert for Messages -->
        @if(session('message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
          <a href="logout" class="btn btn-danger logout-button text-center">Logout</a>

        <!-- Scanner Title -->
        <h1 class="scanner-title text-center">QR Code Scanner</h1>

        <!-- Instructions -->
        <p class="scanner-instructions text-center">
            To scan a QR code, point your camera towards it. The result will automatically be processed.
        </p>

        <!-- QR Code Reader -->
        <div id="reader"></div>

        <!-- Hidden Form to Submit Scanned QR -->
        <form action="scannerdetail" method="get" id="qrForm">
            @csrf
            <input type="text" id="result" name="url" hidden>
            <input type="submit" hidden>
        </form>

        <!-- Success Message for QR Code Scan -->
        <div id="scan-success" class="success-message" style="display:none;">
            <p>QR Code Scanned Successfully! Redirecting...</p>
        </div>

        <!-- Retry Button -->
        <div id="retry-button" style="display:none;">
            <button class="btn-custom" onclick="retryScan()">Scan Another QR Code</button>
        </div>

        <!-- Logout Button -->
      
    </div>

    <!-- Include Bootstrap JS Bundle -->
    <script>
        // Initialize Html5Qrcode
        const reader = new Html5Qrcode("reader");

        reader.start(
            { facingMode: "environment" }, // Use rear-facing camera
            {
                fps: 10, // Frames per second
                qrbox: { width: 30, height: 30 }, // Scanning box dimensions
            },
            (decodedText) => {
                // Handle successful scan
                document.getElementById('result').value = decodedText;
                document.getElementById('qrForm').submit();

                // Display success message and hide retry
                document.getElementById('scan-success').style.display = 'block';
                document.getElementById('retry-button').style.display = 'none';

                // Stop the scanner
                reader.stop().then(() => {
                    document.getElementById('reader').innerHTML = '<p class="text-success fw-bold">QR Code Scanned Successfully!</p>';
                }).catch((err) => {
                    console.error("Error stopping scanner:", err);
                });
            },
            (errorMessage) => {
                // Handle scan failure
                console.warn("QR Code Scan Error:", errorMessage);
            }
        ).catch((err) => {
            console.error("Error starting QR Code Scanner:", err);
        });

        // Retry scan function
        function retryScan() {
            document.getElementById('scan-success').style.display = 'none';
            document.getElementById('retry-button').style.display = 'none';
            reader.start(
                { facingMode: "environment" }, 
                { fps: 10, qrbox: { width: 250, height: 250 } },
                (decodedText) => {
                    document.getElementById('result').value = decodedText;
                    document.getElementById('qrForm').submit();
                    document.getElementById('scan-success').style.display = 'block';
                    document.getElementById('retry-button').style.display = 'none';
                },
                (errorMessage) => {
                    console.warn("QR Code Scan Error:", errorMessage);
                }
            ).catch((err) => {
                console.error("Error starting QR Code Scanner:", err);
            });
        }
    </script>
       
</body>
</html>
