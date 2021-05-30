<?php


namespace Tests\Feature\app\Repositories;

use Faker\Factory;
use Faker\Generator;
use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\CustomerWalletRepository;
use App\Models\Customer;
use App\Models\CustomerWallet;
use App\Models\User;

class CustomerWalletRepositoryTest extends TestCase
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
     * set up stubs
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->faker = Factory::create();
    }

    /**
     * @test testCreate
     */
    public function testCreate() {
        $customer = Customer::create([
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'cpf_cnpj' => User::prepareCpfOrCnpj('072.937.300-20'),
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'remember_token' => Str::random(10),
        ]);

        $data = [
            'customer_id' => $customer->id,
            'balance' => 175.89
        ];

        $result = $this
            ->getMockBuilder(CustomerWalletRepository::class)
            ->enableProxyingToOriginalMethods()
            ->getMock()
            ->create($data);

        $this->assertNotEmpty($result);
        $this->assertIsFloat($result->balance);
        $this->assertEquals(175.89, $result->balance);
        $this->assertDatabaseCount('customer_wallets', 1);
        $this->assertInstanceOf(CustomerWallet::class, $result);
    }
}
