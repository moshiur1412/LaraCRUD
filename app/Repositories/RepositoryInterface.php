<?php
namespace App\Repositories;

interface RepositoryInterface
{
    public function getAllUsers();
    public function getUserById($id);
    public function createOrUpdate($id = null, $collection = []);
    public function deleteUser($id);
}


?>