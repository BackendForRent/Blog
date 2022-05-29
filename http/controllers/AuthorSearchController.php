<?php namespace Goosy\Blog\Http\Controllers;

use Goosy\Blog\Models\Author;
use Illuminate\Routing\Controller;
use October\Rain\Support\Facades\Input;
use Goosy\Blog\Http\Resources\AuthorResource;

class AuthorSearchController extends Controller
{
    public function show()
    {
        $search = Input::get('q');

        $result = AuthorResource::collection(
            Author::isSuspended()
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('surname', 'like', '%' . $search . '%')
                ->orWhere('nickname', 'like', '%' . $search . '%')
                ->get()
        );
        if (count($result)) {
            return $result;
        }
        else {
            return response()->json(['error' => 'No authors found', 'statusCode' => 404], 404);
        }
    }
}
