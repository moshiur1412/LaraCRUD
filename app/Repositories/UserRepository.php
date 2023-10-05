<?php
namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements RepositoryInterface
{
    protected $user = null;

    public function getAllUsers()
    {
        return User::OrderByDesc('created_at')->paginate(100);
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function createOrUpdate($id = null, $collection = [])
    {
        if (is_null($id)) {
            $user = new User;
            $user->name = $collection['name'];
            $user->email = $collection['email'];
            $user->password = Hash::make('password');
            return $user->save();
        }
        $user = User::find($id);
        $user->name = $collection['name'];
        $user->email = $collection['email'];
        return $user->save();
    }
    public function deleteUser($id)
    {
        return User::find($id)->delete();
    }

}