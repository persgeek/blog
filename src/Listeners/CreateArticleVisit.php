<?php

namespace PG\Blog\Listeners;

use PG\Blog\Events\ArticleShow;

class CreateArticleVisit
{
    public function handle(ArticleShow $event)
    {
        $address = request()->getClientIp();

        $event->article->visits()
            ->create(['address' => $address]);
    }
}
