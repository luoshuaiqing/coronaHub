<?php 
    require "backend/config/config.php";

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($mysqli->connect_errno)
    {
      echo $mysqli->connect_error;
      exit();
    }


    $category = $_GET['category'];
    $sort_by = $_GET['sort_by'];
    if (!isset($sort_by) || empty($sort_by)) {
      $sort_by = "";
    }

    $sql_prepared = "SELECT * FROM post WHERE category = ?;";
    $statement = $mysqli->prepare($sql_prepared);
    $statement->bind_param("s",$category);

    $execute_item = $statement->execute();
    if(!$execute_item)
    {
      echo $mysqli->error;
      exit();
    }

    $result_item = $statement->get_result();

    $result_arr = array();

    while($row = $result_item->fetch_assoc())
    {
        $user_id = $row['author_id'];
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

            $row['contribution'] = $row_user['contribution'];
            // email for now, change to wechat_id later
        }
        array_push($result_arr,$row);
    }

    // Sorts result array
    if ($sort_by == "time") {
      usort($result_arr, function($a, $b) {
        // Custom closure to sort by DateTime
        $ad = new DateTime($a['publish_time']);
        $bd = new DateTime($b['publish_time']);
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

    $statement->close();
    $mysqli->close();

    $cnt = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>posts page</title>
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


    <form class="container-fluid" id="posts-container" action="/posts.php" method="GET">
        <div class="header-nav">
            <h3 class="title-box">
              <?php 
                if($category=="back") 
                    echo "回国";
                else 
                    echo "留守";
              ?>

            </h3>
            
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

        <div class="posts-table">
            <div class="posts-table__header">
                <div class="post-button-container">
                    <a href="post_add.php?category=<?php echo $category;?>" class="btn btn-lg btn-outline-dark">发帖</a>
                </div>
                <div class="post-info-container">
                    <h6>发布时间</h6>
                    <h6>作者</h6>
                    <h6>阅览</h6>
                    <h6>贡献值</h6>
                </div>
            </div>

            <div class="posts-table__content">
                <div class="posts-table__row top">
                    <div class="title-container">
                        <a href="#" class="title">1. 震惊！洛杉矶大华惊现哥斯拉</a>
                        <span class="content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea com ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea com
                        </span>
                    </div>
                    <div class="post-info-container">
                        <span>
                            <svg>
                                <use xlink:href="/assets/sprite.svg#icon-calendar"></use>
                              </svg>
                            2020/2/13
                        </span>
                        <span>
                            <svg>
                                <use xlink:href="/assets/sprite.svg#icon-profile"></use>
                              </svg>
                              同同同</span>
                        <span>
                            <svg>
                                <use xlink:href="/assets/sprite.svg#icon-eye"></use>
                              </svg>
                              17</span>
                        <span>
                            <svg>
                                <use xlink:href="/assets/sprite.svg#icon-thumbs-up"></use>
                            </svg>
                              201</span>
                    </div>
                </div>
                <div class="posts-table__row top">
                    <div class="title-container">
                        <a href="#" class="title">1. 震惊！洛杉矶大华惊现哥斯拉</a>
                        <span class="content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea com ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea com
                        </span>
                    </div>
                    <div class="post-info-container">
                        <span>
                            <svg>
                                <use xlink:href="/assets/sprite.svg#icon-calendar"></use>
                              </svg>
                            2020/2/13
                        </span>
                        <span>
                            <svg>
                                <use xlink:href="/assets/sprite.svg#icon-profile"></use>
                              </svg>
                              同同同</span>
                        <span>
                            <svg>
                                <use xlink:href="/assets/sprite.svg#icon-eye"></use>
                              </svg>
                              17</span>
                        <span>
                            <svg>
                                <use xlink:href="/assets/sprite.svg#icon-thumbs-up"></use>
                              </svg>
                              201</span>
                    </div>
                </div>


                <!-- Below are user posts -->
                <?php foreach($result_arr as $row) { ?>
                  <div class="posts-table__row">
                      <div class="title-container">
                          <a href="post_view.php?id=<?php echo $row['post_id']; ?>" class="title">
                            <?php 
                              echo $cnt;
                              echo ".";
                              $cnt = $cnt+1;
                              echo $row['headline'];
                            ?>

                          </a>
                          <span class="content">
                            <?php echo $row['content']; ?>
                          </span>
                      </div>
                      <div class="post-info-container">
                          <span>
                              <svg>
                                  <use xlink:href="/assets/sprite.svg#icon-calendar"></use>
                                </svg>
                              <?php echo $row['publish_time']; ?>
                          </span>
                          <span>
                              <svg>
                                  <use xlink:href="/assets/sprite.svg#icon-profile"></use>
                                </svg>
                                <?php echo $row['username']; ?>
                          </span>
                          <span>
                              <svg>
                                  <use xlink:href="/assets/sprite.svg#icon-eye"></use>
                                </svg>
                                <?php echo $row['view']; ?>
                          </span>
                          <span>
                              <svg>
                                  <use xlink:href="/assets/sprite.svg#icon-thumbs-up"></use>
                                </svg>
                              <?php echo $row['contribution']; ?>  
                          </span>
                      </div>
                  </div>
                <?php }?>
                
            </div>

        </div> 

    </form>


    <script src="./bundle.js"></script>
</body>

</html>