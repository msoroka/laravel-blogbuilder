<?php

namespace App\Http\Controllers\Admin;

use App\Handlers\SettingHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct(SettingHandler $handler)
    {
        $this->handler = $handler;
    }

    public function getBlogSettings()
    {
        return view('admin.setting.edit', [
            'setting' => $this->handler->getSettings(),
        ]);
    }

    public function updateBlogSettings(Request $request)
    {
        return $this->handler->updateBlogSettings($request);
    }
}
