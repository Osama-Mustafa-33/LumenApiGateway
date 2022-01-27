<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;
use Illuminate\Http\Request;

class BookService {

    use ConsumesExternalServices;

    public $base_uri;
    public $secret;
    public function __construct()
    {
        $this->base_uri = config('services.books.base_uri');
        $this->secret   = config('services.books.secret');
    }

    public function obtainBooks()
    {
        return $this->performRequest('GET', 'books');
    }

    public function storeBook($data)
    {
        return $this->performRequest('POST', 'books', $data);
    }

    public function showBook($book)
    {
        return $this->performRequest('GET', "books/{$book}");
    }


    public function updateBook($data, $book)
    {
        return $this->performRequest('PATCH', "books/{$book}", $data);
    }

    public function deleteBook($book)
    {
        return $this->performRequest('DELETE', "books/{$book}");
    }
}

