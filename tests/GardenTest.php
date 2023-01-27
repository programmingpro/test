<?php

use PHPUnit\Framework\TestCase;

class GardenTest extends TestCase
{
    public function testAddTrees()
    {
        $garden = new Garden();
        $garden->AddTrees(10, 'apple');
        $garden->AddTrees(15, 'pear');
        $this->assertCount(25, $garden->getData());
    }

    public function testCollectFruits()
    {
        $garden = new Garden();
        $garden->AddTrees(10, 'apple');
        $garden->AddTrees(15, 'pear');
        $collected = $garden->СollectFruits();
        $this->assertGreaterThanOrEqual(400, $collected[0]);
        $this->assertLessThanOrEqual(500, $collected[0]);
        $this->assertGreaterThanOrEqual(60000, $collected[1]);
        $this->assertLessThanOrEqual(90000, $collected[1]);
        $this->assertGreaterThanOrEqual(0, $collected[2]);
        $this->assertLessThanOrEqual(300, $collected[2]);
        $this->assertGreaterThanOrEqual(0, $collected[3]);
        $this->assertLessThanOrEqual(51000, $collected[3]);
    }

}
