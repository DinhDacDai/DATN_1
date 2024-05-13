<?php

require_once 'controllers/Controller.php';
require_once 'models/Order.php';
function getAllDatesInMonth($year, $month) {
    $numDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $dates = [];
    for ($day = 1; $day <= $numDays; $day++) {
        $dates[] = sprintf('%04d-%02d-%02d', $year, $month, $day);
    }
    return $dates;
}
class ThongkeController extends Controller
{
    
    public function index()
    {
        // Lấy tất cả các ngày trong tháng hiện tại
        $currentYear = date('Y');
        $currentMonth = date('m');
        $datesInMonth = getAllDatesInMonth($currentYear, $currentMonth);
    
        
            // Khởi tạo đối tượng Order để truy xuất dữ liệu từ bảng orders
            $order_model = new Order();
            
            // Kiểm tra xem có dữ liệu POST được gửi đi hay không
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $startDate = $_POST["start_date"];
                $endDate = $_POST["end_date"];
                
                // Xử lý dữ liệu theo khoảng thời gian được chọn
                $daily_order_total = [];
                $startTimestamp = strtotime($startDate);
                $endTimestamp = strtotime($endDate);
                for ($currentTimestamp = $startTimestamp; $currentTimestamp <= $endTimestamp; $currentTimestamp += 86400) {
                    $currentDate = date('Y-m-d', $currentTimestamp);
                    $total = $order_model->getTotalByDate($currentDate);
                    $daily_order_total[] = $total;
                }
            } else {
                // Mặc định hiển thị dữ liệu cho tháng hiện tại
                $currentYear = date('Y');
                $currentMonth = date('m');
                $datesInMonth = getAllDatesInMonth($currentYear, $currentMonth);
            }
            
            // Gửi dữ liệu đã xử lý đến view để hiển thị
            $this->content = $this->render('views/thongke/index.php', [
                'chart_labels' => isset($datesInMonth) ? json_encode($datesInMonth) : null,
                'chart_data' => isset($daily_order_total) ? json_encode($daily_order_total) : null
            ]);
            
            // Nhúng layout để hiển thị nội dung view
            require_once 'views/layouts/main.php';
        }
}
