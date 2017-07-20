<?php
	
header("Content-Type: application/json;charset=UTF-8");
include ($_SERVER['DOCUMENT_ROOT']."/engine/api/api.class.php");

$table = "android_practic_books";
$fields  = "*";
$where = "1"; 
$multirow = 1;

if (isset($_GET['page']) && is_int(intval($_GET['page'])) && intval($_GET['page']) >= 0) {
	$start = intval($_GET['page']) * 10;
} else {
	$start = 0;
}
$limit = 10;
$sort = "id";
$sort_order = "DESC";

$m = $dle_api->load_table ($table,$fields,$where,$multirow,$start,$limit,$sort,$sort_order);

$print = "[";
$i = 0;
for ($i = 0; $i < count($m); $i++){
	if ($i != 0) {$print .= " , ";}
	$print .= "{\"id\":".$m[$i]['id'].",\"title\":\"".$m[$i]['title']."\",\"description\":\"".$m[$i]['description']."\",\"file\":\"".$m[$i]['file']."\",\"poster\":\"".$m[$i]['poster']."\"}";
}
$print .= "]";

echo $print;
?>