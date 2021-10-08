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
        $product_category_arr[$product_row["productid"]] = $product_row["category"];
        $product_price_arr[$product_row["productid"]] = $product_row["price"];
    }


    //get all product categories from the database and put them in an arry (category_arr)
    $category_arr = array();
    $category_query = "SELECT DISTINCT category FROM products";
    $category_result = $db->query($category_query);
    for ($i = 0; $i < $category_result->num_rows; $i++) {
        $category_row = $category_result->fetch_assoc();
        array_push($category_arr, $category_row["category"]);
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
    if ($searchdate) {
        $currentdate = $searchdate;
    } else {
        $currentdate = date("Y-m-d"); //today's date is displayed by default
    }

    $category_qty_arr = array(); //qty of sales in that category by key value pair (category => qty)
    $category_sales_arr = array(); //total price of sales in that category by key value pair (categoyr => price)

    //initialize all values to 0 (if there are no orders in that category at all)
    foreach ($category_arr as $category) {
        $category_qty_arr[$category] = 0;
        $category_sales_arr[$category] = 0;
    }

    //get all orders made today
    $query = "SELECT * FROM order_items WHERE order_date='$currentdate'";
    $result = $db->query($query);
    if ($result) {
        for ($i = 0; $i < $result->num_rows; $i++) {
            $row = $result->fetch_assoc();
            $product_id = $row["productid"];
            //loop through the category array and check which one the product's category matches
            foreach ($category_arr as $category) {
                if ($product_category_arr[$product_id] == $category) {
                    $category_qty_arr[$category] += $row["qty"]; //if it matches, add the qty of the product to the qty of that matching category
                    $category_sales_arr[$category] += ($row["qty"] * $product_price_arr[$product_id]);
                    break;
                }
            }
        }
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
                    </b>
                </ul>
            </nav>

        </div>

        <div id="right-column">
            <div class="content">
                <div class="content-header">
                    <h2>Sales quantities by product categories on <?php echo date("Y-m-d") ?></h2>
                </div>
                <div class="change-date-container">
                    <form action="category-sales.php" method="post">
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
                    <table border="0" class="category-table">
                        <tr>
                            <td><strong>Category</strong></td>
                            <td><strong>Quantity Sold</strong></td>
                            <td><strong>Total Dollar Sales ($)</strong></td>
                        </tr>
                        <?php
                        $total_sales = 0;
                        foreach ($category_arr as $category) {
                            $category_sales = $category_sales_arr[$category];
                            $category_sales_format = number_format((float)$category_sales, 2, '.', '');
                            echo "<tr>";
                            echo "<td>$category</td>";
                            echo "<td>$category_qty_arr[$category]</td>";
                            echo "<td>$category_sales_format</td>";
                            echo "</tr>";
                        }
                        //check if there are any sales at all
                        $no_sales = true;
                        if ($result->num_rows > 0) {
                            $no_sales = false;
                            //get the category or categories with the highest dollar sales
                            $highest_category = array_keys($category_sales_arr, max($category_sales_arr));
                        }
                        ?>
                    </table>
                    <br>
                    <div class="highest-sales-container">
                        Highest dollar sale category:
                        <strong>
                            <?php
                            if ($no_sales) {
                                echo "Null - There are no sales yet today.";
                            } else {
                                foreach ($highest_category as $category) { //if there is more than one category with the same dollar sales
                                    echo $category;
                                    if ($category != end($highest_category)) {
                                        echo ", ";
                                    }
                                }
                            }
                            ?>
                        </strong>
                    </div>
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