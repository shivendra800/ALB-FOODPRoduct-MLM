@extends('admin.layouts.master')
@section('title', 'Edit-Product')


@section('content')

    <div class="main-content">
        <div class="section__content section__content--p10">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">   
                            <div class="card-header">
                                 <span style="color:#007bff">Product</span> > Edit Products</div>
                            <div class="card-body">
               
                            
                                <form action="{{ url('Edit-Product/'.$product->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="control-label mb-1">Category</label>
                                            <input   type="text"
                                                class="form-control" value="{{$product->category->name}}" readonly>
                                        </div>
                                        
                                        <div class="form-group col-md-3">
                                            <label class="control-label mb-1">Name</label>
                                            <input id="name" name="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" value="{{$product->name}}">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="control-label mb-1">Slug</label>
                                            <input id="slug" name="slug" type="text"  value="{{$product->slug}}" class="form-control @error('slug') is-invalid @enderror">
                                            @error('slug')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label mb-1">Image</label>
                                            @if($product->image)
                                            <img src="{{ asset('admin_asset/uploads/product/' . $product->image) }}" alt="Image here" 
                                             >
                                            @endif
                                            <input type="file"   class="form-control  @error('image') is-invalid @enderror" name="image">
                                            @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="control-label mb-1">Cost Price</label>
                                            <input type="number"  value="{{$product->cost_price}}"  class="form-control  @error('cost_price') is-invalid @enderror" name="cost_price" >
                                            @error('cost_price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label mb-1">Original Price</label>
                                            <input type="number"  value="{{$product->original_price}}"  class="form-control  @error('original_price') is-invalid @enderror" name="original_price" >
                                            @error('original_price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        
                                        <div class="form-group col-md-3">
                                            <label class="control-label mb-1">Selling Price</label>
                                            <input type="number"   value="{{$product->selling_price}}" class="form-control  @error('selling_price') is-invalid @enderror" name="selling_price" >
                                            @error('selling_price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label mb-1">Qty</label>
                                            <input type="number"   value="{{$product->qty}}"  class="form-control  @error('qty') is-invalid @enderror" name="qty"  readonly>
                                            @error('qty')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           
                                           @enderror
                                           <span class="text-danger">This one can't be update because this qty effect the report and user section qty </span>
                                        </div>
                                       

                                    </div>
                                    <div class="row">
                                        
                                       <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label mb-1">Tax</label>
                                            <input type="number"  value="{{$product->tax}}"  class="form-control  @error('tax') is-invalid @enderror" name="tax" >
                                            @error('tax')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Select Unit</label>
                                            <select class="form-select form-control @error('unit') is-invalid @enderror" name="unit" >
                                               <option value="">Select</option>
                                               <option value="kg" {{ ($product->unit == 'kg' ? "selected":"") }}>kg</option>
                                               <option value="gm" {{ ($product->unit == 'gm' ? "selected":"") }}>gm</option>
                                               <option value="ltr" {{ ($product->unit  == 'ltr' ? "selected":"") }}>ltr</option>
                                               <option value="piece" {{ ($product->unit == 'piece' ? "selected":"") }}>piece</option>
                                               <option value="darzon" {{ ($product->unit == 'darzon' ? "selected":"") }}>darzon</option>
                                                 
                                            </select>
                                            @error('unit')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Meta Title</label>
                                            <input type="text"  value="{{$product->meta_title}}" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title">
                                            @error('meta_title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="control-label mb-1">Meta Description</label>
                                            <textarea name="meta_description"   rows="3" class="form-control @error('meta_description') is-invalid @enderror">{{$product->meta_description}}</textarea>
                                            @error('meta_description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Status</label>
                                            <input type="checkbox"   {{$product->status == '1' ? 'checked':''}} class=" " name="status" class="@error('status') is-invalid @enderror">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Deals</label>
                                            <input type="checkbox"  {{$product->deals == '1' ? 'checked':''}} class="@error('deals') is-invalid @enderror" name="deals">
                                        </div>

                                       </div>
                                       <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label mb-1">Meta Keywords</label>
                                            <textarea name="meta_keywords"   rows="3" class="form-control" class="@error('meta_keywords') is-invalid @enderror">{{$product->meta_keywords}}</textarea>
                                            @error('meta_keywords')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label mb-1">Desciption</label>
                                            <textarea name="description"   rows="3" class="form-control" class="@error('description') is-invalid @enderror">{{$product->description}}</textarea>
                                            @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Small Desciption</label>
                                            <textarea name="small_description"   rows="3" class="form-control @error('small_description') is-invalid @enderror">{{$product->small_description}}</textarea>
                                            @error('small_description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                       </div>
                                       

                                    </div>
                                   
                                    
                                   



                                    <div class="text-center">
                                        <button type="submit" class="btn  btn-info "> Submit </button>
                                        <button type="submit" class="btn  btn-secondary "> Back </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
