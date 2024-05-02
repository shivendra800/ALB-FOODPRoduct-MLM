@extends('admin.layouts.master')
@section('title', 'Add-Product')


@section('content')

    <div class="main-content">
        <div class="section__content section__content--p10">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                        <div class="card-header">
                                 <span style="color:#007bff">Product</span> > Add Products</div>
                            <div class="card-body">
             
                               
                                <form action="{{ url('Add-Product') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="control-label mb-1">Select Category</label>
                                            <select class="form-select form-control @error('cate_id') is-invalid @enderror" name="cate_id" >
                                               <option value="">Select</option>
                                                @foreach($category as $item)
                                                    @if (old('cate_id') == $item->id)
                                                        <option value="{{ $item->id }}" selected>{{$item->name}}</option>
                                                    @else
                                                        <option value="{{ $item->id }}">{{$item->name}}</option>
                                                    @endif
                                                @endforeach
                                              
                                            </select>
                                            @error('cate_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label mb-1">Name</label>
                                            <input id="name" name="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="control-label mb-1">Slug</label>
                                            <input id="slug" name="slug" type="text"  value="{{old('slug')}}" class="form-control @error('slug') is-invalid @enderror">
                                            @error('slug')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label mb-1">Image</label>
                                            <input type="file" value="{{old('image')}}" class="form-control  @error('image') is-invalid @enderror" name="image">
                                            @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="control-label mb-1">Cost Price</label>
                                            <input type="number"  value="{{old('cost_price')}}" class="form-control  @error('cost_price') is-invalid @enderror" name="cost_price" >
                                            @error('cost_price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label mb-1">Original Price</label>
                                            <input type="number"  value="{{old('original_price')}}" class="form-control  @error('original_price') is-invalid @enderror" name="original_price" >
                                            @error('original_price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        
                                        <div class="form-group col-md-3">
                                            <label class="control-label mb-1">Selling Price</label>
                                            <input type="number"  value="{{old('selling_price')}}" class="form-control  @error('selling_price') is-invalid @enderror" name="selling_price" >
                                            @error('selling_price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label mb-1">Qty</label>
                                            <input type="number"  value="{{old('qty')}}" class="form-control  @error('qty') is-invalid @enderror" name="qty" >
                                            @error('qty')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                       

                                    </div>
                                    <div class="row">
                                        
                                       <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-1">Tax</label>
                                            <input type="number"  value="{{old('tax')}}" class="form-control  @error('tax') is-invalid @enderror" name="tax" >
                                            @error('tax')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Select Unit</label>
                                            <select class="form-select form-control @error('unit') is-invalid @enderror" name="unit" >
                                               <option value="">Select</option>
                                               <option value="kg" {{ (old('unit') == 'kg' ? "selected":"") }}>kg</option>
                                               <option value="gm" {{ (old('unit') == 'gm' ? "selected":"") }}>gm</option>
                                               <option value="ltr" {{ (old('unit') == 'ltr' ? "selected":"") }}>ltr</option>
                                               <option value="piece" {{ (old('unit') == 'piece' ? "selected":"") }}>piece</option>
                                               <option value="combo" {{ (old('unit') == 'combo' ? "selected":"") }}>combo</option>
                                               <option value="darzon" {{ (old('unit') == 'darzon' ? "selected":"") }}>darzon</option>
                                                 
                                            </select>
                                            @error('unit')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Meta Title</label>
                                            <input type="text" value="{{old('meta_title')}}" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title">
                                            @error('meta_title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="control-label mb-1">Meta Description</label>
                                            <textarea name="meta_description"   rows="3" class="form-control @error('meta_description') is-invalid @enderror">{{old('meta_description')}}</textarea>
                                            @error('meta_description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Status</label>
                                            <input type="checkbox"  @if(old('status')) checked @endif class=" " name="status" class="@error('status') is-invalid @enderror">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Deals</label>
                                            <input type="checkbox" @if(old('deals')) checked @endif class="@error('deals') is-invalid @enderror" name="deals">
                                        </div>

                                    </div>
                                       <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label mb-1">Meta Keywords</label>
                                            <textarea name="meta_keywords"   rows="3" class="form-control" class="@error('meta_keywords') is-invalid @enderror">{{old('meta_keywords')}}</textarea>
                                            @error('meta_keywords')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label mb-1">Desciption</label>
                                            <textarea name="description"   rows="3" class="form-control" class="@error('description') is-invalid @enderror">{{old('description')}}</textarea>
                                            @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Small Desciption</label>
                                            <textarea name="small_description"   rows="3" class="form-control @error('small_description') is-invalid @enderror">{{old('small_description')}}</textarea>
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
