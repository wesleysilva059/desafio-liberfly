<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Services\Products\ProductServiceContract;

class ProductController extends Controller
{
    public function __construct(
        protected ProductServiceContract $productService
    ) {  
    }
    
    /**
     * @OA\Get(
     *     path="/products/",
     *     tags={"Product"},
     *     security={{"bearerAuth": {}}},
     *     summary="Return Products List.",
     *     description="Return Products List.",
     *     @OA\Response(
     *         response=200,
     *         description="Products List"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Route Not Found"
     *     )
     * )
     */
    public function list()
    {
        try {
            $products = $this->productService->list();
            
            return response(new ProductResource($products), Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        } 
    }

    /**
     * @OA\Post(
     *     path="/products/store",
     *     tags={"Product"},
     *     security={{"bearerAuth": {}}},
     *     summary="Create a product",
     *     description="Create a product",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string", example="Nome do Produto"),
     *             @OA\Property(property="type", type="string", example="Televisores"),
     *             @OA\Property(property="price", type="decimal", example="50.49"),
     *             @OA\Property(property="active", type="boolean", example="true"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Product created",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *        )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function store(ProductRequest $request)
    {
        try {
            $product = $this->productService->store($request->all());
            dd($product);
            return response(new ProductResource($product), Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        } 
    }

    /**
     * @OA\Get(
     *     path="/products/show/{id}",
     *     tags={"Product"},
     *     security={{"bearerAuth": {}}},
     *     summary="Returno Products List.",
     *     description="Returno Products List.",
     *     @OA\Parameter(
     *         description="Product Id",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Products List"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="user not found"
     *     )
     * )
     */
    public function show($id)
    {
        try {
            $product = $this->productService->show($id);
            
            return response(new ProductResource($product), Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * @OA\Delete(
     *     path="/products/destroy/{id}",
     *     tags={"Product"},
     *     security={{"bearerAuth": {}}},
     *     summary="Delete a product",
     *     description="Delete a product",
     *     @OA\Parameter(
     *         description="Product Id",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Product deleted"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User not found"
     *     )
     * )
     */
    public function destroy($id)
    {
        try {
            $this->productService->destroy($id);
            
            return response()->json('Produto Excluido', Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
