<?php

namespace App\Http\Controllers\Admin;

use App\Handlers\SettingHandler;
use App\Handlers\UserHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class SettingController extends Controller
{
    public function __construct(SettingHandler $handler, UserHandler $userHandler)
    {
        $this->handler     = $handler;
        $this->userHandler = $userHandler;
    }

    public function getBlogSettings()
    {
        return view('admin.setting.edit', [
            'setting' => $this->handler->getSettings(),
            'users'   => $this->userHandler->getAllUsers()->pluck('full_name', 'id')->prepend('Empty', ''),
        ]);
    }

    public function updateBlogSettings(Request $request)
    {
        return $this->handler->updateBlogSettings($request);
    }

    public function getLogs()
    {
        $logs = Activity::orderBy('created_at', 'desc')->get()->each(function ($log){
            if($log->causer_id){
                $log->user = $this->userHandler->getUser($log->causer_id);
            }
        });

        return view('admin.setting.logs', [
            'logs' => $logs,
        ]);
    }
}
