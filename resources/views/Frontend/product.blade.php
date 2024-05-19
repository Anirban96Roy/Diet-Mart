<section class="product" id="product">
      <div class="container py-5">
        <div class="row py-5">
          <div class="col-lg-5 m-auto text-center">
            <h1>Our Products</h1>
            <h6 style="color: red;">Taste the Freshness of Organic Ingredients</h6>
          </div>
        </div>
        <div class="row">

          @foreach($product as $pro)
          <div class="col-lg-3 text-center">
              <div class="card border-0 bg-light mb-2">
                <div class="card-body">
                  <img src="/product/{{$pro->image}}" alt="oats" class="img-fluid">
                </div>
              </div>
              <div class="product-info">
                <h6 style="color:Red;">{{$pro->title}}</h6>

                

                @if($pro->discount_price!=null)
                <p style="text-decoration: line-through;color:Red;">৳{{$pro->price}}</p>
                <p style="color:Green;">After discount:৳{{$pro->discount_price}}</p>
                @else{
                  <p style="color:Red;">৳{{$pro->price}}</p>
                }
                @endif

              </div>
                <form action="{{route('front.addCart',$pro->id)}}" method="post">
                  @csrf
                  <div class="btn-group" role="group" aria-label="Product Options">
                    <input type="number"style="height: 40px;width:50px;" name="quantity" value="" min="1">
                    <button style="margin-left: 10px; type="submit" class="btn btn-primary">Add to Cart</button>
                    
                  </div>
                </form>
              </div>
              
                @endforeach
                  <span style="padding-top: 50px;">
                {!! $product->withQueryString()->links('pagination::bootstrap-5') !!}
              </span>




          </div>

          <!--new row-->
     
        <!--another-->
        
      </div>
    </section>