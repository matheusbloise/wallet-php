<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinancialOperationWallet extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_wallet_id',
        'value_transferred',
        'balance_payer',
        'balance_payee',
    ];

    public function payable() {
        return $this->morphTo();
    }

    public function payer()
    {
        return $this->belongsTo(CustomerWallet::class);
    }
}
