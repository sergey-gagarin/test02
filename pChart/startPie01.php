<?php
 /*
    From Example10 : A 3D exploded pie graph
 */

 // Standard inclusions   
 include("pChart/pData.class");
 include("pChart/pChart.class");

 // Dataset definition 
 $DataSet = new pData;
 //$DataSet->AddPoint(array(10,2,3,5,3),"Serie1");
 
 $DataSet->AddPoint(array(41582,500000,600000,5000),"Serie1");
 $DataSet->AddPoint(array("Computers","Vehicles","Buildings","Clothing"),"Serie2");
 $DataSet->AddAllSeries();
 $DataSet->SetAbsciseLabelSerie("Serie2");

 // Initialise the graph
 $Test = new pChart(420,250); // (Xwidth Y)
 //     drawFilledRoundedRectangle($X1,$Y1,$X2, $Y2, $Radius, $R,$G,$B)   line 2911
 $Test->drawFilledRoundedRectangle(7,  7,  413, 243, 5,       240,240,240);  // bg of the chart
 $Test->drawRoundedRectangle(5,5,415,245,5, 0,0,255);                         // border of the chart
 //$Test->createColorGradientPalette(195,204,56, 223,110,41, 4);  // line: 255
 $Test->createColorGradientPalette(50,50,50, 250,250,255, 4);  // line: 255

 // Draw the pie chart
 $Test->setFontProperties("Fonts/tahoma.ttf",8);
 //$Test->AntialiasQuality = 0; // ??? no diff ?
 $Test->drawPieGraph($DataSet->GetData(),$DataSet->GetDataDescription(),180,130,110,PIE_PERCENTAGE_LABEL,FALSE,50,20,5);
 $Test->drawPieLegend(330,15,$DataSet->GetData(),$DataSet->GetDataDescription(),250,250,250);

 // Write the title
 $Test->setFontProperties("Fonts/MankSans.ttf",10);
 $Test->drawTitle(10,20,"Start PieChart",100,100,100);

 $Test->Render("example10.png");
?>

<img src="example10.png" width="420" height="250">