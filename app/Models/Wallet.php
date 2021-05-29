<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class Wallet extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @param float $value
     * @return Wallet
     */
    public function deposit(float $value): self
    {
        $this->balance += $value;
        return $this;
    }

    /**
     * @return MorphMany
     */
    public function received(): MorphMany
    {
        return $this->morphMany(FinancialOperationWallet::class, 'payable');
    }
}
