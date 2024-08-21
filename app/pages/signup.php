<?php

if (!empty($_POST)) {
  //validate
  $errors = [];

  if (empty($_POST['username'])) {
    $errors['username'] = "A username is required";
  } else
  if (!preg_match("/^[a-zA-Z0-9 \-\_\&]+$/", $_POST['username'])) {
    $errors['username'] = "Username can only have letters and no spaces";
  }

  $query = "select id from users where email = :email limit 1";
  $email = query($query, ['email' => $_POST['email']]);

  if (empty($_POST['email'])) {
    $errors['email'] = "An email is required";
  } else
  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email";
  } else
  if ($email) {
    $errors['email'] = "That email is already in use";
  }

  if (empty($_POST['password'])) {
    $errors['password'] = "A password is required";
  } else
  if (strlen($_POST['password']) < 8) {
    $errors['password'] = "Password must be 8 character or more";
  } else
  if ($_POST['password'] !== $_POST['retype_password']) {
    $errors['password'] = "Passwords do not match";
  }

  if (empty($_POST['terms'])) {
    $errors['terms'] = "Please accept the terms";
  }

  if (empty($errors)) {
    //save to database
    $data = [];
    $data['username'] = $_POST['username'];
    $data['email']    = $_POST['email'];
    $data['role']     = "user";
    $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "insert into users (username,email,password,role) values (:username,:email,:password,:role)";
    query($query, $data);

    redirect('login');
  }
}
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <script src="<?= ROOT ?>/assets/js/color-modes.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>Signup - <?= APP_NAME ?></title>

  <link rel="apple-touch-icon" sizes="180x180" href="<?= ROOT ?>/assets/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= ROOT ?>/assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= ROOT ?>/assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">

  <link href="<?= ROOT ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      width: 100%;
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
      --bd-violet-bg: #0b5ed7;
      --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

      --bs-btn-font-weight: 600;
      --bs-btn-color: var(--bs-white);
      --bs-btn-bg: var(--bd-violet-bg);
      --bs-btn-border-color: var(--bd-violet-bg);
      --bs-btn-hover-color: var(--bs-white);
      --bs-btn-hover-bg: #007bff;
      --bs-btn-hover-border-color: #0b5ed7;
      --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
      --bs-btn-active-color: var(--bs-btn-hover-color);
      --bs-btn-active-bg: #0b5ed7;
      --bs-btn-active-border-color: #0b5ed7;
    }

    .bd-mode-toggle {
      z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
      display: block !important;
    }

    .center {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    #floatingPassword {
      margin-bottom: 0;
    }

    .form-check {
      margin-bottom: 0;
    }

    #link {
      text-decoration: none;
    }

    .unselectable {
      -webkit-touch-callout: none;
      -webkit-user-select: none;
      -khtml-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }
    .captcha {
      width: 50%;
      background: #0d6efd;
      text-align: center;
      font-size: 22px;
      font-weight: 300;
      font-style: italic;
      font-family: Impact, Haettenschweiler, 'Arial Narrow', sans-serif;
      text-decoration: line-through;
      margin: auto;
      border-radius: 50%;

    }
  </style>


  <!-- Custom styles for this template -->
  <link href="<?= ROOT ?>/assets/css/sign-in.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
<?php include '../app/pages/includes/dark-mode.php'; ?>

  <div class="form-signin w-100 m-auto">
    <main class="form-signin w-100 m-auto shadow rounded-top-3">
      <form method="post">
        <a href="<?= ROOT ?>/home">
          <div class="center">
            <img class="mb-4 shadow" src="<?= ROOT ?>/assets/images/weblogr-logo.png" alt="logo image" width="128" height="80">
          </div>
        </a>
        <h1 class="h3 mb-3 fw-normal center unselectable">Create account</h1>

        <?php if (!empty($errors)) : ?>
          <div class="alert alert-danger">Please fix the errors below</div>
        <?php endif; ?>

        <div class="mb-2 form-floating">
          <input value="<?= old_value('username') ?>" name="username" type="username" class="form-control" id="floatingInput" placeholder="name">
          <label for="floatingInput">Username</label>
        </div>
        <?php if (!empty($errors['username'])) : ?>
          <div class="text-danger"><?= $errors['username'] ?></div>
        <?php endif; ?>

        <div class="mb-2 form-floating">
          <input value="<?= old_value('email') ?>" name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <?php if (!empty($errors['email'])) : ?>
          <div class="text-danger"><?= $errors['email'] ?></div>
        <?php endif; ?>

        <div class="mb-2 form-floating">
          <input value="<?= old_value('password') ?>" name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
        <?php if (!empty($errors['password'])) : ?>
          <div class="text-danger"><?= $errors['password'] ?></div>
        <?php endif; ?>

        <div class="mb-2 form-floating">
          <input value="<?= old_value('retype_password') ?>" name="retype_password" type="password" class="form-control" id="floatingPassword" placeholder="Retype-Password">
          <label for="floatingPassword">Retype-Password</label>
        </div>

        <?php if (!empty($errors['terms'])) : ?>
          <div class="text-danger"><?= $errors['terms'] ?></div>
          <?php endif; ?>
          
        
        <div class="form-check text-start mt-4 mb-3">
          <input <?= old_checked('terms') ?> name="terms" class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
          <label class="form-check-label unselectable" for="flexCheckDefault">
            Accept terms and conditions
          </label>
        </div>
        <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Sign up</button>
        <hr>
        <div class="text-start my-2 center">
          <p class="unselectable mb-0">Already have an account? <a id="link" href="login">Log In</a></p>
        </div>
        <hr>
        <div class="text-start my-2 center">
          <p class="unselectable mb-0">For Administrator? <a id="link" href="admin-login">Log In</a></p>
        </div>
        <hr>
        <p class="my-3 text-body-secondary center">&copy; <?= date("Y") ?> Weblogr, Inc</p>
      </form>
    </main>
  </div>
  <script src="<?= ROOT ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>