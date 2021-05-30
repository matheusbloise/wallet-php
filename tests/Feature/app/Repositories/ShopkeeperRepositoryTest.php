<?php


namespace Tests\Feature\app\Repositories;

use Faker\Factory;
use Faker\Generator;
use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Shopkeeper;
use App\Repositories\ShopkeeperRepository;
use App\Exceptions\RepositoryLayer\EntityNotFound;
use App\Models\User;

class ShopkeeperRepositoryTest extends TestCase
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

        $filters = [];
        $result = $this
            ->getMockBuilder(ShopkeeperRepository::class)
            ->enableProxyingToOriginalMethods()
            ->getMock()
            ->findAllPaginated($filters);

        $this->assertCount(2, $result);
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
            ->getMockBuilder(ShopkeeperRepository::class)
            ->enableProxyingToOriginalMethods()
            ->getMock()
            ->findAllPaginated($filters);

        $this->assertEmpty($result);
        $this->assertInstanceOf(LengthAwarePaginator::class, $result);
    }

    /**
     * @test testFindOneById
     */
    public function testFindOneById() {
        $shopkeeper = Shopkeeper::create([
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'cpf_cnpj' => User::prepareCpfOrCnpj('072.937.300-20'),
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'remember_token' => Str::random(10),
        ]);

        $result = $this
            ->getMockBuilder(ShopkeeperRepository::class)
            ->enableProxyingToOriginalMethods()
            ->getMock()
            ->findOneById($shopkeeper->id);

        $this->assertNotEmpty($result);
        $this->assertInstanceOf(Shopkeeper::class, $result);
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
            ->getMockBuilder(ShopkeeperRepository::class)
            ->enableProxyingToOriginalMethods()
            ->getMock()
            ->create($data);

        $this->assertNotEmpty($result);
        $this->assertInstanceOf(Shopkeeper::class, $result);
    }

    /**
     * @test testUpdate
     */
    public function testUpdate() {
        $shopkeeper = Shopkeeper::create([
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
            ->getMockBuilder(ShopkeeperRepository::class)
            ->enableProxyingToOriginalMethods()
            ->getMock()
            ->update($data, $shopkeeper->id);

        $this->assertNotEmpty($result);
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
            ->getMockBuilder(ShopkeeperRepository::class)
            ->enableProxyingToOriginalMethods()
            ->getMock()
            ->delete($shopkeeper->id);

        $result = Shopkeeper::find($shopkeeper->id);

        $this->assertNull($result);
    }
}
