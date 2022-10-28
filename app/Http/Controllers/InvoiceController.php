<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Auth::user()->invoice()->orderBy('id', 'asc')->paginate(10);

        return view('admin.invoices.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $count = Auth::user()->invoice->count();
        $clients = Auth::user()->clients;
        $products = Auth::user()->products;
        return view('admin.invoices.create', compact('count', 'clients', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count =  Auth::user()->invoice->count() + 1;
        $invoice = new Invoice;
        $invoice->issuance_date = $request->issuance_date;
        $invoice->client_id = $request->client;
        $invoice->total_price = $request->total;
        $invoice->number = "INV" . $count . '/22';
        $invoice->save();
        foreach ($request->product as $index => $value) {
            $invoiceProducts = new InvoiceProducts;
            $invoiceProducts->product_id = $value;
            $invoiceProducts->invoice_id = $invoice->id;
            $invoiceProducts->quantity = ($request->quantity)[$index];
        };
        $invoiceProducts->save();
        return redirect()->route('invoices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return view('admin.invoices.view', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
