<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\RepositoryInterface;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    protected $user;

    public function __construct(RepositoryInterface $user)
    {
        $this->user = $user;
    }

    public function showUsers()
    {
        $users = $this->user->getAllUsers();
        // return View::make('user.index', compact('users'));

        return View::make('user.index', compact('users'))->with('i');
    }

    public function createUser()
    {
        return View::make('user.edit');
    }

    public function getUser($id)
    {
        $user = $this->user->getUserById($id);
        return View::make('user.edit', compact('user'));
    }

    public function saveUser(UserRequest $request, $id = null)
    {
        $collection = $request->except(['_token', '_method']);
        if (!is_null($id)) {
            // Update User -->
            $createUser = $this->user->createOrUpdate($id, $collection);
            if(!$createUser){
                return $this->responseRedirectBack('Error occured while creating user', 'error', true, true);
            }
            return $this->responseRedirect('user.list', 'User updated successfully', 'success');

        } else {
            // Create User -->
            $this->user->createOrUpdate($id = null, $collection);
            return $this->responseRedirect('user.list', 'User added successfully', 'success');
        }
    }

    public function searchUser(Request $request){
        dd($request);
    }

    public function deleteUser($id)
    {
        $this->user->deleteUser($id);
        return redirect()->route('user.list');
    }
}