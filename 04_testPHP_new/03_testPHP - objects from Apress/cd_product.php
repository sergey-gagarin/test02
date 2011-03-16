<?php

/**
 *
 * **/
include_once 'shop_product.php';

 class CdProduct extends ShopProduct {
 
    private $playLength = 0;
    
    public function __construct ( $title, $first, $main, $price, $playLength){
    
        parent::__construct( $title, $first, $main, $price);
        $this->playLength = $playLength;
    
    } // end __construct
    
    public function getPlayLength(){
        return $this->playLength." min.";
    }
    
    public function getSummaryLine(){
        $base = parent::getSummaryLine();
        $base.= " : play time - {$this->playLength}";
       return $base;
    }
 
 
 } // end class
 
 
 
 class CdProduct22 extends CdProduct
{
    public function getPlayLength(){
        return parent::getSummaryLine()." THE PLAY LENGTH fro CdProduct22 = ".$this->playLength." min.";
    }
	
} 

 
 	$cd = new CdProduct('SongsTitle', 'John', 'Barry', 25, 120);
 	
 	echo $cd->getSummaryLine();
 	
 	$cd2 = new CdProduct22('SSS_Title22', 'John22', 'Barry22', 50, 240);
 	
 	echo "<br>".$cd2->getSummaryLine();
 	
	
 
