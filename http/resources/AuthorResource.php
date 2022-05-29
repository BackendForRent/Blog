<?php namespace Goosy\Blog\Http\Resources;

use Illuminate\Support\Facades\Event;
use Illuminate\Http\Resources\Json\Resource;

class AuthorResource extends Resource
{
    public function toArray($request)
    {
        $response = [
            'id'          => $this->id,
            'name'        => $this->name,
            'surname'     => $this->surname,
            'nickname'    => $this->nickname,
            'description' => $this->description,
            'email'       => $this->email,
            'telephone'   => $this->telephone,
            'blogs'       => $this->blogs,
            'blogs_count' => $this->blogs->count(),
            'total_views' => $this->total_views,
            'avatar'      => $this->avatar,
            'order'       => $this->sort_order,
            'created_at'  => $this->created_at->toDateTimeString(),
            'updated_at'  => $this->updated_at->toDateTimeString(),
        ];

        Event::fire('goosy.blog.author.beforeReturnResource', [&$response, $this->resource]);

        return $response;
    }
}
