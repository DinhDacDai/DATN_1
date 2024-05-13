<!-- User.php -->
<?php
	require_once 'models/Model.php';
	class User extends Model {
		// khai báo các thuộc tính của class dựa vào trường trong bảng user
		public $username;
		public $password;
		public $mobile;
		public $email;
		public $address;
		public $permission;
		public $created_at;
		public $updated_at;
		
		public function getUser($username) {
			$sql_select_once = "SELECT * FROM users WHERE `username` = :username";
			$obj_select_one = $this->connection->prepare($sql_select_once);
			$arr_select = [
				':username' => $username
			];
			$obj_select_one->execute($arr_select);
			$user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
			return $user;
		}

		//Đăng ký user
		public function register() {
			$sql_insert = "INSERT INTO users (`username`, `password`) VALUES(:username, :password)";
			$obj_insert = $this->connection->prepare($sql_insert);
			//gán giá trị thật cho các placeholder
			$arr_insert = [
				':username' => $this->username,
				':password' => $this->password
			];
			return $obj_insert->execute($arr_insert);
		}

		public function getUserLogin($username, $password) {
			$sql_select_one = "SELECT * FROM users WHERE `username` = :username  AND `password` = :password AND `permission` = 1 ";
			$obj_select_one = $this->connection->prepare($sql_select_one);
			// truyền giá trị thật cho các placeholder trong câu truy vấn
			$arr_select = [
				':username' => $username,
				':password' => $password,
			];
			//thực thi truy vấn
			$obj_select_one->execute($arr_select);
			$user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
			return $user;
		}
		public function getAll() {
			$sql_select_all = "SELECT * FROM users";
			$obj_select_all = $this->connection->prepare($sql_select_all);
			$obj_select_all->execute();
			return $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
		}
	
		// Lấy thông tin người dùng bởi ID
		public function getById($id) {
			$sql_select = "SELECT * FROM users WHERE id = :id";
			$obj_select = $this->connection->prepare($sql_select);
			$obj_select->execute(array(':id' => $id));
			
			$result = $obj_select->fetch(PDO::FETCH_ASSOC);
			
			if ($result) {
				$user = new User();
				$user->id = $result['id'];
				$user->username = $result['username'];
				$user->password = $result['password'];
				// Thêm các trường thông tin khác tùy thuộc vào cấu trúc bảng người dùng
				return $user;
			} else {
				return null;
			}
		}
	
		// Thêm người dùng mới
		public function insert()
		{
			$sql_insert = "INSERT INTO users (username, password, mobile, email, address, permission, created_at, updated_at) 
						   VALUES (:username, :password, :mobile, :email, :address, :permission, :created_at, :updated_at)";
			$obj_insert = $this->connection->prepare($sql_insert);
			$current_time = date('Y-m-d H:i:s');
			return $obj_insert->execute(array(
				':username' => $this->username,
				':password' => $this->password,
				':mobile' => $this->mobile,
				':email' => $this->email,
				':address' => $this->address,
				':permission' => $this->permission,
				':created_at' => $current_time,
				':updated_at' => $current_time
			));
		}
	
		// Phương thức cập nhật thông tin của người dùng trong cơ sở dữ liệu
		public function update($id)
		{
			$sql_update = "UPDATE users 
						   SET username = :username, password = :password, mobile = :mobile, 
							   email = :email, address = :address,permission = :permission, updated_at = :updated_at 
						   WHERE id = :id";
			$obj_update = $this->connection->prepare($sql_update);
			$current_time = date('Y-m-d H:i:s');
			return $obj_update->execute(array(
				':username' => $this->username,
				':password' => $this->password,
				':mobile' => $this->mobile,
				':email' => $this->email,
				':address' => $this->address,
				':permission' => $this->permission,
				':updated_at' => $current_time,
				':id' => $id
			));
		}
	
		public function delete($id) {
			$sql_delete = "DELETE FROM users WHERE id = :id";
			$obj_delete = $this->connection->prepare($sql_delete);
			return $obj_delete->execute(array(':id' => $id));
		}

	} 
 ?>