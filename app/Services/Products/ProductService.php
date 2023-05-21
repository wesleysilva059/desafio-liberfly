<?php

namespace App\Services\Products;

use App\Models\Product;
use App\Repositories\Products\ProductRepositoryContract;
use App\Services\Products\ProductServiceContract;
use Illuminate\Database\Eloquent\Collection;

class ProductService implements ProductServiceContract
{
    public function __construct(
        protected ProductRepositoryContract $productRepository
    ) {  
    }
    
    /**
     * @inheritDoc
     */
    public function list(): Collection
    {
        return cache()->remember("products_list", 262800, function () {
            return $this->productRepository->list();
        });
        
        return $this->productRepository->list();
    }

    /**
     * @inheritDoc
     */
    public function store(array $request): Product
    {
        cache()->forget("products_list");
        return $this->productRepository->store($request);
    }

    /**
     * @inheritDoc
     */
    public function show(int $id): Product
    {
        return $this->productRepository->show($id);
    }

    /**
     * @inheritDoc
     */
    public function destroy(int $id): Void
    {
        $this->productRepository->destroy($id);
    }
}