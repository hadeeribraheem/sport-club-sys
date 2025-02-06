<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function findUserById($id);
    public function saveUser(array $data, $id = null);
    public function getAllUsers($filters);

    public function deleteUser($id);
}
