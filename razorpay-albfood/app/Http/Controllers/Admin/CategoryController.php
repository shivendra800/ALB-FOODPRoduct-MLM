<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;
 

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required',
            'name' => 'required',
            'image' => 'required',
            'description' => 'required',
            'meta_description' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
             
        ]);
       $category = new Category();
       if($request->hasFile('image'))
       {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'.$ext;
        $file->move('admin_asset/uploads/category/',$filename);
        $category->image = $filename;

       }
       $category->name = $request->input('name');
       $category->slug = $request->input('slug');
       $category->description = $request->input('description');
       $category->status = $request->input('status') == TRUE ? '1':'0';
       $category->deals = $request->input('deals') == TRUE ? '1':'0';
       $category->meta_title = $request->input('meta_title');
       $category->meta_description = $request->input('meta_description');
       $category->meta_keywords = $request->input('meta_keywords');
       $category->save();
       //    dd($category);
        return redirect('/Category')->with('status','Category Added Succsessfully');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category= Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'slug' => 'required',
            'name' => 'required',
            'description' => 'required',
            'meta_description' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
             
        ]);
        $category= Category::find($id);

        if($request->hasFile('image'))
        {
          $path = 'admin_asset/uploads/category/'.$category->image;
          if(File::exists($path))
          {
            File::delete($path);
          }
         $file = $request->file('image');
         $ext = $file->getClientOriginalExtension();
         $filename = time().'.'.$ext;
         $file->move('admin_asset/uploads/category/',$filename);
         $category->image = $filename;
 
        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1':'0';
        $category->deals = $request->input('deals') == TRUE ? '1':'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_description = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->update();
        return redirect('/Category')->with('status','Category Updated Succsessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category= Category::find($id);
        if($category->image)
        {
            $path = 'admin_asset/uploads/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            } 

        }
        $category->delete();
        return redirect('/Category')->with('status','Category Deleted Succsessfully');
    }
}
