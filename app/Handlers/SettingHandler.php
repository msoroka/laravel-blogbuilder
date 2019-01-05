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

    public function getTheme()
    {
        return Setting::all()->first()->theme;
    }

    public function updateBlogSettings(Request $request)
    {
        $setting = $this->getSettings();

        $validator = Validator::make($request->all(), [
            'name'        => 'required|string',
            'description' => 'required',
            'facebook'    => 'string|nullable',
            'instagram'   => 'string|nullable',
            'owner_id'    => 'integer|nullable',
            'theme'       => 'required|string',
            'font'        => 'required',
        ]);

        $data = $request->only([
            'name',
            'description',
            'facebook',
            'instagram',
            'owner_id',
            'theme',
            'about',
            'font',
        ]);

        if ($validator->fails()) {
            flash('Sorry, something went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        $setting = $setting->fill($data);
        activity()
            ->withProperties(['Changed things:' => $setting->getDirty()])
            ->log('Blog settings was changed');

        $setting = $setting->update($data);

        if (!$setting) {
            flash('Sorry, someting went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        flash('Success')->success();

        return redirect()->route('admin.setting.edit-setting');
    }
}
