<?php namespace Goosy\Blog\Http\Controllers;

use Goosy\Blog\Models\Tag;
use Illuminate\Routing\Controller;
use Goosy\Blog\Http\Resources\BlogResource;

class TagsBlogsController extends Controller
{
    public function show($id)
    {
        $tag = Tag::isPublished()
            ->findOrFail($id);

        $blogs = $tag->blogs;

        return BlogResource::collection($blogs);
    }
}
