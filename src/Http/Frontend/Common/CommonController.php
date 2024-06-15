<?php

namespace PG\Blog\Http\Frontend\Common;

use PG\Blog\Http\Frontend\Common\Resources\SliderResource;
use PG\Blog\Http\Controllers\BaseController;
use PG\Blog\Models\BlogSetting;
use PG\Blog\Models\BlogSlider;

class CommonController extends BaseController
{
    public function settings()
    {
        $data = BlogSetting::public()->pluck('value', 'name');

        $isEmpty = $data->isEmpty();

        if ($isEmpty) {
            $this->raiseNothing();
        }

        return compact('data');
    }

    public function slider($slug)
    {
        $slider = BlogSlider::slugOrId($slug)->first();

        if (!$slider) {
            $this->raiseNothing();
        }

        return SliderResource::make($slider);
    }
}
