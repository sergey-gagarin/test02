<?php

/**
 *ch 3. recommended book oblects, patterns, practice
 **/
 class ShopProduct{
 
    private $title;
    private $prodMainName;
    private $prodFirstName;
    
    protected $price;
    private   $discount=0;
    
    
  public function __construct ( $title, $first, $main, $price){
  
    $this->title         = $title;
    $this->prodMainName  = $main;
    $this->prodFirstName = $first;
    $this->price         = $price;
  } // end __construct  
 
 
  public function getProdFirst(){
    return $this->prodMainName;
  }
  
  
  public function getProdMain(){
    return $this->prodFirstName;
  }
  
  public function setDiscount($num){
  
      $this->discount = $num;
  }
  
  public function getDiscount(){
      return $this->discount;
  }
  
  public function getTitle(){
      return $this->title;
  }
  
  public function getPrice(){
      return ($this->price - $this->discount );
  }
  
  public function getProducer(){
    return "{$this->prodFirstName}"."{$this->prodMainName}";
  }
  
  public function getSummaryLine(){
    $base = "{$this->title} ({$this->prodMainName}, ";
    $base .= "{$this->prodFirstName})";
    return $base;
  }
  
 
 } // end class


?>
