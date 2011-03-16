<div id="wrapper">
<div class="content">
<?
if(isset($_GET['category'])&&isset($_GET['section'])){

////// validate input ////////////// 
/////  validate session ///////
///// assamption : home page can be quite different
    $category = $_GET['category'];
    $section = $_GET['section'];
    load_content($category,$section);
    
    } else {
      load_home_page();
    }
?>

<?
function load_content($cat,$sec){
  $sql= "SELECT * FROM sections WHERE cat_fkey='".$cat."' and sec_title='".$sec."'";
  global $db;
  $db->execute($sql);
  $sec_info = $db->get_array();

  $page_text = $sec_info['content'];
  echo $page_text;
}

function load_home_page(){
  global $db;
  $sql_h= "SELECT * FROM homepage";
  $db->execute($sql_h);
  $home_info = $db->get_array();
  $home_text = $home_info['text'];
  echo $home_text;
}
?>
</div>
</div>
