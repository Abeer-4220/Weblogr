<title>Home - <?= APP_NAME ?></title>
<?php include '../app/pages/includes/header.php'; ?>
<?php include '../app/pages/includes/slider.php'; ?>
<main class="p-3 pb-0">
  <h3 class="mx-4 mt-3 mb-3">Featured Content</h3>
  <div class="row mb-2 justify-content-center">
    <?php
    $query = "select posts.*,categories.category from posts join categories on posts.category_id = categories.id order by id desc limit 6";
    $rows = query($query);
    if ($rows) {
      foreach ($rows as $row) {
        include '../app/pages/includes/post-card.php';
      }
    } else {
      echo "No items found!";
    }
    ?>
  </div>
  <?php include '../app/pages/includes/footer.php'; ?>
