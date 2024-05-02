
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    #invoice{
    padding: 30px;
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
    border-bottom: 1px solid #3989c6
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
    color: #3989c6
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
    border-left: 6px solid #3989c6
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

.invoice table td,.invoice table th {
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
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
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

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
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
        font-size: 11px!important;
        overflow: hidden!important
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
</style>
<!--Author      : @arboshiki-->
<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
            {{-- <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button> --}}
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">


                        <a target="_blank" href="#">
                            <img src="https://i.ibb.co/PDfy00q/logos.png" data-holder-rendered="true" />
                            </a>
                    </div>
                    <div class="col company-details">
                        Name : ALbFoodProduct<br>
                        Address : FATHAPUR, Uttar Pradesh
                        <br>
                        Pincode : ,245201<br>
                        Email : pankajpandit002@Gmail.com<br>
                        Phone No : +91 8077636670<br>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to">{{$widtharapprin['account_holder_name']}}</h2>
                        <h4 class="to">{{$widtharapprin['bank_name']}}</h4>
                        <h4 class="to">{{$widtharapprin['bank_ifsc_code']}}</h4>
                        <h4 class="to">{{$widtharapprin['bank_branch']}}</h4>
                        <h4 class="to">{{$widtharapprin['account_no']}}</h4>
                       
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id"> #{{$widtharapprin['invoice_no']}}</h1>
                        <div class="date">Date of Invoice: {{$widtharapprin['updated_at']}}</div>
                        {{-- <div class="date">Due Date: 30/10/2018</div> --}}
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0" class="text-center">
                    <thead class="text-center">
                        <tr class="text-center">
                            <th>#</th>
                            <th>Transaction Id</th>
                            <th>Status</th>
                            <th>Requested amount</th>
                            <th >TOTAL</th>
                            
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr class="text-center">
                            <td class="no text-center">01</td>
                            <td class="no text-center">{{$widtharapprin['transaction_id']}}</td>
                            <td class="unit text-center">{{$widtharapprin['status']}}</td>
                            <td class="qty text-center">{{$widtharapprin['withdraw_amount_req']}}</td>
                            <td class="total text-center">{{$widtharapprin['withdraw_amount_req']}}</td>
                        </tr>
                      
                    </tbody>
                    <tfoot>
                        {{-- <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td>$5,200.00</td>
                        </tr> --}}
                        {{-- <tr>
                            <td colspan="2"></td>
                            <td colspan="2">TAX 25%</td>
                            <td>$1,300.00</td>
                        </tr> --}}
                        <tr>
                            <td colspan="1"></td>
                            <td colspan="1"></td>
                            <td colspan="1"></td>
                            <td colspan="1">GRAND TOTAL</td>
                            <td>Rs.{{$widtharapprin['withdraw_amount_req']}}</td>
                        </tr>
                    </tfoot>
                </table>
                <br>
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    {{-- <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div> --}}
                </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>

<script>
     $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });
</script>