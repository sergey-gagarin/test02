<!--
//(c) јлександр  уклюк kuklyuk@ukrpost.net ѕри использовании в своем проекте
//будьте любезны сослатьс€.

function insertdate(day, month, year) {

month++;
year=format_year(year);

 if(day<10){
     day="0"+day;
 }

 if(month<10){
     month="0"+month;
 }

strDate=day+"."+month+"."+year;
document.placeobj.expiry_date.value=strDate;

}

function format_year(y) {
//alert(y);
 if((eval(y))<2000){
      return (y+1900);
 } else {
     return y;
 }
}



function write_calendar(year, month) {

    var monthname=new Array();
    monthname[0]="январь";
    monthname[1]="‘евраль";
    monthname[2]="ћарт";
    monthname[3]="јпрель";
    monthname[4]="ћай";
    monthname[5]="»юнь";
    monthname[6]="»юль";
    monthname[7]="јвгуст";
    monthname[8]="—ент€брь";
    monthname[9]="ќкт€брь";
    monthname[10]="Ќо€брь";
    monthname[11]="ƒекабрь";



    var dt; //дата цього м≥с€ц€
    var dtNext;//дата наступного м≥с€ц€
    var dtPrev;//дата попереднього м≥с€ц€
    var dtCurrent;//сьогодн≥

    var thisdate;//3 перем≥нн≥ дл€ визначенн€ к≥нц€ м≥с€ц€
    var nextdate; //
    var datevalid;//


    var doc; //посиланн€ на документ
    var firstday;//день тижн€ першого дн€ м≥с€ц€
    var fill=false;//флаг заповненн€ календар€
    datevalid=true;

    /*€кщо дата Ї в параметр≥, берем зв≥дти,
    €кщо н≥ - берем поточну ≥ ставим число на початок м≥с€ц€*/

    dtCurrent=new Date();


    if(year!=0){
        dt=new Date(year, month, 1);
        dtNext=new Date(year, month, 1);
        dtPrev=new Date(year, month, 1);
    } else {
        dt=new Date();
        dt.setDate(1);
        dtNext=new Date();
        dtPrev=new Date();
    }

    firstday=dt.getDay();

    //вираховуЇм дату наступного м≥с€ц€

    dtNext.setMonth(dtNext.getMonth()+1);


    //вираховуЇм дату попереднього м≥с€ц€

    dtPrev.setMonth(dtPrev.getMonth()-1);



    //визначаЇм броузер
    if(navigator.appName=="Netscape"){
        doc=document.getElementById('cldr').contentDocument;
    } else {
        doc=document.cldr.document;
    }

//пишем шапку календар€

with (doc) {
open("text/html");
writeln("<html>");
writeln("<head>");
writeln("<meta http-equiv='Content-Type' content='text/html; charset=windows-1251'>");
writeln("<link href='cldr.css' rel='stylesheet' type='text/css'>");
writeln("</head>");
writeln("<body>");
writeln("<table width='168' border='0' cellpadding='0' cellspacing='1' bgcolor='##006666'>");
writeln("<tr><td><table width='168' border='0' cellpadding='0' cellspacing='1' bgcolor='#FFFFFF' class='calendar1'>");
writeln("<tr><td width='22' height='18' background='images/th2-1.gif'><div align='center' class='calendar-head'>");
writeln("<a class='calendar-head' href='javascript:void(0)' onClick='parent.write_calendar("+format_year(dtPrev.getYear())+","+dtPrev.getMonth()+")'><strong>&lt;&lt;</strong></a></div></td><td colspan='5' background='images/th2-1.gif'> <div align='center' class='calendar-head'></div>");
writeln("<div align='center'></div><div align='center'><table width='115' border='0' align='left' cellpadding='0' cellspacing='1'>");
writeln("<tr><td width='99' rowspan='2' class='calendar-head'><div align='right'><strong>");
writeln(monthname[dt.getMonth()]," ",format_year(dt.getYear()));
writeln("</strong></div></td><td width='10'><div align='center'><a href='javascript:void(0)' onClick='parent.write_calendar(",format_year(dt.getYear())+1,",",dt.getMonth(),")'><img src='images/wht_up.gif' border='0' width='7' height='7'></a></div></td>");
writeln("</tr><tr><td width='10' height='7'><div align='center'><a href='javascript:void(0)' onClick='parent.write_calendar(",format_year(dt.getYear())-1,",",dt.getMonth(),")'><img src='images/wht_dn.gif' border='0' width='7' height='7'></a></div></td>");
writeln("</tr></table></div></td><td width='22' background='images/th2-1.gif'><div align='center' class='calendar-head'>");
writeln("<a href='javascript:void(0)' class='calendar-head' onClick='parent.write_calendar("+format_year(dtNext.getYear())+","+dtNext.getMonth()+")'><strong>&gt;&gt;</strong></a></div></td></tr><tr>");
writeln("<td width='22' height='18' bgcolor='#F6F5F1'> <div align='center'><strong>ѕн</strong></div></td>");
writeln("<td width='22' height='18' bgcolor='#F6F5F1'> <div align='center'><strong>¬т</strong></div></td>");
writeln("<td width='22' height='18' bgcolor='#F6F5F1'> <div align='center'><strong>—р</strong></div></td>");
writeln("<td width='22' height='18' bgcolor='#F6F5F1'> <div align='center'><strong>„т</strong></div></td>");
writeln("<td width='22' height='18' bgcolor='#F6F5F1'> <div align='center'><strong>ѕт</strong></div></td>");
writeln("<td width='22' height='18' bgcolor='#F6F5F1'> <div align='center'><strong>—б</strong></div></td>");
writeln("<td width='22' height='18' bgcolor='#F6F5F1'> <div align='center'><strong><font color='#FF0000'>Ќд</font></strong></div>");
writeln("</td></tr>");

}


    for(i=0;i<=5;i++){ //цикл заповненн€ тижн≥в
        doc.writeln("<tr>");
            for(j=1;j<=7;j++){
                doc.writeln("<td width='22' height='18' bgcolor='#F6F5F1'>");
                doc.write("<div align='center' class='calendar1'>");

                if(datevalid){
                    if((j==firstday)||((j==7)&&(firstday==0)))  {
                        fill=true;
                    }

                    if(fill){
                        thisdate=dt.getDate();

                        if((dtCurrent.getDate()==thisdate)&&(dtCurrent.getMonth()==dt.getMonth()) && (dtCurrent.getYear()==dt.getYear())) {
                            doc.write("<a class='calendar-today' href='javascript:void(0)' onClick=\"parent.insertdate("+thisdate+', '+dt.getMonth()+", "+dt.getYear()+")\">");
                        } else if(j==7){
                            doc.write("<a class='calendar-holy' href='javascript:void(0)' onClick=\"parent.insertdate("+thisdate+', '+dt.getMonth()+", "+dt.getYear()+")\">");
                        } else {
                            doc.write("<a class='calendar1' href='javascript:void(0)' onClick=\"parent.insertdate("+thisdate+', '+dt.getMonth()+", "+dt.getYear()+")\">");
                        }

                        doc.write(thisdate+'</a>');
                        dt.setDate(dt.getDate()+1)
                        nextdate=dt.getDate();

                        if(thisdate>nextdate){
                            datevalid=false;
                        }
                    }
                }

                doc.writeln("</div></td>");
            }
        doc.writeln("</tr>");
    }


//к≥нець документа
doc.writeln("</table></td></tr></table></body></html>");
doc.close();

}
//-->
