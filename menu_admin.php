<!DOCTYPE html>
<html lang="en">

<head>
  <title>JavaJam Coffee House</title>
  <meta charset="“utf-8”" />
  <link rel="stylesheet" href="javajam.css" />
</head>

<body>
  <?php
  @$db = new mysqli('localhost', 'f32ee', 'f32ee', 'f32ee');
  if (mysqli_connect_errno()) {
    echo 'Error: Could not connect to database.  Please try again later.';
    exit;
  }

  // to fetch price data from db
  $query_j_java = "SELECT price FROM products WHERE productid=1";
  $query_single_lait = "SELECT price FROM products WHERE productid=2";
  $query_double_lait = "SELECT price FROM products WHERE productid=3";
  $query_single_cap = "SELECT price FROM products WHERE productid=4";
  $query_double_cap = "SELECT price FROM products WHERE productid=5";
  $res_j_java = $db->query($query_j_java);
  $res_single_lait = $db->query($query_single_lait);
  $res_double_lait = $db->query($query_double_lait);
  $res_single_cap = $db->query($query_single_cap);
  $res_double_cap = $db->query($query_double_cap);

  $row_j_java = $res_j_java->fetch_assoc();
  $row_single_lait = $res_single_lait->fetch_assoc();
  $row_double_lait = $res_double_lait->fetch_assoc();
  $row_single_cap = $res_single_cap->fetch_assoc();
  $row_double_cap = $res_double_cap->fetch_assoc();


  if ($_SERVER['REQUEST_METHOD'] == 'POST' and $_REQUEST['submit_changes'] == 'Submit Changes') {
    // to submit new price changes to db
    $new_java = $_POST['new_java'];
    $single_lait = $_POST['new_single_lait'];
    $double_lait = $_POST['new_double_lait'];
    $single_cap = $_POST['new_single_cap'];
    $double_cap = $_POST['new_double_cap'];

    if (!empty($new_java) and is_numeric($new_java)) {
      $query_new_java = "UPDATE products SET price = '$new_java' WHERE productid=1";
      $sub_new_java = $db->query($query_new_java);
    }
    if (!empty($single_lait) and is_numeric($single_lait)) {
      $query_single_lait = "UPDATE products SET price = '$single_lait' WHERE productid=2";
      $sub_single_lait = $db->query($query_single_lait);
    }
    if (!empty($double_lait) and is_numeric($double_lait)) {
      $query_double_lait = "UPDATE products SET price = '$double_lait' WHERE productid=3";
      $sub_double_lait = $db->query($query_double_lait);
    }
    if (!empty($single_cap) and is_numeric($single_cap)) {
      $query_single_cap = "UPDATE products SET price = '$single_cap' WHERE productid=4";
      $sub_single_cap = $db->query($query_single_cap);
    }
    if (!empty($double_cap) and is_numeric($double_cap)) {
      $query_double_cap = "UPDATE products SET price = '$double_cap' WHERE productid=5";
      $sub_double_cap = $db->query($query_double_cap);
    }

    // fetch results again from db
    $query_j_java = "SELECT price FROM products WHERE productid=1";
    $query_single_lait = "SELECT price FROM products WHERE productid=2";
    $query_double_lait = "SELECT price FROM products WHERE productid=3";
    $query_single_cap = "SELECT price FROM products WHERE productid=4";
    $query_double_cap = "SELECT price FROM products WHERE productid=5";
    $res_j_java = $db->query($query_j_java);
    $res_single_lait = $db->query($query_single_lait);
    $res_double_lait = $db->query($query_double_lait);
    $res_single_cap = $db->query($query_single_cap);
    $res_double_cap = $db->query($query_double_cap);

    $row_j_java = $res_j_java->fetch_assoc();
    $row_single_lait = $res_single_lait->fetch_assoc();
    $row_double_lait = $res_double_lait->fetch_assoc();
    $row_single_cap = $res_single_cap->fetch_assoc();
    $row_double_cap = $res_double_cap->fetch_assoc();
  }

  ?>


  <div id="page-wrapper">
    <header></header>

    <div id="left-column">
      <nav>
        <ul>
          <b>
            <li><a href="index.html">Home</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="menu_admin.php">> Admin</a></li>
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
        <form action="menu_admin.php" method="POST">
          <div class="menu-table">
            <table border="0">
              <tr>
                <th>Coffee Name</th>
                <th>Description</th>
                <th>Price Update ($)</th>
              </tr>
              <tr class="j_java_row">
                <td class="label">Just Java</td>
                <td>
                  Regular house blend, decaffeinated coffee, or flavor of the
                  day.
                  <br />
                  <div id="j_javas">
                    <strong>
                      <label><input type="checkbox" name="j_java" id="j_java" data-price=<?= $row_j_java["price"] ?> value="1" />Endless Cup $<?= $row_j_java["price"] ?></label>
                    </strong>
                  </div>
                </td>
                <td>
                  E. Cup
                  <input type="text" class="qty_price" id="new_java" name="new_java" readonly />
                </td>
              </tr>
              <tr class="ca_lait_row">
                <td class="label">Cafe au Lait</td>
                <td>
                  House blended coffee infused into a smooth, steamed milk.
                  <div id="ca_laits">
                    <strong>
                      <label><input type="checkbox" name="single_lait" id="single_lait" data-price=<?= $row_single_lait["price"] ?> value="2" />Single $<?= $row_single_lait["price"] ?></label>
                      <br>
                      <label><input type="checkbox" name="double_lait" id="double_lait" data-price=<?= $row_double_lait["price"] ?> value="3" />Double $<?= $row_double_lait["price"] ?></label>
                    </strong>
                  </div>
                  <span id="result"></span>
                </td>
                <td>
                  Single
                  <input type="text" class="qty_price" id="new_single_lait" name="new_single_lait" readonly />
                  <br><br>Double
                  <input type="text" class="qty_price" id="new_double_lait" name="new_double_lait" readonly />
                </td>
              </tr>
              <tr class="i_cap_row">
                <td class="label">Iced Cappuccino</td>
                <td>
                  Sweetened espresso blended with icy-cold milk and served in a
                  chilled glass.<br />
                  <div id="i_caps">
                    <strong>
                      <label><input type="checkbox" name="single_cap" id="single_cap" data-price=<?= $row_single_cap["price"] ?> value="4" />Single $<?= $row_single_cap["price"] ?></label>
                      <br>
                      <label><input type="checkbox" name="double_cap" id="double_cap" data-price=<?= $row_double_cap["price"] ?> value="5" />Double $<?= $row_double_cap["price"] ?></label>
                    </strong>
                    <span id="result2"></span>
                  </div>
                </td>
                <td>
                  Single
                  <input type="text" class="qty_price" id="new_single_cap" name="new_single_cap" readonly />
                  <br><br>Double
                  <input type="text" class="qty_price" id="new_double_cap" name="new_double_cap" readonly />
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td>
                  <input id="button-submit" type="submit" name="submit_changes" value="Submit Changes" style="background-color: #d1b38e; border: none; border-radius: 5px; padding: 10px; font-size: 16px">
                </td>
              </tr>
            </table>
          </div>

        </form>
        <br />
        <br />
        <br />
      </div>
    </div>

    <footer>
      <small><i>Copyright &copy; 2014 JavaJam Coffee House<br />
          <a href="mailto:yuhan@liu.com">yuhan@liu.com</a>
        </i></small>
    </footer>
  </div>

  <script type="text/javascript" src="js/menu_admin.js"></script>
</body>

</html>