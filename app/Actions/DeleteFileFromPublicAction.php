<?php

namespace App\Actions;

class DeleteFileFromPublicAction
{
    /**
     * Delete a file from the public folder.
     *
     * @param string $folder
     * @param string $name
     * @return bool
     */
    public static function delete( $folder, $name)
    {
        $path_file = public_path($folder . '/' . $name);
        if (file_exists($path_file)) unlink($path_file);
    }
}
