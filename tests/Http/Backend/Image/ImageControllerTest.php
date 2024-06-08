<?php

namespace PG\Blog\Tests\Http\Backend\Image;

use Illuminate\Http\UploadedFile;
use PG\Blog\Tests\Models\User;
use PG\Blog\Models\BlogImage;
use PG\Blog\Tests\TestCase;

class ImageControllerTest extends TestCase
{
    public function testCanNotGetImages()
    {
        $this->getJson('/blog/backend/images')
            ->assertUnauthorized();
    }

    public function testCanGetImages()
    {
        $user = User::make();

        $this->actingAs($user);

        BlogImage::factory()->create();

        $this->getJson('/blog/backend/images')
            ->assertSuccessful();
    }

    public function testCanGetImage()
    {
        $user = User::make();

        $this->actingAs($user);

        BlogImage::factory()->create();

        $this->getJson('/blog/backend/images/1/show')
            ->assertSuccessful();
    }

    public function testCanCreateImage()
    {
        $user = User::make();

        $this->actingAs($user);

        $params = BlogImage::factory()->make()
            ->toArray();

        $this->postJson('/blog/backend/images/create', $params)
            ->assertSuccessful();
    }
}
