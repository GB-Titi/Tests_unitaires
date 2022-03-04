<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Service\RickAndMortyGestion;
use App\Entity\Product;

class ApiTest extends WebTestCase
{
    public function testApiGET(): void
    {
        $client = static::createClient();
        // Request a specific page
        $client->jsonRequest('GET', '/api/');
        $response = $client->getResponse();
        $this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
        $responseData = json_decode($response->getContent(), true);
        $this->assertEquals(['message' => "Hello world"], $responseData);
    }

    public function testApiDefault(): void
    {
        $client = static::createClient();
        // Request a specific page
        $client->jsonRequest('GET', '/');
        $response = $client->getResponse();
        $this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
        $responseData = json_decode($response->getContent(), true);
        $this->assertEquals(['message' => "Hello"], $responseData);
    }

    // public function testApiAddProduct(): void
    // {
    //     $product = New Product;
    //     $product->setName('testing');
    //     $product->setImage('test img');
    //     $product->setPrice('12');
    //     $product->setQuantity(100);
    //     $manager->persist($product);

    //     $client = static::createClient();
    //     // Request a specific page
    //     $client->jsonRequest('POST', '/api/products');
    //     $response = $client->getResponse();
    //     $this->assertResponseIsSuccessful();
    //     $this->assertJson($response);
    //     $responseData = json_decode($response->getContent(), true);
    //     $this->assertCount(20, $responseData);
    // }

    public function testApiDetUniqueProduct(): void
    {
        $client = static::createClient();
        // Request a specific page
        $client->jsonRequest('GET', '/api/products/1');
        $response = $client->getResponse();
        $this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
        $responseData = json_decode($response->getContent(), true);
        $product = [
                "id"=> 1,
                "name"=> "Rick Sanchez",
                "price" => "19.99",
                "quantity" => 25,
                "image"=> "https://rickandmortyapi.com/api/character/avatar/1.jpeg"
            ];
        $this->assertEqualsCanonicalizing($product, $responseData);
    }

    public function testApiGetProducts(): void
    {
        $client = static::createClient();
        // Request a specific page
        $client->jsonRequest('GET', '/api/products');
        $response = $client->getResponse();
        $this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
        $responseData = json_decode($response->getContent(), true);
        $this->assertCount(20, $responseData);
    }

    public function testApiAddToCart(): void
    {
        $client = static::createClient();
        // Request a specific page
        $client->jsonRequest('POST', 'api/cart/1', [
                "quantity" => 3
         ]);
        $response = $client->getResponse();
        $this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
        $responseData = json_decode($response->getContent(), true);
        $this->assertEquals($responseData,
            [
                "id" => 1,
                "products" => 
                [[
                    "id"=> 1,
                    "name"=> "Rick Sanchez",
                    "price" => "19.99",
                    "quantity" => 25,
                    "image"=> "https://rickandmortyapi.com/api/character/avatar/1.jpeg"
                ]]
            ]
        );
    }

    public function testApiAddToCartFailure(): void
    {
        $client = static::createClient();
        // Request a specific page
        $client->jsonRequest('POST', 'api/cart/1', [
                "quantity" => 10000
         ]);
        $response = $client->getResponse();
        $this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
        $responseData = json_decode($response->getContent(), true);
        $this->assertEquals(['error' => "too many"], $responseData);
    }

    public function testApiGetCart(): void
    {
        $client = static::createClient();
        $client->jsonRequest('GET', '/api/cart');
        $response = $client->getResponse();
        $this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
        $responseData = json_decode($response->getContent(), true);
        $this->assertEquals($responseData, [
            "id" => 1,
            "products" => 
            [[
                "id"=> 1,
                "name"=> "Rick Sanchez",
                "price" => 19.99,
                "quantity" => 25,
                "image"=> "https://rickandmortyapi.com/api/character/avatar/1.jpeg"
            ]],
        ]);
    }
    public function testDeleteCart(): void
    {
        $client = static::createClient();
        $client->jsonRequest('DELETE', '/api/cart/1');
        $response = $client->getResponse();
        $this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
        $responseData = json_decode($response->getContent(), true);
        $this->assertEquals($responseData, [
            "id" => 1,
            "products" => []
        ]);
    }
    

    // public function testApiGetTheCart(): void
    // {
    //     $client = static::createClient();
    //     // Request a specific page
    //     $client->jsonRequest('GET', '/api/products');
    //     $response = $client->getResponse();
    //     $this->assertResponseIsSuccessful();
    //     $this->assertJson($response->getContent());
    //     $responseData = json_decode($response->getContent(), true);
    //     $this->assertCount(20, $responseData);
    // }
}
