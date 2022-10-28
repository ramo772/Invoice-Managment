<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100 ">

    <div class="card">
        <div class="card-body mx-4">
            <div class="container">
                <p class=" " style="font-size: 30px;">{{ $invoice->number }}</p>
                <div class="row justify-content-between">
                    <div class="col-6">
                        Client
                        <div>
                            <p class="form-control form-select-sm">{{ $invoice->client->name }}</p>
                        </div>
                        <ul class="list-unstyled" id="">
                            <li class="text-black" id="client_name"></li>
                            <li class="text-muted mt-1" id="client_address"></li>
                            <li class="text-black mt-1" id="client_email"></li>
                        </ul>
                    </div>
                    <div class="col-6">
                        Issuance Date
                        <p class="form-control form-select-sm">{{ $invoice->issuance_date }}</p>

                    </div>
                    <hr>

                </div>
                <div class="row text-center">
                    <div class="col-3">
                        <p>Products</p>
                    </div>
                    <div class="col-3">
                        <p>Quantity</p>
                    </div>
                    <div class="col-3">
                        <p>Price</p>
                    </div>
                </div>
                @foreach ($invoice->products as $index => $value)
                    <div class="row text-center mt-2">
                        <div class=" col-3">
                            <p class="form-control form-select-sm">{{ $value->name }}
                            </p>
                        </div>
                        <div class="col-3">
                            <p class="form-control form-select-sm">{{ $invoice->invoiceProducts[$index]->quantity }}
                            </p>
                        </div>
                        <div class="col-3">
                            <p class="form-control form-select-sm">
                                {{ $value->price * $invoice->invoiceProducts[$index]->quantity }}</p>
                        </div>
                    </div>
                @endforeach

                <hr class="mt-2">
                <div class="row text-black">
                    <div class="felx d-flex justify-content-end">

                        <div>Total:</div>
                        <p class="form-control  form-select-sm" style="width: 20%">
                            {{ $invoice->total_price }}</p>
                    </div>
                    <hr style="border: 2px solid black;">
                </div>

            </div>
        </div>
    </div>
</body>

