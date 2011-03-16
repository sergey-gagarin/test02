<?php


(SELECT o.ident, o.quote_id, gc.firstname
FROM ops_job as  o,  sales_gc_quote as gc
WHERE o.quote_id=gc.id)
UNION
(SELECT o.ident, o.quote_id, shw.firstname
FROM ops_job as  o, sales_shw_quote as shw
WHERE  o.quote_id = shw.id)

   Based on .id:
(SELECT o.ident, o.quote_id, gc.firstname, gc.extra_tile_roof_aud as par1,extra_cable_length as par2, 21 as par3
FROM ops_job as  o,  sales_gc_quote as gc
WHERE o.quote_id=gc.id)
UNION
(SELECT o.ident, o.quote_id, shw.firstname, shw.tank_brand, shw.tank_type, 38
FROM ops_job as  o, sales_shw_quote as shw
WHERE  o.quote_id = shw.id)

Better (ident in use):

(SELECT o.ident, o.quote_id, gc.firstname, gc.extra_tile_roof_aud as par1,extra_cable_length as par2, 21 as par3
FROM ops_job as  o,  sales_gc_quote as gc
WHERE o.ident=gc.ident)
UNION
(SELECT o.ident, o.quote_id, shw.firstname, shw.tank_brand, shw.tank_type, 38
FROM ops_job as  o, sales_shw_quote as shw
WHERE  o.ident = shw.ident)


Ok as well (ident in use):
SELECT o.ident, o.quote_id, gc.ident AS GCident, gc.firstname AS GCfirstname, gc.extra_tile_roof_aud AS par1, extra_cable_length AS par2, 21 AS par3, shw.ident AS SHWident, shw.firstname AS SHWfirstname, shw.tank_brand, shw.tank_type, 38
FROM (
ops_job AS o
LEFT OUTER JOIN sales_gc_quote AS gc ON o.ident = gc.ident
)
LEFT OUTER JOIN sales_shw_quote AS shw ON o.ident = shw.ident
ORDER BY `o`.`quote_id` ASC
LIMIT 0 , 30 



NOT GOOD:
SELECT o.id as Job_id, o.ident, o.quote_id,
gc.ident as GCident, gc.id as GCid, gc.firstname AS GCfirstname, gc.extra_tile_roof_aud as par1,extra_cable_length as par2, 21 as par3,

shw.ident as SHWident, shw.id as SHWid, shw.firstname AS SHWfirstname, shw.tank_brand, shw.tank_type, 38

FROM (ops_job as  o LEFT OUTER JOIN sales_gc_quote as gc
    ON o.quote_id=gc.id) LEFT OUTER JOIN sales_shw_quote as shw on o.quote_id = shw.id
    
    Results:
    for 1 job id we have a mix of GC and SHW fields:
1 	SHW002030 	30 	GC002030 	30 	Im A Test 	0.00 	0 	21 	SHW002030 	30 	Vicki 	Apricus 	Glass 	38
2 	SHW002039 	39 	GC002039 	39 	Ian 	0.00 	0 	21 	SHW002039 	39 	Rob 	Apricus 	Glass 	38
3 	SHW002042 	42 	GC002042 	42 	Harry 	0.00 	0 	21 	SHW002042 	42 	Stephanie 	Apricus 	Glass 	38
4 	SHW002043 	43 	GC002043 	43 	Max 	0.00 	0 	21 	SHW002043 	43 	Phillipa 	Apricus 	Glass 	38
5 	SHW002056 	56 	GC002056 	56 	Noel 	0.00 	0 	21 	SHW002056 	56 	Merv 	Apricus 	Glass 	38
6 	SHW002079 	79 	GC002079 	79 	Im A Test 	0.00 	0 	21 	SHW002079 	79 	Adelqui 	Apricus 	Glass Mid Element 	38
7 	SHW002081 	81 	GC002081 	81 	Lynda 	0.00 	0 	21 	SHW002081 	81 	Dennis 	Apricus 	Glass Bottom Element 	38
8

?>
