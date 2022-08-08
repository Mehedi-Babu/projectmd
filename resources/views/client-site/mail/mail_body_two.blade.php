<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail Body</title>
</head>

<body>


    <p>Hi, {{ $data['name_two'] }}.</p>
    <p>UserName: {{ $data['emt'] }}.</p>
    <p>Your Password {{ $data['pass_two'] }}</p>
    <p>Login Url Please Click <a href="{{ route('login') }}">Click Me</a>.</p>
    <p>Thank Your For Registration.</p>
    <p>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>

</body>

</html>
