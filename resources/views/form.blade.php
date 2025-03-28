<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gyanotsav Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #FFE9D6, #FDBA74, #FB923C);
        }
        .form-label-group {
            position: relative;
            margin-bottom: 1.5rem;
        }
        .form-label-group > input {
            height: auto;
            border-radius: 0.75rem;
            padding: 0.75rem;
        }
        .form-label-group > label {
            position: absolute;
            top: 0.75rem;
            left: 1rem;
            transition: all 0.2s ease-in-out;
            pointer-events: none;
            font-size: 0.875rem;
            color: #6B7280;
        }
        .form-label-group > input:focus + label,
        .form-label-group > input:not(:placeholder-shown) + label {
            transform: translateY(-1rem);
            font-size: 0.75rem;
            color: #F97316;
            font-weight: bold;
        }
        .image{
            width:200px;
            margin-left:85px;
        }
    </style>
</head>
<body class="gradient-bg min-h-screen flex flex-col items-center justify-center">
    <!-- Display success or error message -->
    @if(session('message'))
    <p class="text-yellow-600 bg-yellow-100 px-4 py-2 rounded-md">{{ session('message') }}</p>
   <?php
   $form="success";
   ?>
    @endif
    <?php
    
    $image=public_path('image/logo.png');
    ?>
    <header class="text-center mb-6">
        <h1 class="text-4xl font-extrabold text-orange-600">WELCOME TO GYANOTSAV!</h1>
        <img class="image" src="{{'data:image/png;base64,'.base64_encode(file_get_contents($image))}}" alt="logo">
    </header>

    <div class="max-w-md w-full bg-white shadow-lg rounded-lg p-8">
        <!-- Form Section -->
        @if($form == 'yes')
        <form action="/submit" method="post" class="space-y-6">
            @csrf
            <!-- Coupon ID -->
            <div class="form-label-group">
                <input type="hidden" value="{{ $id }}" name="qridcode">
                <input type="text" value="{{ $id }}" id="id" class="block w-full border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500" disabled>
                <label for="id">Coupon ID</label>
            </div>
            <!-- Meals -->
            <div class="form-label-group">
                <input type="text" value="{{ $data->category }}" id="category" class="block w-full border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500" disabled>
                <label for="category">Meals</label>
            </div>
            <!-- Full Name -->
            <div class="form-label-group">
                <input type="text" id="fullname" name="fullname" placeholder=" " class="block w-full border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500" required>
                <label for="fullname">Full Name</label>
                @error('fullname') <p class="text-red-500 text-sm">{{ '*' . $message }}</p> @enderror
            </div>
            <!-- Phone Number -->
            <div class="form-label-group">
                <input id="number" name="number" placeholder=" " class="block w-full border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500" required>
                <label for="number">Phone Number</label>
                @error('number') <p class="text-red-500 text-sm">{{ '*' . $message }}</p> @enderror
            </div>
            <!-- Committee -->
            <div>
                <label for="event" class="block text-gray-700 font-medium mb-1">Committee</label>
                <select name="event" id="event" class="block w-full border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500">
                    <option value="" disabled selected>Select Committee</option>
                    <option value="Core Committee">Core Committee</option>
                    <option value="Registration">Registration</option>
                    <option value="Help Desk">Help Desk</option>
                    <option value="Exhibition">Exhibition</option>
                    <option value="CVMUISC">CVMUISC</option>
                    <option value="Competition">Competition</option>
                    <option value="સર્જન (Hands-on Workshop)">સર્જન (Hands-on Workshop)</option>
                    <option value="Counselling">Counselling</option>
                    <option value="Food Zone">Food Zone</option>
                    <option value="Food Arrangements for Faculty and Students">Food Arrangements for Faculty and Students</option>
                    <option value="Game Zone">Game Zone</option>
                    <option value="Art, Photography and Selfie Zone">Art, Photography and Selfie Zone</option>
                    <option value="Products Zone">Products Zone</option>
                    <option value="School Visit and Transportation">School Visit and Transportation</option>
                    <option value="Health Sciences">Health Sciences</option>
                    <option value="Cultural">Cultural</option>
                    <option value="Discipline, Security and Parking">Discipline, Security and Parking</option>
                    <option value="Cleanliness">Cleanliness</option>
                    <option value="VIP Lounge">VIP Lounge</option>
                    <option value="Social Media">Social Media</option>
                    <option value="Media and Publicity">Media and Publicity</option>
                    <option value="Design">Design</option>
                    <option value="Infrastructure & Logistics">Infrastructure & Logistics</option>
                    <option value="Drinking Water">Drinking Water</option>
                    <option value="First Aid (Ambulance)">First Aid (Ambulance)</option>
                    <option value="Solar Observatory by IPR">Solar Observatory by IPR</option>
                    <option value="Moot Court">Moot Court</option>
                    <option value="CVMU MUN">CVMU MUN</option>
                    <option value="IDEA Lab">IDEA Lab</option>
                    <option value="BBIT Project Zone">BBIT Project Zone</option>
                </select>
            </div>
            <!-- College -->
            <div>
                <label for="collage" class="block text-gray-700 font-medium mb-1">College</label>
                <select name="collage" id="collage" class="block w-full border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500">
                    <option value="" disabled selected>Select College</option>
                    <option value="cvmu">CVMU</option>
                    <option value="gcet">GCET</option>
                    <option value="semcom">SEMCOM</option>
                    <option value="adit">ADIT</option>
                    <option value="mbit">MBIT</option>
                    <option value="nvpam">NVPAS</option>
                    <option value="ilsass">ILSASS</option>
                    <option value="aribas">ARIBAS</option>
                    <option value="czpcbm">CZPCBM</option>
                    <option value="iicp">IICP</option>
                    <option value="istar">ISTAR</option>
                    <option value="smaid">SMAID</option>
                    <option value="ccfa">CCFA</option>
                    <option value="wmce">WMCE</option>
                    <option value="rnpislj">RNPISLJ</option>
                    <option value="cvmhmc">CVM Homoeopathic Medical College and Hospital</option>
                    <option value="cvnc">CVMNC</option>
                    <option value="cvnmc">CVNMC</option>
                    <option value="gjpiasr">GJPIASR</option>
                    <option value="gipiasr">GIPIASR</option>
                    <option value="sspcpe">SSPCPE</option>
                    <option value="waymade">WAYMADE</option>
                    <option value="bbt">BBIT</option>
                </select>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="w-full bg-orange-500 text-white py-3 rounded-md hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-400">Register</button>
        </form>
        @endif

        <!-- Form Filled Message -->
        @if($form == 'no')
        <p id="success-message" class="text-green-600 text-center mt-4">Form is already filled!</p>
        @endif
        
        @if($form == 'success')
        <p id="success-message" class="text-green-600 text-center mt-4">Your form is successfully submited</p>
        @endif

        <!-- Form Not Created Message -->
        @if($form == 'remain')
        <p id="error-message" class="text-red-600 text-center mt-4">Form is not created!</p>
        @endif
    </div>
</body>
</html>

