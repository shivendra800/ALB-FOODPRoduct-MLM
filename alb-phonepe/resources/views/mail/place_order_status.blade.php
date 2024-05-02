<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
     <table style="width:700px;">
    <tr><td>&nbsp;</td></tr><br></br>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Hello {{ $name }}</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Your Order #{{ $order_id }} status Has Been Updated to {{ $order_status }}</td></tr>
    <tr><td>&nbsp;</td></tr>
    @if(!empty($item_tracking_number))
    <tr><td> Tracking Number is {{ $item_tracking_number }}</td></tr>
    @endif
    <tr><td>&nbsp;</td></tr>
    <tr><td>Your Order Details Has Been Given Below:-</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>
        <table style="width:95%" cellpadding="5" cellspacing="5" bgcolor="#f7f4f4">
            <tr  bgcolor="#f7f4f4">
                <td>Product Name</td>
                <td>Product Quantity</td>
                <td>Product Price</td>
            </tr>
            @foreach ($order_details as $order )
            <tr  bgcolor="#cccccc">
              

                <td>{{ $order->product->name }}</td>
                <td>{{ $order->prod_qty }}</td>
                <td>{{ $order->product->selling_price }}</td>
                    
             
               
                </tr>
            @endforeach
           
            <tr>
                <td colspan="5" align="right">Grand Total</td>
                <td>INR {{ $total_price }}</td>
            </tr>
        </table>
        </td></tr>
        <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>For Any Queries, You Can Contact US At <a href="mailto:info@albfoodproducts.in">info@albfoodproducts.in</a></td></tr><br></br>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Thanks & Regards,</td></tr><br></br>
    <tr><td>ALB Food Product</td></tr>
</table>

</body>
</html>
