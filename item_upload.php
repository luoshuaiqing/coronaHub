<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>upload item page</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <nav class="_nav">
        <div class="_nav__box--left">
            <h4>coronaHub</h4>
        </div>

        <div class="_nav__box--right">
            <div class="_nav__user-box">
                <img src="/assets/user-photo.jpg" alt="user photo">
                <h6><span>同同同</span></h6>
            </div>

            <div class="_nav__upload-box">
                <a href="# " class="btn btn-lg btn-info">我要上传</a>
            </div>
        </div>

    </nav>

    <nav class="nav-secondary">
        <div class="header-box">
            <h6><a href="#">口罩</a></h6>
            <img src="assets/nav-mask.png" alt="mask img">
        </div>
        <div class="header-box">
            <h6>护目镜</h6>
            <img src="assets/nav-glass.png" alt="glass img">
        </div>
        <div class="header-box">
            <h6>消毒用具</h6>
            <img src="assets/nav-discontaminate.png" alt="discontaminate img">
        </div>
        <div class="header-box">
            <h6>日常用品</h6>
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
    <form class="container-fluid upload-form" id="post-item-container" action="backend/item/create_item.php" method="POST" enctype="multipart/form-data">
        <div class="header-nav">
            <h3 class="title-box">物品上传</h3>
        </div>

        <div class="post-item-form upload-form__content">
            <div class="name-box">
                <span class="title">名称</span>
                <div class="content"><input type="text" class="name-input" name="name"></div>
            </div>
            <div class="category-box">
                <span class="title">分类</span>
                <div class="content">
                    <div class="img-box">
                        <img src="assets/nav-mask.png" alt="mask img">
                        <input type="checkbox" class="hidden" name="mask">
                    </div>
                    <span>口罩</span>
                    <div class="img-box">
                        <img src="assets/nav-glass.png" alt="glass img">
                        <input type="checkbox" class="hidden" name="goggle">
                    </div>
                    <span>护目镜</span>
                    <div class="img-box">
                        <img src="assets/nav-discontaminate.png" alt="discontaminate img">
                        <input type="checkbox" class="hidden" name="discontaminate">
                    </div>
                    <span>消毒用具</span>
                    <div class="img-box">
                        <img src="assets/nav-necessity.png" alt="necessity img">
                        <input type="checkbox" class="hidden" name="necessity">
                    </div>
                    <span>日常用品</span>
                </div>
            </div>

            <div class="count-box">
                <span class="title">数量</span>
                <div class="content input-group">
                    <input type="text" class="count-input" name="amount">
                </div>
            </div>
            <div class="upload-box">
                <span class="title">图片</span>
                <div id="add-upload-box">
                    <div class="input-group content">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="picture1" id="picture1">
                            <label class="custom-file-label" for="picture1">上传</label>
                        </div>
                    </div>
                </div>
                
                <button class="btn btn-lg btn-info" id="btn-upload-another">继续上传</button>
            </div>
            <div class="intro-box">
                <span class="title">简介</span>
                <div class="content input-group">
                    <textarea class="form-control" name="description"></textarea>
                  </div>
            </div>
            <div class="contact-box">
                <span class="title">联系方式</span>
                <div class="content input-group">
                    <input type="text" class="contact-input">
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


        </div>
    </form>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


    <!-- bootstrap -->
    <script src="./bundle.js"></script>
    <script src="js/item_upload.js"></script>
</body>

</html>