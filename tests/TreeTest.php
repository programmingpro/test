<?php

use PHPUnit\Framework\TestCase;

require_once "garden.php";

class TreeTest extends TestCase
{
    public function testApples()
    {

        $tree = new Tree(1, 'apple');
        $data = $tree->getData();
        
        $this->assertIsArray($data);
        $this->assertGreaterThanOrEqual(40, count($data));
        $this->assertLessThanOrEqual(50, count($data));
        
        foreach ($data as $fruits) {
            $this->assertInstanceOf(fruit::class, $fruits);
            $this->assertEquals('apple', $tree->getType());
            
        }
    }
    
    public function testPears()
    {

        $tree = new Tree(2, 'pear');
        $data = $tree->getData();
        
        $this->assertIsArray($data);
        $this->assertGreaterThanOrEqual(0, count($data));
        $this->assertLessThanOrEqual(20, count($data));
        
        foreach ($data as $fruits) {
            $this->assertInstanceOf(fruit::class, $fruits);
            $this->assertEquals('pear', $tree->getType());

        }
    }
}
