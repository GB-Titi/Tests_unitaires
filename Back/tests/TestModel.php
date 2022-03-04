<?php

namespace App\Tests;
use PHPUnit\Framework\TestCase;
use App\Entity\Product;

class TestModel extends TestCase
{
    public function ProductSetName(): void
    {
        $product = New Product;

        $product->setName('Test');
        $this->assertEquals('Test', $product->getName());
    }

    public function ProductSetImg(): void
    {
        $product = New Product;

        $product->setName('C une image');
        $this->assertEquals('C une image', $product->getName());
    }
       
}
