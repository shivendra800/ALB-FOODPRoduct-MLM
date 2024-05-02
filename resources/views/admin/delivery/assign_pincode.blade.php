@extends('admin.layouts.master')
@section('title', 'Assign Pincdoe')


@section('content')

    <div class="main-content">
        <div class="section__content section__content--p10">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header"> <span style="color:#007bff">Assign</span> > Pincode</div>
                            <div class="card-body">
                                <div class="card-title">

                                </div>
                                <hr>
                                <form action="{{ url('Assign-pincode/' . $deliveryboy->id) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Allot Pin Code</label>
                                            <input id="allot_pincode" name="allot_pincode" type="number" required=""
                                                class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                        </div>
                                    </div>



                                    <div class="text-center">
                                        <button type="submit" class="btn  btn-info "> Submit </button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <span style="color:#007bff"></span> > Delivery Men Allot Pincode List
                            </div>

                            <div class="card-body">
                                <input id="myInput" placeholder="Search"
                                    style="height:40px; border:.5px solid grey;width:100%;padding-left:.3rem;margin-bottom:2rem;margin-top:1rem;" />
                            </div>

                            <div class="col-lg-12">

                                <div class="table-responsive table--no-card m-b-30">
                                    <form action="{{url('assign-pincode-update/'.$deliveryboy->id)}}" method="post">
                                        @csrf
                                        
                                        
                                    <table id="myTable" class="table table-bordered">
                                        <thead>
                                            <tr>

                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Assign Pincode</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($deliveryBoyPincodewise as $item)
                                                <tr>
                                                    <td>{{ $item->id }}
                                                        <input type="hidden" name="id[]" value="{{$item->id}}">
                                                    </td>
                                                    <td>{{ $item['deliveryboy']->name }}</td>

                                                    <td>{{ $item['deliveryboy']->email }}</td>
                                                    <td><input type="text" name="allot_pincode[]" id="" value="{{ $item->allot_pincode }}"></td>
                                                  


                                                    
                                                   

                                                    


                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
