<?php


namespace App\Repositories;

use App\Models\Shopkeeper;

class ShopkeeperRepository extends UserRepository
{
    /**
     * ShopkeeperRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(new Shopkeeper());
    }
}
