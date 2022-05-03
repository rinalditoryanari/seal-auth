<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Create</title>
</head>
<body>
    <h1>Create Article</h1>
    {{auth()->user()->name}}
    <form action="{{route('post.store')}}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="title"><br>
        <textarea name="body" id="" rows="5" placeholder="content "></textarea>
        <br>
        <input type="submit" value="Save">        
    </form>
</body>
</html>