<?php namespace Goosy\Blog\Http\Controllers;

use Goosy\Blog\Models\Tag;
use Illuminate\Routing\Controller;
use Goosy\Blog\Http\Resources\TagResource;

class TagsController extends Controller
{
    public function index()
    {
        return TagResource::collection(
            Tag::isPublished()
                ->orderBy('created_at', 'desc')
                ->paginate(20)
        );
    }

    public function show($id)
    {
        $tag = Tag::isPublished()
            ->findOrFail($id);

        return new TagResource($tag);
    }
}
