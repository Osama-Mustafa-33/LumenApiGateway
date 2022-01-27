<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Services\AuthorService;
use App\Services\BookService;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class BookController extends Controller
{
    use ApiResponser;

    public $bookService;
    public $authorService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }

    public function index()
    {
        return $this->successResponse($this->bookService->obtainBooks());
    }

    public function store(Request $request)
    {
        $this->authorService->obtainAuthor($request->input('author_id'));
        return $this->successResponse($this->bookService->storeBook($request->all(), Response::HTTP_CREATED));
    }

    public function show($book)
    {
        return $this->successResponse($this->bookService->showBook($book));
    }

    public function update(Request $request, $book)
    {
        return $this->successResponse($this->bookService->updateBook($request->all(), $book));
    }

    public function destroy($book)
    {
        return $this->successResponse($this->bookService->deleteBook($book));
    }
}
