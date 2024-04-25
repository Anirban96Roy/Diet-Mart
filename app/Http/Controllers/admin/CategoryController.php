<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $category=Category::latest();
        if(!empty($request->get('keyword')))
        {
            $category= $category->where('name','like','%'.$request->get('keyword').'%');
        }
        $category=$category->paginate(10);

        return view('admin.category.list',compact('category'));
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required|unique:catagories',
        ]);
        if($validator->passes())
        {
            $category=new Category();
            $category->name=$request->name;
            $category->slug=$request->slug;
            $category->status=$request->status;
            $category->save();

            $request->session()->flash('success','Category added successfully');

            return response()->json([
                'status'=> true,
                'massage'=> 'Category added successfully'
            ]);

        }
        else{
            return response()->json([
                'status'=> false,
                'errors'=> $validator->errors()
            ]);
        }
    }
    public function edit($categoryId,Request $request)
    {
        $category=Category::find($categoryId);
        if(empty($category))
        {
            return redirect()->route('category.index');
        }

        return view('admin.category.edit',compact('category'));
    }
    public function update($categoryId,Request $request)
    {
        $category=Category::find($categoryId);
        if(empty($category))
        {
            return response()->json([
                'status'=>false,
                'notFound'=>true,
                'message'=>'Not found'
            ]);
        }
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required|unique:catagories,slug,'.$category->id.',id',
        ]);
        if($validator->passes())
        {
           
            $category->name=$request->name;
            $category->slug=$request->slug;
            $category->status=$request->status;
            $category->save();

            $request->session()->flash('success','Category updated successfully');

            return response()->json([
                'status'=> true,
                'massage'=> 'Category updated successfully'
            ]);

        }
        else{
            return response()->json([
                'status'=> false,
                'errors'=> $validator->errors()
            ]);
        } 
    }
    public function destroy($categoryId,Request $request)
    {
        $category=Category::find($categoryId); 
        if(empty($category))
        {
            return redirect()->route('category.index');
        }
       $category->delete();
        $request->session()->flash('success','Category Deleted successfully');
       return response()->json([
        'status'=> true,
        'message'=> 'Category Deleted successfully'
    ]);

    }

}
