<?php
require_once 'config/mysql.php';

class Dashboard {
    private $total_food;
    private $total_table;
    private $total_order_this_month;
    private $top_food_list;
    private $total_revenue_this_month;
    private $daily_revenue_statistics;

    // Getter and Setter for $total_food
    public function getTotalFood() {
        return $this->total_food;
    }

    public function setTotalFood($totalFood) {
        $this->total_food = $totalFood;
    }

    // Getter and Setter for $total_table
    public function getTotalTable() {
        return $this->total_table;
    }

    public function setTotalTable($totalTable) {
        $this->total_table = $totalTable;
    }

    // Getter and Setter for $total_order_this_month
    public function getTotalOrderThisMonth() {
        return $this->total_order_this_month;
    }

    public function setTotalOrderThisMonth($totalOrderThisMonth) {
        $this->total_order_this_month = $totalOrderThisMonth;
    }

    // Getter and Setter for $top_food_list
    public function getTopFoodList() {
        return $this->top_food_list;
    }

    public function setTopFoodList($topFoodList) {
        $this->top_food_list = $topFoodList;
    }

    // Getter and Setter for $total_revenue_this_month
    public function getTotalRevenueThisMonth() {
        return $this->total_revenue_this_month;
    }

    public function setTotalRevenueThisMonth($totalRevenueThisMonth) {
        $this->total_revenue_this_month = $totalRevenueThisMonth;
    }

    public function getDailyRevenueStatistics() {
        return $this->daily_revenue_statistics;
    }

    public function setDailyRevenueStatistics($dailyRevenueStatistics) {
        $this->daily_revenue_statistics = $dailyRevenueStatistics;
    }

    // Static method to get dashboard data
    static function getDashboard() {
        global $conn;
        $dashboard = new DashBoard();
        $get_total_food_sql = "SELECT COUNT(food_id) AS total_food FROM foods;";
        $result = $conn->query($get_total_food_sql);
        while ($row = $result->fetch_assoc()) {
            $dashboard->setTotalFood($row['total_food']);
        }

        $get_total_order_this_month = "SELECT COUNT(order_id) AS total_order FROM orders
                                        WHERE MONTH(created_at) = MONTH(NOW());";
        $result = $conn->query($get_total_order_this_month);
        while ($row = $result->fetch_assoc()) {
            $dashboard->setTotalOrderThisMonth($row['total_order']);
        }

        $get_total_revenue = "SELECT SUM(quantity * price) AS total_revenue_this_month FROM order_items
                                WHERE MONTH(created_at) = MONTH(NOW());";

        $get_total_revenue = "SELECT get_total_revenue_this_month() AS total_revenue_this_month;";                    
        $result = $conn->query($get_total_revenue);
        while ($row = $result->fetch_assoc()) {
            $dashboard->setTotalRevenueThisMonth($row['total_revenue_this_month']);
        }

        $get_total_table_sql = "SELECT COUNT(table_id) AS total_table FROM tables;";
        $result = $conn->query($get_total_table_sql);
        while ($row = $result->fetch_assoc()) {
            $dashboard->setTotalTable($row['total_table']);
        }

        // $get_top_seller = "SELECT f.food_id, f.name, f.description, f.image_url, f.price, f.category_id, c.name AS category, SUM(oi.quantity) AS total_buy FROM foods f
        //                     INNER JOIN order_items oi ON oi.food_id = f.food_id
        //                     INNER JOIN categories c ON c.category_id = f.category_id
        //                     GROUP BY f.food_id, f.name, f.description, f.category_id
        //                     ORDER BY total_buy DESC
        //                     LIMIT 5;";
        
        $get_top_seller = "SELECT * FROM top_foods_by_sales";
        $result = $conn->query($get_top_seller);
        $list_top_seller = [];
        while ($row = $result->fetch_assoc()) {
            $list_top_seller[] = [
                'food_id' => $row['food_id'],
                'name' => $row['name'],
                'description' => $row['description'],
                'category' => $row['category'],
                'price' => $row['price'],
                'total_buy' => $row['total_buy'],
            ];
        }
        $dashboard->setTopFoodList($list_top_seller);


        // $get_daily_revenue_sql = "
        //     SELECT 
        //         DATE(payment_time) AS day,
        //         SUM(price * quantity) AS daily_revenue
        //     FROM 
        //         orders AS o
        //     JOIN 
        //         order_items AS oi ON o.order_id = oi.order_id
        //     WHERE 
        //         o.payment_status = 'paid'
        //         AND MONTH(o.payment_time) = MONTH(CURRENT_DATE)
        //         AND YEAR(o.payment_time) = YEAR(CURRENT_DATE)
        //     GROUP BY 
        //         day
        //     ORDER BY 
        //         day;";

        $get_daily_revenue_sql = "SELECT * FROM daily_revenue_by_day";

        $result = $conn->query($get_daily_revenue_sql);
        $daily_revenue_data = [];
        while ($row = $result->fetch_assoc()) {
            $daily_revenue_data[$row['day']] = $row['daily_revenue'];
        }

        // Tạo danh sách các ngày trong tuần hiện tại
        $start_of_week = new DateTime();
        $start_of_week->modify('this week');

        $daily_revenue_statistics = [];
        for ($i = 0; $i < 7; $i++) {
            $day = $start_of_week->format('Y-m-d');
            $daily_revenue_statistics[] = [
                'day' => $day,
                'daily_revenue' => $daily_revenue_data[$day] ?? 0,
            ];
            $start_of_week->modify('+1 day');
        }

        $dashboard->setDailyRevenueStatistics($daily_revenue_statistics);

        return $dashboard;
        // Add further implementation here
    }
}

?>
