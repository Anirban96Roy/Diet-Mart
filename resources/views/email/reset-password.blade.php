<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('loginAsset/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Reset Password</title>
</head>
<body>
    <p>Hello,{{$formData['user']->name}}</p>
<h1>You have requested to change password.</h1>
<p>Click the link to reset password:</p>
<a href="{{route('front.resetPassword',$formData['token'])}}">Click Here</a>
<p>Thank You</p>
</body>