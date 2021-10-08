<!doctype html>
<html lang="en">

<head>
    <title>JavaJam Coffee House</title>
    <meta charset=“utf-8”>
    <link rel="stylesheet" href="javajam.css">
</head>

<body>
    <?php

    @$db = new mysqli('localhost', 'f32ee', 'f32ee', 'f32ee');

    if (mysqli_connect_errno()) {
        echo 'Error: Could not connect to database.  Please try again later.';
        exit;
    }

    //get all products in database
    $product_query = "SELECT * FROM products";
    $product_result = $db->query($product_query);
    $product_id_arr = array(); //array of all product ids in key value pair with productid
    $product_name_arr = array(); //array of all product names in key value pair with productid
    $product_category_arr = array(); //array of all product categories key value pair with productid
    $product_price_arr = array(); //array of all product prices key value pair with productid

    for ($i = 0; $i < $product_result->num_rows; $i++) {
        $product_row = $product_result->fetch_assoc();
        array_push($product_id_arr, $product_row["productid"]);
        $product_name_arr[$product_row["productid"]] = $product_row["name"];
        $product_category_arr[$product_row["productid"]] = $product_row["category"];
        $product_price_arr[$product_row["productid"]] = $product_row["price"];
    }

    //get all dates where there were orders placed
    $date_query = "SELECT DISTINCT order_date FROM order_items";
    $date_result = $db->query($date_query);
    $date_arr = array();
    if ($date_result) {
        for ($i = 0; $i < $date_result->num_rows; $i++) {
            $date_row = $date_result->fetch_assoc();
            array_push($date_arr, $date_row["order_date"]);
        }
    }

    $date_arr = array_reverse($date_arr, false);

    //get date selected
    $searchdate = $_POST['searchdate'];
    if ($searchdate){
        $currentdate = $searchdate;
    } else {
        $currentdate = date("Y-m-d"); //today's date is displayed by default
    }

    $product_qty_arr = array();
    //get the total quantity sold for each product as an array in the form of (product_id => quantity, etc.)
    foreach ($product_id_arr as $product_id) {
        $query = "SELECT qty FROM order_items WHERE order_date='$currentdate' and productid=$product_id";
        $result = $db->query($query);
        $total_qty = 0;
        if ($result) {
            for ($i = 0; $i < $result->num_rows; $i++) {
                $qty_row = $result->fetch_assoc();
                $total_qty += $qty_row["qty"];
            }
        }
        $product_qty_arr[$product_id] = $total_qty;
    }

    ?>
    <div id="page-wrapper">

        <header>
        </header>

        <div id="left-column">
            <nav>
                <ul>
                    <b>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="menu.php">Menu</a></li>
                        <li><a href="music.html">Music</a></li>
                        <li><a href="jobs.html">Jobs</a></li>
                        <li><a href="daily-sales-report.html">Report</a></li>
                    </b>
                </ul>
            </nav>

        </div>

        <div id="right-column">
            <div class="content">
                <div class="content-header">
                    <h2>Total dollar sales by product on <?php echo $currentdate ?></h2>
                </div>
                <div class="change-date-container">
                    <form action="daily-sales.php" method="post">
                        <strong>View report for a different date:</strong>
                        <select name="searchdate">
                            <option disabled selected>Select</option>
                            <?php 
                            foreach ($date_arr as $date) {
                                echo "<option value=$date>$date</option>";
                            }
                            ?>
                        </select>
                        <input type="submit" value="Go">
                    </form>
                </div>
                <br>
                <div>
                    <table border="0" class="sales-table">
                        <tr>
                            <td><strong>Product Name</strong></td>
                            <td><strong>Quantity Sold</strong></td>
                            <td><strong>Total Dollar Sales ($)</strong></td>
                        </tr>
                        <?php
                        $total_sales = 0;
                        foreach ($product_id_arr as $product_id) {
                            $product_total_sales = $product_price_arr[$product_id] * $product_qty_arr[$product_id];
                            $product_total_sales_format = number_format((float)$product_total_sales, 2, '.', '');
                            echo "<tr>";
                            echo "<td>$product_name_arr[$product_id] - $product_category_arr[$product_id] </td>";
                            echo "<td>$product_qty_arr[$product_id]</td>";
                            echo "<td>$product_total_sales_format</td>";
                            echo "</tr>";
                            $total_sales += $product_total_sales;
                            $total_sales_format = number_format((float)$total_sales, 2, '.', '');
                        }
                        ?>
                    </table>
                    <br>
                    <div class="total-sales-container">
                        <strong>Total Sales: </strong> <?php echo "$" . $total_sales_format . ""; ?>
                    </div>
                    <br>

                </div>
                <br>
                <br>
                <br>
            </div>
        </div>

        <footer>
            <small><i>Copyright &copy; 2014 JavaJam Coffee House<br>
                    <a href="mailto:yuhan@liu.com">yuhan@liu.com</a>
                </i></small>
        </footer>
    </div>

    <script type="text/javascript" src="js/menu.js"></script>
</body>

</html>