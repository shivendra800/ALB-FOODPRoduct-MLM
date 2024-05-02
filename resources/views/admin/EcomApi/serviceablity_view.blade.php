@extends('admin.layouts.master')
@section('title', 'SERVICEABILITY')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p10">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <div class="card">
                        <div class="card-header">
                                 <span style="color:#007bff">SERVICEABILITY</span> >  List</div>

                               <div class="card-body">
                               <input id="myInput" placeholder="Search" style="height:40px; border:.5px solid grey;width:100%;padding-left:.3rem;margin-bottom:2rem;margin-top:1rem;" />
                </div>
                
                <div class="col-lg-12">
                   
                    <div class="table-responsive table--no-card m-b-30">
                        <table  id="myTable"  class="table table-bordered">
                           
                            <tbody>

                                @foreach ($data as $item)
                                    
                                    {{ $item[state_code] }}<br>
                                   
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection