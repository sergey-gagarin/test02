<?

function phpftp_connect()
{
	$servername = "put here your servername";
	$username = "put here your username";
	$password = "put here your password";
	
	$ftp = ftp_connect($servername);
	if ($ftp) {
		if (ftp_login($ftp,$username,urldecode($password))) {
			return $ftp;
		}
	}
}

if ( !$phpftp_dir ) { $phpftp_dir = "/var/www/html/download"; }

function phpftp_top() { include("header.php"); }
function phpftp_bottom() { echo "</td></tr></table></body></html>"; }

function rij($omschrijving,$nr,$size)
{
	echo "<tr><td>";
	if ( $nr != "" ) { echo "<input TYPE='checkbox' NAME='num[]' VALUE='$nr'>"; }
	echo "</td><td>&nbsp;</td><td>$omschrijving</td><td>&nbsp;</td><td>$size</td></tr>";
}

function phpftp_list($phpftp_dir)
{
	global $ba;
	phpftp_top();
	$ftp = @phpftp_connect();
    @ftp_chdir($ftp,$phpftp_dir);
	if ($phpftp_dir == "/") $phpftp_dir="";
	$contents = ftp_rawlist($ftp,"");

	$d_i=0;
	$f_i=0;
	$l_i=0;
	$i=0;
	while ($contents[$i])
		{
		$item[] = split("[ ]+",$contents[$i],9);
		$item_type=substr($item[$i][0],0,1);
		if ($item_type == "d")
			{
			$nlist_dirs[$d_i]=$item[$i][8];
			$d_i++;
			}
		elseif ($item_type == "l")
			{
			$p = strpos($item[$i][8]," ->");
			$naam=substr($item[$i][8],0,$p);
			$rest=substr($item[$i][8],$p+4,strlen($item[$i][8]) - $p-4);
			$nlist_names[$l_i]=$naam;
			$nlist_links[$l_i]=$rest;
			$l_i++;
			}
		elseif ($item_type == "-")
			{
			$nlist_files[$f_i]=$item[$i][8];
			$nlist_filesize[$f_i]=$item[$i][4];
			$f_i++;
			}
		elseif ($item_type == "+")
			{
			$eplf=split(",",implode(" ",$item[$i]),5);
			if ($eplf[2] == "r")
			{
				$nlist_files[$f_i]=trim($eplf[4]);
				$nlist_filesize[$f_i]=substr($eplf[3],1);
				$f_i++;
				}
			elseif ($eplf[2] == "/")
				{
				$nlist_dirs[$d_i]=trim($eplf[3]);
				$d_i++;
				}
			}
		$i++;
		}

	echo "<form name=\"frmlist\" ACTION='oneftp.php?function=delete&phpftp_dir=$phpftp_dir' METHOD='post'><br>";
	echo "<table border=0 cellpadding=0 cellspacing=2>";

	$cdup=dirname($phpftp_dir);
	if ($cdup=="") {$cdup="/";}
	if ($ba!="") $cdup=$ba;
	if ($phpftp_dir!="")
		{
		$tmp= "<a href='oneftp.php?phpftp_dir=$cdup'>...</a>";
		rij($tmp,"","");
		}

	if (count($nlist_dirs)>0)
		{
		for ($i=0; $i < count($nlist_dirs); $i++)
			{
			$tmp= "<a href=oneftp.php?phpftp_dir=$phpftp_dir/".$nlist_dirs[$i].">(".$nlist_dirs[$i].")</a>";
			rij($tmp,"$phpftp_dir/".$nlist_dirs[$i],"");
			}
		}

	if (count($nlist_links)>0)
		{
		for ($i=0; $i < count($nlist_links); $i++)
			{
			$tmp= "<a href=oneftp.php?ba=$phpftp_dir&phpftp_dir=".$nlist_links[$i].">(".$nlist_names[$i].")</a>";
			rij($tmp,$nlist_links[$i],"");
			}
		}

	if (count($nlist_files)>0)
		{
		for ($i=0; $i < count($nlist_files); $i++)
			{
			$tmp="<a href=oneftp.php?function=get&phpftp_dir=$phpftp_dir&select_file=".$nlist_files[$i].">".$nlist_files[$i]."</a>";
			rij($tmp,$nlist_files[$i],"($nlist_filesize[$i] bytes)");
			}
		}
?>

	</table></form><br>
	<table border=0 cellpadding=0 cellspacing=10><tr><td>
    <form name="frmdir" action="oneftp.php" method=post>
	<input type="hidden" name="function" value="mkdir">
	<input type="hidden" name="phpftp_dir" value="<? echo $phpftp_dir; ?>">
	<input type="text" name="new_dir" class="formText">
	</form></td><td>
	<form name="frmup" enctype="multipart/form-data" action="oneftp.php" method=post>
	<input type="hidden" name="phpftp_dir" value="<? echo $phpftp_dir; ?>">
	<input type="hidden" name="function" value="put">
	<input name="userfile" type="file" class="formSelect">
	</form></td></tr></table>
	<a href="javascript:document.frmlist.submit()">delete</a> |
	<a href="javascript:document.frmup.submit()">upload</a> |
	<a href="javascript:document.frmdir.submit()">make dir</a>

<?
	ftp_quit($ftp);
	phpftp_bottom();
}


function phpftp_mkdir($phpftp_dir,$new_dir)
{
	$ftp = @phpftp_connect();
	if ($phpftp_dir == "") { $phpftp_dir="/"; }
	$dir_path = $phpftp_dir . "/" . $new_dir;
	@ftp_mkdir($ftp,$dir_path);
	@ftp_quit($ftp);
	phpftp_list($phpftp_dir);
}


function phpftp_get($phpftp_dir,$select_file)
{
	$ftp = @phpftp_connect();
	ftp_chdir($ftp,$phpftp_dir);
	$tmpfile = $select_file.".0";
	ftp_get($ftp,$tmpfile,$select_file,FTP_BINARY);
	ftp_quit($ftp);
	$file_mime_type="application/octet-stream";
	header("Content-Type: ".$file_mime_type);
	header("Content-Disposition: attachment; filename=" . $select_file);
	readfile($tmpfile);
	@unlink($tmpfile);
}


function phpftp_put($phpftp_dir,$userfile,$userfile_name)
{
	$ftp = @phpftp_connect();
	ftp_chdir($ftp,$phpftp_dir);
	ftp_put($ftp,$userfile_name,$userfile,FTP_BINARY);
	ftp_quit($ftp);
	phpftp_list($phpftp_dir);
}

function delete()
{
	global $phpftp_dir;
	global $num;
	$ftp = @phpftp_connect();
	@ftp_chdir($ftp,$phpftp_dir);

	for ($i=0;$i<sizeof($num);$i++)
		{
		if (is_array($num)) $this=$num[$i]; else $this=$num;

		if ($this[0]!='/') ftp_delete($ftp,$phpftp_dir . '/' . $this);
			else ftp_rmdir($ftp,$this);
		}
	ftp_quit($ftp);
	phpftp_list($phpftp_dir);
}

switch($function) {
	case "";
		phpftp_list($phpftp_dir);
		break;
	case "get";
		phpftp_get($phpftp_dir,$select_file);
		break;
	case "put";
		phpftp_put($phpftp_dir,$userfile,$userfile_name);
		break;
	case "mkdir";
		phpftp_mkdir($phpftp_dir,$new_dir);
		break;
	case "create";
		create();
		break;
	case "delete";
		delete();
		break;
}

?>