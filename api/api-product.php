<?php
session_start();

if(!empty($_POST)) {
	require_once('../db/dbhelper.php');
	require_once('../utils/utility.php');

	$action = getPost('action');
	$id = getPost('id');

	switch ($action) {
		case 'add':
			addToCart($id);
			break;
		case 'delete':
			deleteItem($id);
			break;
	}
}

function deleteItem($id) {
	$cart = [];
	if(isset($_SESSION['cart'])) {
		$cart = $_SESSION['cart'];
	}
	for ($i=0; $i < count($cart); $i++) {
		if($cart[$i]['id'] == $id) {
			array_splice($cart, $i, 1);
			break;
		}
	}

	//update session
	$_SESSION['cart'] = $cart;
}

function addToCart($id) {
	$cart = [];
	if(isset($_SESSION['cart'])) {
		$cart = $_SESSION['cart'];
	}
	$isFind = false;
	for ($i=0; $i < count($cart); $i++) { //vi du chạy từ 0 đến 2 mỗi lần lặp tăng i lên 1 
		if($cart[$i]['id'] == $id) {  // kiểm tra cart tại sản phẩm ở vị trí  0 có id và bằng id được truyền vào ở dòng 37
			$cart[$i]['num']++; // nếu điều kiện ở trên đúng thì sản phẩm ở vị trí 0 có số lượng tăng lên 1 
			$isFind = true; // thì set giá trị biến isfind thành true rồi dừng
			break;
		}
	}
	if(!$isFind) { //kiểm tra nếu isfind là false thì !isfind sẽ bằng true thì điều kiện đúng
		$product = executeResult('select * from products where id = '.$id, true);
		$product['num'] = 1;
		$cart[] = $product;
	}

	//update session
	$_SESSION['cart'] = $cart;
}