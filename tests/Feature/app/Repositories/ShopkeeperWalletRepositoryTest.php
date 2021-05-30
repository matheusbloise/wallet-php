<?php


namespace Tests\Feature\app\Repositories;

use Faker\Factory;
use Faker\Generator;
use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Shopkeeper;
use App\Models\ShopkeeperWallet;
use App\Repositories\ShopkeeperWalletRepository;
use App\Models\User;

class ShopkeeperWalletRepositoryTest extends TestCase
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
        $shopkeeper = Shopkeeper::create([
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'cpf_cnpj' => User::prepareCpfOrCnpj('072.937.300-20'),
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'remember_token' => Str::random(10),
        ]);

        $data = [
            'shopkeeper_id' => $shopkeeper->id,
            'balance' => 375.22
        ];

        $result = $this
            ->getMockBuilder(ShopkeeperWalletRepository::class)
            ->enableProxyingToOriginalMethods()
            ->getMock()
            ->create($data);

        $this->assertNotEmpty($result);
        $this->assertIsFloat($result->balance);
        $this->assertEquals(375.22, $result->balance);
        $this->assertDatabaseCount('shopkeeper_wallets', 1);
        $this->assertInstanceOf(ShopkeeperWallet::class, $result);
    }
}
