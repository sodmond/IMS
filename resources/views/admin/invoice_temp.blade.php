<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <style type="text/css">
            #header, #content, #footer{
                padding:20px 0;
            }
            th, td{
                padding:10px 0px !important;
            }
            #content{
                min-height: 400px;
                padding-bottom: 100px;
            }
            #footer{
                text-align: center;
                border-top: 1px solid #DDD;
            }
        </style>
    </head>

    <body>
        <div class="main">
            <div id="header">
                <table style="width:100%;">
                    <tr>
                        <td style="padding-bottom:50px !important;">
                            <img src="{{ asset('images/logo.png') }}" alt="" style="max-width:150px;">
                        </td>
                        <td style="padding-bottom:50px !important; text-align:right; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">
                            <h5 style="font-weight:bold;">{{ strtoupper($invoice->id) }}</h5>
                            @if ($invoice->status == 0)
                                <span class="bg-danger px-2 py-1 text-white rounded mr-4">Unpaid</span>
                            @else
                                <span class="bg-success px-2 py-1 text-white rounded mr-4">Paid</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h6 style="font-weight:bold;">Billing Address</h6>
                            {{ ucwords($orderAddr->billing_company) }}<br>
                            {{ ucwords($orderAddr->billing_firstname .' '. $orderAddr->billing_lastname) }}<br>
                            <div style="max-width:150px;">{{ ucwords($orderAddr->billing_address) }}</div>
                            {{ ucwords($orderAddr->billing_phone) }}
                        </td>
                        <td style="">
                            <h6 style="font-weight:bold;">Shipping Address</h6>
                            {{ ucwords($orderAddr->shipping_company) }}<br>
                            {{ ucwords($orderAddr->shipping_firstname .' '. $orderAddr->shipping_lastname) }}<br>
                            <div style="max-width:150px;">{{ ucwords($orderAddr->shipping_address) }}</div>
                            {{ ucwords($orderAddr->shipping_phone) }}
                        </td>
                    </tr>
                </table>
            </div>
            <div id="content">
                <table style="width:100%">
                    <thead>
                        <tr style="border-top:2px solid #000; border-bottom:2px solid #000;">
                            <th>#</th>
                            <th>Part Number</th>
                            <th>Product Name</th>
                            <th>QTY</th>
                            <th>Unit Price</th>
                            <th>Extended</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                            $row = 1;
                            $cost_per_each = json_decode($invoice->cost_per_each, true);
                        @endphp
                        @for($i=0; $i<count($product_ids); $i++)
                            <tr style="border-bottom:1px solid #CCC;">
                                <td><strong>{{ $row++ }}</strong></td>
                                <td>{{ $products[$i]->part_number }}</td>
                                <td>{{ $products[$i]->title }}</td>
                                <td>{{ $quantities[$i] }}</td>
                                <td>{{ number_format($products[$i]->price, 2) }}</td>
                                <td>{{ number_format($cost_per_each[$i], 2) }}</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
                <table style="width:100%;">
                    <tbody>
                        <tr>
                            <td style="width:50%;"></td>
                            <td style="width:50%">
                                <?php
                                    $discount = ($invoice->total_cost * $invoice->discount) / 100;
                                    $tax = ($invoice->total_cost * $invoice->tax) / 100;
                                    #$total = ($invoice->total_cost - $discount) + ($invoice->shipping_fee + $invoice->tax);
                                ?>
                                <table style="width:100%;">
                                    <tbody>
                                        <tr style="border-bottom:1px solid #CCC;">
                                            <td><strong>Subtotal</strong></td>
                                            <td>#{{ number_format($invoice->total_cost, 2) }}</td>
                                        </tr>
                                        <tr style="border-bottom:1px solid #CCC;">
                                            <td><strong>Discount ({{$invoice->discount}}%)</strong></td>
                                            <td>- #{{ number_format($discount, 2) }}</td>
                                        </tr>
                                        <tr style="border-bottom:1px solid #CCC;">
                                            <td><strong>Shipping Fee</strong></td>
                                            <td>#{{ number_format($invoice->shipping_fee, 2) }}</td>
                                        </tr>
                                        <tr style="border-bottom:1px solid #CCC;">
                                            <td><strong>Tax ({{$invoice->tax}}%)</strong></td>
                                            <td>#{{ number_format($invoice->tax, 2) }}</td>
                                        </tr>
                                        <tr style="border-bottom:1px solid #CCC;">
                                            <td><strong>Total</strong></td>
                                            <td>#{{ number_format($invoice->total_cost, 2) }}</td>
                                        </tr>
                                        <tr style="border-bottom:1px solid #CCC;">
                                            <td><strong>Lead Time</strong></td>
                                            <td>{{ $invoice->lead_time }}</td>
                                        </tr>
                                        <tr style="border-bottom:1px solid #CCC;">
                                            <td><strong>Note</strong></td>
                                            <td>{{ $invoice->note }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="footer">
                <p>{{ config('app.name') }}<br>Computer Village, Ikeja Lagos.</p>
                <p>Phone: 08093373463, 08093374014</p>
                <p>Pay to; <br>
                    <strong>Bank Name:</strong> GTBank<br>
                    <strong>Account Number:</strong> 3702739123<br>
                    <strong>Account Holder:</strong> CyberNault Nigeria<br>
                </p>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    </body>
</html>