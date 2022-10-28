@extends('layouts.admin')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">All clients</h5>
                            </div>
                            <div>
                                <a class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal"
                                    data-bs-target="#add-modal" type="button">+&nbsp; New Client</a>

                            </div>


                        </div>
                        <x-modal method="post" id="add-modal">
                            <x-slot name="header">Add Client </x-slot>
                            <x-slot name="body">
                                @include('_forms.create-client')
                            </x-slot>
                        </x-modal>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Client Name
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Client Email
                                        </th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Client Invoices Count
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
                                                <p class="text-xs font-weight-bold mb-0">{{ $row->id }}</p>
                                            </td>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $row->name }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $row->email }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $row->invoices ? $row->invoices->count() : 0 }}</p>
                                            </td>
                                            <td class="text-center">
                                                <a class="fas fa-eye text-secondary" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#view-modal-{{ $row->id }}">
                                                </a>
                                                <a class="fas fa-trash text-secondary" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#delete-modal-{{ $row->id }}" data-url=""></a>
                                                <a class="fa-solid fa-pen-to-square" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#edit-modal-{{ $row->id }}">
                                                </a>

                                                <i class=""></i>
                                            </td>
                                            <x-modal id="delete-modal-{{ $row->id }}" method="delete"
                                                action="{{ route('clients.destroy', ['client' => $row->id]) }}">
                                                <x-slot name="header">you will delete this client with his invoices, Are
                                                    you
                                                    sure ??</x-slot>
                                                <x-slot name="body">
                                                </x-slot>
                                            </x-modal>
                                            <x-modal id="edit-modal-{{ $row->id }}"
                                                action="{{ route('clients.update', ['client' => $row->id]) }}"
                                                method="put">
                                                <x-slot name="header">Edit Client {{ $row->name }}</x-slot>
                                                <x-slot name="body">
                                                    @include('_forms.edit-client')
                                                </x-slot>
                                            </x-modal>
                                            <x-modal id="view-modal-{{ $row->id }}"
                                                action="{{ route('clients.update', ['client' => $row->id]) }}"
                                                method="put">
                                                <x-slot name="header">View Client {{ $row->name }}</x-slot>
                                                <x-slot name="body">
                                                    @include('_forms.view-client')
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
