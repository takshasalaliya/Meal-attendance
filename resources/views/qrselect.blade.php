<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select QR Data</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
            max-width: 500px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 20px;
            text-align: center;
        }

        .btn-custom {
            background-color: #007bff;
            color: #ffffff;
            font-size: 16px;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Form Title -->
        <h1 class="form-title">Select QR Data</h1>

        <!-- Form -->
        <form action="qrselect" method="get" class="row g-3">
            @csrf
            <!-- Select Day -->
            <div class="col-12">
                <label for="day" class="form-label">Select Day</label>
                <select name="day" id="day" class="form-select" required>
                <option value="1">30 Jan</option>
                <option value="2">31 Jan</option>
                <option value="3">1 Feb</option>
                <option value="4">2 Feb</option>
                </select>
            </div>

            <!-- Select Meal -->
            <div class="col-12">
                <label for="meal" class="form-label">Select Meal</label>
                <select name="meal" id="meal" class="form-select" required>
                    <option value="breakfast">Breakfast</option>
                    <option value="lunch">Lunch</option>
                    <option value="hightea">High Tea</option>
                    <option value="dinner">Dinner</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-custom w-100">Process</button>
            </div>
        </form>
    </div>

    <!-- Include Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
