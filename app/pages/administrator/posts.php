<?php if ($action == 'add') : ?>

	<link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/summernote/summernote-lite.min.css">

	<div class="col-md-10 mx-auto">
		<form method="post" enctype="multipart/form-data">

			<h1 class="text-center fs-3 mb-3">Create post</h1>

			<?php if (!empty($errors)) : ?>
				<div class="alert alert-danger">Please fix the errors below</div>
			<?php endif; ?>

			<div class="my-3">
				<span class="fs-5">Featured Image</span><br>
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


			<div class="form-floating mb-2">
				<input value="<?= old_value('title') ?>" name="title" type="text" class="form-control mb-2" id="floatingInput" placeholder="Username" maxlength="50">
				<label for="floatingInput">Title</label>
			</div>
			<?php if (!empty($errors['title'])) : ?>
				<div class="text-danger"><?= $errors['title'] ?></div>
			<?php endif; ?>

			<div class="mb-2">
				<textarea id="summernote" rows="8" name="content" id="floatingInput" placeholder="Post content" type="content" class="form-control"><?= old_value('content') ?></textarea>
			</div>
			<?php if (!empty($errors['content'])) : ?>
				<div class="text-danger"><?= $errors['content'] ?></div>
			<?php endif; ?>

			<div class="form-floating mb-2">
				<select name="category_id" class="form-select">

					<?php

					$query = "select * from categories order by id desc";
					$categories = query($query);
					?>
					<option value="">--Select--</option>
					<?php if (!empty($categories)) : ?>
						<?php foreach ($categories as $cat) : ?>
							<option <?= old_select('category_id', $cat['id']) ?> value="<?= $cat['id'] ?>"><?= $cat['category'] ?></option>
						<?php endforeach; ?>
					<?php endif; ?>

				</select>
				<label for="floatingInput">Category</label>
			</div>
			<?php if (!empty($errors['category'])) : ?>
				<div class="text-danger"><?= $errors['category'] ?></div>
			<?php endif; ?>

			<a href="<?= ROOT ?>/administrator/posts">
				<button class="mt-2 mb-3 btn btn-lg btn-primary btn-sm px-3 py-1" type="button">Back</button>
			</a>
			<button class="mt-2 mb-3 btn btn-lg btn-success btn-sm px-3 py-1 float-end" type="submit">Create</button>

		</form>
	</div>

	<script src="<?= ROOT ?>/assets/js/jquery.js"></script>
	<script src="<?= ROOT ?>/assets/summernote/summernote-lite.min.js"></script>
	<script>
		$('#summernote').summernote({
			placeholder: 'Post content',
			tabsize: 2,
			height: 400
		});
	</script>

<?php elseif ($action == 'ban') : ?>

	<div class="col-md-6 mx-auto">
		<form method="post">

			<h1 class="text-center fs-3 mb-3">Ban this post</h1>
			<div class="alert alert-warning d-flex align-items-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
					<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
				</svg>
				Are you sure you want to ban this post from the website
			</div>
			<?php if (!empty($row)) : ?>

				<?php if (!empty($errors)) : ?>
					<div class="alert alert-danger">Please fix the errors below</div>
				<?php endif; ?>

				<div class="form-floating">
					<div class="form-control mb-2" style="padding-top: 1.13rem;"><?= old_value('title', $row['title']) ?></div>
				</div>
				<?php if (!empty($errors['title'])) : ?>
					<div class="text-danger"><?= $errors['title'] ?></div>
				<?php endif; ?>

				<div class="form-floating">
					<div class="form-control mb-2" style="padding-top: 1.13rem;"><?= old_value('slug', $row['slug']) ?></div>
				</div>
				<?php if (!empty($errors['slug'])) : ?>
					<div class="text-danger"><?= $errors['slug'] ?></div>
				<?php endif; ?>


				<a href="<?= ROOT ?>/administrator/posts">
					<button class="mt-2 mb-3 btn btn-lg btn-primary btn-sm px-3 py-1" type="button">Back</button>
				</a>
				<button class="mt-2 btn btn-lg btn-danger btn-sm px-3 py-1 float-end" type="submit">Ban</button>
			<?php else : ?>

				<div class="alert alert-danger text-center">Record not found!</div>
			<?php endif; ?>

		</form>
	</div>

<?php else : ?>

	<h1 class="fs-4 mb-3">
		Posts
		<a href="<?= ROOT ?>/administrator/posts/add">
			<button class="btn btn-primary float-end btn-sm">Add New Post</button>
		</a>
	</h1>

	<div class="table-responsive">
		<table class="table">

			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Category</th>
				<th>Image</th>
				<th>Created by</th>
				<th>Created on</th>
				<th>Action</th>
			</tr>
			<?php
			$limit = 5;
			$offset = ($PAGE['page_number'] - 1) * $limit;

			$query = "select posts.*,categories.category from posts join categories on posts.category_id = categories.id order by id desc limit $limit offset $offset";
			$rows = query($query);
			?>

			<?php if (!empty($rows)) : ?>
				<?php $counter = ($PAGE['page_number'] - 1) * $limit + 1; ?>
				<?php foreach ($rows as $row) : ?>
					<tr>
						<td><?= $counter ?></td>
						<td><?= esc($row['title']) ?></td>
						<td><?= esc($row['category']) ?></td>
						<!-- <td><?= $row['user_id'] ?></td> -->
						<td>
							<img src="<?= get_image($row['image']) ?>" style="width: 120px;height: 80px;object-fit: fill;">
						</td>
						<td>
							<?= user('username') ?>
						</td>
						<td><?= date("jS M, Y", strtotime($row['date'])) ?></td>
						<td>
							<a href="<?= ROOT ?>/administrator/posts/ban/<?= $row['id'] ?>">
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
				<button class="btn btn-primary btn-sm">Prev Page</button>
			</a>
			<a href="<?= $PAGE['next_link'] ?>">
				<button class="btn btn-primary btn-sm float-end">Next Page</button>
			</a>
		</div>
	</div>

<?php endif; ?>