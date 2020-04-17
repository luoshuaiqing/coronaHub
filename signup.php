<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup Page</title>

    <!-- Custom -->
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>
    <div class="authenticate-container-signup">
      <form action="backend/user/registration_confirmation.php" class="form-authenticate" method="POST">
        <h1 class="header">用户注册</h1>
        <div class="form-img-container">
          <svg class="form-img">
            <use xlink:href="assets/sprite.svg#icon-user-plus"></use>
          </svg>
        </div>

        <div class="my-input-group">
          <input type="text" placeholder="用户名" id="username" name="username" required />
          <label for="username">用户名</label>
          <span id="username-error" class="text-danger text-small error"></span>
        </div>
        <div class="my-input-group email-box">
          <input type="email" placeholder="邮箱" id="email" name="email" required />
          <label for="email">邮箱</label>
          <button class="btn btn-lg btn-outline-info btn-send-code">发送</button>
          <span id="email-error" class="text-danger text-small error"></span>
        </div>
        <div class="my-input-group">
          <input type="text" placeholder="验证码" id="code" required />
          <label for="code">验证码</label>
          <span id="code-error" class="text-danger text-small error"></span>
        </div>
        <div class="my-input-group">
          <input type="text" placeholder="微信号" id="wechatid" name="wechatid" required />
          <label for="code">微信号</label>
          <span id="code-error" class="text-danger text-small error"></span>
        </div>
        <div class="my-input-group">
          <input
            type="password"
            placeholder="密码"
            id="password"
            minlength="8"
            name="password"
            required
          />
          <label for="password">密码</label>
          <span id="password-error" class="text-danger text-small error"></span>
        </div>
        <div class="my-input-group">
          <input
            type="password"
            placeholder="确认密码"
            id="password-repeat"
            minlength="8"
            required
          />
          <label for="password-repeat">确认密码</label>
          <div
            id="password-repeat-error"
            class="text-danger text-small error"
          ></div>
          <div id="error" class="text-danger text-center error"></div>
        </div>
        <div id="submit" class="form-button-container">
          <a href="#" id="btn-submit">注册</a>
        </div>

        <div class="form-button-link">
          <a href="login.php"
            ><span>现在登录!</span></a
          >
        </div>
      </form>
    </div>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- bootstrap -->
    <script src="./bundle.js"></script>
    <!-- Custom -->
    <script src="js/signup.js"></script>
  </body>
</html>
