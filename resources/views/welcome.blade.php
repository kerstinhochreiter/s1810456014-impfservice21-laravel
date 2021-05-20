<!DOCTYPE html>
<html>
<head>
    <title>Bookstore Test</title>
</head>
<body>
<ul>
    @foreach($vaccinations as $vaccination)
        <li>{{$vaccination->date}} {{$vaccination->time}}</li>
    @endforeach
</ul>
</body>
</html>
