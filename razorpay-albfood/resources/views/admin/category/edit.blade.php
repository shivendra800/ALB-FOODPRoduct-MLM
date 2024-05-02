@extends('admin.layouts.master')
@section('title', 'Edit-Category')


@section('content')

    <div class="main-content">
        <div class="section__content section__content--p10">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header"> <span style="color:#007bff">Category</span> > Edit Category</div>
                            <div class="card-body">
                                <div class="card-title">
                                   
                                </div>
                                <hr>
                                <form action="{{ url('Edit-Category/'.$category->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Name</label>
                                            <input id="name" name="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" value="{{$category->name}}">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Slug</label>
                                            <input id="slug" name="slug" value="{{$category->slug}}" type="text" class="form-control @error('slug') is-invalid @enderror">
                                            @error('slug')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Image</label>
                                            @if($category->image)
                                            <img src="{{ asset('admin_asset/uploads/category/' . $category->image) }}" alt="Image here"
                                            class="cate-image">
                                            @endif
                                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                            @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Status</label>
                                            <input type="checkbox" class=" " name="status" {{$category->status == '1' ? 'checked':''}} class="@error('name') is-invalid @enderror">
                                            
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Deals</label>
                                            <input type="checkbox" class="@error('name') is-invalid @enderror" name="deals" {{$category->deals == '1' ? 'checked':''}}>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Meta Title</label>
                                            <input type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" value="{{$category->meta_title}}">
                                            @error('meta_title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Meta Description</label>
                                            <textarea name="meta_description" rows="3" class="form-control @error('meta_description') is-invalid @enderror">{{$category->meta_description}}</textarea>
                                            @error('meta_description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Meta Keywords</label>
                                            <textarea name="meta_keywords" rows="3" class="form-control" class="@error('meta_keywords') is-invalid @enderror">{{$category->meta_keywords}}</textarea>
                                            @error('meta_keywords')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Desciption</label>
                                            <textarea name="description" rows="3" class="form-control" class="@error('description') is-invalid @enderror">{{$category->description}}</textarea>
                                            @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>


                                    </div>


                                    <div class="text-center">
                                        <button type="submit" class="btn  btn-info "> Submit </button>
                                        <button type="submit" class="btn  btn-info "> Back </button>
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
