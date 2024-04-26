<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class ProductController extends Controller
{
   
    public function view_product()
{
    $products=Product::all();
    return view('admin.product.list',compact('products'));
}

public function store(Request $request)
{
    $product = new Product;
    $product->title = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->quantity = $request->quantity;
    $product->discount_price = $request->discount;
    $product->catagory = $request->category;

    // Check if a file was uploaded
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        
        // Validate the uploaded file
        $validated = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file validation rules as needed
        ]);

        // Move the uploaded file to the 'product' directory
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('product'), $imageName);

        // Save the image file name to the product object
        $product->image = $imageName;
    }

    $product->save();
    return redirect()->route('product.view')->with('success', 'Product created successfully');
    /* return redirect()->back()->with('success', 'Product created successfully'); */
}
public function create_product(){
    $category=Category::all();
    return view('admin.product.create', compact('category'));
}
public function edit($productId,Request $request)
{
    $products=Product::find($productId);
    $category=Category::all();
    if(empty($products))
    {
        return redirect()->route('product.view');
    }

    return view('admin.product.edit',compact('products','category'));
}
public function delete($id)
{
    $product=Product::find($id);
    $product->delete();
    return redirect()->back()->with('success', 'Product deleted successfully');
}
public function update(Request $request,$id)
{

    $product=Product::find($id);
    $product->title = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->quantity = $request->quantity;
    $product->discount_price = $request->discount;
    $product->catagory = $request->category;

   
    $image=$request->image;
     if($image){
        $imageName=time.'.'.$image->getClientOriginalExtension();
    $request->image->move('product',$imageName);

    $product->image = $imageName;
     }
    
    $product->save();
    return redirect()->route('product.view')->with('success', 'Product updated successfully');
}


}
