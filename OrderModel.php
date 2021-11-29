<?php 
	class Order extends Model
	{
		//Hàm lấy danh sách đơn hàng
		function selectOrder($id = null)
		{
			//Kiểm tra có id truyền vào không. Nếu không thì lấy toàn bộ
			if($id == null)
				$sql = "SELECT * FROM bill AS b ORDER BY b.date DESC";
			else
				$sql = "SELECT * FROM bill AS b WHERE id_bill = {$id} ORDER BY b.date DESC";

			//Thực thi câu truy vấn
			$q = $this->db->QueryResult($sql);
			//Trả về kết quả
			return $q->fetchAll(PDO::FETCH_CLASS);
		}

		//Lấy danh sách chi tiết đơn hàng
		function selectOrderDetail($id = null)
		{
			//Kiểm tra có id truyền vào không. Nếu không thì lấy toàn bộ
			if($id == null)
				$sql = "SELECT billdetail.*, product.nameProduct FROM billdetail, product where billdetail.id_product=product.id_product";
			else
				$sql = "SELECT billdetail.*, product.nameProduct FROM billdetail, product where billdetail.id_product=product.id_product and id_bill = {$id} ";

			//Thực thi câu truy vấn
			$q = $this->db->QueryResult($sql);
			//Trả về kết quả
			return $q->fetchAll(PDO::FETCH_CLASS);
		}

		//Hàm cập nhật hóa đơn
		function updateOrder($id,$stt)
		{
			//Câu truy vấn
			$sql = "UPDATE bill SET status = {$stt} WHERE id_bill = {$id}";

			//Thực thi câu truy vấn
			$q = $this->db->ExeQuery($sql);
            
			//Trả về kết quả
			return $q;
		}
	}
 ?>