<?php 
    require "backend/config/config.php";

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($mysqli->connect_errno)
    {
        echo $mysqli->connect_error;
        exit();
    }


    $category = $_GET['category'];
    if(!isset($_GET['sort_by']) || empty($_GET['sort_by'])) {
      $sort_by = "";
    }
    

    $sql_prepared = "SELECT * FROM item WHERE category = ?;";
    $statement = $mysqli->prepare($sql_prepared);
    $statement->bind_param("s",$category);

    $execute_item = $statement->execute();
    if(!$execute_item)
    {
        echo $mysqli->error;
        exit();
    }
    $result_item = $statement->get_result();
    $statement->close();

    $result_arr = array();

    while($row = $result_item->fetch_assoc())
    {
        $user_id = $row['user_id'];
        $sql_user = "SELECT * FROM user WHERE user_id = " . $user_id . ";";
        $result_user = $mysqli->query($sql_user);
        if(!$result_user)
        {
            echo $mysqli->error;
            exit();
        }
        while($row_user = $result_user->fetch_assoc())
        {
            $row['username'] = $row_user['username'];
            $row['email'] = $row_user['email']; // email for now, change to wechat_id later
            $row['contribution'] = $row_user['contribution'];
        }
        array_push($result_arr,$row);
    }

    // Sorts result array
    if ($sort_by == "time") {
      usort($result_arr, function($a, $b) {
        // Custom closure to sort by DateTime
        $ad = new DateTime($a['timestamp']);
        $bd = new DateTime($b['timestamp']);
        if ($ad == $bd) {
          return 0;
        }
        return $ad > $bd ? -1 : 1;
      });
    } else if ($sort_by == "contribution") {
      usort($result_arr, function($a, $b) {
        // Custom closure to sort by contribution
        $ac = $a['contribution'];
        $bc = $b['contribution'];
        if ($ac == $bc) {
          return 0;
        }
        return $ac > $bc ? -1 : 1;
      });
    }

    // can use $result_item to access all the items in a specific category (For post_item.html)
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>items page</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body id="body-items">
   <nav class="_nav">
    <div class="_nav__box--left">
        <h4><a href = "index.php" style = "text-decoration:none; color:black;">coronaHub</a></h4>
    </div>

    <div class="_nav__box--right">
       <?php if(isset($_SESSION['username']) && !empty($_SESSION['username'])) : ?>
      <div class="_nav__user-box">
         <img src="/assets/user-photo.jpg" alt="user photo">
         <h6><span><a href = "profile.php"><?php echo $_SESSION['username']; ?> </a></span></h6>
      </div>
      <div class="_nav__upload-box">
        <a href="item_upload.php" class="btn btn-lg btn-info mr-3">我要上传</a>
      </div>

       <div class="_nav__upload-box">
        <a href="backend/user/logout.php" class="btn btn-lg btn-info">退出</a>
      </div>

      <?php else: ?>

         <div class="_nav__login-box">
        <div><a href="login.php">登录</a>&nbsp;/&nbsp;
          <a href="signup.php">注册</a></div>
        </div>

      <div class="_nav__upload-box">
        <a href="index.php?error=请先登录" class="btn btn-lg btn-info">我要上传</a>
      </div>
    <?php endif; ?>
    </div>

  </nav>

  <nav class="nav-secondary">
    <div class="header-box">
      <h6><a href="items.php?category=mask">口罩</a></h6>
      <img src="assets/nav-mask.png" alt="mask img"> 
    </div>
    <div class="header-box">
       <h6><a href="items.php?category=goggle">护目镜</a></h6>
      <img src="assets/nav-glass.png" alt="glass img">
    </div>
    <div class="header-box">
       <h6><a href="items.php?category=sanitizer">消毒用具</a></h6>
      <img src="assets/nav-discontaminate.png" alt="discontaminate img">
    </div>
    <div class="header-box">
     <h6><a href="items.php?category=necessity">日常用品</a></h6>
      <img src="assets/nav-necessity.png" alt="necessity img">
    </div>
    <div class="header-box">
      <h6><a href = "posts.php?category=back">回国</a></h6>
      <img src="assets/nav-back.png" alt="back img">
    </div>
    <div class="header-box">
      <h6><a href = "posts.php?category=stay">留守</a></h6>
      <img src="assets/nav-stay.png" alt="stay img">
    </div>
  </nav>

  
    <form class="container-fluid" id="items-container" method="GET" action="#">

        <div class="header-nav">
            <h3 class="title-box"><?php echo $_GET['category']; ?></h3>
            
            <div class="search-box">
                <label for="search-input">搜索:</label>
                <input type="text" class="search-input" id="search-input" placeholder="关键词">
            </div>

            <div class="sorting-box input-group">
                <select name="sort_by" class="custom-select">
                    <option <?php if ($sort_by == "") echo 'selected';?> disabled>排序方式</option>
                    <option <?php if ($sort_by == "time") echo 'selected';?> value="time">时间</option>
                    <option <?php if ($sort_by == "contribution") echo 'selected';?> value="contribution">贡献值</option>
                  </select>
            </div>

            <input type="hidden" name="category" value="<?php echo $category; ?>" />

            <button class="btn btn-lg btn-primary confirm-button" type="submit" >确认</button>

            

            <div class="pagination-box">
                <ul class="pagination">
                    <li class="page-item disabled"><a class="page-link" href="#">前一页</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">后一页</a></li>
                </ul>
            </div>
        </div>

        <div class="items-box-container row row-cols-lg-5 row-cols-md-4 row-cols-sm-3 row-cols-3">
            <?php foreach($result_arr as $row) { ?>
                <div>
                    <div class="item-box--outer">
                        <div class="item-box">
                            <div class="img-box">
                                <?php $str = $row['path1'];
                                    $real_path = substr($str,6);
                                ?>
                                <img src="<?php echo $real_path; ?>" alt="mask img">
                            </div>
                            <span class="name">
                                商品名称:&nbsp;<span class="name-content"><?php echo $row['name']; ?></span>
                            </span>
                            <span class="count">
                                数量:&nbsp;<span class="count-content"><?php echo $row['amount']; ?></span>
                            </span>
                            <span class="post-time">
                                时间:&nbsp;<span class="count-content"><?php echo $row['timestamp']; ?></span>
                            </span>
                            <span class="seller">
                                卖家:&nbsp;
                                <span class="seller-content"> 
                                    <?php echo $row['username']; ?>
                                 </span>
                            </span>

                            <span class="contact">
                                联系方式:&nbsp;<span class="contact-content">
                                    <?php echo $row['email']; ?>
                                </span>
                            </span>

                            <span class="intro">
                                简介:&nbsp;<span class="intro-content">
                                    <?php echo $row['description']; ?>
                                </span>
                            </span>
                       
                        </div>
                    </div>
                </div>

            <?php } ?>  
              <!-- end of for each loop -->
        </div>

    </form>

    <script src="./bundle.js"></script>
</body>

</html>