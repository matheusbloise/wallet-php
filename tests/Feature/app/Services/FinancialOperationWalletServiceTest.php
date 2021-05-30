<?php


namespace Tests\Feature\app\Services;

use Faker\Factory;
use Faker\Generator;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use App\Exceptions\ModelLayer\WalletWithdrawException;
use App\Services\FinancialOperationWalletService;
use App\Enums\UserTypeEnum;
use App\Models\Customer;
use App\Models\CustomerWallet;
use App\Models\FinancialOperationWallet;
use App\Models\Shopkeeper;
use App\Models\ShopkeeperWallet;



class FinancialOperationWalletServiceTest extends TestCase
{
    /**
     * Trait to up database in memory
     */
    use RefreshDatabase;

    /**
     * @var Generator faker
     *
     */
    private Generator $faker;

    /**
     * @var FinancialOperationWalletService $financialOperationWalletService
     */
    private FinancialOperationWalletService $financialOperationWalletService;

    /**
     * Set up stubs
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->faker = Factory::create();
        $this->financialOperationWalletService = $this->app->make(FinancialOperationWalletService::class);
    }

    /**
     * @test testTransfer
     */
    public function testTransfer(): void
    {
        Customer::create([
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'cpf_cnpj' => '17.146.264/0001-50',
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'remember_token' => Str::random(10),
        ])
            ->wallet()
            ->create(['balance' => 100.00]);

        Shopkeeper::create([
                'full_name' => $this->faker->name(),
                'email' => $this->faker->unique()->safeEmail(),
                'cpf_cnpj' => '17.146.264/0001-50',
                'email_verified_at' => now(),
                'password' => bcrypt('123123'),
                'remember_token' => Str::random(10),
            ])
            ->wallet()
            ->create(['balance' => 10.00]);

        $this->financialOperationWalletService->transfer([
            "payer_type" => UserTypeEnum::CUSTOMER,
            "payer" => 1,
            "payee_type" => UserTypeEnum::SHOPKEEPER,
            "payee" => 1 ,
            "value" => 30.00
        ]);

        $customerWallet = CustomerWallet::first();
        $shopkeeperWallet = ShopkeeperWallet::first();
        $operation = FinancialOperationWallet::first();
        $customerPaymentsHistory = $customerWallet->payments;
        $shopkeeperReceivedHistory = $shopkeeperWallet->received;

        $this->assertIsNumeric($shopkeeperWallet->balance);
        $this->assertIsNumeric($customerWallet->balance);
        $this->assertIsNumeric($operation->value_transferred);
        $this->assertTrue($shopkeeperWallet->balance == 40.00);
        $this->assertTrue($customerWallet->balance == 70.00);
        $this->assertTrue($operation->balance_payee == 40.00);
        $this->assertTrue($operation->balance_payer == 70.00);
        $this->assertTrue($operation->value_transferred == 30.00);
        $this->assertTrue($operation->payable_type == ShopkeeperWallet::class);
        $this->assertTrue($operation->payable_id == $shopkeeperWallet->id);
        $this->assertNotEmpty($customerPaymentsHistory);
        $this->assertNotEmpty($shopkeeperReceivedHistory);
    }

    /**
     * @test testTransferError
     */
    public function testTransferError(): void
    {
        Customer::create([
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'cpf_cnpj' => '17.146.264/0001-50',
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'remember_token' => Str::random(10),
        ])
            ->wallet()
            ->create(['balance' => 220.50]);

        Customer::create([
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'cpf_cnpj' => '072.937.300-20',
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'remember_token' => Str::random(10),
        ])
            ->wallet()
            ->create(['balance' => 95.20]);

        try {
            $this->financialOperationWalletService->transfer([
                "payer_type" => UserTypeEnum::CUSTOMER,
                "payer" => 1,
                "payee_type" => UserTypeEnum::CUSTOMER,
                "payee" => 2,
                "value" => 365.00
            ]);
        } finally {
            $customerWalletPayer = CustomerWallet::first();
            $customerWalletPayee = CustomerWallet::orderByDesc('id')->first();
            $this->assertTrue($customerWalletPayer->balance == 220.50);
            $this->assertTrue($customerWalletPayee->balance == 95.20);
            $this->assertNull(FinancialOperationWallet::first());
            $this->expectException(WalletWithdrawException::class);
        }
    }
}
