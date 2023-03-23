
<?php
session_start();
// abc
//kiem tra thong tin

if(!isset($_SESSION['username'])){
	header("Location: login.php");
}else{
	$title = 'Product Page';
include_once('layouts/header.php');
require_once('db/dbhelper.php');
require_once('utils/utility.php');
?>
<div class="row">
<?php
$productList = executeResult('select * from products');
	foreach ($productList as $item) {
		echo '<div class="col-md-3" style="border: solid 2px #e9e6e6; margin-top: 10px;">
				<a href="detail.php?id='.$item['id'].'"><img src="'.$item['thumbnail'].'" style="width: 100%"></a>
				<a href="detail.php?id='.$item['id'].'"><p style="font-size: 26px;">'.$item['title'].'</p></a>
				<p style="font-size: 26px; color: red">'.number_format($item['price'], 0, '', '.').' VND</p>
			</div>';
	}
	
}
include_once('layouts/footer.php');
?>
</div>