
<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
//controllers/CategoryController
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
//nhúng class phân trang
require_once 'models/Order.php';

class BaocaoController extends Controller
{
    public function index()
    {
        $order_model = new Order();
        $orders = $order_model->getAll();

        $this->content = $this->render('views/orders/index.php', [
            'orders' => $orders
        ]);
        require_once 'views/layouts/main.php';
    }

    public function detail()
    {
        $id = $_GET['id'];
        $order_model = new Order();
        $order = $order_model->getById($id);

        $this->content = $this->render('views/orders/detail.php', [
            'order' => $order
        ]);
        require_once 'views/layouts/main.php';
    }
    public function exportToExcel()
    {
    // Khởi tạo một đối tượng Spreadsheet
    $spreadsheet = new Spreadsheet();

    // Lấy active sheet
    $sheet = $spreadsheet->getActiveSheet();

    // Điền dữ liệu vào sheet
    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Customer Name');
    $sheet->setCellValue('C1', 'Order Date');

    // Lấy dữ liệu từ cơ sở dữ liệu hoặc bất kỳ nguồn dữ liệu nào khác
    $order_model = new Order();
    $orders = $order_model->getAll();

    $row = 2;
    foreach ($orders as $order) {
        $sheet->setCellValue('A' . $row, $order['id']);
        $sheet->setCellValue('B' . $row, $order['customer_name']);
        $sheet->setCellValue('C' . $row, $order['order_date']);
        $row++;
    }

    // Lưu file Excel
    $writer = new Xlsx($spreadsheet);
    $filename = 'orders.xlsx';
    $writer->save($filename);

    // Trả về đường dẫn của file Excel cho người dùng tải xuống
    return $filename;
    }

}
