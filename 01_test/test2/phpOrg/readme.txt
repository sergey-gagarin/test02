HI GUYS

Thanx for downloading this backend. it is a combination of modificated files from the Ramshackle backdoor (www.ramshackle.nl) and the Bonneville OneFile project (www.bonneville.nl/software/OneFile/). Features: notes, calendar, addressbook, email, ftp, bookmarks. It is designed to be small, to the point and useful.


INSTALLING

you have to put all the files in one directory and set the permissions of the directory (!!!) and the datafiles ( the non-php files ) to 777: writeable for everyone. this setting of permissions, or CHMOD, as it is officially called, is a standard feature of most FTP programs. 

now everything works except the EMAIL and FTP scripts. To make them work you have to open the files onemail.php and oneftp.php in a text editor and right at the top of the files insert your email/ftp account name, username and password, replacing the dummy text i have put in there.


GOOD LUCK

some sort of password protection might be a good idea. i myself use a protected directory, an option of my apache server. if you don't have it included in your admin software try searching for 'htaccess' in hotscripts.com or something similar. 

greetz jeroen (www.jeroenwijering.com - mail@jeroenwijering.com)


TROUBLESHOOTING

if you get an error that the command imap_open() is not understood, you have an outdated php version. the only solution is to install a newer version of PHP or switch to a server with a more up-to-date php running.

if you are having trouble with FTP and are sure your accountsettings are OK, make sure the DIR you have put the files into is writable ( eg. chmod 777 ), since the FTP script puts an intermediate copy of the file in this DIR.