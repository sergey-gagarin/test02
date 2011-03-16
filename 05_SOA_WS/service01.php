<?php
$format = $_GET['format'];
$installer = array(
				    'job1' => array('ident' => 'GC002154',
				    				'hrs' => '4'
				                    ), 
				    'job2' => array('ident' => 'GC002289',
				    				'info' => '8'
				                    ),
				  	'job3' => array('ident' => 'GC003369',
				    				'info' => '8',
                    ),
	);


  if($format == 'json') {

    echo json_encode(array('installer'=>$installer));
  }
  
  
  else {
    header('Content-type: text/xml');
 
    echo '<installer>';
    foreach($installer as $index=>$item) 
    {
    	echo "<$index>";
		      if(is_array($item)) {
		      		 foreach($item as $key => $value) {
				          echo '<',$key,'>';
				          
				          	echo $value;
				          
				          echo '</',$key,'>';
			        }
		      }else{ 
		      	echo $item;
		      }
	     echo "</$index>";
    }
    echo '</installer>';
  }
  
  
    // header('Content-type: application/json');
	//header('Content-type: application/txt');
	