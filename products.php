<?php
session_start();

$title = 'Product Page';
include_once('layouts/header.php');
require_once('db/dbhelper.php');
require_once('utils/utility.php');

$productList = executeResult('select * from products');
?>
<!-- body START -->
<div class="row">
<?php
foreach ($productList as $item) {
	echo '<div class="col-md-3" style="border: solid 2px #e9e6e6; margin-top: 10px;">
			<a href="detail.php?id='.$item['id'].'"><img src="'.$item['thumbnail'].'" style="width: 100%"></a>
			<a href="detail.php?id='.$item['id'].'"><p style="font-size: 26px;">'.$item['title'].'</p></a>
			<p style="font-size: 26px; color: red">'.number_format($item['price'], 0, '', '.').' VND</p>
		</div>';
}
?>
</div>
<!-- body END -->
<?php
include_once('layouts/footer.php');
?>