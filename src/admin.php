<!DOCTYPE html>

<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" type="text/css" href="Admin.css">
    <title>DailyBrew|Admin</title>
  </head>

  <body>
    <!--Navigation Bar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.html">
        <img src="../img/dblogo4.png" width="40" height="40" class="d-line-block align-top" alt="Logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav justify-content-end">
          <li class="nav-item active">
            <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="history.html">History</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Coffee
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../src/brewingM.html">Brewing methods</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../src/products.html">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../src/sign-in.html">Sign In/Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../src/cart.html">
              <i class="fas fa-shopping-cart" aria-hidden="true"></i>
              <a>
          </li>
          <form class="form-inline">
            <input class="form-control mr-sm-2 search-bar" type="search" placeholder="Search" aria-label="Search">
            <i class="fas fa-search" aria-hidden="true"></i>
          </form>
        </ul>
      </div>
    </nav>
    <!--End of Navigation Bar-->

  <!---Side bar-->
  <section class="category">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div>
            <aside class="side-area product-side side-shadow mt-5">
              <div class="side-title">
                <h3>Admin Page</h3>
              </div>

              <div class="side-content">
                <ul class="list">
                  <li>
                    <a href="#os">Order status</a>
                  </li>

                  <li>
                    <a href="#us">Users Status</a>
                  </li>
                </ul>
              </div>
            </aside>
          </div>
        </div>
        <!--End of sidebar -->

        <div class="col-lg-9">
          <div class="row">
            <div class="col-lg-12">
              <div class="product-top d-flex justify-content-between align-items-center">
                <div class="product-sec product-item">
                  <h2 class="my-5" id="os">Orders Status</h2>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-sm-6">
              <div class="table1">
                <?php
                  require "dbinfo.php";
                  
                  
                  $sql = "SELECT * FROM Orders ORDER BY userId ASC";

                  $result = mysqli_query($db, $sql);

                  print<<<HERE
                    <table>
                      <thead>
                        <tr>
                            <th>User ID</th>
                          <th>Username</th>
                          <th>Order number</th>
                          <th>Order Status</th>
                        </tr>
                      </thead>
                  HERE;

                  while ($row = mysqli_fetch_assoc($result)){
                     $userId = $row["userId"];
                    $username = $row["username"];
                    $order_no = $row["order_no"];
                    $order_status = $row["order_status"];

                    print<<<HERE
                      <tr>
                        <td>$userId</td>
                        <td>$username</td>
                        <td>$order_no</td>
                        <td>$order_status</td>
                      </tr>
                    HERE;
                  }
                  
                  print("</table></div></div>");
            ?>

          <div class="col-lg-12">
              <div class="product-top d-flex justify-content-between align-items-center">
                <div class="product-sec product-item">
                  <h2 class="my-5" id="us">Users Status</h2>
                </div>
              </div>
            </div>

          <div class="col-lg-4 col-sm-6">
              <div class="table1">
                <?php
                  require "dbinfo.php";
                  
                  
                  $sql = "SELECT * FROM Users ORDER BY userId ASC";

                  $result = mysqli_query($db, $sql);

                  print<<<HERE
                    <table>
                      <thead>
                        <tr>
                            <th>User ID</th>
                          <th>Username</th>
                          <th>User Status</th>
                        </tr>
                      </thead>
                  HERE;

                  while ($row = mysqli_fetch_assoc($result)){
                     $userId = $row["userId"];
                    $username = $row["username"];
                    $user_status = $row["status"];

                    print<<<HERE
                      <tr>
                        <td>$userId</td>
                        <td>$username</td>
                        <td>$user_status</td>
                      </tr>
                    HERE;
                  }
                  
                  print("</table></div></div>");
            ?>

        </div>
      </div>
    </div>
  </section>


  <!--Social Media Footer-->
  <hr class="db-hr">

    <center>
      <div class="contact-social py-1 my-0"></div>
      <a class="contact-social-icons" href="#"><img src="../img/facebook.svg" weight="25" title="facebook"
          height="25"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a class="contact-social-icons" href="#"><img src="../img/instagram.svg" weight="25" title="instagram"
          height="25"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a class="contact-social-icons" href="#"><img src="../img/google.svg" weight="25" title="gmail"
          height="25"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a class="contact-social-icons" href="#"><img src="../img/linkedin.svg" weight="25" title="linkedin"
          height="25"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a class="contact-social-icons" href="#"><img src="../img/whatsapp.svg" weight="25" title="whatsapp"
          height="25"></a>
      </div><br>

      <p class="my-3">Copyright © 2020 | <a class="colorcover-link" href="../src/index.html">Daily Brew</a></p>
      </div>
    </center>
     
    <!--End of social media footer-->
    <script src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
  </body>
</html>