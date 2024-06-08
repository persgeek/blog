<?php

namespace PG\Blog;

class Helpers
{
    public static function currentDirectory($append)
    {
        $directory = dirname(__FILE__);

        return "{$directory}{$append}";
    }

    public static function packageDirectory($append)
    {
        $directory = dirname(dirname(__FILE__));

        return "{$directory}{$append}";
    }
}
