<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Laraeast\LaravelSettings\Models\Setting;
use Laraeast\LaravelSettings\Facades\Settings;
use App\Http\Requests\Dashboard\SettingsRequest;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @throws AuthorizationException
     */
    public function index()
    {
        return view('dashboard.settings.index');
    }


    /**
     * Store the specified resource in storage.
     *
     * @param SettingRequest $request
     * @return Response
     */
    public function store(SettingsRequest $request)
    {
        foreach ($request->except(['_token', '_method']) as $name => $value) {
            if (! empty($value)) {
                Settings::set($name, $value);
            }
        }

        flash(trans('settings.messages.updated'));

        return redirect()->route('dashboard.settings.index');
    }
}
