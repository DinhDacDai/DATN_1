<?php

require_once 'controllers/Controller.php';
require_once 'models/User.php';

class UserController extends Controller
{
    public function index()
    {
        $user_model = new User();
        $users = $user_model->getAll();
        $arr_output = [
            'users' => $users
        ];

        $this->content = $this->render('views/users/index.php', $arr_output);
        //gọi(nhúng file) layout để gắn nội dung view đó
        require_once 'views/layouts/main.php';
    }
    public function create()
    {
        // Xử lý submit form
        if (isset($_POST['submit'])) {
            // Kiểm tra xem tất cả các trường đã được điền đầy đủ hay không
            
            if (isset($_POST['username']) && isset($_POST['password']) ) {
                
                // Lấy dữ liệu từ form và gán vào đối tượng tài khoản
                $user = new User();
                $user->username = $_POST['username'];
                $user->password = $_POST['password'];
                $user->email = $_POST['email'];
                $user->mobile = $_POST['mobile'];
                $user->address = $_POST['address'];
                $user->permission = $_POST['permission'];
                $user->created_at = $_POST['created_at'];    
                $user->updated_at = $_POST['updated_at'];
    
                // Kiểm tra các điều kiện khác, nếu cần thiết
                
                // Gọi phương thức insert() để lưu tài khoản vào cơ sở dữ liệu
                if ($user->insert()) {
                    // Nếu insert thành công, hiển thị thông báo thành công và chuyển hướng về trang danh sách tài khoản
                    $_SESSION['success'] = 'Thêm mới tài khoản thành công';
                    header('Location: index.php?controller=user&action=index');
                    exit();
                } else {
                    // Nếu insert thất bại, hiển thị thông báo lỗi
                    $_SESSION['error'] = 'Thêm mới tài khoản thất bại';
                }
            } else {
                // Nếu thiếu dữ liệu trong form, hiển thị thông báo lỗi
                $_SESSION['error'] = 'Vui lòng điền đầy đủ tên tài khoản và mật khẩu';
            }
        }
    
        // Hiển thị view để tạo mới tài khoản
        $this->content = $this->render('views/users/create.php');
        require_once 'views/layouts/main.php';
    }


    public function delete()
    {
        $user_id = $_GET['id'];
        $user_model = new User();
        $is_delete = $user_model->delete($user_id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa dữ liệu thành công';
        } else {
            $_SESSION['error'] = 'Xóa dữ liệu thất bại';
        }

        header('Location: index.php?controller=user');
        exit();
    }
    public function update()
    {
      
      
        // Lấy ID từ URL
        $id = $_GET['id'];
    
        // Tạo một đối tượng Supplier để lấy thông tin tài khoản từ cơ sở dữ liệu
        $user_model = new User();
    
        // Lấy thông tin tài khoản dựa trên ID
        $user = $user_model->getById($id);
    
        // Kiểm tra xem thông tin tài khoản có được lấy thành công không
        if (!$user) {
            $_SESSION['error'] = 'Không tìm thấy tài khoản';
            header('Location: index.php?controller=user&action=index');
            exit();
        }
    
        // Kiểm tra xem biểu mẫu có được gửi đi không
        if (isset($_POST['submit'])) {

            // Lấy dữ liệu từ biểu mẫu
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $address = $_POST['address'];
            $permission = $_POST['permission'];
            $created_at = $_POST['created_at'];    
            $updated_at = $_POST['updated_at'];
    
            // Cập nhật thông tin tài khoản
            $user->username = $username;
            $user->password = $password;
            $user->email = $email;
            $user->mobile = $mobile;
            $user->address = $address;
            $user->permission = $permission;
            $user->created_at = $created_at;    
            $user->updated_at = $updated_at;
    
            // Thực hiện thao tác cập nhật
            if ($user->update($id)) {
                // Nếu cập nhật thành công, hiển thị thông báo thành công và chuyển hướng về trang danh sách tài khoản
                $_SESSION['success'] = 'Cập nhật tài khoản thành công';
                header('Location: index.php?controller=user&action=index');
                exit();
            } else {
                // Nếu cập nhật thất bại, hiển thị thông báo lỗi
                $_SESSION['error'] = 'Cập nhật tài khoản thất bại';
            }
        }
        
    
        // Hiển thị biểu mẫu cập nhật với thông tin tài khoản hiện tại
        $this->content = $this->render('views/users/update.php', ['user' => $user]);
        require_once 'views/layouts/main.php';
    }
}

?>