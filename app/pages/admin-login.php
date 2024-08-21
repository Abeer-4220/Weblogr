<?php

if (!empty($_POST)) {
  //validate
  $errors = [];

  $query = "select * from admin where email = :email limit 1";
  $row = query($query, ['email' => $_POST['email']]);

  if ($row) {
    $data = [];
    if (password_verify($_POST['password'], $row[0]['password'])) {
      //grant access
      authenticate($row[0]);
      redirect('administrator');
    } else {
      $errors['email'] = "Invalid email or password";
    }
  } else {
    $errors['email'] = "Invalid email or password";
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
  <title>Login - <?= APP_NAME ?></title>

  <link rel="apple-touch-icon" sizes="180x180" href="<?= ROOT ?>/assets/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= ROOT ?>/assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= ROOT ?>/assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cabin:ital@1&display=swap" rel="stylesheet">

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

    .font {
      font-family: 'Cabin', sans-serif;
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
        <h1 class="h3 mb-3 fw-normal center unselectable font">Unleash your story</h1>
        <hr>
        <h1 class="h4 mb-3 fw-normal center unselectable">Administrator</h1>

        <?php if (!empty($errors['email'])) : ?>
          <div class="alert alert-danger"><?= $errors['email'] ?></div>
        <?php endif; ?>


        <div class="mb-2 form-floating">
          <input value="<?= old_value('email') ?>" name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="mb-2 form-floating">
          <input value="<?= old_value('password') ?>" name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>

        <button class="btn btn-primary w-100 py-2 mt-3 mb-2" type="submit">Log in</button>
        <hr>
        <div class="text-start my-3 center">
          <p class="unselectable mb-0">For Common User? <a id="link" href="<?= ROOT ?>/login">Log In</a></p>
        </div>
        <hr>
        
        <p class="my-3 text-body-secondary center">&copy; <?= date("Y") ?> Weblogr, Inc</p>
      </form>
    </main>
  </div>
  <script src="<?= ROOT ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>