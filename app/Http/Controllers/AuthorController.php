<?php

namespace App\Http\Controllers;
use App\Models\Author;
use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    use ApiResponser;

    public $authorService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function index()
    {
        return $this->successResponse($this->authorService->obtainAuthors());
    }

    public function store(Request $request)
    {

    }

    public function show($author)
    {
    }

    public function update(Request $request, $author)
    {
    }

    public function destroy($author)
    {
    }
}
