<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SportFormRequest;
use App\Http\Resources\SportTypeResource;
use App\Services\SportService;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;

class SportControllerResource extends Controller
{
    protected $sportService;

    public function __construct(SportService $sportService)
    {
        $this->sportService = $sportService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sports = $this->sportService->getAllSports();
        $sports = SportTypeResource::collection($sports)->resolve();
        return view('admin.tables.sports', compact('sports'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.insert_data.add_sport');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SportFormRequest $request)
    {
        $sport = $this->sportService->createSport($request->validated());
        Flasher::addSuccess('Sport created successfully');
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
