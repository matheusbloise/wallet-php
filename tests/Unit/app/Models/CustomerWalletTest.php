<?php

namespace Tests\Unit\app\Models;

use App\Exceptions\ModelLayer\WalletWithdrawException;
use App\Models\CustomerWallet;
use Illuminate\Http\Response;
use PHPUnit\Framework\TestCase;

class CustomerWalletTest extends TestCase
{
    /**
     * @test testDeposit
     */
    public function testDeposit()
    {
        $wallet = new CustomerWallet();
        $wallet->deposit(150.78);
        $this->assertIsNumeric($wallet->balance);
        $this->assertEquals(150.78, $wallet->balance);
    }

    /**
     * @test testWithdraw
     */
    public function testWithdraw()
    {
        $wallet = new CustomerWallet();
        $wallet->deposit(150.78);
        $wallet->withdraw(100.00);
        $this->assertIsNumeric($wallet->balance);
        $this->assertEquals(50.78, $wallet->balance);
    }

    /**
     * @test testWithdrawError
     */
    public function testWithdrawError()
    {
        $this->expectException(WalletWithdrawException::class);
        $this->expectExceptionCode(Response::HTTP_UNPROCESSABLE_ENTITY);

        $wallet = new CustomerWallet();
        $wallet->deposit(150.78);
        $wallet->withdraw(200.00);
    }
}
