<?php


namespace Tests\Feature\app\Repositories;

use Faker\Factory;
use Faker\Generator;
use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\CustomerRepository;
use App\Exceptions\RepositoryLayer\EntityNotFound;
use App\Models\Customer;
use App\Models\User;

class CustomerRepositoryTest extends TestCase
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
        Customer::create([
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'cpf_cnpj' => User::prepareCpfOrCnpj('072.937.300-20'),
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'remember_token' => Str::random(10),
        ]);
        Customer::create([
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'cpf_cnpj' => User::prepareCpfOrCnpj('17.146.264/0001-50'),
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'remember_token' => Str::random(10),
        ]);

        $filters = [];
        $result = $this
            ->getMockBuilder(CustomerRepository::class)
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

        Customer::create([
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'cpf_cnpj' => User::prepareCpfOrCnpj('072.937.300-20'),
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'remember_token' => Str::random(10),
        ]);
        Customer::create([
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'cpf_cnpj' => '17.146.264/0001-50',
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'remember_token' => Str::random(10),
        ]);

        $filters = [
            'cpf_cnpj' => User::prepareCpfOrCnpj('48.264.458/0001-84'),
            'page' => 1,
        ];
        $result = $this
            ->getMockBuilder(CustomerRepository::class)
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
        $customer = Customer::create([
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'cpf_cnpj' => '072.937.300-20',
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'remember_token' => Str::random(10),
        ]);

        $result = $this
            ->getMockBuilder(CustomerRepository::class)
            ->enableProxyingToOriginalMethods()
            ->getMock()
            ->findOneById($customer->id);

        $this->assertNotEmpty($result);
        $this->assertInstanceOf(Customer::class, $result);
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
            ->getMockBuilder(CustomerRepository::class)
            ->enableProxyingToOriginalMethods()
            ->getMock()
            ->create($data);

        $this->assertNotEmpty($result);
        $this->assertInstanceOf(Customer::class, $result);
    }

    /**
     * @test testUpdate
     */
    public function testUpdate() {
        $customer = Customer::create([
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
            ->getMockBuilder(CustomerRepository::class)
            ->enableProxyingToOriginalMethods()
            ->getMock()
            ->update($data, $customer->id);

        $this->assertNotEmpty($result);
        $this->assertFalse('Matheus Bloise' == $result->name);
        $this->assertInstanceOf(Customer::class, $result);
    }

    /**
     * @test testDelete
     */
    public function testDelete() {
        $customer = Customer::create([
            'full_name' => 'Matheus Bloise',
            'email' => $this->faker->unique()->safeEmail(),
            'cpf_cnpj' => User::prepareCpfOrCnpj('072.937.300-20'),
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'remember_token' => Str::random(10),
        ]);

        $this
            ->getMockBuilder(CustomerRepository::class)
            ->enableProxyingToOriginalMethods()
            ->getMock()
            ->delete($customer->id);

        $result = Customer::find($customer->id);

        $this->assertNull($result);
    }
}
