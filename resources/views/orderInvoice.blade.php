<?php
$settings=\App\Models\Setting::first();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        * {
            font-family: DejaVu Sans, sans-serif;
        }

        .st {
            border-bottom: 1px solid black;
            border-collapse: collapse;
            text-align: center
        }

        .st-d {
            border-bottom: 1px solid black;
            border-collapse: collapse;
            text-align: center
        }

        .tt-h {
            text-align: start;
            padding: 11px;
        }

        #last {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="top" style="display:flex">
        <div class="logo">
            <img src="{{ asset('storage/settings/'. $settings->logo_black) }}" alt="Company Logo" srcset=""
                style="width:80px; height:80px;">
        </div>
        <div class="headi"
            style=" display: flex;
    justify-content: flex-end; margin-left:590px; color:#27c5da; margin-top:-50px;">
            <h2>INVOICE</h2>
        </div>
        <p style=" margin-left:560px; margin-top:-15px; ">Company details</p>
        <p style=" margin-left:455px; margin-top:-10px;">
            <img src="{{ public_path('/assets/invoice/icons/Home-icon.svg.png') }}" alt="add" srcset=""
                style="width:10px; height:10px;">
            <span style="font-size: 12px"> {{ \App\Models\Setting::first()->address_line1 }}, {{ \App\Models\Setting::first()->address_line2 }}, {{ \App\Models\Setting::first()->city }}, {{ \App\Models\Setting::first()->state }}, {{ \App\Models\Setting::first()->country }}, {{ \App\Models\Setting::first()->pincode }}</span><br>
            <img src="{{ public_path('/assets/invoice/icons/call icon.png') }}" alt="ph" srcset=""
                style="width:10px; height:10px;">
            <span style="font-size: 12px"> {{ \App\Models\Setting::first()->mobile }}</span><br>
            <img src="{{ public_path('/assets/invoice/icons/mail.png') }}" alt="email" srcset=""
                style="width:10px; height:10px;">
            <span style="font-size: 12px"> {{ \App\Models\Setting::first()->email }}</span><br>
            <img src="{{ public_path('/assets/invoice/icons/glob.png') }}" alt="email" srcset=""
            style="width:10px; height:10px;">
        <span style="font-size: 12px"> {{ \App\Models\Setting::first()->url }}</span>

        </p>
    </div>
    <hr style="">
    <table class="ft" style="width:100%; border: 1px solid black;border-collapse: collapse; margin-top:20px;">
        <tr>
            <td style="border: 1px solid black; border-collapse: collapse; padding:10px;">
                <span style="font-size: 13px">Invoice to:</span> <br>
                <span style="font-size: 13px"> <b> {{ $order->user->name }}</b></span><br>
                <span style="font-size: 13px"> {{ $order->address }}, {{ $order->city }}, {{ $order->state }},
                    {{ $order->country }}</span><br>
                <span>
                    <img src="{{ public_path('/assets/invoice/icons/call icon.png') }}" alt="ph" srcset=""
                        style="width:10px; height:10px;">
                    <span style="font-size: 13px"> {{ $order->contact_number }}</span>
                    <img src="{{ public_path('/assets/invoice/icons/mail.png') }}" alt="email" srcset=""
                        style="width:10px; height:10px;">
                    <span style="font-size: 13px"> {{ $order->user->email }}</span>
                </span>
            </td>
            <td style="border: 1px solid black;border-collapse: collapse;padding:10px;">
                <span style="font-size: 13px">Invoice NO.</span> <br>
                <span style="font-size: 14px">{{ $order->order_id }}</span><br>

                <span style="font-size: 13px; padding-top:10px;">Date.</span> <br>
                <span style="font-size: 14px">
                    {{ \Carbon\Carbon::parse($order->created_at)->format('j F, Y') }}</span>

            </td>
            <td style="border: 1px solid black;border-collapse: collapse;padding:10px;">
                <span style="font-size: 16px">TOTAL Amount</span><br>


                <span style="font-size: 20px"><b>₹{{ $order->product_price }}/-</b></span>

            </td>
        </tr>
    </table>

    <table class="st" style="width:100%; margin-top:30px; ">
        <tr>
            <th style="background-color: #27c5da; color:white; padding:5px;border-collapse: collapse;font-size: 16px ">
                Product Name</th>
            <th style="background-color: #27c5da; color:white; padding:5px;border-collapse: collapse;font-size: 16px ">
                Price</th>
            <th style="background-color: #27c5da; color:white; padding:5px;border-collapse: collapse;font-size: 16px">
                Quantity</th>
            <th style="background-color: #27c5da; color:white; padding:5px;border-collapse: collapse;font-size: 16px">
                Category</th>
            <th style="background-color: #27c5da; color:white; padding:5px;border-collapse: collapse;font-size: 16px">
                Total</th>
        </tr>

        <tr>
            <td class="st-d" style="padding: 10px "><span>{{ $order->product->name }}</span></td>
            <td class="st-d" style="padding: 10px"><span>₹{{ $order->product->our_price }}</span></td>
            <td class="st-d" style="padding: 10px"><span>{{ $order->quantity }}</span></td>
            <td class="st-d" style="padding: 10px"><span>{{ $order->product->category->name }}</span></td>
            <td class="st-d" style="padding: 10px"><span>₹{{ $order->product->our_price }}</span>
            </td>
        </tr>

    </table>


    <div class="tt" style="display: flex; margin-top:50px;">
        <table class="tt-f" style="width:30%">
            <tr>
                <th style=" border-bottom: 1px solid black;
        border-collapse: collapse; padding-bottom:10px">
                    Payment Details</th>

            </tr>
            <tr>
                <td style="border-bottom: none; padding:10px ">
                    <span style="font-size:15px "> Payment Type : {{ $order->payment->payment_type }}</span><br>
                    <span style="font-size: 12px ">Payment Method : {{ $order->payment->mode }}</span>
                </td>
            </tr>
            <tr>
                <td style="border-bottom: none; padding:10px">

                    <span style="font-size: 15px">Payment ID : {{ $order->payment->rzp_payment_id }}</span><br>
<br>
                    <span style="font-size: 15px">Transaction ID : {{ $order->payment->transaction_id }}</span><br>

                </td>
            </tr>
        </table>
        <table class="tt-s"
            style="width:50% ; margin-left:50%; text-align:end; border-collapse: collapse; margin-top:-120px;">

            <tr>
                <th class="tt-h">SUB TOTAL:</th>
                <td class="tt-h">₹{{ $order->product_price }}</td>

            </tr>
            {{-- <tr>
                    <th class="tt-h">Tax({{ $invoice->payment->tax_name }}: {{ $invoice->payment->tax_value }}%):
                    </th>
                    <td class="tt-h">
                        <img src="{{ public_path('/assets/invoice/icons/rupee-indian.png') }}" alt="email"
                            srcset="" style="width:10px; height:10px;">
                        {{ ($invoice->payment->amount / 100) * $invoice->payment->tax_value }}
                    </td>
                </tr> --}}

            <tr>
                <th class="tt-h"
                    style="background-color: #27c5da; color:white; padding:5px;border-collapse: collapse;font-size: 16px ">
                    Grand Total</th>
                <td class="tt-h"
                    style="background-color: #27c5da; color:white; padding:5px;border-collapse: collapse;font-size: 16px ">

                    ₹{{ $order->product_price }}
                </td>
            </tr>

        </table>



    </div>
    {{-- <div id="footer"> --}}
{{--
    <div class="last" style="display: flex;" id="last">
        <hr>
        <table style="width:70%; margin-top:15px;text-align: center ">
            <tr>
                <td style="text-align: center;  border-right: 1px solid black;
  border-collapse: collapse;">
                    <img src="{{ public_path('/assets/invoice/icons/location.png') }}" alt=""
                        srcset="" style="width: 17px; height:17px; "><br>
                    <span style="padding-top: 10px;font-size: 12px"> {{ \App\Models\Setting::first()->address_line1 }}
                        <br>
                        <span style="padding-top: 10px;font-size: 12px">India</span>
                </td>
                <td style="text-align: center ;  border-right: 1px solid black;
  border-collapse: collapse;">
                    <img src="{{ public_path('/assets/invoice/icons/mail.png') }}" alt="" srcset=""
                        style="width: 17px; height:17px ;margin-top:-15px "><br>
                    <span
                        style="padding-top: 10px; font-size: 12px">{{ \App\Models\Setting::first()->email }}</span><br>
                </td>
                <td style=" text-align: center;  border-right: 1px solid black;
  border-collapse: collapse;">
                    <img src="{{ public_path('images/Employee/Icons/glob.png') }}" alt="" srcset=""
                        style="width: 17px; height:17px ; margin-top:-15px"> <br>
                    <span style="padding-top: 10px;font-size: 12px">www.blueserene.com</span><br>
                </td>
                <td style=" text-align: center">
                    <img src="{{ public_path('/assets/invoice/icons/call icon.png') }}" alt=""
                        srcset="" style="width: 17px; height:17px ;margin-top:-15px "><br>
                    <span
                        style="padding-top: 10px;  font-size: 12px;">+91{{ \App\Models\Setting::first()->mobile }}</span><br>
                </td>

            </tr>
        </table>
        <table style="width: 20%; margin-left:85%; margin-top:-70px; ">
            <tr>
                <td>
                    <img src="{{ public_path('/assets/invoice/icons/logo.png') }}" alt="" srcset=""
                        style="width: 85px; height:85px ;">
                </td>
            </tr>
        </table>
    </div> --}}

</body>

</html>
