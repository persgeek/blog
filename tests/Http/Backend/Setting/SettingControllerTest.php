<?php

namespace PG\Blog\Tests\Http\Backend\Setting;

use PG\Blog\Models\BlogSetting;
use PG\Blog\Tests\Models\User;
use PG\Blog\Tests\TestCase;

class SettingControllerTest extends TestCase
{
    public function testCanNotGetSettings()
    {
        $this->getJson('/blog/backend/settings')
            ->assertUnauthorized();
    }

    public function testCanGetSettings()
    {
        $user = User::make();

        $this->actingAs($user);

        BlogSetting::factory()->create();

        $this->getJson('/blog/backend/settings')
            ->assertSuccessful();
    }

    public function testCanGetSetting()
    {
        $user = User::make();

        $this->actingAs($user);

        BlogSetting::factory()->create();

        $this->getJson('/blog/backend/settings/1/show')
            ->assertSuccessful();
    }

    public function testCanCreateSetting()
    {
        $user = User::make();

        $this->actingAs($user);

        $params = BlogSetting::factory()->make()
            ->toArray();

        $this->postJson('/blog/backend/settings/create', $params)
            ->assertSuccessful();
    }
}
