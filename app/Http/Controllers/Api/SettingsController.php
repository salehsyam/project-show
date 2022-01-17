<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Laraeast\LaravelSettings\Facades\Settings;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'data' => [
                'about' => Settings::get('about'),
                'service' => Settings::get('service'),
                'privacy_policy' => Settings::get('privacy_policy'),
                'order_policy' => Settings::get('order_policy'),
            ]
        ]);
    }
}
