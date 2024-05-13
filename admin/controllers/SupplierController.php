<?php

require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Category.php';
require_once 'models/Pagination.php';


require_once 'models/Supplier.php';

class SupplierController extends Controller
{
    public function index()
    {
        $supplier_model = new Supplier();
        $suppliers = $supplier_model->getAll();
        $arr_output = [
            'suppliers' => $suppliers
        ];

        $this->content = $this->render('views/supplier/index.php', $arr_output);
        //gọi(nhúng file) layout để gắn nội dung view đó
        require_once 'views/layouts/main.php';
    }

    //thêm mới
    public function create()
    {
        // Xử lý submit form
        if (isset($_POST['submit'])) {
            // Lấy dữ liệu từ form và gán vào đối tượng nhà cung cấp
            $supplier = new Supplier();
            $supplier->supplier = $_POST['supplier'];
            $supplier->address = $_POST['address'];
            $supplier->mobile = $_POST['mobile'];
    
            // Gọi phương thức insert() để lưu nhà cung cấp vào cơ sở dữ liệu
            if ($supplier->insert()) {
                // Nếu insert thành công, hiển thị thông báo thành công và chuyển hướng về trang danh sách nhà cung cấp
                $_SESSION['success'] = 'Thêm mới nhà cung cấp thành công';
                header('Location: index.php?controller=supplier&action=index');
                exit();
            } else {
                // Nếu insert thất bại, hiển thị thông báo lỗi
                $_SESSION['error'] = 'Thêm mới nhà cung cấp thất bại';
            }
        }
    
        // Hiển thị view để tạo mới nhà cung cấp
        $this->content = $this->render('views/supplier/create.php');
        require_once 'views/layouts/main.php';
    }
    //xóa
    public function delete()
    {
        $supplier_id = $_GET['id'];
        $supplier_model = new Supplier();
        $is_delete = $supplier_model->delete($supplier_id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa dữ liệu thành công';
        } else {
            $_SESSION['error'] = 'Xóa dữ liệu thất bại';
        }

        header('Location: index.php?controller=supplier');
        exit();
    }
    public function update()
    {
        // Kiểm tra xem ID có được cung cấp trong URL không
        if (!isset($_GET['id'])) {
            $_SESSION['error'] = 'Thiếu ID của nhà cung cấp';
            header('Location: index.php?controller=supplier&action=index');
            exit();
        }
    
        // Lấy ID từ URL
        $id = $_GET['id'];
    
        // Tạo một đối tượng Supplier để lấy thông tin nhà cung cấp từ cơ sở dữ liệu
        $supplier_model = new Supplier();
    
        // Lấy thông tin nhà cung cấp dựa trên ID
        $supplier = $supplier_model->getById($id);
    
        // Kiểm tra xem thông tin nhà cung cấp có được lấy thành công không
        if (!$supplier) {
            $_SESSION['error'] = 'Không tìm thấy nhà cung cấp';
            header('Location: index.php?controller=supplier&action=index');
            exit();
        }
    
        // Kiểm tra xem biểu mẫu có được gửi đi không
        if (isset($_POST['submit'])) {
            // Lấy dữ liệu từ biểu mẫu
            $ten_nha_cung_cap = $_POST['supplier'];
            $dia_chi = $_POST['address'];
            $so_dien_thoai = $_POST['mobile'];
    
            // Cập nhật thông tin nhà cung cấp
            $supplier->supplier = $ten_nha_cung_cap;
            $supplier->address = $dia_chi;
            $supplier->mobile = $so_dien_thoai;
    
            // Thực hiện thao tác cập nhật
            if ($supplier->update($id)) {
                // Nếu cập nhật thành công, hiển thị thông báo thành công và chuyển hướng về trang danh sách nhà cung cấp
                $_SESSION['success'] = 'Cập nhật nhà cung cấp thành công';
                header('Location: index.php?controller=supplier&action=index');
                exit();
            } else {
                // Nếu cập nhật thất bại, hiển thị thông báo lỗi
                $_SESSION['error'] = 'Cập nhật nhà cung cấp thất bại';
            }
        }
    
        // Hiển thị biểu mẫu cập nhật với thông tin nhà cung cấp hiện tại
        $this->content = $this->render('views/supplier/update.php', ['supplier' => $supplier]);
        require_once 'views/layouts/main.php';
    }
}
