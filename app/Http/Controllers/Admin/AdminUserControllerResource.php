<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveUserInfoFormRequest;
use App\Http\Resources\SportPropertyResource;
use App\Http\Resources\TeamResource;
use App\Models\Role;
use App\Models\SportProperty;
use App\Models\Team;
use App\Services\Users\UserRegistrationService;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;

class AdminUserControllerResource extends Controller
{
    protected $userRegistrationService;

    public function __construct(UserRegistrationService $userRegistrationService)
    {
        $this->userRegistrationService = $userRegistrationService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = $this->userRegistrationService->getAllUsers($request->all());
        return view('admin.tables.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');
        $statuses = ['active', 'injured', 'suspended'];
        $playerRoleId = Role::where('name', 'player')->value('id');

        $availableTeams = Team::with('sportType')
            ->whereRaw('players_count < players_limit')
            ->get();

        $availableTeams = TeamResource::collection($availableTeams)->resolve();
        //dd($availableTeams);
        $sportProperties = SportProperty::with('sportType')
                            ->where('type', 'individual')
                                ->orderBy('sport_id')
                                ->get()
                                ->groupBy('sport_id')
                                ->map(fn($properties) => SportPropertyResource::collection($properties)->resolve());

        return view('admin.insert_data.add_user', compact('roles', 'statuses', 'playerRoleId', 'sportProperties', 'availableTeams'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveUserInfoFormRequest $request)
    {
        $data = $request->validated();
        $file = $request->hasFile('image') ? $request->file('image') : null;
        $this->userRegistrationService->registerNewUser($data, $file);
        Flasher::addSuccess('User created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
