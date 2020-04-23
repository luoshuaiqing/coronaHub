<?php 

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


    <div class="container-fluid" id="profile-container">
        <h3 class="mt-4">志同的主页</h3>
        <div class="container-body">
            <div class="container--left">
                <img src="/assets/user-photo.jpg" alt="user photo">
                <div class="container--left__row">
                    <svg>
                        <use xlink:href="/assets/sprite.svg#icon-user"></use>
                    </svg>
                    <span>志同</span>
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
                    <span>1600</span>
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
                                用户名: 
                            </div>
                            <div>
                                微信: 
                            </div>
                            <div>
                                手机: 
                            </div>
                            <div>
                                邮箱: 
                            </div>
                        </div>    
                    </div>

                    <div class="my-items">
                        <h5>我的物资</h5>
                        <div class="img-container">
                            <div class="img-box">
                                <img src="assets/mask.jpeg" alt="mask img">
                                <div>商品名称:</div>
                                <div>数量:</div>
                                <div><a href="#">修改</a></div>
                            </div>
                            <div class="img-box">
                                <img src="assets/mask.jpeg" alt="mask img">
                                <div>商品名称:</div>
                                <div>数量:</div>
                                <div><a href="#">修改</a></div>
                            </div>
                            <div class="img-box">
                                <img src="assets/mask.jpeg" alt="mask img">
                                <div>商品名称:</div>
                                <div>数量:</div>
                                <div><a href="#">修改</a></div>
                            </div>
                            <div class="img-box">
                                <img src="assets/mask.jpeg" alt="mask img">
                                <div>商品名称:</div>
                                <div>数量:</div>
                                <div><a href="#">修改</a></div>
                            </div>
                            <div class="img-box">
                                <img src="assets/mask.jpeg" alt="mask img">
                                <div>商品名称:</div>
                                <div>数量:</div>
                                <div><a href="#">修改</a></div>
                            </div>
                            <div class="img-box">
                                <img src="assets/mask.jpeg" alt="mask img">
                                <div>商品名称:</div>
                                <div>数量:</div>
                                <div><a href="#">修改</a></div>
                            </div>
                            <div class="img-box">
                                <img src="assets/mask.jpeg" alt="mask img">
                                <div>商品名称:</div>
                                <div>数量:</div>
                                <div><a href="#">修改</a></div>
                            </div>
                            <div class="img-box">
                                <img src="assets/mask.jpeg" alt="mask img">
                                <div>商品名称:</div>
                                <div>数量:</div>
                                <div><a href="#">修改</a></div>
                            </div>
                            <div class="img-box">
                                <img src="assets/mask.jpeg" alt="mask img">
                                <div>商品名称:</div>
                                <div>数量:</div>
                                <div><a href="#">修改</a></div>
                            </div>
                            <div class="img-box">
                                <img src="assets/mask.jpeg" alt="mask img">
                                <div>商品名称:</div>
                                <div>数量:</div>
                                <div><a href="#">修改</a></div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="container--right-bottom">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col"></th>
                            <th scope="col">我的帖子</th>
                            <th scope="col"></th>
                            <th scope="col">发布时间</th>
                            <th scope="col">阅览</th>
                            <th scope="col">贡献值</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                            </td>
                            <td>
                                <svg class="edit">
                                    <use xlink:href="/assets/sprite.svg#icon-edit-3"></use>
                                </svg>
                            </td>
                            <td>
                                2020/04/04
                            </td>
                            <td class="icon-container">
                                <svg>
                                    <use xlink:href="/assets/sprite.svg#icon-eye"></use>
                                </svg>
                                20
                            </td>
                            <td class="icon-container">
                                <svg>
                                    <use xlink:href="/assets/sprite.svg#icon-thumbs-up"></use>
                                </svg>
                                28
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                            </td>
                            <td>
                                <svg class="edit">
                                    <use xlink:href="/assets/sprite.svg#icon-edit-3"></use>
                                </svg>
                            </td>
                            <td>
                                2020/04/04
                            </td>
                            <td class="icon-container">
                                <svg>
                                    <use xlink:href="/assets/sprite.svg#icon-eye"></use>
                                </svg>
                                20
                            </td>
                            <td class="icon-container">
                                <svg>
                                    <use xlink:href="/assets/sprite.svg#icon-thumbs-up"></use>
                                </svg>
                                28
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                            </td>
                            <td>
                                <svg class="edit">
                                    <use xlink:href="/assets/sprite.svg#icon-edit-3"></use>
                                </svg>
                            </td>
                            <td>
                                2020/04/04
                            </td>
                            <td class="icon-container">
                                <svg>
                                    <use xlink:href="/assets/sprite.svg#icon-eye"></use>
                                </svg>
                                20
                            </td>
                            <td class="icon-container">
                                <svg>
                                    <use xlink:href="/assets/sprite.svg#icon-thumbs-up"></use>
                                </svg>
                                28
                            </td>
                          </tr>
                        </tbody>
                      </table>
                </div>
                
            </div>
            
        </div>
        
    </div>








    <script src="./bundle.js"></script>
</body>

</html>