<?php

namespace App\Repositories;

use App\Actions\DeleteFileFromPublicAction;
use App\Filters\RoleIdFilter;
use App\Filters\StatusFilter;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Pipeline\Pipeline;

class UserRepository implements UserRepositoryInterface
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
    public function findUserById($id)
    {
        return User::find($id);
    }
    public function saveUser(array $data, $id = null)
    {
        return User::updateOrCreate(
            ['id' => $id],
            $data
        );
    }
    public function getAllUsers($filters)
    {
        $data = User::with(['role', 'image'])
                    ->orderBy('id', 'DESC');

        $usersByRole = app(Pipeline::class)
            ->send($data)
            ->through([
                RoleIdFilter::class,
                StatusFilter::class,
            ])
            ->thenReturn()
            ->get();
        //dd($usersByRole);
        $users = UserResource::collection($usersByRole)->resolve();
        return $users;
    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $this->imageService->deleteOldImage($user);
        return $user->delete();
    }

}
