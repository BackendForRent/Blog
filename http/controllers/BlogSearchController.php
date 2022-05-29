<?php namespace Goosy\Blog\Http\Controllers;

use Goosy\Blog\Models\Blog;
use Illuminate\Routing\Controller;
use October\Rain\Support\Facades\Input;
use Goosy\Blog\Http\Resources\BlogResource;

class BlogSearchController extends Controller
{
    public function show()
    {
        $search = Input::get('q');

        $result = BlogResource::collection(
            Blog::isPublished()
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('content_preview', 'like', '%' . $search . '%')
                ->get()
        );
        if (count($result)) {
            return $result;
        }
        else {
            return response()->json(['error' => 'No blogs found', 'statusCode' => 404], 404);
        }
    }
}
