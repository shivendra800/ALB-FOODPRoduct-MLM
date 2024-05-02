@extends('admin.layouts.master')
@section('title', 'Add-Category')


@section('content')

    <div class="main-content">
        <div class="section__content section__content--p10">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                    <div class="card-header">
                                 <span style="color:#007bff">Category</span> > Add Category</div>
                            <div class="card-body">
                
                                <div class="card-title">
                          
                                </div>
                                <hr>
                                <form action="{{ url('Add-Category') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Name</label>
                                            <input id="name" name="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Slug</label>
                                            <input id="slug" name="slug" type="text"  value="{{old('slug')}}" class="form-control @error('slug') is-invalid @enderror">
                                            @error('slug')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Image</label>
                                            <input type="file" value="{{old('image')}}" class="form-control  @error('image') is-invalid @enderror" name="image">
                                            @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Status</label>
                                            <input type="checkbox"  @if(old('status')) checked @endif class=" " name="status" class="@error('name') is-invalid @enderror">
                                            
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Deals</label>
                                            <input type="checkbox" value="{{old('deals')}}" class="@error('name') is-invalid @enderror" name="deals">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Meta Title</label>
                                            <input type="text" value="{{old('meta_title')}}" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title">
                                            @error('meta_title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Meta Description</label>
                                            <textarea name="meta_description"   rows="3" class="form-control @error('meta_description') is-invalid @enderror">{{old('meta_description')}}</textarea>
                                            @error('meta_description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Meta Keywords</label>
                                            <textarea name="meta_keywords"   rows="3" class="form-control" class="@error('meta_keywords') is-invalid @enderror">{{old('meta_keywords')}}</textarea>
                                            @error('meta_keywords')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Desciption</label>
                                            <textarea name="description"   rows="3" class="form-control" class="@error('description') is-invalid @enderror">{{old('description')}}</textarea>
                                            @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
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
