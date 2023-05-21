<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductsTest extends TestCase
{
    private User $user;
    private Collection $products;
    
    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $this->products = Product::factory(10)->create();
    }
    
    public function testListAllProductsSuccessful()
    {
        $this->actingAs($this->user);
        
        $response = $this->json('GET', route('product.list'));

        $products = json_decode($response->getContent());

        $response->assertOk();

        $this->assertEquals(count($products), 10);
    }

    public function testShowAProductSuccessful()
    {
        $this->actingAs($this->user);
        
        $response = $this->json('GET', route('product.show', $this->products[1]->id));

        $response->assertOk();
    }

    public function testUnsuccessfulShowAProductWithWrongId()
    {
        $this->actingAs($this->user);
        
        $response = $this->json('GET', route('product.show', 11));

        $response->assertBadRequest();
    }
}
