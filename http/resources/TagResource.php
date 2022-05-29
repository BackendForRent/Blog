<?php namespace Goosy\Blog\Http\Resources;

use Illuminate\Support\Facades\Event;
use Illuminate\Http\Resources\Json\Resource;

class TagResource extends Resource
{
    public function toArray($request)
    {
        $response = [
            'id'          => $this->id,
            'title'       => $this->title,
            'slug'        => $this->slug,
            'blogs'       => $this->blogs,
            'blogs_count' => $this->blogs->count(),
            'total_views' => $this->total_views,
            'order'       => $this->sort_order,
            'created_at'  => $this->created_at->toDateTimeString(),
            'updated_at'  => $this->updated_at->toDateTimeString(),
        ];

        Event::fire('goosy.blog.tag.beforeReturnResource', [&$response, $this->resource]);

        return $response;
    }
}
