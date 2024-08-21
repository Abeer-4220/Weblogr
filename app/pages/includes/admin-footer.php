<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<div class="container">
    <footer class="pt-4">
        <div class="row justify-content-center">
            <hr>
            <ul class="nav justify-content-center border-bottom mb-3 pb-3 gap-3">
                <li class="nav-item"><a href="<?= ROOT ?>/admin-home" class="nav-link px-2 text-body-secondary">Home</a></li>
                <li class="nav-item"><a href="<?= ROOT ?>/blog" class="nav-link px-2 text-body-secondary">Blogs</a></li>
                <!-- <li class="nav-item"><a href="<?= ROOT ?>/contact-us" class="nav-link px-2 text-body-secondary">Contact</a></li>
                <li class="nav-item"><a href="<?= ROOT ?>/about-us" class="nav-link px-2 text-body-secondary">About</a></li> -->
                <li class="nav-item"><a href="<?= ROOT ?>/administrator" class="nav-link px-2 text-body-secondary">Admin</a></li>
                <li class="nav-item"><a href="<?= ROOT ?>/signup" class="nav-link px-2 text-body-secondary">Sign up</a></li>
                <li class="nav-item"><a href="<?= ROOT ?>/login" class="nav-link px-2 text-body-secondary">Log in</a></li>
            </ul>

            <div class="d-flex flex-column flex-sm-row justify-content-between">

                <a href="<?= ROOT ?>/" class="mb-md-0 text-body-secondary text-decoration-none lh-1 res">
                    <img src="<?= ROOT ?>/assets/images/weblogr-logo.png" alt="logo" class="bi img" width="48" height="30">
                </a>
                <p class="text-center text-body-secondary res">&copy; <?= date("Y") ?> Weblogr, Inc</p>
                <ul class="list-unstyled d-flex res">
                    <li>
                        <a href="https://github.com/Abeer-4220" target="_blank" class="btn btn-outline-secondary social-icon">
                            <i class="fab fa-github"></i>
                        </a>
                    </li>
                </ul>
            </div>
    </footer>
</div>
</main>
</body>

<script src="<?= ROOT ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>