<?php if ($action == 'edit') : ?>

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
                        <!-- <option <?= old_select('role', 'user', $row['role']) ?> value="user">User</option> -->
                        <option <?= old_select('role', 'admin', $row['role']) ?> value="admin">Admin</option>
                    </select>
                    <label for="floatingInput">Role</label>
                </div>
                <?php if (!empty($errors['role'])) : ?>
                    <div class="text-danger"><?= $errors['role'] ?></div>
                <?php endif; ?>

                <div class="mb-2 form-floating">
                    <textarea name="bio" id="floatingBio" class="form-control" placeholder="Bio" style="height: 150px"><?= old_value('bio', $row['bio']) ?></textarea>
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

                <a href="<?= ROOT ?>/administrator/profile">
                    <button class="mt-2 mb-3 btn btn-lg btn-primary btn-sm px-3 py-1" type="button">Back</button>
                </a>
                <button class="mt-2 btn btn-lg btn-success btn-sm px-3 py-1 float-end" type="submit">Save</button>
            <?php else : ?>

                <div class="alert alert-danger text-center">Record not found!</div>
            <?php endif; ?>

        </form>
    </div>

<?php else : ?>

    <h1 class="fs-4 mb-3">Administrator
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
            $query = "select * from admin order by id desc";
            $rows = query($query);
            ?>

            <?php if (!empty($rows)) : ?>
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td><ol><li></li></ol></td>
                        <td><?= esc($row['username']) ?></td>
                        <td><?= $row['email'] ?></td>
                        <td class="text-capitalize"><?= $row['role'] ?></td>
                        <td>
                            <img src="<?= get_image($row['image']) ?>" style="width: 120px;height: 80px;object-fit: fill;">
                        </td>
                        <td><?= date("jS M-Y", strtotime($row['date'])) ?></td>
                        <td>
                            <a href="<?= ROOT ?>/administrator/profile/edit/<?= $row['id'] ?>">
                                <button class="btn btn-warning text-white btn-sm"><i class="bi bi-pencil-square"></i></button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>

    </div>
<?php endif; ?>