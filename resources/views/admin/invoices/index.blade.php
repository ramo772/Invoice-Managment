@extends('layouts.admin')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">All Invoices</h5>
                            </div>


                            <a class="btn bg-gradient-primary btn-sm mb-0" href="{{ route('invoices.create') }}"
                                type="button">+&nbsp; New Invoice</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Invoice no.
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Total Price
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Issuance Date
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Client
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $row)
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $row->number }}</p>
                                            </td>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $row->total_price }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $row->issuance_date }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $row->client->name }}</p>
                                            </td>
                                            <td class="text-center">
                                                <a class="fas fa-trash text-secondary" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#delete-modal-{{ $row->id }}" data-url=""></a>
                                                <div>
                                                    <a class="fa-solid fa-print text-secondary " type="button"
                                                        href="{{ route('invoices.show', $row->id) }}"></a>
                                                </div>
                                            </td>
                                            <x-modal id="delete-modal-{{ $row->id }}" method="delete"
                                                action="{{ route('invoices.destroy', ['invoice' => $row->id]) }}">
                                                <x-slot name="header">you will delete the invoice with its articles, Are
                                                    you
                                                    sure ??</x-slot>
                                                <x-slot name="body">
                                                </x-slot>
                                            </x-modal>
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-center text-center justify-content-center">
        {!! $data->links('pagination::bootstrap-4') !!}
    </div>
@endsection
