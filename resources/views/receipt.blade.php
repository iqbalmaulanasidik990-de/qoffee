<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Receipt</title>

    <style>

        body {
            font-family: sans-serif;
            padding: 30px;
        }

        .title {
            text-align: center;
            margin-bottom: 30px;
        }

        .box {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
        }

        .row {
            margin-bottom: 12px;
        }

        .label {
            font-weight: bold;
        }

        .total {
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
        }

    </style>

</head>

<body>

    <h1 class="title">
        NO ANTRI COFFEE RECEIPT
    </h1>

    <div class="box">

        <div class="row">
            <span class="label">Queue Number :</span>
            {{ $queue->queue_number }}
        </div>

        <div class="row">
            <span class="label">Customer :</span>
            {{ $queue->customer_name }}
        </div>

        <div class="row">
            <span class="label">Phone :</span>
            {{ $queue->phone }}
        </div>

        <div class="row">
            <span class="label">Status :</span>
            {{ $queue->status }}
        </div>

        <hr>

        @if($queue->latte > 0)

            <div class="row">
                Latte : {{ $queue->latte }}
            </div>

        @endif

        @if($queue->americano > 0)

            <div class="row">
                Americano : {{ $queue->americano }}
            </div>

        @endif

        @if($queue->cappuccino > 0)

            <div class="row">
                Cappuccino : {{ $queue->cappuccino }}
            </div>

        @endif

        <div class="total">

            Total :
            Rp {{ number_format($queue->total_price) }}

        </div>

    </div>

</body>

</html>
