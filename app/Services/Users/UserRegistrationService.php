<?php

namespace App\Services\Users;

use App\Actions\ImageModalSave;
use App\Models\PropertyValue;
use App\Models\Team;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use App\Services\ImageService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRegistrationService
{
    protected $userRepository;
    protected $imageService;

    public function __construct(UserRepositoryInterface $userRepository, ImageService $imageService)
    {
        $this->userRepository = $userRepository;
        $this->imageService = $imageService;
    }

    public function registerUser(array $data, $file = null, $id = null)
    {
        return DB::transaction(function() use ($data, $file, $id) {
            $user = $id ? $this->userRepository->findUserById($id) : null;

            /*if ($user && empty($data['password'])) {
                unset($data['password']); // Prevent password update if not provided
            }*/

            if (!empty($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            }

            $imageName = $this->imageService->resolveImage($file, $user);
            $data['image'] = $imageName;

            $user = $this->userRepository->saveUser($data, $id);

            ImageModalSave::make($user->id, 'User', $imageName);

            if (isset($data['player_properties']) && is_array($data['player_properties'])) {
                $this->savePlayerProperties($user, $data['player_properties']);
            }

            return $user;
        });
    }

    public function registerNewUser(array $data, $file = null)
    {
        return $this->registerUser($data, $file);
    }

    public function updateExistingUser(array $data, $file = null, $id)
    {
        return $this->registerUser($data, $file, $id);
    }
    private function savePlayerProperties($user, $properties)
    {
        foreach ($properties as $propertyId => $value) {

            PropertyValue::updateOrCreate(
                [
                    'userable_id' => $user->id,
                    'userable_type' => get_class($user),
                    'property_id' => $propertyId,
                ],
                [
                    'content' => $value,
                ]
            );
        }
    }

    public function getAllUsers(array $filters = [])
    {
        return $this->userRepository->getAllUsers($filters);
    }
}

