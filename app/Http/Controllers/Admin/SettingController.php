<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use App\Models\SportType;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $sports = SportType::all();
        return view('admin.settings.index', compact('setting', 'sports'));
    }

    public function update(UpdateSettingRequest $request)
    {
        $setting = Setting::first();
        $setting->update($request->validated());
        Flasher::addSuccess('Settings updated successfully');
        return redirect()->back();
    }
}
