<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('user.store')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Your name"><br>
        <input type="email" name="email" placeholder="Your Email"><br>
        <input type="password" name="password" placeholder="Your Password"><br>
        <input type="text" name="nik" placeholder="Your NIK"><br>
        <input type="submit" value="Save">        
    </form>
</body>
</html>