<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - QR Code Generator</title>
    <!-- TailwindCSS (optional for extra styling) -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.3/dist/tailwind.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/student">Attending List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/scanner">QR Code Scanner</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/add_volunteer">Add Volunteer</a>
                    </li>
                    </li><li class="nav-item">
                        <a class="nav-link text-white" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
     @if(session('message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    <div class="container my-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="text-center fw-bold">Generate QR Code Manually</h4>
            </div>
            <div class="card-body">
                
                
                  <form action="meal_select" method="post">
                    @csrf
                    <label for="meal">Select Today Meal</label><br>
                   <select name="meal" id="meal">
                    <option value="lunch">Lunch</option>
                    <option value="breakfast">Breakfast</option>
                   </select>
                    <button type="submit" class="btn btn-primary">
                       Set Default
                    </button>
                </form>
<br><br><br>
                <!-- QR Code Generator Form -->

                <form action="qrcode" method="post" class="mb-4">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" id="name" name="name" required
                               class="form-control" placeholder="Enter full name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" id="email" name="email" required
                               class="form-control" placeholder="Enter email address">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label fw-bold">Phone Number</label>
                        <input type="tel" id="phone" name="phone" 
                               class="form-control" placeholder="Enter phone number">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label fw-bold">Category</label>
                        <select name="category" id="category" class="form-select">
                            <option value="student">Student</option>
                            <option value="faculty">Faculty</option>
                            <option value="guest">Guest</option>
                            <option value="volunteer">Volunteer</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-secondary w-100">
                        Generate QR Code
                    </button>
                </form>
                                
                <br><br><hr><br>
                <form action="excel_qrcode" method="post"  enctype="multipart/form-data">
                    @csrf
                    <label for="excel">Upload Excel</label>
                    <input type="file" name="excel" id="excel"><br><br>
                    <button type="submit" class="btn btn-primary w-100">
                        Generate QR Code By Excel
                    </button>
                </form>
                <br><br><br><hr><br>
 <form action="excel_manual" method="post"  enctype="multipart/form-data">
                    @csrf
                    <label for="excel">Upload Excel</label>
                    <input type="file" name="excel" id="excel"><br><br>
                    <button type="submit" class="btn btn-primary w-100">
                        Generate QR Code Without Email
                    </button>
                </form>
                <!-- Display Generated QR Codes -->
                <div id="qrCodeDisplay" class="row">
                    @if(session('qrcode'))
                    @foreach(session('qrcode') as $qrcode)
                    <div class="col-md-4">
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body text-center">
                                {{ $qrcode }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>