<?php

namespace App\Repositories;

interface RepositoryInterface
{
    /**
     * Retrieve a paginated list of all users.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllUsers();

    /**
     * Retrieve a user by their ID.
     *
     * @param int $id
     * @return \App\Models\User|null
     */
    public function getUserById($id);

    /**
     * Create a new user or update an existing user based on provided data.
     * If $id is null, it creates a new user. If $id is not null, it updates the user with the given ID.
     *
     * @param int|null $id
     * @param array $collection
     * @return bool
     */
    public function createOrUpdate($id = null, $collection = []);

    /**
     * Delete a user by their ID.
     *
     * @param int $id
     * @return bool|null
     */
    public function deleteUser($id);

    /**
     * Search for users based on a search term.
     *
     * @param string $search
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function searchUser($search);
}
