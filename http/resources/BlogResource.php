<?php namespace Goosy\Blog\Http\Resources;

use Illuminate\Support\Facades\Event;
use Illuminate\Http\Resources\Json\Resource;

class BlogResource extends Resource
{
    public function toArray($request)
    {
        $response = [
            'id'              => $this->id,
            'title'           => $this->title,
            'slug'            => $this->slug,
            'content_preview' => $this->content_preview,
            'content'         => $this->content,
            'views'           => $this->views,
            'author'          => $this->author,
            'category'        => $this->category,
            'tags'            => $this->tags,
            'image'           => $this->image,
            'order'           => $this->sort_order,
            'created_at'      => $this->created_at->toDateTimeString(),
            'updated_at'      => $this->updated_at->toDateTimeString(),
        ];

        Event::fire('goosy.blog.blog.beforeReturnResource', [&$response, $this->resource]);

        return $response;
    }
}
