<?php


namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository extends UserRepository
{
    /**
     * CustomerRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(new Customer());
    }
}
