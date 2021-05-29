<?php


namespace App\Repositories;

use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\User;
use App\Exceptions\RepositoryLayer\EntityNotFound;

class UserRepository
{
    /**
     * @var User $user
     */
    private User $user;

    /**
     * UserRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param array $data
     * @return LengthAwarePaginator
     * @throw EntityNotFound
     */
    public function findAllPaginated(array $data): LengthAwarePaginator
    {
        $query = $this->user->query();

        if (isset($data['cpf_cnpj'])) {
            $query->where('cpf_cnpj', 'like', '%'.$data['cpf_cnpj'].'%');
        }

        $users = $query->paginate();

        if ($users->isEmpty()) {
            throw new EntityNotFound();
        }

        return $users;
    }

    /**
     * @param int $id
     * @return User|null
     */
    public function findOneById(int $id): ?User
    {
        $user = $this->user->whereId($id)->first();
        if (!$user) throw new EntityNotFound;
        return $user;
    }

    /**
     * @param array $data
     * @return User
     */
    public function create(array $data): User
    {
        $this->user->fill($data);
        $this->user->save();

        return $this->user;
    }

    /**
     * @param array $data
     * @param int $id
     * @return User
     * @throws Exception
     */
    public function update(array $data, int $id): User
    {
        $user = $this->findOneById($id);

        if ($user) {
            $this->user = $user;
            $this->user->fill($data);
            $this->user->update();
        }

        return $this->user;
    }

    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        $user = $this->findOneById($id);

        if ($user) {
            $this->user = $user;
            $this->user->delete();
        }
    }
}
