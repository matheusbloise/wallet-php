<?php


namespace App\Services;

use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\User;
use App\Repositories\UserRepository;

abstract class UserService
{
    /**
     * @var UserRepository $userRepository
     */
    private UserRepository $userRepository;

    /**
     * CustomerService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param array $data
     * @return LengthAwarePaginator
     */
    public function findAllPaginated(array $data)
    {
        return $this->userRepository->findAllPaginated($data);
    }

    /**
     * @param int $id
     * @return User
     */
    public function findOneById(int $id)
    {
        return $this->userRepository->findOneById($id);
    }

    /**
     * @param array $data
     * @return User
     */
    public function create(array $data): User
    {
        $data['password'] = bcrypt($data['password']);
        return $this->userRepository->create($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return User
     * @throws Exception
     */
    public function update(array $data, int $id): User
    {
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        return $this->userRepository->update($data, $id);
    }

    /**
     * @param int $id
     * @throws Exception
     */
    public function delete(int $id): void
    {
        $this->userRepository->delete($id);
    }
}
