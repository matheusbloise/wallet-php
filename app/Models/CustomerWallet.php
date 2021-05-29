<?php

namespace App\Models;

use App\Exceptions\ModelLayer\WalletWithdrawException;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CustomerWallet extends Wallet
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'balance',
        'customer_id'
    ];

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * @param float $value
     * @throw WalletWithdrawException
     * @return CustomerWallet
     */
    public function withdraw(float $value): self
    {
        if ($value > $this->balance) {
            throw new WalletWithdrawException;
        }

        $this->balance -= $value;
        return $this;
    }

    /**
     * @return HasMany
     */
    public function payments(): HasMany
    {
        return $this->hasMany(FinancialOperationWallet::class);
    }
}
