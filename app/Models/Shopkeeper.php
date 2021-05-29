<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;

class Shopkeeper extends User
{
    /**
     * @return HasOne
     */
    public function wallet(): HasOne
    {
        return $this->hasOne(ShopkeeperWallet::class);
    }
}
