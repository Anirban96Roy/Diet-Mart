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
  <div class="wrapper">
    <div class="container main">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-6 side-image">
                <!-- Image -->
            </div>
            <div class="col-md-6 right">
                <form action="{{ route('front.processResetPassword') }}" id="ResetPasswordForm" name="ResetPasswordForm" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{$token}}">
                    <div class="input-box">
                        <header style="text-align: left; font-size:30px;">Reset Password</header>
                        <div class="input-field">
                            <input type="password" name="new_password" class="input" id="new_password" required="" autocomplete="off">
                            <label for="new_password">New Password</label> 
                        </div> 
                        
                        <div class="input-field">
                            <input type="password" name="confirm_password" class="input" id="confirm_password" required="" autocomplete="off">
                            <label for="confirm_password">Confirm Password</label> 
                        </div> 
                        <br>
                        <div class="input-field">
                            <input type="submit" class="submit" value="Reset">
                        </div> 
                        <div class="text-center small"><a href="{{ route('account.login') }}">Login Now</a></div>
                    </div> 
                </form> 
            </div>
        </div>
    </div>
</div>
</body>
</html>
