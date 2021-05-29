<?php


namespace App\Services;

use App\Repositories\CustomerRepository;

class CustomerService extends UserService
{
    /**
     * CustomerService constructor.
     */
    public function __construct()
    {
        parent::__construct(new CustomerRepository());
    }
}
