@extends('admin.layouts.master')
@section('title', 'Delivery-Boy Dashboard')


@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p10">
            <div class="container-fluid">
                   
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a
                                    href="https://colorlib.com">Colorlib</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
@section('script')
<script type="text/javascript">
    function exportExcelPending()
    {
        
        window.open("{{ url('/') }}/Stock-Orverview-Report-Excel/", '_self');
    }
     
</script>
    
@endsection
