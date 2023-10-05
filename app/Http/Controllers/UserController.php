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

    /**
     * Show a paginated list of all users.
     *
     * @return \Illuminate\View\View
     */
    public function showUsers()
    {
        $users = $this->user->getAllUsers();
        // return View::make('user.index', compact('users'));

        return View::make('user.index', compact('users'));
    }

    /**
     * Display the user creation form.
     *
     * @return \Illuminate\View\View
     */
    public function createUser()
    {
        return View::make('user.edit');
    }

    /**
     * Get and display user details by ID.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function getUser($id)
    {
        $user = $this->user->getUserById($id);
        return View::make('user.edit', compact('user'));
    }

    /**
     * Save a new user or update an existing user.
     *
     * @param UserRequest $request
     * @param int|null $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveUser(UserRequest $request, $id = null)
    {
        $collection = $request->except(['_token', '_method']);
        if (!is_null($id)) {
            // Update User -->
            $createUser = $this->user->createOrUpdate($id, $collection);
            if (!$createUser) {
                return $this->responseRedirectBack('Error occurred while creating user', 'error', true, true);
            }
            return $this->responseRedirect('user.list', 'User updated successfully', 'success');

        } else {
            // Create User -->
            $this->user->createOrUpdate($id = null, $collection);
            return $this->responseRedirect('user.list', 'User added successfully', 'success');
        }
    }

    /**
     * Search for users based on a search term.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function searchUser(Request $request)
    {
        $users = $this->user->searchUser($request);
        return View::make("user.index", compact('users'));
    }

    /**
     * Delete a user by ID.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUser($id)
    {
        $this->user->deleteUser($id);
        return redirect()->route('user.list');
    }
}
