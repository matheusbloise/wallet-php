<?php


namespace App\Services;

use App\Repositories\ShopkeeperRepository;

class ShopkeeperService extends UserService
{
    /**
     * ShopkeeperService constructor.
     */
    public function __construct()
    {
        parent::__construct(new ShopkeeperRepository());
    }
}
