<?php


namespace App\Enums;


class UserTypeEnum extends Enum
{
    CONST CUSTOMER = 'customer';
    CONST SHOPKEEPER = 'shopkeeper';

    public function __construct(string $value)
    {
        parent::__construct($value);
    }
}
