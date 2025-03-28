<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Detail Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }
        .card {
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group label {
            font-weight: bold;
        }
        .form-control-plaintext {
            background-color: transparent;
            border: none;
            font-weight: normal;
        }
        .btn-process {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    @if(session('message'))
    <div class="alert alert-danger">
        {{ session('message') }}
    </div>
    @endif
    @if($detail=='yes')
    <div class="container">
        <div class="card">
            <h3 class="text-center mb-4">User Details</h3>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <p class="form-control-plaintext" id="name">{{$data->name}}</p>
                </div>
                <div class="form-group col-md-6">
                    <label for="mobile">Mobile</label>
                    <p class="form-control-plaintext" id="mobile">{{$data->mobile}}</p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="category">Category</label>
                    <p class="form-control-plaintext" id="category">{{$data->category}}</p>
                </div>
                <div class="form-group col-md-6">
                    <label for="day">Email</label>
                    <p class="form-control-plaintext" id="day">{{$data->email}}</p>
                </div>
            </div>
            
            <div class="form-group text-center">

            <a href="{{'scanner_submit/'.$data->email}}"><button class="btn btn-primary">
                     Process
                    </button></a> 
            </div>
        </div>
    </div>
   
    @else($detail=='no')
   <center>
    Invalid Qr
   </center>
    @endif
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
