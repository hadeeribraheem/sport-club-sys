<?php

namespace App\Services;

use App\Actions\DeleteFileFromPublicAction;
use App\traits\upload_image;
use Illuminate\Support\Facades\DB;

class ImageService
{
    use upload_image;
    protected $DefaultImage;

    //update or create user
    public function resolveImage($file, $user = null)
    {
        return DB::transaction(function() use ($file, $user) {
            // Check if no file is provided
            if ($file === null) {
                // If no file and no user (new user case), return default
                if ($user === null) {
                    return 'default.jpg';
                }
                // If user exists and has an image, return that image's name
                if ($user && $user->image) {
                    return $user->image->name;
                }
                    return 'default.png';
            }
            // If file is provided and user already has an image, delete old one
            if ($user && $user->image) {
                $this->deleteOldImage($user);
            }
            // Upload new image and return its name
            return $this->upload($file, 'users');
        });
    }

    // Delete the old image if it exists
    public function deleteOldImage($user)
    {
        $this->DefaultImage = 'default.jpg';
        if ($user->image) {
            // If the old image is not the default one, remove it from the file system
            if($user->image->name != $this->DefaultImage){
                DeleteFileFromPublicAction::delete('images', $user->image->name);
            }
            $user->image->delete();
        }

    }
}
