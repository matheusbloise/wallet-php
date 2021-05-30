<?php

namespace Tests\Unit\app\Models;

use App\Models\ShopkeeperWallet;
use PHPUnit\Framework\TestCase;

class ShopkeeperWalletTest extends TestCase
{
    /**
     * @test testDeposit
     */
    public function testDeposit()
    {
        $wallet = new ShopkeeperWallet();
        $wallet->deposit(1150.78);
        $this->assertIsNumeric($wallet->balance);
        $this->assertEquals(1150.78, $wallet->balance);
    }
}
