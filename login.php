<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>

    <!-- Custom -->
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>
    <div class="authenticate-container-login">
      <form action="backend/user/login_email.php" method="POST" class="form-authenticate">
        <h1 class="header">用户登录</h1>
        <div class="form-img-container">
          <svg class="form-img">
            <use xlink:href="assets/sprite.svg#icon-user"></use>
          </svg>

        </div>

        <div class="my-input-group">
          <input
            class="textbox"
            type="email"
            placeholder="邮箱/用户名"
            id="email"
            pattern="^\S+$"
            name="email"
            required
          />
          <label for="email">邮箱/用户名</label>
          <span id="email-error" class="text-danger text-small error"></span>
        </div>

        <div class="my-input-group">
          <input
            type="password"
            placeholder="密码"
            id="password"
            minlength="8"
            pattern="^\S+$"
            name="password"
            required
          />
          <label for="password">密码</label>
          <div id="password-error" class="text-danger text-small error"></div>
          <div id="error" class="text-danger text-center error"></div>
        </div>

        <div id="submit" class="form-button-container">
          <a href="#" id="btn-submit">登录</a>
        </div>

        <div class="form-button-link">
          <a href="signup.php"
            ><span>现在注册!</span></a
          >
        </div>
      </form>
    </div>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- bootstrap -->
    <script src="./bundle.js"></script>
    <!-- Custom -->
    <script src="js/login.js"></script>
  </body>
</html>
