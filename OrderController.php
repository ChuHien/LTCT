<?php 
	class OrderController extends Controller
	{
		private $OrderModel;
		private $productModel;
		function __construct()
		{
			require("OrderModel.php");
			require("product_model.php");
			$this->OrderModel = new Order;
			$this->productModel = new Product;
		}

		function getOrderInf()
		{
			$id = $_GET["id_bill"];
			//Tạo biến lấy danh sách chi tiết hoá đơn
			$rs = $this->OrderModel->selectOrderDetail($id);
			$bill = $this->OrderModel->selectOrder($id);
			$view = array('OrderDetailView' => 'OrderDetailView' );
			$data = array('rs' => $rs, 'Order' => $Order );

			//Đổ dữ liệu ra view
			$this->view($view,$data,false,true);
		}

		function setStatusOrder()
		{
			$stt = $_POST["slStatus"];
			$id = $_GET["id_bill"];
			// var_dump($stt);
			// var_dump($id);
			$this->OrderModel->updateOrder($id,$stt);
			header("Location: index.php?c=admin&a=listBill");
			exit;			
		}

		function cancelOrder()
		{
			$stt = $_POST["slStatus"];
			$id = $_GET["id_bill"];
			$this->OrderModel->updateOrder($id,$stt);
			header("Location: index.php?c=admin&a=listBill");
			exit;			
		}
	}
 ?>