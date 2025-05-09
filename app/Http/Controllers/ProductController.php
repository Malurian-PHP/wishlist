<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    public function index()
    {
        $products = Product::all();

        // Return the products as a JSON response
        return $this->sendResponse(ProductResource::collection($products), 'Products retrieved successfully.');
    }
}
