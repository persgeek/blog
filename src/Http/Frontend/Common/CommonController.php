<?php

namespace PG\Blog\Http\Frontend\Common;

use PG\Blog\Http\Controllers\BaseController;
use PG\Blog\Models\BlogSetting;

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
}
