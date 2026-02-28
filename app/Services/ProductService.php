<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Services\TaskService;

class ProductService
{
    protected $products;

    public function __construct($products = []) {
        $this->products = $products;
    }

    public function getList() {
        return $this->products;
    }

    public function insert($products) {
        $this->products[] = $products;
    }
}