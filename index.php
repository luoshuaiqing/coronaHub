<?php 
  require "backend/config/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>index page</title>
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <nav class="_nav">
    <div class="_nav__box--left">
      <h4>coronaHub</h4>
    </div>

    <div class="_nav__box--right">
       <?php if(isset($_SESSION['username']) && !empty($_SESSION['username'])) : ?>
      <div class="_nav__user-box">
         <img src="/assets/user-photo.jpg" alt="user photo">
                <h6><span>同同同</span></h6>
      </div>
      <div class="_nav__upload-box">
        <a href="item_upload.php" class="btn btn-lg btn-info">我要上传</a>
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
     <h6><a href="items.php?category=daily">日常用品</a></h6>
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

  <div class="container-fluid" id="index-container">

    <div class="col-lg-4 col-sm-4 col-12">

      <div class="box--1">
        <h4 class="header">头条物资</h4>

        <div class="img-box">
          <svg>
            <use xlink:href="/assets/sprite.svg#icon-arrow-left"></use>
          </svg>
          <img src="/assets/mask.jpeg" alt="mask img">
          <svg>
            <use xlink:href="/assets/sprite.svg#icon-arrow-right"></use>
          </svg>
        </div>

        <div class="content-box">
          <div>
            <span class="content-box__header">商品名称:</span>
            <span>可爱的口罩</span>
          </div>
          <div>
            <span class="content-box__header">卖家:</span>
            <span>同同同</span>
          </div>
          <div>
            <span class="content-box__header">数量:</span>
            <span>110</span>
          </div>
          <div>
            <span class="content-box__header">联系方式:</span>
            <span>1367172498127</span>
          </div>
        </div>
      </div>

    </div>

    <div class="col-lg-4 col-sm-4 col-12">
        <h4 class="header">最新发帖咨询</h4>
        <ol class="posts-box">
          <li class="post">
            <h5 class="title"><a href="">This is a title</a></h5>
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</div>
          </li>

          <li class="post">
            <h5 class="title"><a href="">This is a title</a></h5>
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</div>
          </li>

          <li class="post">
            <h5 class="title"><a href="">This is a title</a></h5>
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</div>
          </li>

          <li class="post">
            <h5 class="title"><a href="">This is a title</a></h5>
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</div>
          </li>

          <li class="post">
            <h5 class="title"><a href="">This is a title</a></h5>
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</div>
          </li>

          <li class="post">
            <h5 class="title"><a href="">This is a title</a></h5>
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</div>
          </li>

          <li class="post">
            <h5 class="title"><a href="">This is a title</a></h5>
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</div>
          </li>

          <li class="post">
            <h5 class="title"><a href="">This is a title</a></h5>
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</div>
          </li>
          


        </ol>
      

    </div>
    <div class="col-lg-4 col-sm-4 col-12">
      <h4 class="header">贡献榜</h4>
      <ol class="contribution-box">
          <li class="contribution">
            <span>志先生</span><span>108</span>
          </li>
          
          <li class="contribution">
            <span>志先生</span><span>108</span>
          </li>
          
          <li class="contribution">
            <span>志先生</span><span>108</span>
          </li>
          
          <li class="contribution">
            <span>志先生</span><span>108</span>
          </li>
          
          

          <div class="contribution">
            <a href="#">如何提升贡献值</a>
          </div>
          <div class="contribution">
            <a href="#">贡献值能做什么</a>
          </div>
          
          

      </ol>

    </div>

  </div>








  <script src="./bundle.js"></script>
</body>

</html>