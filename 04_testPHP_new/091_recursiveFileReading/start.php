<?php

function arrayToFile($inputArray,$file){
    foreach($inputArray as $element){
        if(is_array($element)){
            // call recursively the 'arrayToFile()' function
            arrayToFile($element,$file);
        }
        else{
            if(!$fp=fopen($file,'a+')){
                trigger_error('Error opening data file',E_USER_ERROR);
            }
            fwrite($fp,$element."\n");
            fclose($fp);
        }
    }
}



// define recursive array
$data=array('element1'=>1,
			'element2'=>2,
			'element3'=>array('recursive_element1'=>3,
							  'recursive_element2'=>4,
							  'recursive_element3'=>array('key1'=>'This is an example of recursion',
							  							  'key2'=>'This is another example of recursion')),
							  							  'element4'=>4);


// save array elements to file
arrayToFile($data,'data.txt');