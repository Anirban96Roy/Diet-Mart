<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Diet_mart</title>
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1875b01c1a.js" crossorigin="anonymous"></script>
</head>
<body data-bs-spy="scroll" data-bs-target="#navbarScroll" data-bs-offset="100">
    @include('Frontend.header')

    @include('Frontend.front')

    @include('Frontend.why')

     <!--product-->
     @include('Frontend.product')

     @include('Frontend.discount')
    
     @include('Frontend.contact')

     @include('Frontend.footer')
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
<script>
    function scrollToProduct() {
        // Scroll to the element with id "product"
        document.getElementById("product").scrollIntoView({ behavior: "smooth" });
    }
</script>
