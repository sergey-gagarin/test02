<!--
//(c) ��������� ������ kuklyuk@ukrpost.net ��� ������������� � ����� �������
//������ ������� ���������.

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
    monthname[0]="������";
    monthname[1]="�������";
    monthname[2]="����";
    monthname[3]="������";
    monthname[4]="���";
    monthname[5]="����";
    monthname[6]="����";
    monthname[7]="������";
    monthname[8]="��������";
    monthname[9]="�������";
    monthname[10]="������";
    monthname[11]="�������";



    var dt; //���� ����� �����
    var dtNext;//���� ���������� �����
    var dtPrev;//���� ������������ �����
    var dtCurrent;//�������

    var thisdate;//3 ������� ��� ���������� ���� �����
    var nextdate; //
    var datevalid;//


    var doc; //��������� �� ��������
    var firstday;//���� ����� ������� ��� �����
    var fill=false;//���� ���������� ���������
    datevalid=true;

    /*���� ���� � � ��������, ����� �����,
    ���� � - ����� ������� � ������ ����� �� ������� �����*/

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

    //��������� ���� ���������� �����

    dtNext.setMonth(dtNext.getMonth()+1);


    //��������� ���� ������������ �����

    dtPrev.setMonth(dtPrev.getMonth()-1);



    //�������� �������
    if(navigator.appName=="Netscape"){
        doc=document.getElementById('cldr').contentDocument;
    } else {
        doc=document.cldr.document;
    }

//����� ����� ���������

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
writeln("<td width='22' height='18' bgcolor='#F6F5F1'> <div align='center'><strong>��</strong></div></td>");
writeln("<td width='22' height='18' bgcolor='#F6F5F1'> <div align='center'><strong>��</strong></div></td>");
writeln("<td width='22' height='18' bgcolor='#F6F5F1'> <div align='center'><strong>��</strong></div></td>");
writeln("<td width='22' height='18' bgcolor='#F6F5F1'> <div align='center'><strong>��</strong></div></td>");
writeln("<td width='22' height='18' bgcolor='#F6F5F1'> <div align='center'><strong>��</strong></div></td>");
writeln("<td width='22' height='18' bgcolor='#F6F5F1'> <div align='center'><strong>��</strong></div></td>");
writeln("<td width='22' height='18' bgcolor='#F6F5F1'> <div align='center'><strong><font color='#FF0000'>��</font></strong></div>");
writeln("</td></tr>");

}


    for(i=0;i<=5;i++){ //���� ���������� �����
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


//����� ���������
doc.writeln("</table></td></tr></table></body></html>");
doc.close();

}
//-->
