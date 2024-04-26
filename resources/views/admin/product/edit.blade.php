@extends('admin.layout.app')

@section('child')
   <!-- Content Header (Page header) -->
   <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="color: blue;">Edit product-Items</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('product.view')}}" class="btn btn-primary">Back</a> 
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">

        <form action="{{route('product.update',$products->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label style="font-weight: bold;">product Name:</label>
                <input type="text" value="{{$products->title}}" name="name" placeholder="Write product name" required="" style="width: 100%; padding: 5px;">
            </div>
            <div>
                <label style="font-weight: bold;">product Description:</label>
                <input type="text" value="{{$products->description}}" name="description" placeholder="Write product Description" required="" style="width: 100%; padding: 5px;">
            </div>
            <div>
                <label style="font-weight: bold;">product Price:</label>
                <input type="number" value="{{$products->price}}" name="price" placeholder="" required="" style="width: 100%; padding: 5px;">
            </div>
            <div>
                <label style="font-weight: bold;">Discount price:</label>
                <input type="number" name="discount" value="{{$products->discount_price}}" placeholder="" style="width: 100%; padding: 5px;">
            </div>
            <div>
                <label style="font-weight: bold;">product quantity:</label>
                <input type="number" name="quantity" min="0" value="{{$products->quantity}}" placeholder="" required="" style="width: 100%; padding: 5px;">
            </div>
            <div>
                <label style="font-weight: bold;">product Category:</label>
                <select name="category" required="" style="width: 100%; padding: 5px;">
                <option value="{{$products->catagory}}" selected="">{{$products->catagory}}</option>
                @foreach($category as $cat)
                <option value="" selected="">{{$cat->name}}</option>
                @endforeach
                </select>
            </div>

            <div>
                <label style="font-weight: bold;">Current product Image:</label>
               <img style="marging:auto" height="100" width="100" src="/product/{{$products->image}}">
            </div>

            <div>
                <label style="font-weight: bold;">Change product Image:</label>
                <input type="file" value=""name="image"  style="width: 100%; padding: 5px;">
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary" style="margin-right: 10px;">Update</button>
                <a href="{{route('product.view')}}" class="btn btn-outline-dark">Cancel</a>
            </div>
        </form>   
        
    </div>
 </section>             
@endsection
