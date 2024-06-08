<?php

namespace PG\Blog\Observers;

class BlogImageObserver
{
    public function creating($model)
    {
        $fileUpload = $model->getAttribute('path');

        $path = $fileUpload->store('images');

        $model->path = $path;
    }
}
