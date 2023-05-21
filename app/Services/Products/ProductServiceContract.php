<?php

namespace App\Services\Products;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductServiceContract
{    
    /**
     * list all Products
     *
     * @return Collection
     */
    public function list(): Collection;
    
    /**
     * store a Product
     *
     * @param  array $request
     * @return Product
     */
    public function store(array $request): Product;
    
    /**
     * Show a uniq Product
     *
     * @param  int $id
     * @return Product
     */
    public function show(int $id): Product;
    
    /**
     * destroy a Product
     *
     * @param  int $id
     * @return Void
     */
    public function destroy(int $id): Void;
}