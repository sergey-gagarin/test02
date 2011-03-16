



<?php

1. Search module\search.model.php

  if ($this->w->auth->allowed("operations/index")) {
         $idx[]=array("Operations", "idx_OpsJob" );
        }

2. in operations.model.php


/**
 * Sphinx Search results 
 * **/
function printSearchTitle() {
		$buf  = $this->ident;
		return $buf;
	}
	
function printSearchListing() {
		$buf  = $this->ident;
		return $buf;
	}

function printSearchUrl() {
		//return "asset/edit/".$this->id;
		return "operations-job/editJob".$this->id;
	}
	

	
function canList(&$user) {
		return (($user->hasRole("operations_manager")) || $user->hasRole("operations_scheduler")
					|| $user->hasRole("operations_user"));
	}

	function canView(&$user) {
		return (($user->hasRole("operations_manager")) || $user->hasRole("operations_scheduler")
					|| $user->hasRole("operations_user"));
	}
	
	
	
3. 	In Flow\sphinx\conf :

#
# ============================ Operations ================================
#

source src_OpsJob
{
	type				= mysql
	sql_host			= localhost
	sql_user			= flow
	sql_pass			= flow
	sql_db				= flow
	sql_port			= 3306	# optional, default is 3306

	sql_query			= \
	SELECT * FROM ops_job,  WHERE is_deleted = 0
                
                
	sql_attr_timestamp		= dt_created

	sql_query_info			= SELECT * FROM ops_job WHERE id=$id
}
index idx_OpsJob
{
	source				= src_OpsJob
	path				= c:\sphinx\data\operations\idx_OpsJob
	docinfo				= extern
	charset_type			= sbcs
        min_prefix_len                  = 3
        prefix_fields                   = description, title, model
}




4. Create c:\sphinx\data\operations\




5. Run search index:

C:\sphinx\bin\indexer.exe index --config C:\Users\serg
workplaceGIT\FLowGIT\sphinx\conf\windows.sphinx.conf --all





6. Run search demon:

C:\sphinx\bin\searchd.exe --config C:\Users\serg
workplaceGIT\FLowGIT\sphinx\conf\windows.sphinx.conf
