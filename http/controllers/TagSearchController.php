<?php namespace Goosy\Blog\Http\Controllers;

use Goosy\Blog\Models\Tag;
use Illuminate\Routing\Controller;
use October\Rain\Support\Facades\Input;
use Goosy\Blog\Http\Resources\TagResource;

class TagSearchController extends Controller
{
    public function show()
    {
        $search = Input::get('q');

        $result = TagResource::collection(
            Tag::isPublished()
                ->where('title', 'like', '%' . $search . '%')
                ->get()
        );
        if (count($result)) {
            return $result;
        }
        else {
            return response()->json(['error' => 'No tags found', 'statusCode' => 404], 404);
        }
    }
}
