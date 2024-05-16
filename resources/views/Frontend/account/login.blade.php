<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('loginAsset/css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
  <div class="wrapper">
    <div class="container main">
        @include('admin.massage')
        <div class="row">
            <div class="col-md-6 side-image">
                       
  <!--image-->
  
            </div>

           
            <div class="col-md-6 right">
                
                <form action="{{route('account.authenticate')}}" method="post">
                @csrf
                <div class="input-box">
                   
                   <header>Login to your account</header>
                   <div class="input-field">
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" value="{{old('email')}}"name="email" class="input" id="email" required="" autocomplete="off">
                        <label for="email">Email</label> 
                        @error('email')
                        <P class="invalid-feedback">{{ $message }}</P>
                        @enderror
                    </div> 
                    <div>
                        <br>
                    </div>
                   <div class="input-field">
                        <input type="password"name="password" class="form-control  @error('password') is-invalid @enderror" id="password" required="">
                        <label for="pass">Password</label>
                        @error('password')
                        <P class="invalid-feedback">{{ $message }}</P>
                        @enderror
                    </div> 
                    <br>
                   <div class="input-field">
                        
                        <input type="submit" class="submit" value="Login">
                   </div> 
                   <div class="form-group small" >
                    <a href="{{route('front.forget')}}">Forget Password?</a>
                   </div>
                </div>
                 <div class="text-center small">Don't have an account? <a href="{{route('account.register')}}">Sign In</a> </div>
            </form> 
            
            </div>

             
        </div>
    </div>
</div>
</body>
</html>