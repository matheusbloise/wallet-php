<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends User
{
    /**
     * @return HasOne
     */
    public function wallet(): HasOne
    {
        return $this->hasOne(CustomerWallet::class);
    }
}
