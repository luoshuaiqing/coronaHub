<?php 
    require "backend/config/config.php";

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($mysqli->connect_errno)
    {
      echo $mysqli->connect_error;
      exit();
    }

    $post_id = $_GET['id'];
    if(!isset($post_id) || empty($post_id))
    {
        echo "Error in getting post id!";
        exit();
    }

    $sql_post = "SELECT * FROM post WHERE post_id = " . $post_id . ";";
    $result_post = $mysqli->query($sql_post);
    if(!$result_post)
    {
        echo $mysqli->error;
        exit();
    }
    $row = $result_post->fetch_assoc();
    $view = $row['view'];
    $author_id = $row['author_id'];

    $sql_author = "SELECT * FROM user WHERE user_id = " . $author_id . ";";
    $result_user = $mysqli->query($sql_author);
    if(!$result_user)
    {
        echo $mysqli->error;
        exit();
    }

    $row_user = $result_user->fetch_assoc();
    $row['username'] = $row_user['username'];
    $view+=1;
    $sql_update = "UPDATE post SET view = " . $view . " WHERE post_id = " . $post_id . ";";
    $result_update = $mysqli->query($sql_update);
    if(!$result_update)
    {
        echo $mysqli->error;
        exit();
    }
    $mysqli->close();

    // use $row to access the content of the post directly

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Posts Page</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
   <nav class="_nav">
    <div class="_nav__box--left">
        <h4><a href = "index.php" style = "text-decoration:none; color:black;">coronaHub</a></h4>
    </div>


    <div class="_nav__box--right">


         <div class="_nav__login-box">
        <div><a href="login.php">登录</a>&nbsp;/&nbsp;
          <a href="signup.php">注册</a></div>
        </div>

      <div class="_nav__upload-box">
        <a href="index.php?error=请先登录" class="btn btn-lg btn-info">我要上传</a>
      </div>
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


    <form class="container-fluid" action="/post.php" method="GET">
        <div class="header-nav">
            <h3 class="title-box">
                回国
            </h3>

        </div>

        <div class="post-detail-container container-fluid">
            <div class="post-detail-box">
                <h4 class="post-detail-header--primary">

                    <?php echo $row['headline']; ?>
                </h4>

                <div class="post-detail-header--sub">
                    <div>
                        <img src="assets/user-photo.jpg" alt="user photo">
                    <span>
                        <?php echo $row['username']; ?>
                    </span>
                    </div>
                    
                    <span>
                        <?php echo $row['update_time']; ?>
                    </span>

                    <!-- # of views -->
                    <div>
                        <svg>
                            <use xlink:href="/assets/sprite.svg#icon-eye"></use>
                        </svg>
                        <span>
                            <?php echo $row['view']; ?>
                        </span>
                    </div>  
                </div>

                <!-- Content of the post -->
                <div class="post-detail-header__content">
                    <?php echo $row['content']; ?>
                    <img src="assets/mask.jpeg" alt="post image">
                </div>

                <!-- Thumb-ups -->
                <div class="post-detail-footer">
                    <div class="icon-container">
                        <a href = "backend/post/post_click.php?post_id=<?php echo $post_id ?>&user_id=<?php echo $author_id ?>">
                            <svg>
                                <use xlink:href="/assets/sprite.svg#icon-thumbs-up"></use>
                            </svg>
                        </a>
                        <span id = "upvote"><?php echo $row['thumb_up']; ?></span>
                    </div>
                    
                    <!-- Didn't design this field to begin with, whether we should
                     add this later is up to further discussion -->
                    <div class="icon-container">
                        <svg>
                            <use xlink:href="/assets/sprite.svg#icon-thumbs-down"></use>
                        </svg>
                        <span> 10 </span>
                    </div>

                    <div class="icon-container">
                        <svg>
                            <use xlink:href="/assets/sprite.svg#icon-chat"></use>
                        </svg>
                        评论
                    </div>
                </div>
            </div>

            <!--  -->
        <!-- review 1 -->
            <!-- <div class="post-detail-review">
                <div class="post-detail-review-header">
                    <div>
                        <img src="assets/user-photo.jpg" alt="user photo">
                        <span>志先生的小跟班</span>
                    </div>
                    <div class="icon-container">
                        <svg>
                            <use xlink:href="/assets/sprite.svg#icon-chat"></use>
                        </svg>
                        评论
                    </div>
                </div>
                <div class="content">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti alias eum libero delectus, accusamus unde quos harum deserunt! In laborum ea accusamus laudantium esse consectetur labore, animi quisquam rerum nesciunt. Mollit non ex officia duis exercitation nulla non consequat cillum nisi reprehenderit sit laborum. Eu excepteur cupidatat fugiat duis cillum dolore cupidatat duis reprehenderit ex. Fugiat officia culpa exercitation ad qui nostrud irure fugiat. Laboris excepteur labore excepteur eu duis velit duis id consequat cupidatat. Commodo excepteur deserunt sint non officia commodo fugiat ullamco deserunt ea laborum culpa laboris. Ipsum consectetur in excepteur dolore aliqua irure fugiat culpa ullamco Lorem in anim. Dolore pariatur id minim irure cillum commodo nulla ex mollit enim cillum tempor.
                </div>
            </div>
            
            <div class="post-detail-review post-detail-review-followup">
                <div class="post-detail-review-header">
                    <div>
                        <img src="assets/user-photo.jpg" alt="user photo">
                        <span>志先生的小跟班</span>
                    </div>
                    <div class="icon-container">
                        <svg>
                            <use xlink:href="/assets/sprite.svg#icon-chat"></use>
                        </svg>
                        评论
                    </div>
                </div>
                <div class="content">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti alias eum libero delectus, accusamus unde quos harum deserunt! In laborum ea accusamus laudantium esse consectetur labore, animi quisquam rerum nesciunt. Mollit non ex officia duis exercitation nulla non consequat cillum nisi reprehenderit sit laborum. Eu excepteur cupidatat fugiat duis cillum dolore cupidatat duis reprehenderit ex. Fugiat officia culpa exercitation ad qui nostrud irure fugiat. Laboris excepteur labore excepteur eu duis velit duis id consequat cupidatat. Commodo excepteur deserunt sint non officia commodo fugiat ullamco deserunt ea laborum culpa laboris. Ipsum consectetur in excepteur dolore aliqua irure fugiat culpa ullamco Lorem in anim. Dolore pariatur id minim irure cillum commodo nulla ex mollit enim cillum tempor.
                </div>
            </div>
            <div class="post-detail-review post-detail-review-followup">
                <div class="post-detail-review-header">
                    <div>
                        <img src="assets/user-photo.jpg" alt="user photo">
                        <span>志先生的小跟班</span>
                    </div>
                    <div class="icon-container">
                        <svg>
                            <use xlink:href="/assets/sprite.svg#icon-chat"></use>
                        </svg>
                        评论
                    </div>
                </div>
                <div class="content">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti alias eum libero delectus, accusamus unde quos harum deserunt! In laborum ea accusamus laudantium esse consectetur labore, animi quisquam rerum nesciunt. Mollit non ex officia duis exercitation nulla non consequat cillum nisi reprehenderit sit laborum. Eu excepteur cupidatat fugiat duis cillum dolore cupidatat duis reprehenderit ex. Fugiat officia culpa exercitation ad qui nostrud irure fugiat. Laboris excepteur labore excepteur eu duis velit duis id consequat cupidatat. Commodo excepteur deserunt sint non officia commodo fugiat ullamco deserunt ea laborum culpa laboris. Ipsum consectetur in excepteur dolore aliqua irure fugiat culpa ullamco Lorem in anim. Dolore pariatur id minim irure cillum commodo nulla ex mollit enim cillum tempor.
                </div>
            </div>
        

            <div class="post-detail-review">
                <div class="post-detail-review-header">
                    <div>
                        <img src="assets/user-photo.jpg" alt="user photo">
                        <span>志先生的小跟班</span>
                    </div>
                    <div class="icon-container">
                        <svg>
                            <use xlink:href="/assets/sprite.svg#icon-chat"></use>
                        </svg>
                        评论
                    </div>
                </div>
                <div class="content">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti alias eum libero delectus, accusamus unde quos harum deserunt! In laborum ea accusamus laudantium esse consectetur labore, animi quisquam rerum nesciunt. Mollit non ex officia duis exercitation nulla non consequat cillum nisi reprehenderit sit laborum. Eu excepteur cupidatat fugiat duis cillum dolore cupidatat duis reprehenderit ex. Fugiat officia culpa exercitation ad qui nostrud irure fugiat. Laboris excepteur labore excepteur eu duis velit duis id consequat cupidatat. Commodo excepteur deserunt sint non officia commodo fugiat ullamco deserunt ea laborum culpa laboris. Ipsum consectetur in excepteur dolore aliqua irure fugiat culpa ullamco Lorem in anim. Dolore pariatur id minim irure cillum commodo nulla ex mollit enim cillum tempor.
                </div>
            </div>
         -->
        </div>
    </form>


     <script src="./bundle.js"> </script>
  <!--   <script type="text/javascript">
        document.querySelector(".icon-container").onclick = function()
        {
            var upvote = parseInt(document.getElementById("upvote").innerHTML);
          
            upvote += 1;
            
            document.querySelector("#upvote").innerHTML = upvote;

            var $this = $(this);
            if ($this.is(".icon-container")) {
                $.cookie("button1", 1, {
                    expires: 1
                });
                $this.prop("disabled", true);
            } 

            if ($.cookie("button1")) {
                $(".icon-container").prop("disabled", true);
            }
        }

    </script> -->
</body>

</html>