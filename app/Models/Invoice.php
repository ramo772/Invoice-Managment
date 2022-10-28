<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    /**
     * Get the client that owns the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function products()
    {
        return $this->hasManyThrough(Product::class, InvoiceProducts::class, 'invoice_id', 'id', 'id', 'product_id');
    }
    /**
     * The InvoiceProducts that belong to the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    /**
     * Get all of the invoiceProducts for the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceProducts()
    {
        return $this->hasMany(InvoiceProducts::class, 'invoice_id');
    }
}
