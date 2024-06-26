<nav id="navbarScroll" class="navbar navbar-expand-lg ">
        <div class="container">
            <a class="navbar-brand" href="#">
            @auth
        {{ Auth::user()->name }}
    @else
        AR <!-- Default text when user is not logged in -->
    @endauth
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav m-auto my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#main">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#why_section">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#product">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sale">Sale</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('front.show_cart')}}">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{route('account.login')}}">Login</a>
                    </li>
                    <li class="nav-item" style="margin-left: 10px;" >
                        <a class="btn btn-success" href="{{route('account.register')}}">Register</a>
                    </li>
                    <li class="nav-item" style="margin-left: 10px;">
                        <a class="btn btn-primary" href="{{route('account.logout')}}">logout</a>
                    </li>
                </ul>
                
            </div>
        </div>
        
    </nav>