<?php

namespace Tests\Unit\app\Models;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * @test testPrepareCpfOrCnpj
     */
    public function testPrepareCpfOrCnpj()
    {
        $cnpj = '48.264.458/0001-84';
        $this->assertFalse(User::prepareCpfOrCnpj($cnpj) == $cnpj);
    }
}
