<?php

namespace PG\Blog\Observers;

class BlogImageObserver
{
    public function saving($model)
    {
        $path = $model->getOriginal('path');

        $fileUpload = request()->file('path');

        if ($fileUpload) {
            $path = $fileUpload->store('images');
        }

        $model->path = $path;
    }
}
