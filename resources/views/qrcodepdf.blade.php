
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        svg{
            position:relative;
            top:-230px;
            margin-left:348px;
            width:100px;
            margin-top:0;
            padding:0;
        }
        .image{
            width:500px;
        }
        
    </style>
</head>
<body>
    <?php
    $b31=public_path("image/".$num);
    ?>
<div class="main">
    @foreach($image as $img)
    <div>
<img class="image" src="{{'data:image/png;base64,'.base64_encode(file_get_contents($b31))}}" alt="31b">
<div class="mainqr">
{{$img}}
</div>
 </div>
    
    @endforeach
</div>
</body>
</html>
