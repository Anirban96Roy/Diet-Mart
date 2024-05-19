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
                <form action="{{ route('admin.authenticate') }}" method="post">
                @csrf
                <div class="input-box">
                   
                   <header>Admin Login Page</header>
                   <div class="input-field">
                        <input type="email" name="email" class="input" id="email">
                        <label for="email">Email</label> 
                    </div> 
                   <div class="input-field">
                        <input type="password"name="password" class="input" id="password" >
                        <label for="pass">Password</label>
                    </div> 
                   <div class="input-field">
                        
                        <input type="submit" class="submit" value="Login">
                   </div> 
                   
                </div> 
            </form> 
            </div>

             
        </div>
    </div>
</div>
</body>
</html>