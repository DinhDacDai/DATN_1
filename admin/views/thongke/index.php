<form method="POST" action="">
    <label for="start_date">Ngày bắt đầu:</label>
    <input type="date" id="start_date" name="start_date">
    <label for="end_date">Ngày kết thúc:</label>
    <input type="date" id="end_date" name="end_date">
    <button type="submit">Xem thống kê</button>
</form>
<div style="width: 80%; margin: auto;">
    <canvas id="orderChart"></canvas>
</div>

<script>
    // Lấy dữ liệu từ controller và gán vào biến JavaScript
    const labels = <?php echo $chart_labels; ?>;
    const data = <?php echo $chart_data; ?>;

    // Lấy thẻ canvas để vẽ biểu đồ
    const ctx = document.getElementById('orderChart').getContext('2d');

    // Tạo biểu đồ đường
    const orderChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Tổng tiền Đơn hàng (VNĐ)',
                data: data,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        },
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Ngày'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Tổng tiền Đơn hàng (VNĐ)'
                    }
                }
            }
        }
    });
</script>