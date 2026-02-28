<?php

namespace App\Http\Controllers;
use App\Services\TaskService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index(ProductService $productService) {
       $newProduct = [
        'id' => 4,
        'name' => 'Orange',
        'category' => 'Fruit',
       ];

       $productService ->insert ($newProduct);

       $this->taskService->add('Add To Card');
       $this->taskService->add('Checkout');

   $data = [
    'products' => $productService->getList(),
    'tasks' => $this->taskService->getAllTasks()
   ];


   return view('product.index', $data);
    }

    public function show(ProductService $productService, string $id) {
    $product = collect($productService->getList())->filter(function($item) use ($id) {
        return $item['id'] == $id;
    })->first();

    return $product;
    }
}