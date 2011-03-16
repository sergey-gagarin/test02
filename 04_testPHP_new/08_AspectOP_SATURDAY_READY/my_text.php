
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  
  <title>Movie Site - <?php echo $_REQUEST['u_movie']; ?></title>
  </head>
  <body>

<?php


$text =<<<MORETEXT
 nvolves replacing the opening bracket with a colon (:) and replacing the closing 
bracket with endif;, endwhile;,
MORETEXT;

echo $text;
 



$t=<<<SOMETEXT
<p>Anyone who at least once participated in the development of commercial software, 
knows how difficult it is to solve the issue of updating the final product. 
Certainly, we are all aware of the existence of the version control software – for instance, 
CVS (Concurrent Versions System, http://en.wikipedia.org/wiki/Concurrent_Versions_System ).
Yet the problem is that every new product, based on the previous one, requires certain customization, 
and more often than not it is not at all easy to find out whether the update is 
going to affect areas customized for a specific project. Some of you have surely 
encountered cases when after an update you had to restore the whole project from back-up copies.
 And now just try to imagine a case when 'disappearance' of customized features is noticed only 
 a long time after the update! 'Well, where does AOSD come in?' you may ask. 
 The thing is that  AOSD can exactly enable us to address this issue: 
 the whole customization code can be placed outside the project s business logic as 
 crosscutting concerns. You only have to define the Aspect of interest, specify 
 the area of its application (Pointcut) and elaborate the corresponding functionality code.
  It is worthwhile trying to imagine how exactly this is going to work.
</p>
SOMETEXT;
  
  print $t;
  

 $conclusion = <<<CONCL
  <p>
      Perhaps, some are confused by the fact that at present PHP does not officially support AOSD.
       Yet in this very article I have presented several examples of how you can easily integrate
        basic AOSD approaches on your own. It is the essence of AOSD that is important, not the 
        particular way in which it is implemented. Whatever approach you chose, if you were able
         to achieve efficient decomposition in program architecture it is inevitably
          going to improve the quality of your product. Today AOSD is supported mainly
           by extensions to popular programming languages, yet the leading players on
            the market are not going to stay out of it, and AOSD is gradually finding 
            its way into the popular programming platforms 
            (http://www.internetnews.com/dev-news/print.php/3106021). 
            AOSD is not going to become a new technological revolution, yet evolution, 
            on the other hand, is inevitable. Whether you follow it or take the lead is a matter
             of your own choice.
             
             Resources & References

[1] Pan-Wei Ng, Ivar Jacobson. Aspect-Oriented Software Development with Use Cases. Addison Wesley Professional (Dec 30, 2004), ISBN: 0321268881.

[2] Robert E. Filman, Tzilla Elrad, Siobhan Clarke, Mehmet Aksit. Aspect-Oriented Software Development. Addison-Wesley Professional (October 6, 2004), ISBN: 0321219767.

[3] Ramnivas Laddad. Aspect Oriented Refactoring. Addison-Wesley Professional (September 29, 2006), ISBN: 0321304721.

[4] Ivan Kiselev. Aspect-Oriented Programming with AspectJ. Addison-Wesley Professional (July 17, 2002), ISBN: 0672324105.

    * http://en.wikipedia.org/wiki/Aspect-oriented_programming
    * http://eclipse.org/aspectj/
    * http://phpaspect.org/
    * http://www.aophp.net/
    * http://www.seasar.org/en/php5/index.html
    * http://www.phpclasses.org/browse/package/2633.html
    * http://www.informit.com/articles/article.asp?p=375541&rl=1
    * http://www.devx.com/Java/Article/28422
    * http://www.scriptol.org/history.php
    * http://www.ercim.org/publication/Ercim_News/enw58/mens.html
    * http://www.cs.ucl.ac.uk/staff/C.Courbis/papers/12jan04Board.ppt
    * http://www.computerworld.com/developmenttopics/development/story/0,10801,85621,00.html
  </p>
CONCL;
 
 print $conclusion;
