<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('loginAsset/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Forget Password</title>
</head>
<body>
  <div class="wrapper">
    <div class="container main">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
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
                <form action="{{ route('front.processforget') }}" id="ForgetPasswordForm" name="ForgetPasswordForm" method="post">
                    @csrf
                    <div class="input-box">
                        <header style="text-align: left; font-size:30px;">Forget Password</header>
                       
                        <div class="input-field">
                            <input type="email" name="email" class="input" id="email" required autocomplete="off">
                            <label for="email">Email</label> 
                        </div> 
                        <br>
                        <div class="input-field">
                            <input type="submit" class="submit" value="Submit">
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
