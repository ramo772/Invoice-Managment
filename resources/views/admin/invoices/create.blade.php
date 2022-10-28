@extends('layouts.admin')

@section('content')
    <form action="{{ route('invoices.store') }}" method="post">
        @csrf
        <div class="card">
            <div class="card-body mx-4">
                <div class="container">
                    <p class=" " style="font-size: 30px;">INV{{ $count + 1 }}/22</p>
                    <div class="row justify-content-between">
                        <div class="col-6">
                            Choose Client
                            <div>
                                <select name="client" required="required" class="form-select form-select-sm "
                                    id="client_select" onchange="client_details()" aria-label=".form-select-sm example">
                                    <option value=""> Choose Client</option>
                                    @foreach ($clients as $client)
                                        <option id="{{ $client }}" value="{{ $client->id }}">{{ $client->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <ul class="list-unstyled" id="">
                                <li class="text-black" id="client_name"></li>
                                <li class="text-muted mt-1" id="client_address"></li>
                                <li class="text-black mt-1" id="client_email"></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            Choose Issuance Date
                            <input required="required" type="date" class="form-control form-select-sm"
                                name="issuance_date" id="">
                        </div>
                        <hr>

                    </div>
                    <div class="row text-center">
                        <div class="col-3">
                            <p>Choose Product</p>
                        </div>
                        <div class="col-3">
                            <p>Quantity</p>
                        </div>
                        <div class="col-3">
                            <p>Price</p>
                        </div>
                        <div class="col-3">
                            <i class="fa-solid fa-plus" onclick="add()"></i>
                        </div>
                    </div>
                    <div class="row text-center mt-2">
                        <div class=" col-3">
                            <select required="required" class="form-select form-select-sm col-xl-3" name="product[]"
                                onchange="priceChange()" id="product_select" aria-label=".form-select-sm example">
                                <option value="">Choose Product</option>
                                @foreach ($products as $product)
                                    <option id="{{ $product }}" value="{{ $product->id }}">{{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <input type="number" class="form-control form-control-sm" id="quantity"
                                onchange="priceChange()" min="1" name="quantity[]">
                        </div>
                        <div class="col-3">
                            <h6 id="price"></h6>
                        </div>
                        <div class="col-3">
                            </span></p>
                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="row text-black">
                        <div class="col-xl-12">
                            <div class="felx d-flex justify-content-end">
                                <div>Total:</div><input type="text" name="total" onfocus="this.blur()"
                                    style="border: 0px" id="total" class="float-end fw-bold" readonly="readonly"
                                    placeholder="">$

                            </div>

                        </div>
                        <hr style="border: 2px solid black;">
                    </div>
                    <div class="text-left" style="margin-top: 90px;">
                        <button class="btn btn-outline-dark" type="submit" style="border-radius: 10%">Save</button>
                    </div>

                </div>
            </div>
        </div>

    </form>
    <script>
        let index = 2;

        function client_details() {
            let select = document.querySelector('#client_select');
            let option = document.querySelector('option:checked');

            let name = document.querySelector('#client_name');
            let client_address = document.querySelector('#client_address');
            let client_email = document.querySelector('#client_email');
            name.innerHTML = JSON.parse(option['id']).name;
            client_address.innerHTML = JSON.parse(option.id).address;
            client_email.innerHTML = JSON.parse(option.id).email;
        }


        function priceChange() {
            let price = document.querySelectorAll('#price');
            let quantity = document.querySelectorAll('#quantity');
            let select = document.querySelectorAll('option:checked');
            price[price.length - 1].innerHTML = quantity[quantity.length - 1].value == 0 ? JSON.parse(select[select.length -
                    1].id).price :
                JSON.parse(select[select.length - 1].id).price * quantity[quantity
                    .length - 1].value;

            let sum = 0
            let total = document.querySelector("#total");
            Prices = Object.values(price).map((price) => {
                sum += parseInt(price.innerHTML)
                return sum;
            })
            total.value = Prices[Prices.length - 1]

        }

        function add() {
            let container = document.querySelector('.container');
            let row = document.querySelectorAll('.row');
            let select = document.querySelectorAll('select');
            let quantity = document.querySelector('#quantity');
            let newRow = document.createElement("div");
            newRow.classList.add("row", "text-center")
            row[index].after(newRow, row[index].nextSibling);
            let ProductCol = document.createElement("div");
            ProductCol.classList.add("col-3")
            newRow.appendChild(ProductCol)
            let clone = row[index].cloneNode(true)
            row[index].after(clone, row[index].nextSibling)
            select[select.length - 1].setAttribute('disabled', 'disabled')
            quantity.setAttribute('disabled', 'disabled')
            price = document.querySelectorAll('#price');
            quantity = document.querySelectorAll('#quantity');
            price[price.length - 1].innerHTML = 0;
            quantity[quantity.length - 1].value = 1
            index++

        }
    </script>
@endsection
