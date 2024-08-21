<title>Blog - <?= APP_NAME ?></title>
<?php include '../app/pages/includes/header.php'; ?>

<div class="mx-auto col-md-10">
    <h1 class="mx-4 mt-3 mb-4 text-center">Blogs</h1>

      <div class="row my-2">

        <?php  

          $limit = 6;
          $offset = ($PAGE['page_number'] - 1) * $limit;

          $query = "select posts.*,categories.category from posts join categories on posts.category_id = categories.id order by id desc limit $limit offset $offset";
          $rows = query($query);
          if($rows)
          {
            foreach ($rows as $row) {
              include '../app/pages/includes/post-card.php';
            }

          }else{
            echo "No items found!";
          }

        ?>

      </div>


  <div class="col-md-12 mb-4">
    <a href="<?=$PAGE['first_link']?>">
      <button class="btn btn-primary btn-sm">First Page</button>
    </a>
    <a href="<?=$PAGE['prev_link']?>">
      <button class="btn btn-primary btn-sm">Prev Page</button>
    </a>
    <a href="<?=$PAGE['next_link']?>">
      <button class="btn btn-primary btn-sm float-end">Next Page</button>
    </a>
  </div>
</div>
<?php include '../app/pages/includes/footer.php'; ?>

