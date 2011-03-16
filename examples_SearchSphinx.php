<?php

/**


//////////////////////////////
 * 
 * UNION Better with ident in use:

(SELECT o.ident, o.quote_id, gc.firstname, gc.extra_tile_roof_aud as par1,extra_cable_length as par2, 21 as par3
FROM ops_job as  o,  sales_gc_quote as gc
WHERE o.ident=gc.ident)
UNION
(SELECT o.ident, o.quote_id, shw.firstname, shw.tank_brand, shw.tank_type, 38
FROM ops_job as  o, sales_shw_quote as shw
WHERE  o.ident = shw.ident)
 * 
 * 
 * 
 * 
 * Final:
 * SELECT o.id AS id, o.type, o.utilities_ident, o.ident, o.status,
	  
	 gc.ident, gc.panel_brand, gc.firstname, gc.surname, gc.install_address, gc.install_suburb, 
	 shw.ident, shw.firstname, shw.surname, shw.install_address, shw.install_suburb,
	 inst.title, p.type, p.brand 
 
FROM   (( (
ops_job AS o
LEFT OUTER JOIN sales_gc_quote AS gc ON o.ident = gc.ident
)
LEFT OUTER JOIN sales_shw_quote AS shw ON o.ident = shw.ident )
LEFT OUTER JOIN ops_installer_agency AS inst ON o.installer_agency_id=inst.id)
LEFT OUTER JOIN sales_panel AS p ON gc.gc_panelkit_id=p.id
WHERE o.is_deleted =0 
ORDER BY o.quote_id ASC
                 
                 
****/                 