<?php

namespace Tests\Feature\app\Services;

use App\Exceptions\RepositoryLayer\EntityNotFound;
use App\Models\Customer;
use App\Models\Shopkeeper;
use App\Models\User;
use App\Services\ShopkeeperService;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class ShopkeeperServiceTest extends TestCase
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
     * testFindOneById
     * @test
     */
    public function testFindOneById()
    {
        $shopkeeper = Shopkeeper::create([
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'cpf_cnpj' => '17.146.264/0001-50',
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'remember_token' => Str::random(10),
        ]);

        $result = $this
            ->getMockBuilder(ShopkeeperService::class)
            ->enableProxyingToOriginalMethods()
            ->getMock()
            ->findOneById($shopkeeper->id);

        $this->assertNotEmpty($result);
        $this->assertInstanceOf(Shopkeeper::class, $result);
    }

    /**
     * @test testFindAllPaginated
     */
    public function testFindAllPaginated() {
        Shopkeeper::create([
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'cpf_cnpj' => User::prepareCpfOrCnpj('072.937.300-20'),
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'remember_token' => Str::random(10),
        ]);
        Shopkeeper::create([
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'cpf_cnpj' => User::prepareCpfOrCnpj('17.146.264/0001-50'),
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'remember_token' => Str::random(10),
        ]);

        $filters = [
            'cpf_cnpj' => User::prepareCpfOrCnpj('17.146.264/0001-50'),
        ];
        $result = $this
            ->getMockBuilder(ShopkeeperService::class)
            ->enableProxyingToOriginalMethods()
            ->getMock()
            ->findAllPaginated($filters);

        $this->assertCount(1, $result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(LengthAwarePaginator::class, $result);
    }

    /**
     * @test testFindAllPaginated
     */
    public function testFindAllPaginatedEmpty() {
        $this->expectException(EntityNotFound::class);

        Shopkeeper::create([
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'cpf_cnpj' => User::prepareCpfOrCnpj('072.937.300-20'),
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'remember_token' => Str::random(10),
        ]);
        Shopkeeper::create([
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'cpf_cnpj' => User::prepareCpfOrCnpj('17.146.264/0001-50'),
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'remember_token' => Str::random(10),
        ]);

        $filters = [
            'cpf_cnpj' => User::prepareCpfOrCnpj('48.264.458/0001-84'),
            'page' => 1,
        ];
        $result = $this
            ->getMockBuilder(ShopkeeperService::class)
            ->enableProxyingToOriginalMethods()
            ->getMock()
            ->findAllPaginated($filters);

        $this->assertEmpty($result);
        $this->assertInstanceOf(LengthAwarePaginator::class, $result);
    }

    /**
     * @test testCreate
     */
    public function testCreate() {
        $data = [
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'cpf_cnpj' => User::prepareCpfOrCnpj('072.937.300-20'),
            'email_verified_at' => now(),
            'password' => '123123',
            'remember_token' => Str::random(10),
        ];

        $result = $this
            ->getMockBuilder(ShopkeeperService::class)
            ->enableProxyingToOriginalMethods()
            ->getMock()
            ->create($data);

        $this->assertNotEmpty($result);
        $this->assertFalse('123123' == $result->password);
        $this->assertInstanceOf(Shopkeeper::class, $result);
    }

    /**
     * @test testUpdate
     */
    public function testUpdate() {
        $customer = Shopkeeper::create([
            'full_name' => 'Matheus Bloise',
            'email' => $this->faker->unique()->safeEmail(),
            'cpf_cnpj' => User::prepareCpfOrCnpj('072.937.300-20'),
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'remember_token' => Str::random(10),
        ]);

        $data = [
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'cpf_cnpj' => User::prepareCpfOrCnpj('072.937.300-20'),
            'email_verified_at' => now(),
            'password' => '123123',
            'remember_token' => Str::random(10),
        ];

        $result = $this
            ->getMockBuilder(ShopkeeperService::class)
            ->enableProxyingToOriginalMethods()
            ->getMock()
            ->update($data, $customer->id);

        $this->assertNotEmpty($result);
        $this->assertFalse('123123' == $result->password);
        $this->assertFalse('Matheus Bloise' == $result->name);
        $this->assertInstanceOf(Shopkeeper::class, $result);
    }

    /**
     * @test testDelete
     */
    public function testDelete() {
        $shopkeeper = Shopkeeper::create([
            'full_name' => 'Matheus Bloise',
            'email' => $this->faker->unique()->safeEmail(),
            'cpf_cnpj' => User::prepareCpfOrCnpj('072.937.300-20'),
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'remember_token' => Str::random(10),
        ]);

        $this
            ->getMockBuilder(ShopkeeperService::class)
            ->enableProxyingToOriginalMethods()
            ->getMock()
            ->delete($shopkeeper->id);

        $result = Shopkeeper::find($shopkeeper->id);

        $this->assertNull($result);
    }
}
