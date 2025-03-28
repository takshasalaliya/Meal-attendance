<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conference - Submissions</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.3/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
</head>
<body class="bg-gray-50">
   @if(session('message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    <div class="container mx-auto py-6">
        <div class="bg-blue-500 text-white p-4 mb-6 text-center font-bold text-2xl rounded-lg shadow">
            Conference Submissions
        </div>

        <div class="flex items-center justify-between mb-6 px-4">
            <div class="text-lg font-medium text-gray-700">
                Total Breakfast: <span id="totalSubmissions" class="text-blue-600 font-bold">{{$breakfast}}</span>
                Total Lunch: <span id="totalSubmissions" class="text-blue-600 font-bold">{{$lunch}}</span>
            </div>
            <!-- Button to Download Excel -->
            <a href="/dowload" class="bg-green-500 text-white font-bold py-2 px-4 rounded-lg shadow hover:bg-green-600">
                Download Excel
            </a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto bg-white shadow-lg rounded-lg border border-gray-200">
                <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="py-3 px-6 text-center">Full Name</th>
                        <th class="py-3 px-6 text-center">Contact Number</th>
                        <th class="py-3 px-6 text-center">Email</th>
                        <th class="py-3 px-6 text-center">Breakfast</th>
                        <th class="py-3 px-6 text-center">Lunch</th>
                        <th class="py-3 px-6 text-center">Operation</th>
                    </tr>
                </thead>
                <tbody id="userTable" class="text-gray-700">
                    @foreach($datas as $data)
                 
                    <tr class="hover:bg-blue-50 transition duration-200">
                        <td class="py-3 px-6 text-center border-b border-gray-200">{{$data->name}}</td>
                        <td class="py-3 px-6 text-center border-b border-gray-200">{{$data->mobile}}</td>
                        <td class="py-3 px-6 text-center border-b border-gray-200">{{$data->email}}</td>
                        <td class="py-3 px-6 text-center border-b border-gray-200"><input type="checkbox" {{$data->breakfast==1?'checked':''}} disabled/></td>
                        <td class="py-3 px-6 text-center border-b border-gray-200"><input type="checkbox" {{$data->lunch==1?'checked':''}} disabled/></td>
                         <td> <a href="{{'/delete/'.$data->id}}"><button type="button" class="btn btn-danger">Delete</button></a></td>
                    </tr>
                    
                 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
