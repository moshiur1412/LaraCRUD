<?php
namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements RepositoryInterface
{
    protected $user = null;

    /**
     * Retrieve a paginated list of all users ordered by created_at in descending order.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllUsers()
    {
        return User::orderByDesc('created_at')->paginate(100);
    }

    /**
     * Retrieve a user by their ID.
     *
     * @param int $id
     * @return \App\Models\User|null
     */
    public function getUserById($id)
    {
        return User::find($id);
    }

    /**
     * Create a new user or update an existing user based on provided data.
     * If $id is null, it creates a new user. If $id is not null, it updates the user with the given ID.
     *
     * @param int|null $id
     * @param array $collection
     * @return bool
     */
    public function createOrUpdate($id = null, $collection = [])
    {
        if (is_null($id)) {
            $user = new User;
            $user->name = $collection['name'];
            $user->email = $collection['email'];
            $user->password = Hash::make('password');
            return $user->save();
        } else {
            $user = User::find($id);
            $user->name = $collection['name'];
            $user->email = $collection['email'];
            return $user->save();
        }
    }

    /**
     * Search for users based on a search term provided in the request.
     * Performs a case-insensitive search on both the name and email fields.
     * Returns a paginated result.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function searchUser($request)
    {
        $searchTerm = $request->input('search');

        return User::where('name', 'like', "%$searchTerm%")
            ->orWhere('email', 'like', "%$searchTerm%")
            ->paginate(10); // Adjust the number of items per page as needed
    }

    /**
     * Delete a user by their ID.
     *
     * @param int $id
     * @return bool|null
     */
    public function deleteUser($id)
    {
        return User::find($id)->delete();
    }
}
