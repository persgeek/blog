<?php

namespace PG\Blog\Http\Backend\Setting;

use PG\Blog\Http\Backend\Setting\Resources\SettingResource;
use PG\Blog\Http\Backend\Setting\Requests\CreateRequest;
use PG\Blog\Http\Backend\Setting\Requests\UpdateRequest;
use PG\Blog\Http\Controllers\BaseController;
use PG\Blog\Models\BlogSetting;

class SettingController extends BaseController
{
    public function index()
    {
        $settings = BlogSetting::oldest()->paginate();

        $isEmpty = $settings->isEmpty();

        if ($isEmpty) {
            $this->raiseNothing();
        }

        return SettingResource::collection($settings);
    }

    public function show($setting)
    {
        $setting = BlogSetting::find($setting);

        if (!$setting) {
            $this->raiseNothing();
        }

        return SettingResource::make($setting);
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();

        $setting = new BlogSetting($data);
        $setting->save();

        return SettingResource::make($setting);
    }

    public function update($setting, UpdateRequest $request)
    {
        $setting = BlogSetting::find($setting);

        if (!$setting) {
            $this->raiseNothing();
        }

        $data = $request->validated();

        $setting->fill($data);
        $setting->save();

        return SettingResource::make($setting);
    }
}
