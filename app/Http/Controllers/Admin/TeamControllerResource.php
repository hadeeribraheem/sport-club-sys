<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamFormRequest;
use App\Http\Resources\SportPropertyResource;
use App\Models\Role;
use App\Models\Setting;
use App\Models\SportProperty;
use App\Models\SportType;
use App\Models\User;
use App\Services\TeamService;
use Flasher\Laravel\Facade\Flasher;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;

class TeamControllerResource extends Controller
{
    protected $teamService;

    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = $this->teamService->getAllTeams();
        $sports = SportType::all();
        return view('admin.tables.teams', compact('teams','sports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sports = SportType::select('id', 'name')->get();

        $coaches = User::where('role_id', Role::where('name', 'coach')->value('id'))
            ->whereNull('team_id')
            ->get(['id', 'full_name']);

        // only players not assigned to a team
        $players = User::where('role_id', Role::where('name', 'player')->value('id'))
            ->whereNull('team_id')
            ->get(['id', 'full_name']);

        $captains = User::where('role_id', Role::where('name', 'captain')->value('id'))
            ->whereNull('team_id')
            ->get(['id', 'full_name']);

        $teamProperties = SportPropertyResource::collection(SportProperty::with('sportType')
            ->where('type', 'team')
            ->get())->resolve();

        $defaultSportId = Setting::first()->default_sport_id ?? null;

        return view('admin.insert_data.add_team', compact('captains','sports', 'coaches', 'players', 'teamProperties','defaultSportId'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamFormRequest $request)
    {
        $this->teamService->createOrUpdateTeam($request->validated());
        Flasher::addSuccess('Team created successfully! ✅');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //not implemented yet
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //not implemented yet
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamFormRequest $request, string $id)
    {
        //not implemented yet
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
