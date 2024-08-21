<h1 class="fs-4 mb-3">Users
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
            <!-- <th>Action</th> -->
        </tr>
        <?php
        $limit = 10;
        $offset = ($PAGE['page_number'] - 1) * $limit;

        $query = "select * from users order by id asc limit $limit offset $offset";
        $rows = query($query);
        ?>

        <?php if (!empty($rows)) : ?>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= esc($row['username']) ?></td>
                    <td><?= $row['email'] ?></td>
                    <td class="text-capitalize"><?= $row['role'] ?></td>
                    <td>
                        <img src="<?= get_image($row['image']) ?>" style="width: 120px;height: 80px;object-fit: fill;">
                    </td>
                    <td><?= date("jS M-Y", strtotime($row['date'])) ?></td>
                    <!-- <td>
                            <a href="<?= ROOT ?>/admin/user/edit/<?= $row['id'] ?>">
                                <button class="btn btn-warning text-white btn-sm"><i class="bi bi-pencil-square"></i></button>
                            </a>
                            <a href="<?= ROOT ?>/admin/user/delete/<?= $row['id'] ?>">
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button>
                            </a>
                        </td> -->
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
</div>