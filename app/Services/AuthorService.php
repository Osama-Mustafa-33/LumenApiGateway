<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;
use http\Client\Request;
use Illuminate\Support\Facades\Config;

class AuthorService {

    use ConsumesExternalServices;

    public $base_uri;
    public $secret;
    public function __construct()
    {
        $this->base_uri = config('services.authors.base_uri');
        $this->secret   = config('services.authors.secret');
    }

    public function obtainAuthors()
    {
        return $this->performRequest('GET', '/authors');
    }

    public function createAuthor($data)
    {
        return $this->performRequest('POST', '/authors', $data);
    }

    public function obtainAuthor($author)
    {
        return $this->performRequest('GET', "/authors/{$author}");
    }

    public function updateAuthor($data, $author)
    {
        return $this->performRequest('PATCH', "/authors/{$author}", $data);
    }

    public function deleteAuthor($author)
    {
        return $this->performRequest('DELETE', "/authors/{$author}");
    }
}
