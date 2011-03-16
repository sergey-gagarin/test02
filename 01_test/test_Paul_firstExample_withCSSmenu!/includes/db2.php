
  
 
<?

class Database
{
   var $res;    //current result resource
   var $dblink; //connection identifier to currently open database
   var $debug_mode;
   var $host;
   var $user;
   var $password;
   var $database;

   // Database constructor
   //
   // This function just connects to the database using the details given
   // by the settings.inc file.
   //
   // If it can't connect, it dies with the error message.
   //
   function Database($host="", $user="", $password="", $database="")
   {
       global $db_host, $db_user, $db_password, $db_database;

       if ($host!="") //manual override settings for database
       {
          $this->host = $host;
          $this->user = $user;
          $this->password = $password;
          $this->database = $database;
       }
       else  // use global settings
       {
          $this->host = $db_host;
          $this->user = $db_user;
          $this->password = $db_password;
          $this->database = $db_database;
       }

   $this->dblink = mysql_connect($this->host, $this->user, $this->password) or die("<br><br>Could not connect to database <b>$db_database</b> on <b>$db_host</b>");
       $this->debug_mode = 0;

       mysql_select_db($this->database);
   }

   function init()
   {
         }

   // execute function
   //
   // Executes the given SQL statement, which can be either select
   // or insert/update/delete.
   //
   // It does not return anything, rather it sets the internal
   // result resource which is used later on in other functions.
   //
   // If the SQL is empty or invalid, an error is printed.
   //
   function execute($sql, $result_index=0)
   {
       global $show_sql_errors;

       $this->res[$result_index] = mysql_query($sql, $this->dblink);

       if ($this->res[$result_index]==false&&$show_sql_errors)
       {
           global $PATH_TRANSLATED;
           trigger_error("<br><br><a style=\"color:#0080c0;font-family:Arial;font-size:10pt\">Invalid SQL Query in <b>$PATH_TRANSLATED</b>: <br><br><font size=5 color=#004060>$sql</font><br><br>", E_USER_ERROR);
           return;
       }
   }

   function execute_nr($sql)     //execute no return
   {
       $res_nr = mysql_query($sql, $this->dblink);

       if ($res_nr==false&&$show_sql_errors)
       {
           global $PATH_TRANSLATED;
           trigger_error("<br><br><a style=\"color:#0080c0;font-family:Arial;font-size:10pt\">Invalid SQL Query in <b>$PATH_TRANSLATED</b>: <br><br><font size=5 color=#004060>$sql</font><br><br>", E_USER_ERROR);
           return;
       }
   }

   function execute_once($sql)
   {
       $res = mysql_query($sql, $this->dblink);

       if ($res==false&&$show_sql_errors)
       {
           global $PATH_TRANSLATED;
           trigger_error("<br><br><a style=\"color:#0080c0;font-family:Arial;font-size:10pt\">Invalid SQL Query in <b>$PATH_TRANSLATED</b>: <br><br><font size=5 color=#004060>$sql</font><br><br>", E_USER_ERROR);
           return;
       }
       list($value)=mysql_fetch_array($res);
       return $value;
   }

   // get_array function
   //
   // Same as the mysql_fetch_array function, this just
   // acts on the internal result resource, returning
   // the array.
   //
   function get_array($result_index=0)
   {
       if ($this->res[$result_index])
          return mysql_fetch_array($this->res[$result_index]);
       else
          return null;
   }

   // row_count function
   //
   // Same as the mysql_num_rows function, this just
   // acts on the internal result resource, returning
   // the number of records returned.
   //
   function row_count($result_index=0)
   {
       if ($this->res[$result_index])
          return mysql_num_rows($this->res[$result_index]);
       else
          return null;
   }

   // last_id function
   //
   // Same as the mysql_insert_id function, this just
   // acts on the internal result resource, returning
   // the the last autoincrement id created.
   //
   function last_id($result_index=0)
   {
       if ($this->res[$result_index])
          return mysql_insert_id($this->dblink);
       else
          return null;
   }

   //seek function
   //
   // Sets the pointer to the
   // record number indicated
   //
   function seek($position, $result_index=0)
   {
       if ($this->res)
           return mysql_data_seek($this->res[$result_index], $position);
       else
           return false;
   }

   function field_name($index, $result_index=0)
   {
       if ($this->res)
           return @mysql_field_name($this->res[$result_index], $index);
       else
           return false;
   }

   function field_type($index, $result_index=0)
   {
       if ($this->res)
           return mysql_field_type($this->res[$result_index], $index);
       else
           return false;
   }

///////  ??????????????  ///////////////
/// mysql_list_fields() - Deprecated. Lists MySQL table fields. Use mysql_query() instead
/// http://www.w3schools.com/php/php_ref_mysql.asp ///////////

   function list_fields($tablename, $result_index=0)
   {
       global $db_database;
       $this->res = mysql_list_fields($db_database, $tablename, $this->dblink);
   }
   
   function get_object($result_index=0)
   {
       if ($this->res[$result_index])
       {
           @mysql_data_seek($this->res[$result_index], 0);
           return mysql_fetch_object($this->res[$result_index]);
       }
       else
           return false;
   }

     //mambo compatibility functions

    function openConnectionWithReturn($query)
    {
        return mysql_query($query);
    }

    function openConnectionNoReturn($query)
    {

        mysql_query($query);
    }

}
?>

  
 
  
  
