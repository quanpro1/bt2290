<?php
session_start();

$title = 'Cart Page';
include_once('layouts/header.php');
require_once('db/dbhelper.php');
require_once('utils/utility.php');
?>
<!-- body START -->
<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Thumbnail</th>
					<th>Title</th>
					<th>Price</th>
					<th>Num</th>
					<th>Total</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
<?php
$cart = [];
if(isset($_SESSION['cart'])) {
	$cart = $_SESSION['cart'];
}
// var_dump($cart);die();
$count = 0;
$total = 0;
foreach ($cart as $item) {
	$total += $item['num'] * $item['price'];
	echo '
		<tr>
			<td>'.(++$count).'</td>
			<td><img src="'.$item['thumbnail'].'" style="width: 100px"></td>
			<td>'.$item['title'].'</td>
			<td>'.number_format($item['price'], 0, '', '.').' VND</td>
			<td>'.$item['num'].'</td>
			<td>'.number_format($item['num'] * $item['price'], 0, '', '.').' VND</td>
			<td><button class="btn btn-danger" onclick="deleteItem('.$item['id'].')">Delete</button></td>
		</tr>';
}
?>
			</tbody>
		</table>
		<p style="font-size: 26px; color: red">
			<?=number_format($total, 0, '', '.')?> VND
		</p>
		<a href="checkout.php">
			<button class="btn btn-success" style="width: 100%; font-size: 30px;">Continue</button>
		</a>
	</div>
</div>
<!-- body END -->
<script type="text/javascript">
	function deleteItem(id) {
		$.post('api/api-product.php', {
			'action': 'delete',
			'id': id
		}, function(data) {
			location.reload()
		})
	}
</script>
<?php
include_once('layouts/footer.php');
?>