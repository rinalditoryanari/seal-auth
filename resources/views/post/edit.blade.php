<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>aaa</p>
    @dd($post, auth()->id())
    @can('update', auth()->id(), $post)
        Bisa Edit
    @endcan
</body>
</html>