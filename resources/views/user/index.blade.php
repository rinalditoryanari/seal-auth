<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <a href="{{route('user.create')}}">Add New User</a>
    <h1>Data User</h1>
    @foreach ($users as $user)
        <div class="">Nama: {{$user->name}}</div>
        <div class="">Email: {{$user->email}}</div>
        <div class="">NIK: {{$user->userDetail->nik}}</div>
        <hr/>
    @endforeach
    {{--
        @foreach ($userDetails as $userDetail)
    @dump($userDetail->)
    @endforeach
        --}}
</body>
</html>