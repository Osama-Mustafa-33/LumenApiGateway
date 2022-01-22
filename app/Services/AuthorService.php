<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;

class AuthorService {

    use ConsumesExternalServices;

    public $base_uri;

    public function __construct()
    {
        $this->base_uri = config('services.authors.base_uri');
    }

    public function obtainAuthors()
    {
        return $this->performRequest('GET', '/authors');
    }
}
