<?php namespace Goosy\Blog\Http\Controllers;

use Goosy\Blog\Models\Blog;
use Illuminate\Routing\Controller;
use Goosy\Blog\Http\Resources\BlogResource;

class BlogsController extends Controller
{
    public function index()
    {
        return BlogResource::collection(
            Blog::isPublished()
                ->orderBy('created_at', 'desc')
                ->paginate(20)
        );
    }

    public function show($id)
    {
        $blog = Blog::isPublished()
            ->findOrFail($id);

        return new BlogResource($blog);
    }
}
