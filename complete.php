<?php
session_start();

$title = 'Complete Page';
include_once('layouts/header.php');
require_once('db/dbhelper.php');
require_once('utils/utility.php');
?>
<!-- body START -->
<div class="row">
	<div class="col-md-12">
		<h1 style="text-align: center;">Complete Checkout</h1>
	</div>
</div>
<!-- body END -->
<?php
include_once('layouts/footer.php');
?>