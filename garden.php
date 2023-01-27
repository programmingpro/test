<?php

Class fruit{
    
    private $weight = 0;
    
    public function __construct($type){
        
        if($type == 'apple'){
            
            $this->weight = rand(150, 180);
            
        }else if($type == 'pear'){
            
            $this->weight = rand(130, 170);
            
        } 
    }
    
    public function getWeight(){

        return $this->weight;
        
    }
}

Class Tree{
    
    private $id = 0;
    private $DATA = [];
    private $type = "";
    private $num_fruits = 0;
    
    public function __construct($id, $type){
        
        $this->id = $id;
        
        if($type == 'apple'){
            
            $this->type = 'apple';
            $this->num_fruits = rand(40, 50);
            
        }else if($type == 'pear'){
            
            $this->type = "pear";
            $this->num_fruits = rand(0, 20);
            
        }
        
        for($i = 0; $i < $this->num_fruits; $i++){
            
            $this->DATA[] = new fruit($this->type);
            
        }
        
        
    }
    
    public function getData(){
        
        return $this->DATA;
        
    }
    
    public function getType(){
        
        return $this -> type;
        
    }
    
    public function Collect(){
        
        $this->DATA = [];
        
    }
    
    
}

Class Garden{
    
    private $DATA = [];
    private $id = 0;
    
    public function AddTrees($num, $type){
        
        for($i = 0; $i < $num; $i++){
            
            $this->DATA[] = new Tree($this->id, $type);
            $this->id++;
            
        }
        
    }
    
    public function getData(){
        
        return $this->DATA;
        
    }
    
    
    public function СollectFruits(){
        
        $apples_num = 0;
        $pears_num = 0;
        $apples_weight = 0;
        $pears_weight = 0;
        
        foreach ($this -> getData() as $tree){
            
            foreach ($tree->getData() as $fruit){
                
                if($tree->getType() == 'apple'){
                    
                    $apples_num++;
                    $apples_weight += $fruit->getWeight();
                    
                }else if($tree->getType() == 'pear'){
                    
                    $pears_num++;
                    $pears_weight += $fruit->getWeight();
                    
                }
                
            }
            
            $tree->Collect();
            
        }
        
        echo "Было собрано ". $apples_num. " яблок, общий вес составил ". $apples_weight. PHP_EOL;
        echo "Было собрано ". $pears_num. " груш, общий вес составил ". $pears_weight. PHP_EOL; 
        
        
        return[$apples_num, $apples_weight, $pears_num, $pears_weight];
        
    }
    
}
