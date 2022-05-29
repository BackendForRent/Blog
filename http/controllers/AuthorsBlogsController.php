<?php namespace Goosy\Blog\Http\Controllers;

use Goosy\Blog\Models\Author;
use Illuminate\Routing\Controller;
use Goosy\Blog\Http\Resources\BlogResource;

class AuthorsBlogsController extends Controller
{
    public function show($id)
    {
        $author = Author::isSuspended()
            ->findOrFail($id);

        $blogs = $author->blogs;

        return BlogResource::collection($blogs);
    }
}
