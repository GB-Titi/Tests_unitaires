<?php

namespace App\Tests;
use PHPUnit\Framework\TestCase;
use App\Model\RickAndMortyModel;

class TestModelTest extends TestCase
{
    public function testProductSetName(): void
    {
        $product = New RickAndMortyModel;

        $product->setName('Test');
        $this->assertEquals('Test', $product->getName());
    }

    public function testProductSetImg(): void
    {
        $product = New RickAndMortyModel;

        $product->setImage('C une image');
        $this->assertEquals('C une image', $product->getImage());
    }
       
}
