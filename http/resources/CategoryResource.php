<?php namespace Goosy\Blog\Http\Resources;

use Illuminate\Support\Facades\Event;
use Illuminate\Http\Resources\Json\Resource;

class CategoryResource extends Resource
{
    public function toArray($request)
    {
        $response = [
            'id'          => $this->id,
            'title'       => $this->title,
            'slug'        => $this->slug,
            'description' => $this->description,
            'blogs'       => $this->blogs,
            'blogs_count' => $this->blogs->count(),
            'total_views' => $this->total_views,
            'image'       => $this->image,
            'order'       => $this->sort_order,
            'created_at'  => $this->created_at->toDateTimeString(),
            'updated_at'  => $this->updated_at->toDateTimeString(),
        ];

        Event::fire('goosy.blog.category.beforeReturnResource', [&$response, $this->resource]);

        return $response;
    }
}
