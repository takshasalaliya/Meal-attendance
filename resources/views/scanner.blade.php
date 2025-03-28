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
        /* General Styling */
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
            border: 2px solid #007bff;
            border-radius: 8px;
            margin: 0 auto 20px auto;
        }

        /* Default Scanner Box Size */
        #reader {
            width: 100%;
            max-width: 350px;
            height: 350px;
        }

        /* Button Styling */
        .btn-custom {
            background-color: #007bff;
            color: white;
            font-size: 16px;
            padding: 10px 20px;
            width: 100%;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .success-message {
            font-size: 18px;
            color: green;
            font-weight: bold;
            text-align: center;
        }

        /* Responsive Styling for Mobile Devices */
        @media (max-width: 768px) {
            #reader {
                width: 100%;
                height: auto;
                aspect-ratio: 1; /* Ensures the box remains a square */
            }
        }

        @media (max-width: 576px) {
            .scanner-title {
                font-size: 20px;
            }

            .scanner-instructions {
                font-size: 14px;
            }
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

        <!-- Scanner Title -->
        <h1 class="scanner-title text-center">QR Code Scanner</h1>

        <!-- Instructions -->
        <p class="scanner-instructions text-center">
            To scan a QR code, point your camera towards it. The result will automatically be processed.
        </p>

        <!-- QR Code Reader -->
        <div id="reader"></div>

        <!-- Hidden Form to Submit Scanned QR -->
        <form action="scannerurl" method="get" id="qrForm">
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
    </div>

    <!-- Include Bootstrap 5 JS Bundle -->
    <script>
        // Initialize Html5Qrcode
        const reader = new Html5Qrcode("reader");

        reader.start(
            { facingMode: "environment" }, // Use rear-facing camera
            {
                fps: 10, // Frames per second
                qrbox: { width: 250, height: 250 }, // Scanning box dimensions
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
