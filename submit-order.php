<!DOCTYPE html>
<html lang="en">

<head>
    <title>JavaJam Coffee House</title>
    <meta charset="“utf-8”" />
    <link rel="stylesheet" href="javajam.css" />
</head>

<body>

    <?php

    //getting the values from the form
    $javaCategory = $_POST["j_java"];
    $qtyjava = $_POST['qty_java'];

    $laitCategory = $_POST["ca_lait"];
    $qtylait = $_POST['qty_lait'];

    $capCategory = $_POST["i_cap"];
    $qtycap = $_POST['qty_cap'];

    $order_array = array(
        array($javaCategory, $qtyjava),
        array($laitCategory, $qtylait),
        array($capCategory, $qtycap)
    );

    $currentdate = date("Y/m/d");

    @$db = new mysqli('localhost', 'f32ee', 'f32ee', 'f32ee');

    if (mysqli_connect_errno()) {
        exit;
    }

    $query = "insert into orders (order_date) values ('" . $currentdate . "')";
    $result = $db->query($query);

    if ($result) {
        $order_id = $db->insert_id;
    }

    foreach ($order_array as $item) {
        if ($item[0] && $item[1] != 0) {
            $query = "insert into order_items (orderid, productid, qty, order_date) values ('" . $order_id . "', '" . $item[0] . "', '" . $item[1] . "', '" . $currentdate . "')";
            $insert_item_result = $db->query($query);
        }
    }

    $db->close();

    ?>

    <div id="page-wrapper">
        <header></header>

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
                    <h2>Coffee at JavaJam</h2>
                </div>
                <?php
                if ($insert_item_result) {
                    echo  "Your order has been added.";
                    echo "<br><br><br>";
                } else {
                    echo  "There was an error with your order.";
                    echo "<br><br><br>";
                }
                ?>
            </div>
        </div>

        <footer>
            <small><i>Copyright &copy; 2014 JavaJam Coffee House<br />
                    <a href="mailto:yuhan@liu.com">yuhan@liu.com</a>
                </i></small>
        </footer>


    </div>




</body>

</html>