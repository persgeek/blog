<?php

namespace PG\Blog\Http\Backend\Slider;

use PG\Blog\Http\Backend\Slider\Resources\SliderResource;
use PG\Blog\Http\Backend\Slider\Requests\ArticleRequest;
use PG\Blog\Http\Backend\Slider\Requests\CreateRequest;
use PG\Blog\Http\Backend\Slider\Requests\UpdateRequest;
use PG\Blog\Http\Controllers\BaseController;
use PG\Blog\Models\BlogSlider;

class SliderController extends BaseController
{
    public function index()
    {
        $sliders = BlogSlider::latest()->paginate();

        $isEmpty = $sliders->isEmpty();

        if ($isEmpty) {
            $this->raiseNothing();
        }

        return SliderResource::collection($sliders);
    }

    public function show($slider)
    {
        $slider = BlogSlider::find($slider);

        if (!$slider) {
            $this->raiseNothing();
        }

        return SliderResource::make($slider);
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();

        $slider = new BlogSlider($data);
        $slider->save();

        return SliderResource::make($slider);
    }

    public function update($slider, UpdateRequest $request)
    {
        $slider = BlogSlider::find($slider);

        if (!$slider) {
            $this->raiseNothing();
        }

        $data = $request->validated();

        $slider->fill($data);
        $slider->save();

        return SliderResource::make($slider);
    }

    public function article($slider, ArticleRequest $request)
    {
        $slider = BlogSlider::find($slider);

        if (!$slider) {
            $this->raiseNothing();
        }

        $slider->articles()
            ->sync($request->articles);

        return SliderResource::make($slider);
    }
}
