<?php

namespace PG\Blog\Tests\Http\Frontend\Common;

use PG\Blog\Models\BlogSetting;
use PG\Blog\Tests\TestCase;

class CommonControllerTest extends TestCase
{
    public function testCanGetSettings()
    {
        BlogSetting::factory()->create();

        $this->getJson('/blog/frontend/common/settings')
            ->assertSuccessful();
    }
}
