<?php

namespace App\Repositories\Products;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductRepositoryContract
{    
    /**
     * list all products
     *
     * @return Collection
     */
    public function list(): Collection;
    
    /**
     * store a product
     *
     * @param  array $request
     * @return Product
     */
    public function store(array $request): Product;
    
    /**
     * show a product
     *
     * @param  int $id
     * @return Product
     */
    public function show(int $id): Product;
    
    /**
     * destroy a produtc
     *
     * @param  int $id
     * @return Void
     */
    public function destroy(int $id): Void;
}