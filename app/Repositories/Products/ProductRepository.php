<?php

namespace App\Repositories\Products;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class ProductRepository implements ProductRepositoryContract
{
    public function __construct(
        protected Product $model
    ) {  
    }

    /**
     * @inheritDoc
     */
    public function list(): Collection
    {
        return $this->model->all();
    }

    /**
     * @inheritDoc
     */
    public function store(array $request): Product
    {
        $product = new Product();
        $product->name = Arr::get($request,'name');
        $product->type = Arr::get($request,'type');
        $product->price = Arr::get($request,'price');
        $product->active = Arr::get($request,'active');
        $product->save();

        return $product;
    }

    /**
     * @inheritDoc
     */
    public function show(int $id): Product
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function destroy(int $id): Void
    {
        $user = $this->model->findOrFail($id);
        $user->delete();
    }
}