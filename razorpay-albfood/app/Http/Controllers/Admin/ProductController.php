<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use App\Models\StockLog;

 

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::with('category')->get();
        
        return view('admin.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.product.add',compact('category'));
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
            'cate_id' => 'required',
            'cost_price' => 'required',
            'original_price' => 'required',
            'selling_price' => 'required',
            'qty' => 'required',
            'tax' => 'required',
            'small_description' => 'required',
            'cate_id' => 'required',
            'unit' => 'required',
             
        ]);
        $product = new Product();
        if($request->hasFile('image'))
        {
         $file = $request->file('image');
         $ext = $file->getClientOriginalExtension();
         $filename = time().'.'.$ext;
         $file->move('admin_asset/uploads/product/',$filename);
         $product->image = $filename;
 
        }
        $product->cate_id = $request->input('cate_id');
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->cost_price = $request->input('cost_price');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->qty = $request->input('qty');
        $product->original_qty = $request->input('qty');
        $product->tax = $request->input('tax');
        $product->status = $request->input('status') == TRUE ? '1':'0';
        $product->deals = $request->input('deals') == TRUE ? '1':'0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->unit = $request->input('unit');
        $product->save();
       //    dd($category);
        return redirect('/Product')->with('status','Product Added Succsessfully');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product= Product::find($id);
        return view('admin.product.edit',compact('product'));
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
        $product= Product::find($id);
        $request->validate([
            'slug' => 'required',
            'name' => 'required',
            'description' => 'required',
            'meta_description' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'cost_price' => 'required',
            'original_price' => 'required',
            'selling_price' => 'required',
            // 'qty' => 'required',
            'tax' => 'required',
            'small_description' => 'required',
            'unit' => 'required',
             
        ]);
        // $product = new Product();
        if($request->hasFile('image'))
        {
          $path = 'admin_asset/uploads/product/'.$product->image;
          if(File::exists($path))
          {
            File::delete($path);
          }
         $file = $request->file('image');
         $ext = $file->getClientOriginalExtension();
         $filename = time().'.'.$ext;
         $file->move('admin_asset/uploads/product/',$filename);
         $product->image = $filename;
 
        }
       
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->cost_price = $request->input('cost_price');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        // $product->qty = $request->input('qty');
        $product->tax = $request->input('tax');
        $product->status = $request->input('status') == TRUE ? '1':'0';
        $product->deals = $request->input('deals') == TRUE ? '1':'0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->unit = $request->input('unit');
        $product->update();
        return redirect('/Product')->with('status','Product Updated Succsessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product= Product::find($id);
        if($product->image)
        {
            $path = 'admin_asset/uploads/product/'.$product->image;
            if(File::exists($path))
            {
                File::delete($path);
            } 

        }
        $product->delete();
        return redirect('/Product')->with('status','Product Deleted Succsessfully');
    }
    
    
       public function stockUpdate(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            foreach ($data['id'] as $key => $attribute) {
                if (!empty($attribute)) {
                    $update_vendor_tbl = Product::where('id',$attribute)->first();
                    $update_vendor_tbl->qty =  $update_vendor_tbl->qty+$data['qty'][$key];
                    $update_vendor_tbl->original_qty =  $update_vendor_tbl->original_qty+$data['qty'][$key];
                    $update_vendor_tbl->update();


                    $adddatainstcoklog = new StockLog();
                    $adddatainstcoklog->cate_id = $update_vendor_tbl->cate_id;
                    $adddatainstcoklog->prod_id = $update_vendor_tbl->id;
                    $adddatainstcoklog->original_qty = $update_vendor_tbl->qty;
                    $adddatainstcoklog->updated_qty = $data['qty'][$key];
                    $adddatainstcoklog->total_qty = $update_vendor_tbl->qty+$data['qty'][$key];
                    $adddatainstcoklog->save();
                }
            }
        
            return redirect()->back()->with('status', 'Product Qty has bben updated Successfully!');
        }
        $product= Product::get();
        return view('admin.product.stock_update',compact('product'));
    }
    
     public function stockUpdatehistory()
    {
      $stockupdate_history = StockLog::where('updated_qty','!=',0)->get();
       return view('admin.product.stockupdate_history',compact('stockupdate_history'));
    }
}
