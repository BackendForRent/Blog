<?php namespace Goosy\Blog\Http\Controllers;

use Goosy\Blog\Models\Author;
use Illuminate\Routing\Controller;
use Goosy\Blog\Http\Resources\AuthorResource;

class AuthorsController extends Controller
{
    public function index()
    {
        return AuthorResource::collection(
            Author::isSuspended()
                ->orderBy('created_at', 'desc')
                ->paginate(20)
        );
    }

    public function show($id)
    {
        $author = Author::isSuspended()
            ->findOrFail($id);

        return new AuthorResource($author);
    }
}
