<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>


    <table id="customers">
        <tr>
         
           <td><h2> </h2>
        <p>Name : {{ $pdfaccount['getuser']['name'] }}</p>
       <p>Member-ID : {{ $pdfaccount['getuser']['member_id'] }}</p>
       <p>Email : {{ $pdfaccount['getuser']['email'] }}</p>
       <p>Phone : {{ $pdfaccount['getuser']['phone'] }}</p>
       <p>Address : {{ $pdfaccount['getuser']['address1'] }}</p>
       
           </td> 
         </tr>
        
         
      </table>



    <table id="customers">
        <tr>
            <th width="10%">Sl</th>
            <th width="45%">Customer Bank  Details</th>
            <th width="45%">Customer Bank Data</th>
        </tr>
        <tr>
            <td>1</td>
            <td><b>Bank Name</b></td>
            <td>{{ $pdfaccount['bank_name'] }}</td>
        </tr>
        <tr>
            <td>2</td>
            <td><b>Bank IFSC Code</b></td>
            <td>{{ $pdfaccount['bank_ifsc_code'] }}</td>
        </tr>

        <tr>
            <td>3</td>
            <td><b>Bank Branch Name</b></td>
            <td>{{ $pdfaccount['bank_branch']  }}</td>
        </tr>

        <tr>
            <td>4</td>
            <td><b>Customer Account No</b></td>
            <td>{{ $pdfaccount['account_no'] }}</td>
        </tr>
        <tr>
            <td>5</td>
            <td><b>Account Holder Name </b></td>
            <td>{{ $pdfaccount['account_holder_name'] }}</td>
        </tr>
        <tr>
            <td>6</td>
            <td><b>Pan Card No</b></td>
            <td>{{ $pdfaccount['pan_no'] }}</td>
        </tr>
       
      

    </table>
    <br> <br>
    <i style="font-size: 10px; float: right;">Print Data : {{ date('d M Y') }}</i>

</body>

</html>
