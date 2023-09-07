<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @foreach ($data as $index => $value)
    <a href="{{ route('user.usertestpost',$value->uuid) }}">{{$value->product->name}}</a>
    @endforeach

</body>
</html>
