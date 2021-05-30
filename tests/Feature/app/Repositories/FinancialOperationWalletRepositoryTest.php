<?php


namespace Tests\Feature\app\Repositories;

use Faker\Factory;
use Faker\Generator;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use App\Exceptions\RepositoryLayer\EntityNotFound;
use App\Repositories\FinancialOperationWalletRepository;
use App\Models\Customer;
use App\Models\CustomerWallet;
use App\Models\FinancialOperationWallet;
use App\Models\Shopkeeper;
use App\Models\ShopkeeperWallet;

class FinancialOperationWalletRepositoryTest extends TestCase
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
     * @var FinancialOperationWalletRepository $financialOperationWalletRepository
     */
    private FinancialOperationWalletRepository $financialOperationWalletRepository;

    /**
     * Set up stubs
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->faker = Factory::create();
        $this->financialOperationWalletRepository = $this->app->make(FinancialOperationWalletRepository::class);
    }

    /**
     * @test testFindShopkeeperWallet
     */
    public function testFindShopkeeperWallet(): void
    {
        $shopkeeper = Shopkeeper::create([
                'full_name' => $this->faker->name(),
                'email' => $this->faker->unique()->safeEmail(),
                'cpf_cnpj' => '17.146.264/0001-50',
                'email_verified_at' => now(),
                'password' => bcrypt('123123'),
                'remember_token' => Str::random(10),
            ])
            ->wallet()
            ->create(['balance' => 1200.00]);

        $wallet = $this->financialOperationWalletRepository->findShopkeeperWallet($shopkeeper->id);

        $this->assertTrue($wallet->balance == 1200.00);
        $this->assertIsNumeric($wallet->balance);
        $this->assertInstanceOf(ShopkeeperWallet::class, $wallet);
    }

    /**
     * @test testFindShopkeeperWalletNotFound
     */
    public function testFindShopkeeperWalletNotFound(): void
    {
        $this->expectException(EntityNotFound::class);
        $wallet = $this->financialOperationWalletRepository->findShopkeeperWallet(1);
        $this->assertTrue(is_null($wallet));
    }

    /**
     * @test testFindCustomerWallet
     */
    public function testFindCustomerWallet(): void
    {
        $customer = Customer::create([
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'cpf_cnpj' => '17.146.264/0001-50',
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'remember_token' => Str::random(10),
        ])
            ->wallet()
            ->create(['balance' => 71.55]);

        $wallet = $this->financialOperationWalletRepository->findCustomerWallet($customer->id);

        $this->assertTrue($wallet->balance == 71.55);
        $this->assertIsNumeric($wallet->balance);
        $this->assertInstanceOf(CustomerWallet::class, $wallet);
    }

    /**
     * @test testFindCustomerWalletNotFound
     */
    public function testFindCustomerWalletNotFound(): void
    {
        $this->expectException(EntityNotFound::class);
        $wallet = $this->financialOperationWalletRepository->findCustomerWallet(1);
        $this->assertTrue(is_null($wallet));
    }

    /**
     * @test testCreateFinancialOperationWallet
     */
    public function testCreateFinancialOperationWallet()
    {
        $customerWalletPayer = Customer::create([
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'cpf_cnpj' => '17.146.264/0001-50',
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'remember_token' => Str::random(10),
        ])
            ->wallet()
            ->create(['balance' => 1134.77]);

        $shopkeeperWalletPayee = Shopkeeper::create([
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'cpf_cnpj' => '072.937.300-20',
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'remember_token' => Str::random(10),
        ])
            ->wallet()
            ->create(['balance' => 320.47]);

        $financialOperationWallet = new FinancialOperationWallet();
        $financialOperationWallet->customer_wallet_id = $customerWalletPayer->id;
        $financialOperationWallet->balance_payer = $customerWalletPayer->balance;
        $financialOperationWallet->balance_payee = $shopkeeperWalletPayee->balance;
        $financialOperationWallet->value_transferred = 150.50;

        $this->financialOperationWalletRepository->createFinancialOperationWallet(
            $financialOperationWallet,
            $shopkeeperWalletPayee
        );

        $operation = FinancialOperationWallet::first();

        $this->assertDatabaseCount('financial_operation_wallets', 1);
        $this->assertIsNumeric($operation->value_transferred);
        $this->assertTrue($operation->value_transferred == 150.50);
        $this->assertTrue($operation->payable_type == ShopkeeperWallet::class);
    }
}
