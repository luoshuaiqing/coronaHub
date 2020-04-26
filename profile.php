<?php 
    require "backend/config/config.php";
     $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($mysqli->connect_errno)
    {
        echo $mysqli->connect_error;
        exit();
    }
    
    $sql_user="SELECT * FROM user WHERE user_id =" . $_SESSION['user_id'] . ";";
    $result_user = $mysqli->query($sql_user);
    if(!$result_user)
    {
      echo $mysqli->error;
      exit();
    }
    $row_user = $result_user->fetch_assoc();
    $sql_item="SELECT * FROM item WHERE user_id=" . $_SESSION["user_id"] . ";";
    $result_item = $mysqli->query($sql_item);
    if(!$result_item)
    {
      echo $mysqli->error;
      exit();
    }
    $sql_post="SELECT * FROM post WHERE author_id=" . $_SESSION["user_id"] . ";";
    $result_post = $mysqli->query($sql_post);
    if(!$result_post)
    {
      echo $mysqli->error;
      exit();
    }
    $num_post=0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>profile page</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <nav class="_nav">
        <div class="_nav__box--left">
             <h4><a href = "index.php" style = "text-decoration:none; color:black;">coronaHub</a></h4>
        </div>

        <div class="_nav__box--right">
       <?php if(isset($_SESSION['username']) && !empty($_SESSION['username'])) : ?>
      <div class="_nav__user-box">
         <img src="/assets/user-photo.jpg" alt="user photo">
                <h6><span><?php echo $_SESSION["username"]; ?></span></h6>
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
        <a href="item_upload.php" class="btn btn-lg btn-info">我要上传</a>
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
      <h6>回国</h6>
      <img src="assets/nav-back.png" alt="back img">
    </div>
    <div class="header-box">
      <h6>留守</h6>
      <img src="assets/nav-stay.png" alt="stay img">
    </div>
  </nav>


    <div class="container-fluid" id="profile-container">
        <h3 class="mt-4"><?php echo $_SESSION["username"]; ?>的主页</h3>
        <div class="container-body">
            <div class="container--left">
                <img src="/assets/user-photo.jpg" alt="user photo">
                <div class="container--left__row">
                    <svg>
                        <use xlink:href="/assets/sprite.svg#icon-user"></use>
                    </svg>
                    <span><?php echo $_SESSION["username"] ?></span>
                </div>
                <div class="container--left__row">
                    <svg>
                        <use xlink:href="/assets/sprite.svg#icon-trophy"></use>
                    </svg>
                    <span>第一发帖人</span>
                </div>
                <div class="container--left__row">
                    <svg>
                        <use xlink:href="/assets/sprite.svg#icon-star-empty"></use>
                    </svg>
                    <span><?php echo $row_user["contribution"]; ?></span>
                </div>
            </div>

            <div class="container--right">
                <div class="container--right-top">
                    <div class="profile-info-container">
                        <div class="header">
                            <h5>个人信息</h5>
                            <div class="fix">
                                <svg>
                                    <use xlink:href="/assets/sprite.svg#icon-wrench"></use>
                                </svg>
                                <span>
                                    <a href="#">修改</a>
                                </span>
                            </div>
                        </div>

                        <div class="content">
                            <div>
                                用户名: <?php echo $row_user["username"]; ?> 
                            </div>
                            <div>
                                微信: <?php echo $row_user["wechat_id"]; ?> 
                            </div>
                            <div>
                                手机: <?php echo $row_user["cellphone"]; ?> 
                            </div>
                            <div>
                                邮箱: <?php echo $row_user["email"]; ?> 
                            </div>
                        </div>    
                    </div>

                    <div class="my-items">
                        <h5>我的物资</h5>
                        <div class="img-container">
                            <?php while($row_item = $result_item->fetch_assoc()): ?>
                            <div class="img-box">
                                <img src="<?php echo $row_item['path1']; ?>" alt="mask img">
                                <div>商品名称:<?php echo $row_item["name"] ?></div>
                                <div>数量:<?php echo $row_item["amount"] ?></div>
                                <div>类别：<?php echo $row_item["category"] ?></div>>
                                <div><a href="#">修改</a></div>
                            </div>
                           <?php endwhile; ?>
                        </div>
                    </div>

                </div>

                <div class="container--right-bottom">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col"></th>
                            <th scope="col">我的帖子</th>
                            <th scope="col">预览图</th>
                            <th scope="col">发布时间</th>
                            <th scope="col">阅览</th>
                            <th scope="col">贡献值</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php while($row_post = $result_post->fetch_assoc()): ?>
                          <?php $num_post=$num_post+1 ?>
                          <tr>
                            <th scope="row"><?php echo $num_post; ?></th>
                            <td>
                                <?php echo$row_post["headline"] ?>
                            </td>
                            <td>
                                <svg class="edit">
                                    <use xlink:href="/assets/sprite.svg#icon-edit-3"></use>
                                </svg>
                            </td>
                            <td>
                                <?php echo $row_post["publish_time"] ?>
                            </td>
                            <td class="icon-container">
                                <svg>
                                    <use xlink:href="/assets/sprite.svg#icon-eye"></use>
                                </svg>
                                <?php echo $row_post["view"] ?>
                            </td>
                            <td class="icon-container">
                                <svg>
                                    <use xlink:href="/assets/sprite.svg#icon-thumbs-up"></use>
                                </svg>
                                <?php echo $row_post["thumb_up"] ?>
                            </td>
                         
                          </tr>
                        <?php endwhile; ?>
                        </tbody>
                      </table>
                </div>
                
            </div>
            
        </div>
        
    </div>








    <script src="./bundle.js"></script>
</body>

</html>