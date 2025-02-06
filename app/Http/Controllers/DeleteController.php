<?php

namespace App\Http\Controllers;

use App\Actions\DeleteFileFromPublicAction;
use App\Models\Images;
use App\Repositories\TeamRepository;
use App\Repositories\UserRepository;
use App\Services\API\Messages;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->model_name == 'User') {
            app(UserRepository::class)->deleteUser($request->id);
        }
        if ($request->model_name == 'Team') {
            app(TeamRepository::class)->deleteTeam($request->id);
        }
        if (request('model_name') == 'Images') {
            $image = Images::query()->find(request('id'));
            $image->delete();
            DeleteFileFromPublicAction::delete('images', $image->name);
        } else {
            $modelClass = 'App\Models\\' . request('model_name');
            $item = $modelClass::query()->find(request('id'));
            if ($item){
                $item->delete();
            }
        }

        Flasher::addSuccess('Deleted Successfully');
        return redirect()->back();

    }
}
