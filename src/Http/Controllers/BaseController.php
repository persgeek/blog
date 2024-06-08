<?php

namespace PG\Blog\Http\Controllers;

use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    public function raiseNothing()
    {
        abort(404, 'There is nothing');
    }
}
