<form action = md5.php method= get>
������� ������ :<br>
<input type = password name = pass></br>
<input type = submit value = MD5>
</form>
�� �����: <br>
<?php
print "$pass <br> ������ ����� ��������� : <br>";
$pass = md5($pass);
 print "$pass"; ?>