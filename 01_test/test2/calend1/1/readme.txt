COPYRIGHT NOTICE:
(c)2002 NeoSites.com All rights reserved
WebNotes v1.0 is free for anyone to use at will.
You may redistribute, modify, change or alter any part
of this script as long as you do not modify the copyright
notices. You may not however, sell this script or package
it with other software for sale without prior written
authorization from me.

If you like this script, please let me know your thoughts.
PAUL@NEOSITES.COM

PURPOSE:
The purpose of this script is to provide a means for anyone to add a note
taking script to their PHP enabled website. I frequently need to copy/paste
text, or links into notepad... but, that does me no good if I'm not at my
local box. This just provides an easy way for me to access notes.

NOTES ABOUT THE SCRIPT:
INSTALLATION:
Unzip the contents of the "webnotesv1-0.zip" to any directory
on your server. You may need to CHMOD that directory to either
755 or 777 as the script writes files to that directory.

Point your browser to the directory that you uploaded the files
to, and it's pretty self explanitory from there.

There is no configuration involved, and no MySQL database needed.
It writes flat files for note keeping.

KEEP IN MIND:
This script reads the contents of the notes directory, and EXCLUDES
the source files: index.php, header.inc, footer.inc, view.php, edit.php & list.inc
then it writes the file listing.

If you add other files to this directory, you will need to edit the list.inc file
and add the names to exclude from the file listing on LINE 19:
($entry != "EXCLUDE THIS FILE.txt")

BUGS:
Well, I was kind of lazy, but, something I've found is that if you point your browser
to the proc.php file, and you add ?del=index.php or any of the other source files,
your source files can be deleted.

I messed around with it for a few minutes to get it to NOT do that, but, only screwed up
the script. If you have a fix for this, I'd be happy to add it, and give you credit.

Also, I tried to copy/paste javascript into one of the notes, and it messed up the page.
Again, test it for yourself, and if you can come up w/ a fix, I'd be glad to give credit.

DISCLAIMER:
I take absolutely ZERO responsibility for any damage this script may cause. I have tested
on Linux w/ PHP4 and it works fine. If it causes problems on your server, you have every
right to not use it, and uninstall it from your server.


That't it!
