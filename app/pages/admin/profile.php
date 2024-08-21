<?php if ($action == 'edit') : ?>

    <div class="col-md-6 mx-auto">
        <form method="post" enctype="multipart/form-data">

            <h1 class="text-center fs-3 mb-3">Edit account</h1>

            <?php if (!empty($row)) : ?>

                <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger">Please fix the errors below</div>
                <?php endif; ?>
                <div class="alert alert-warning d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                    Changes will get updated after the re-login
                </div>

                <div class="my-3">
                    <span class="fs-5">Profile Picture</span><br>
                    <label class="d-block">
                        <img class="mx-auto d-block image-preview-edit" src="<?= get_image($row['image']) ?>" style="cursor: pointer;width: 150px;height: 150px;object-fit: contain;">
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
                    <input value="<?= old_value('username', $row['username']) ?>" name="username" type="text" class="form-control mb-2" id="floatingInput" placeholder="Username">
                    <label for="floatingInput">Username</label>
                </div>
                <?php if (!empty($errors['username'])) : ?>
                    <div class="text-danger"><?= $errors['username'] ?></div>
                <?php endif; ?>

                <div class="mb-2 form-floating">
                    <input value="<?= old_value('email', $row['email']) ?>" name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" readonly>
                    <label for="floatingInput">Email address</label>
                </div>
                <?php if (!empty($errors['email'])) : ?>
                    <div class="text-danger"><?= $errors['email'] ?></div>
                <?php endif; ?>

                <div class="mb-2 form-floating">
                    <select name="role" class="form-select">
                        <option <?= old_select('role', 'user', $row['role']) ?> value="user">User</option>
                    </select>
                    <label for="floatingInput">Role</label>
                </div>
                <?php if (!empty($errors['role'])) : ?>
                    <div class="text-danger"><?= $errors['role'] ?></div>
                <?php endif; ?>

                <div class="mb-2 form-floating">
                    <textarea name="bio" id="floatingBio" class="form-control" placeholder="Bio" style="height: 80px"></textarea>
                    <label for="floatingBio">Add About You</label>
                </div>

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
                </div>

                <a href="<?= ROOT ?>/admin/profile">
                    <button class="mt-2 mb-3 btn btn-lg btn-primary btn-sm px-3 py-1" type="button">Back</button>
                </a>
                <button class="mt-2 btn btn-lg btn-success btn-sm px-3 py-1 float-end" type="submit">Save</button>
            <?php else : ?>

                <div class="alert alert-danger text-center">Record not found!</div>
            <?php endif; ?>

        </form>
    </div>

<?php elseif ($action == 'delete') : ?>

    <div class="col-md-6 mx-auto">
        <form method="post">

            <h1 class="text-center fs-3 mb-3">Delete account</h1>
            <div class="alert alert-warning d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg>
                Are you sure you want to delete this account
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


                <a href="<?= ROOT ?>/admin/profile">
                    <button class="mt-2 mb-3 btn btn-lg btn-primary btn-sm px-3 py-1" type="button">Back</button>
                </a>
                <button class="mt-2 btn btn-lg btn-danger btn-sm px-3 py-1 float-end" type="submit">Delete</button>
            <?php else : ?>

                <div class="alert alert-danger text-center">Record not found!</div>
            <?php endif; ?>

        </form>
    </div>

<?php else : ?>

    <h1 class="fs-4 mb-3">User
    </h1>

    <div class="table-responsive">
        <table class="table">

            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Image</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            <?php

            $query = "select user()";
            $rows = query($query);
            ?>

            <?php if (!empty($rows)) : ?>
                <?php $counter = ($PAGE['page_number']) ?>
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td><?= $counter ?></td>
                        <td><?= esc(user('username')) ?></td>
                        <td><?= user('email') ?></td>
                        <td class="text-capitalize"><?= user('role') ?></td>
                        <td>
                            <img src="<?= get_image(user('image')) ?>" style="width: 120px;height: 80px;object-fit: fill;">
                        </td>
                        <td><?= date("jS M-Y", strtotime(user('date'))) ?></td>
                        <td>
                            <a href="<?= ROOT ?>/admin/profile/edit/<?= user('id') ?>">
                                <button class="btn btn-warning text-white btn-sm"><i class="bi bi-pencil-square"></i></button>
                            </a>
                            <a href="<?= ROOT ?>/admin/profile/delete/<?= user('id') ?>">
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button>
                            </a>
                        </td>
                    </tr>
                    <?php $counter++; ?>
                <?php endforeach; ?>
            <?php endif; ?>


        </table>
    </div>
<?php endif; ?>