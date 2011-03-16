<form action = md5.php method= get>
Введите пароль :<br>
<input type = password name = pass></br>
<input type = submit value = MD5>
</form>
Вы ввели: <br>
<?php
print "$pass <br> Пароль после генерации : <br>";
$pass = md5($pass);
 print "$pass"; ?>