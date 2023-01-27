<?php

use PHPUnit\Framework\TestCase;

require_once "garden.php";

class FruitsTest extends TestCase
{
    public function testGetWeightForApple()
    {
        $fruits = new fruit('apple');
        $weight = $fruits->getWeight();
        $this->assertGreaterThanOrEqual(150, $weight);
        $this->assertLessThanOrEqual(180, $weight);
    }

    public function testGetWeightForPear()
    {
        $fruits = new fruit('pear');
        $weight = $fruits->getWeight();
        $this->assertGreaterThanOrEqual(130, $weight);
        $this->assertLessThanOrEqual(170, $weight);
    }
}