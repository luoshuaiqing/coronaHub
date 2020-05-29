<?php 
    require "backend/config/config.php";
      if(!isset($_GET["id"])||empty($_GET["id"]))
    {
      $error = "Id of item is required";
    }
    else
    {
      $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
      if($mysqli->connect_errno)
      {
        echo $mysqli->connect_error;
        exit();
      }
      $sql_post="SELECT * FROM post WHERE post.post_id=". $_GET["id"] . ";";
      $result_post=$mysqli->query($sql_post);
      if(!$result_post)
      {
        echo $mysqli->error;
        exit();
      }
      $row_post=$result_post->fetch_assoc();

      $category = $row_post['category'];
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>add post page</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <!-- <script src="js/post_add.js"></script> -->
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
        <a href="../../item_upload.php" class="btn btn-lg btn-info mr-3">我要上传</a>
      </div>

       <div class="_nav__upload-box">
        <a href="../user/logout.php" class="btn btn-lg btn-info">退出</a>
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
      <img src="../../assets/nav-mask.png" alt="mask img"> 
    </div>
    <div class="header-box">
       <h6><a href="items.php?category=goggle">护目镜</a></h6>
      <img src="../../assets/nav-glass.png" alt="glass img">
    </div>
    <div class="header-box">
       <h6><a href="items.php?category=sanitizer">消毒用具</a></h6>
      <img src="../../assets/nav-discontaminate.png" alt="discontaminate img">
    </div>
    <div class="header-box">
     <h6><a href="items.php?category=necessity">日常用品</a></h6>
      <img src="../../assets/nav-necessity.png" alt="necessity img">
    </div>
    <div class="header-box">
      <h6>回国</h6>
      <img src="../../assets/nav-back.png" alt="back img">
    </div>
    <div class="header-box">
      <h6>留守</h6>
      <img src="../../assets/nav-stay.png" alt="stay img">
    </div>
  </nav>



    <!-- the classname is post item due to the previous naming issue -->
    <form class="container-fluid upload-form" id="add-post-container" action="backend/post/update_post.php" method="POST" enctype="multipart/form-data">
        <div class="header-nav">
            <h3 class="title-box">上传帖子</h3>
        </div>

        <div class="add-post-form upload-form__content">
            <div class="post-title-box">
                <span class="title"> 标题</span>
                <div class="content"><input type="text" class="post-title-input" name="headline" value=<?php echo $row_post["headline"]; ?>></div>
            </div>
            
            <div class="post-category-box">
                <span class="title">类别</span>
                <div class="content">
                  <?php if($category == "back") : ?>
                    <div class="img-box">
                        <img src="../../assets/nav-back.png" alt="back img">
                        <input type="checkbox" class = "hidden" name="back" id="back" checked>
                    </div>
                    <span>回国</span>
                    <div class="img-box">
                        <img src="../../assets/nav-stay.png" alt="stay img">
                        <input type="checkbox" class = "hidden" id="stay" name="stay" >
                    </div>
                    <span>留守</span>
                  <?php  else: ?>
                     <div class="img-box">
                        <img src="../../assets/nav-back.png" alt="back img">
                        <input type="checkbox" class = "hidden" id="back" name="back">
                    </div>
                    <span>回国</span>
                    <div class="img-box">
                        <img src="../../assets/nav-stay.png" alt="stay img">
                        <input type="checkbox" class = "hidden" name="stay" id="stay" checked>
                    </div>
                    <span>留守</span>
                  <?php endif; ?>

                </div>
            </div>
            
            <div class="post-content-box">
                <span class="title">帖子内容</span>
                <div class="content input-group">
                    <textarea class="form-control" name="content"><?php echo$row_post["content"]; ?></textarea>
                </div>
            </div>

            <div class="bottom-bar">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="bottom-checkbox">
                    <label class="form-check-label" for="bottom-checkbox">发布在首页（消耗贡献值)</label>

                </div>
                <button class="btn btn-lg btn-outline-info btn-cancel">取消</button>
                <button class="btn btn-lg btn-info btn-submit" type="submit">确定</button>
                
            </div>
            <input type="hidden" name="post_id" value="<?php echo $row_post['post_id']; ?>"/>

        </div>
    </form>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


    <!-- bootstrap -->
    <script src="./bundle.js"></script>
    <script src="js/post_add.js"></script>
</body>

</html>