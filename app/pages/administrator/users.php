<?php if ($action == 'add') : ?>
    <div class="col-md-6 mx-auto">
        <form method="post" enctype="multipart/form-data">

            <h1 class="text-center fs-3 mb-3">Create account</h1>

            <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger">Please fix the errors below</div>
            <?php endif; ?>

            <div class="my-3">
                <span class="fs-5">Profile Picture</span><br>
                <label class="d-block">
                    <img class="mx-auto d-block image-preview-edit" src="<?= get_image('') ?>" style="cursor: pointer;width: 150px;height: 150px;object-fit: contain;">
                    <input onchange="display_image_edit(this.files[0])" type="file" name="image" class="d-none">
                </label>
                <?php if (!empty($errors['image'])) : ?>
                    <div class="text-danger"><?= $errors['image'] ?></div>
                <?php endif; ?>

                <script>
                    function display_image_edit(file) {
                        document.querySelector(".image-preview-edit").src = URL.createObjectURL(file);
                    }
                </script>
            </div>


            <div class="mb-2 form-floating">
                <input value="<?= old_value('username') ?>" name="username" type="text" class="form-control mb-2" id="floatingInput" placeholder="Username">
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
                <select name="role" class="form-select">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <label for="floatingInput">Role</label>
            </div>
            <?php if (!empty($errors['role'])) : ?>
                <div class="text-danger"><?= $errors['role'] ?></div>
            <?php endif; ?>

            <div class="mb-2 form-floating">
                <input value="<?= old_value('password') ?>" name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <?php if (!empty($errors['password'])) : ?>
                <div class="text-danger"><?= $errors['password'] ?></div>
            <?php endif; ?>

            <div class="mb-2 form-floating">
                <input value="<?= old_value('retype_password') ?>" name="retype_password" type="password" class="form-control" id="floatingPassword" placeholder="Retype Password">
                <label for="floatingPassword">Retype-Password</label>
            </div>

            <a href="<?= ROOT ?>/administrator/users">
                <button class="mt-2 mb-3 btn btn-lg btn-primary btn-sm px-3 py-1" type="button">Back</button>
            </a>
            <button class="mt-2 mb-3 btn btn-lg btn-success btn-sm px-3 py-1 float-end" type="submit">Create</button>

        </form>
    </div>

<?php elseif ($action == 'edit') : ?>

    <div class="col-md-6 mx-auto">
        <form method="post" enctype="multipart/form-data">

            <h1 class="text-center fs-3 mb-3">Edit account</h1>

            <?php if (!empty($row)) : ?>

                <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger">Please fix the errors below</div>
                <?php endif; ?>

                <div class="my-3">
                    <span class="fs-5">Profile Picture</span><br>
                    <label class="d-block">
                        <img class="mx-auto d-block image-preview-edit" src="<?= get_image($row['image']) ?>" style="width: 150px;height: 150px;object-fit: contain;">
                        <!-- <input onchange="display_image_edit(this.files[0])" type="file" name="image" class="d-none"> -->
                    </label>
                    <?php if (!empty($errors['image'])) : ?>
                        <div class="text-danger"><?= $errors['image'] ?></div>
                    <?php endif; ?>

                    <script>
                        function display_image_edit(file) {
                            document.querySelector(".image-preview-edit").src = URL.createObjectURL(file);
                        }
                    </script>
                </div>

                <div style="display: none;" class="mb-2 form-floating">
                    <input value="<?= old_value('username', $row['username']) ?>" name="username" type="text" class="form-control mb-2" id="floatingInput" placeholder="Username">
                    <label for="floatingInput">Username</label>
                </div>
                <?php if (!empty($errors['username'])) : ?>
                    <div class="text-danger"><?= $errors['username'] ?></div>
                <?php endif; ?>

                <div style="display: none;" class="mb-2 form-floating">
                    <input value="<?= old_value('email', $row['email']) ?>" name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <?php if (!empty($errors['email'])) : ?>
                    <div class="text-danger"><?= $errors['email'] ?></div>
                <?php endif; ?>

                <div class="form-floating">
                    <div class="form-control mb-2" style="padding-top: 1.13rem;"><?= old_value('username', $row['username']) ?></div>
                </div>
                <?php if (!empty($errors['username'])) : ?>
                    <div class="text-danger"><?= $errors['username'] ?></div>
                <?php endif; ?>

                <div class="form-floating">
                    <div class="form-control mb-2" style="padding-top: 1.13rem;"><?= old_value('email', $row['email']) ?></div>
                </div>
                <?php if (!empty($errors['email'])) : ?>
                    <div class="text-danger"><?= $errors['email'] ?></div>
                <?php endif; ?>
                <div class="mb-2 form-floating">
                    <select name="role" class="form-select">
                        <option <?= old_select('role', 'user', $row['role']) ?> value="user">User</option>
                        <option <?= old_select('role', 'admin', $row['role']) ?> value="admin">Admin</option>
                    </select>
                    <label for="floatingInput">Role</label>
                </div>
                <?php if (!empty($errors['role'])) : ?>
                    <div class="text-danger"><?= $errors['role'] ?></div>
                <?php endif; ?>
                <!-- 
                <div class="mb-2 form-floating">
                    <input value="<?= old_value('password') ?>" name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password <span class="text-muted">(leave empty to keep old one)</span></label>
                </div>
                <?php if (!empty($errors['password'])) : ?>
                    <div class="text-danger"><?= $errors['password'] ?></div>
                <?php endif; ?>

                <div class="mb-2 form-floating">
                    <input value="<?= old_value('retype_password') ?>" name="retype_password" type="password" class="form-control" id="floatingPassword" placeholder="Retype Password">
                    <label for="floatingPassword">Retype-Password</label>
                </div> -->

                <a href="<?= ROOT ?>/administrator/users">
                    <button class="mt-2 mb-3 btn btn-lg btn-primary btn-sm px-3 py-1" type="button">Back</button>
                </a>
                <button class="mt-2 btn btn-lg btn-success btn-sm px-3 py-1 float-end" type="submit">Save</button>
            <?php else : ?>

                <div class="alert alert-danger text-center">Record not found!</div>
            <?php endif; ?>

        </form>
    </div>

<?php elseif ($action == 'suspend') : ?>

    <div class="col-md-6 mx-auto">
        <form method="post">

            <h1 class="text-center fs-3 mb-3">Suspend this account</h1>
            <div class="alert alert-warning d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg>
                Are you sure you want to suspend this account from the website
            </div>

            <?php if (!empty($row)) : ?>

                <?php if (!empty($errors)) : ?>
                <?php endif; ?>

                <div class="form-floating">
                    <div class="form-control mb-2" style="padding-top: 1.13rem;"><?= old_value('username', $row['username']) ?></div>
                </div>
                <?php if (!empty($errors['username'])) : ?>
                    <div class="text-danger"><?= $errors['username'] ?></div>
                <?php endif; ?>

                <div class="form-floating">
                    <div class="form-control mb-2" style="padding-top: 1.13rem;"><?= old_value('email', $row['email']) ?></div>
                </div>
                <?php if (!empty($errors['email'])) : ?>
                    <div class="text-danger"><?= $errors['email'] ?></div>
                <?php endif; ?>


                <a href="<?= ROOT ?>/administrator/users">
                    <button class="mt-2 mb-3 btn btn-lg btn-primary btn-sm px-3 py-1" type="button">Back</button>
                </a>
                <button class="mt-2 btn btn-lg btn-danger btn-sm px-3 py-1 float-end" type="submit">Suspend</button>
            <?php else : ?>

                <div class="alert alert-danger text-center">Record not found!</div>
            <?php endif; ?>

        </form>
    </div>

<?php else : ?>

    <h1 class="fs-4 mb-3">User
        <a href="<?= ROOT ?>/administrator/users/add">
            <button class="btn btn-primary float-end btn-sm">Add New Account</button>
        </a>
    </h1>

    <div class="table-responsive">
        <table class="table">

            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Image</th>
                <th>Created on</th>
                <th>Action</th>
            </tr>
            <?php
            $limit = 5;
            $offset = ($PAGE['page_number'] - 1) * $limit;

            $query = "select * from users order by id asc limit $limit offset $offset";
            $rows = query($query);
            ?>

            <?php if (!empty($rows)) : ?>
                <?php $counter = ($PAGE['page_number'] - 1) * $limit + 1; ?>
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td><?= $counter ?></td>
                        <td><?= esc($row['username']) ?></td>
                        <td><?= $row['email'] ?></td>
                        <td class="text-capitalize"><?= $row['role'] ?></td>
                        <td>
                            <img src="<?= get_image($row['image']) ?>" style="width: 120px;height: 80px;object-fit: fill;">
                        </td>
                        <td><?= date("jS M-Y", strtotime($row['date'])) ?></td>
                        <td>
                            <a href="<?= ROOT ?>/administrator/users/edit/<?= $row['id'] ?>">
                                <button class="btn btn-warning text-white btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg></button>
                            </a>
                            <a href="<?= ROOT ?>/administrator/users/suspend/<?= $row['id'] ?>">
                                <button class="btn btn-danger btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
                                        <path d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0" />
                                    </svg>
                                </button>
                            </a>
                        </td>
                    </tr>
                    <?php $counter++; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>

        <div class="col-md-12 mb-5 pb-5">
            <a href="<?= $PAGE['first_link'] ?>">
                <button class="btn btn-primary btn-sm">First Page</button>
            </a>
            <a href="<?= $PAGE['prev_link'] ?>">
                <button class="ms-1 btn btn-primary btn-sm">Prev Page</button>
            </a>
            <a href="<?= $PAGE['next_link'] ?>">
                <button class="btn btn-primary btn-sm float-end">Next Page</button>
            </a>
        </div>
    </div>
<?php endif; ?>