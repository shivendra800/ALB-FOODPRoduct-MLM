<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style>
    body {
        margin-top: 20px;
        background-color: #f7f7ff;
    }

    #invoice {
        padding: 0px;
    }

    .invoice {
        position: relative;
        background-color: #FFF;
        min-height: 680px;
        padding: 15px
    }

    .invoice header {
        padding: 10px 0;
        margin-bottom: 20px;
        border-bottom: 1px solid #0d6efd
    }

    .invoice .company-details {
        text-align: right
    }

    .invoice .company-details .name {
        margin-top: 0;
        margin-bottom: 0
    }

    .invoice .contacts {
        margin-bottom: 20px
    }

    .invoice .invoice-to {
        text-align: left
    }

    .invoice .invoice-to .to {
        margin-top: 0;
        margin-bottom: 0
    }

    .invoice .invoice-details {
        text-align: right
    }

    .invoice .invoice-details .invoice-id {
        margin-top: 0;
        color: #0d6efd
    }

    .invoice main {
        padding-bottom: 50px
    }

    .invoice main .thanks {
        margin-top: -100px;
        font-size: 2em;
        margin-bottom: 50px
    }

    .invoice main .notices {
        padding-left: 6px;
        border-left: 6px solid #0d6efd;
        background: #e7f2ff;
        padding: 10px;
    }

    .invoice main .notices .notice {
        font-size: 1.2em
    }

    .invoice table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px
    }

    .invoice table td,
    .invoice table th {
        padding: 15px;
        background: #eee;
        border-bottom: 1px solid #fff
    }

    .invoice table th {
        white-space: nowrap;
        font-weight: 400;
        font-size: 16px
    }

    .invoice table td h3 {
        margin: 0;
        font-weight: 400;
        color: #0d6efd;
        font-size: 1.2em
    }

    .invoice table .qty,
    .invoice table .total,
    .invoice table .unit {
        text-align: right;
        font-size: 1.2em
    }

    .invoice table .no {
        color: #fff;
        font-size: 1.6em;
        background: #0d6efd
    }

    .invoice table .unit {
        background: #ddd
    }

    .invoice table .total {
        background: #0d6efd;
        color: #fff
    }

    .invoice table tbody tr:last-child td {
        border: none
    }

    .invoice table tfoot td {
        background: 0 0;
        border-bottom: none;
        white-space: nowrap;
        text-align: right;
        padding: 10px 20px;
        font-size: 1.2em;
        border-top: 1px solid #aaa
    }

    .invoice table tfoot tr:first-child td {
        border-top: none
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0px solid rgba(0, 0, 0, 0);
        border-radius: .25rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
    }

    .invoice table tfoot tr:last-child td {
        color: #0d6efd;
        font-size: 1.4em;
        border-top: 1px solid #0d6efd
    }

    .invoice table tfoot tr td:first-child {
        border: none
    }

    .invoice footer {
        width: 100%;
        text-align: center;
        color: #777;
        border-top: 1px solid #aaa;
        padding: 8px 0
    }

    @media print {
        .invoice {
            font-size: 11px !important;
            overflow: hidden !important
        }

        .invoice footer {
            position: absolute;
            bottom: 10px;
            page-break-after: always
        }

        .invoice>div:last-child {
            page-break-before: always
        }
    }

    .invoice main .notices {
        padding-left: 6px;
        border-left: 6px solid #0d6efd;
        background: #e7f2ff;
        padding: 10px;
    }
</style>



<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h2>Invoice</h2>
                <h3 class="pull-right">Order # {{ $userDetails['tracking_no'] }}

                </h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>Billed To:</strong><br>
                        Name : ALB Food Product<br>
                        Address : FATHAPUR, Uttar Pradesh
                        <br>
                        Pincode : 245201<br>
                        Email : pankajpandit002@Gmail.com<br>
                        Phone No : +91 8077636670<br>
                         GSTIN : O9FNHPS9352G1ZB<br>


                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Shipped To:</strong><br>
                        {{ $userDetails['fname'] }} {{ $userDetails['lname'] }}<br>
                        {{ $userDetails['address1'] }}<br>
                        {{ $userDetails['cityName'] }}<br>
                        {{ $userDetails['stateName'] }}<br>
                        {{ $userDetails['email'] }}<br>
                        {{ $userDetails['pincode'] }}<br>
                        {{ $userDetails['phone'] }}<br>

                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>Payment Method:</strong><br>
                        {{ $userDetails['payment_mode'] }}<br>
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Order Date:</strong><br>
                        {{ date('Y-m-d h:i:s', strtotime($userDetails['created_at'])) }}
                    </address>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td>S.No.</td>
                                    <td class="text-center"><strong>Product Name</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
                                    <td class="text-center"><strong>Quantity</strong></td>
                                    <td class="text-right"><strong>Totals</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                @php $subTotal =0 @endphp
                                @foreach ($orderDetails as $index => $product)
                                    <tr>

                                        <td>{{ $index + 1 }}</td>
                                        <td class="text-center">{{ $product['product']['name'] }}</td>
                                        <td class="text-center">{{ $product['price'] }}</td>
                                        <td class="text-center">{{ $product['qty'] }}</td>
                                        <td class="text-right">Rs.{{ $product['price'] * $product['qty'] }}</td>
                                    </tr>
                                    @php
                                    $subTotal = $subTotal +($product['price']*$product['qty']) 
                                
                                    
                                    @endphp
                                @endforeach
                                
                                    


                                <tr>
                                    {{-- <td class="thick-line"></td>
                                <td class="thick-line"></td> --}}
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-right">Rs. {{ $subTotal }} </td>
                                </tr>
                                 <tr>
                                    {{-- <td class="thick-line"></td>
                                <td class="thick-line"></td> --}}
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>CGST   6%</strong></td>
                                    <td class="thick-line text-right">
                                        
                                         @php
                                
                                 $gstamt = $userDetails['gstamt'];
                                 $cgst_sgst = $gstamt/2;
                                @endphp
                                        Rs. {{ $cgst_sgst }} </td>
                                </tr>
                                <tr>
                                    {{-- <td class="thick-line"></td>
                                <td class="thick-line"></td> --}}
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="no-line text-center"><strong>SGST  6%</strong></td>
                                    <td class="no-line text-right">Rs. {{ $cgst_sgst }}</td>
                                </tr>
                                <!--<tr>-->
                                <!--    {{-- <td class="thick-line"></td>-->
                                <!--<td class="thick-line"></td> --}}-->
                                <!--    <td class="thick-line"></td>-->
                                <!--    <td class="thick-line"></td>-->
                                <!--    <td class="thick-line"></td>-->
                                <!--    <td class="no-line text-center"><strong>GST Amount</strong></td>-->
                                <!--    <td class="no-line text-right">Rs.{{ $userDetails['gstamt'] }}</td>-->
                                <!--</tr>-->
                                <tr>
                                    {{-- <td class="no-line"></td>
                                <td class="thick-line"></td> --}}
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-right">Rs.{{ $userDetails['totalwithgst'] }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
        <div class="invoice-btn-section clearfix d-print-none">
            <a href="javascript:window.print()" class="btn btn-lg btn-print">
                <i class="fa fa-print"></i> Print Invoice
            </a>
        
        </div>
    </div>
</div>

