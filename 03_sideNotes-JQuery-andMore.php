<?php




		

		// http://www.dbvis.com/   -  Java client with free version
		// show graph as well, but the question is how to add more than 1 table? table with refered tables go ok.
		// Article about DB-visualizer:   http://blogs.sitepoint.com/2007/05/14/easy-database-schema-diagrams-with-dbvisualizer/
		// installed in Program Files Ok! 
		// it comes with mySQL driver .jar - easier!
		

// to se Foreign Key constraints, changes in the flow DB required:

		//1. SHOW TABLE STATUS WHERE Name = 'xxx'
		//2. ALTER TABLE my_table ENGINE = InnoDB
		
CREATE TABLE test_cats22
(
id int NOT NULL,
OrderNo int NOT NULL,
c_id int,
PRIMARY KEY (id),
FOREIGN KEY (c_id)
REFERENCES test_event_category(id)
) ENGINE = InnoDB 
		
-- Ok! FK is shown in DBVisualiser.



		// Client installed
		// squirrel - Free Java client can display schema as well
		//http://www.squirrelsql.org/index.php?page=screenshots
		
// tut http://squirrel-sql.sourceforge.net/kulvir/tutorial.html