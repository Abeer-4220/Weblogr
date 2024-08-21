<?php

if ($action == 'edit') {

    $query = "select * from admin where id = :id limit 1";
    $row = query_row($query, ['id'=>$id]);

    if (!empty($_POST)) {

        if ($row) {

            //validate
            $errors = [];

            if (empty($_POST['username'])) {
                $errors['username'] = "A username is required";
            } else
        if (!preg_match("/^[a-zA-Z0-9 \-\_\&]+$/", $_POST['username'])) {
                $errors['username'] = "Username can contain letters, numbers, dashes and hyphens";
            }

            $query = "select id from admin where email = :email && id != :id limit 1";
            $email = query($query, ['email' => $_POST['email'], 'id' => $id]);

            if (empty($_POST['email'])) {
                $errors['email'] = "A email is required";
            } else
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Email not valid";
            } else
        if ($email) {
                $errors['email'] = "That email is already in use";
            }

            if (empty($_POST['password'])) {
            } else
        if (strlen($_POST['password']) < 8) {
                $errors['password'] = "Password must be 8 character or more";
            } else
        if ($_POST['password'] !== $_POST['retype_password']) {
                $errors['password'] = "Passwords do not match";
            }

            //validate image
            $allowed = ['image/jpeg', 'image/png', 'image/webp'];
            if (!empty($_FILES['image']['name'])) {
                $destination = "";
                if (!in_array($_FILES['image']['type'], $allowed)) {
                    $errors['image'] = "Image format not supported";
                } else {
                    $folder = "uploads/";
                    if (!file_exists($folder)) {
                        mkdir($folder, 0777, true);
                    }

                    $destination = $folder . time() . $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                    resize_image($destination);
                }
            }

            if (empty($errors)) {
                //save to database
                $data = [];
                $data['username'] = $_POST['username'];
                $data['email']    = $_POST['email'];
                $data['role']     = $_POST['role'];
                $data['bio']      = $_POST['bio'];
                $data['id']       = $id;

                $password_str     = "";
                $image_str        = "";

                if (!empty($_POST['password'])) {
                    $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $password_str = "password = :password, ";
                }

                if (!empty($destination)) {
                    $image_str = "image = :image, ";
                    $data['image']       = $destination;
                }

                $query = "update admin set username = :username, email = :email, $password_str $image_str role = :role, bio = :bio where id = :id limit 1";

                query($query, $data);
                redirect('administrator/profile');
            }
        }
    }
}
