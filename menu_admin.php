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
  ?>
  <div id="page-wrapper">
    <header></header>

    <div id="left-column">
      <nav>
        <ul>
          <b>
            <li><a href="index.html">Home</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="menu_admin.php">Admin</a></li>
            <li><a href="music.html">Music</a></li>
            <li><a href="jobs.html">Jobs</a></li>
          </b>
        </ul>
      </nav>
    </div>

    <div id="right-column">
      <div class="content">
        <div class="content-header">
          <h2>Coffee at JavaJam</h2>
        </div>
        <form action="submit-order.php" method="post">
          <div class="menu-table">
            <table border="0">
              <tr>
                <!-- <th>Options</th> -->
                <th>Coffee Name</th>
                <th>Description</th>
                <th>Price Update</th>
              </tr>
              <tr class="j_java_row">
                <!-- <td><input type="checkbox" name="sel_j_java" id="sel_j_java"> </td> -->
                <td class="label">Just Java</td>
                <td>
                  Regular house blend, decaffeinated coffee, or flavor of the
                  day.
                  <br />
                  <div id="j_javas">
                    <strong>
                      <label><input type="radio" name="j_java" id="j_java" data-price=<?= $row_j_java["price"] ?> value="1" />Endless Cup $<?= $row_j_java["price"] ?></label>
                    </strong>
                  </div>
                </td>
                <td>
                  Endless Cup
                  <input type="text" class="qty_price" id="new_java" name="new_java" />
                </td>
              </tr>
              <tr class="ca_lait_row">
              <!-- <td><input type="checkbox" name="sel_ca_lait" id="sel_ca_lait"> </td> -->

                <td class="label">Cafe au Lait</td>
                <td>
                  House blended coffee infused into a smooth, steamed milk.<br />
                  <div id="ca_laits">
                    <strong>
                      <label><input type="radio" name="ca_lait" id="single_lait" data-price=<?= $row_single_lait["price"] ?> value="2" class="qty_price" />Single $<?= $row_single_lait["price"] ?></label>
                      <label><input type="radio" name="ca_lait" id="double_lait" data-price=<?= $row_double_lait["price"] ?> value="3" class="qty_price" />Double $<?= $row_double_lait["price"] ?></label>
                    </strong>
                  </div>
                  <span id="result"></span>
                </td>
                <td>
                  Single
                  <input type="text" class="qty_price" id="new_single_lait" name="new_single_lait" />
                  Double
                  <input type="text" class="qty_price" id="new_double_lait" name="new_double_lait" />
                </td>
              </tr>
              <tr class="i_cap_row">
              <!-- <td><input type="checkbox" name="sel_i_cap" id="sel_i_cap"> </td> -->

                <td class="label">Iced Cappuccino</td>
                <td>
                  Sweetened espresso blended with icy-cold milk and served in a
                  chilled glass.<br />
                  <div id="i_caps">
                    <strong>
                      <label><input type="radio" name="i_cap" id="single_cap" data-price=<?= $row_single_cap["price"] ?> value="4" />Single $<?= $row_single_cap["price"] ?></label>
                      <label><input type="radio" name="i_cap" id="double_cap" data-price=<?= $row_double_cap["price"] ?> value="5" />Double $<?= $row_double_cap["price"] ?></label>
                    </strong>
                    <span id="result2"></span>
                  </div>
                </td>
                <td>
                  Single
                  <input type="text" class="qty_price" id="new_single_lait" name="new_single_cap" />
                  Double
                  <input type="text" class="qty_price" id="new_double_lait" name="new_double_cap" />
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td>
                  <input type="submit" name="submit" value="Submit Changes">
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

  <script type="text/javascript" src="js/menu.js"></script>
</body>

</html>