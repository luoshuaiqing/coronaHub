<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>edit profile page</title>
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
                <h6><span>同同同</span></h6>
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



    <!-- the classname is post item due to the previous naming issue -->
    <form class="container-fluid upload-form" id="edit-profile-container" action="#" method="POST" enctype="multipart/form-data">
        <div class="header-nav">
            <h3 class="title-box">个人信息</h3>
        </div>

        <div class="edit-profile-form upload-form__content">
            <div class="username-box">
                <span class="title">用户名</span>
                <div class="content"><input type="text" class="username-input" name="username-input"></div>
            </div>
            
            <div class="wechat-box">
                <span class="title">微信</span>
                <div class="content"><input type="text" class="wechat-input" name="wechat-input"></div>
            </div>

            <div class="phone-box">
                <span class="title">手机</span>
                <div class="content"><input type="text" class="phone-input" name="phone-input"></div>
            </div>

            <div class="email-box">
                <span class="title">邮箱</span>
                <div class="content"><input type="email" class="email-input" name="email-input"></div>
            </div>
            
            <div class="upload-box">
                <span class="title">头像</span>
                <div id="add-upload-box">
                    <div class="input-group content">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="profile-photo" id="profile-photo">
                            <label class="custom-file-label" for="profile-photo">上传</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bottom-bar">
                <button class="btn btn-lg btn-outline-info btn-cancel">取消</button>
                <button class="btn btn-lg btn-info btn-submit" type="submit">保存</button>
            </div>

        </div>
    </form>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


    <!-- bootstrap -->
    <script src="./bundle.js"></script>
    <script src="js/edit_profile.js"></script>
</body>

</html>