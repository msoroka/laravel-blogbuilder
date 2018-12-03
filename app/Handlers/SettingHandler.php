<?php

namespace App\Handlers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingHandler
{
    public function getSettings()
    {
        return Setting::all()->first();
    }

    public function updateBlogSettings(Request $request)
    {
        $setting = $this->getSettings();

        $validator = Validator::make($request->all(), [
            'name'        => 'required|string',
            'description' => 'required',
        ]);

        $data = $request->only([
            'name',
            'description',
        ]);

        if ($validator->fails()) {
            flash('Sorry, something went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        $setting = $setting->update($data);

        if (!$setting) {
            flash('Sorry, someting went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        flash('Success')->success();

        return redirect()->route('admin.setting.edit-setting');
    }
}
