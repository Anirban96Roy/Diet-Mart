@extends('admin.layout.app')

@section('child')
   <!-- Content Header (Page header) -->
   <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="color: blue;">Add product</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="" class="btn btn-primary">Back</a> 
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">

        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label style="font-weight: bold;">product Name:</label>
                <input type="text" name="name" placeholder="Write product name" required="" style="width: 100%; padding: 5px;">
            </div>
            <div>
                <label style="font-weight: bold;">product Description:</label>
                <input type="text" name="description" placeholder="Write product Description" required="" style="width: 100%; padding: 5px;">
            </div>
            <div>
                <label style="font-weight: bold;">product Price:</label>
                <input type="number" name="price" placeholder="" required="" style="width: 100%; padding: 5px;">
            </div>
            <div>
                <label style="font-weight: bold;">Discount price:</label>
                <input type="number" name="discount" placeholder="" style="width: 100%; padding: 5px;">
            </div>
            <div>
                <label style="font-weight: bold;">product quantity:</label>
                <input type="number" name="quantity" min="0" placeholder="" required="" style="width: 100%; padding: 5px;">
            </div>
            <div>
                <label style="font-weight: bold;">product Category:</label>
                <select name="category" required="" style="width: 100%; padding: 5px;">
                <option value="" selected="">Add a category here</option>
                    
                @foreach( $category as $cat)
                 <option value="{{$cat->name}}">{{$cat->name}}</option>
                @endforeach
                </select>
            </div>
            <div>
                <label style="font-weight: bold;">product Image:</label>
                <input type="file" name="image" required="" style="width: 100%; padding: 5px;">
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary" style="margin-right: 10px;">Add</button>
                <a href="{{route('product.view')}}" class="btn btn-outline-dark">Cancel</a>
            </div>
        </form>   
        
    </div>
 </section>             
@endsection
