@extends('admin.layouts.master')
@section('title', 'View User')


@section('content')

    <div class="main-content">
        <div class="section__content section__content--p10">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <div class="card">
                    <div class="card-header">

                              <span style="color:#007bff">Details</span> User 

                                <a href="{{ url()->previous() }}" class="btn btn-warning float-right btn-sm"  style="width:150px;height:50px;padding-top: 1rem">Back</a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <label for="">Role</label>
                                        <div class="p-2 border">{{$users->role_as == '0' ? 'User' :'Admin'}}</div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="">First Name</label>
                                        <div class="p-2 border">{{$users->name}}</div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="">Last Name</label>
                                        <div class="p-2 border">{{$users->lname}}</div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="">Email</label>
                                        <div class="p-2 border">{{$users->email}}</div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="">Phone No</label>
                                        <div class="p-2 border">{{$users->phone}}</div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="">Address1</label>
                                        <div class="p-2 border">{{$users->address1}}</div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="">Address2</label>
                                        <div class="p-2 border">{{$users->address2}}</div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="">City</label>
                                        <div class="p-2 border">{{$users->city}}</div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="">State</label>
                                        <div class="p-2 border">{{$users->state}}</div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="">Country</label>
                                        <div class="p-2 border">{{$users->country}}</div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="">Pin Code</label>
                                        <div class="p-2 border">{{$users->pincode}}</div>
                                    </div>
        
                                </div>
                            </div>
                        </div>
                    </div>
        
                </div>
            </div>
        </div>
    </div>
@endsection
