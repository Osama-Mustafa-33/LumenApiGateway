<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;

class BookService {

    use ConsumesExternalServices;

    public $base_uri;
    public function __construct()
    {
        $this->base_uri = config('services.books.base_uri');
    }
}
