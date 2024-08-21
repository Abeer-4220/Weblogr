<?php if ($action == 'add') : ?>

	<div class="col-md-6 mx-auto">
		<form method="post" enctype="multipart/form-data">

			<h1 class="text-center fs-3 mb-3">Create category</h1>

			<?php if (!empty($errors)) : ?>
				<div class="alert alert-danger">Please fix the errors below</div>
			<?php endif; ?>

			<div class="form-floating mb-2">
				<input value="<?= old_value('category') ?>" name="category" type="text" class="form-control mb-2" id="floatingInput" placeholder="Category">
				<label for="floatingInput">Category</label>
			</div>
			<?php if (!empty($errors['category'])) : ?>
				<div class="text-danger"><?= $errors['category'] ?></div>
			<?php endif; ?>

			<div class="form-floating mb-2">
				<select name="disabled" class="form-select">
					<option value="0">Yes</option>
					<option value="1">No</option>
				</select>
				<label for="floatingInput">Active</label>
			</div>

			<a href="<?= ROOT ?>/administrator/categories">
				<button class="mt-2 btn btn-lg btn-primary btn-sm" type="button">Back</button>
			</a>
			<button class="mt-2 btn btn-lg btn-success float-end btn-sm" type="submit">Create</button>

		</form>
	</div>

<?php elseif ($action == 'edit') : ?>

	<div class="col-md-6 mx-auto">
		<form method="post" enctype="multipart/form-data">

			<h1 class="text-center fs-3 mb-3">Edit category</h1>

			<?php if (!empty($row)) : ?>

				<?php if (!empty($errors)) : ?>
					<div class="alert alert-danger">Please fix the errors below</div>
				<?php endif; ?>

				<div class="form-floating mb-2">
					<input value="<?= old_value('category', $row['category']) ?>" name="category" type="text" class="form-control mb-2" id="floatingInput" placeholder="Username">
					<label for="floatingInput">Category</label>
				</div>
				<?php if (!empty($errors['category'])) : ?>
					<div class="text-danger"><?= $errors['category'] ?></div>
				<?php endif; ?>

				<div class="form-floating mb-2">
					<select name="disabled" class="form-select">
						<option <?= old_select('disabled', '0', $row['disabled']) ?> value="0">Yes</option>
						<option <?= old_select('disabled', '1', $row['disabled']) ?> value="1">No</option>
					</select>
					<label for="floatingInput">Active</label>
				</div>


				<a href="<?= ROOT ?>/administrator/categories">
					<button class="mt-2 btn btn-lg btn-primary btn-sm" type="button">Back</button>
				</a>
				<button class="mt-2 btn btn-lg btn-success btn-sm float-end" type="submit">Save</button>
			<?php else : ?>

				<div class="alert alert-danger text-center">Record not found!</div>
			<?php endif; ?>

		</form>
	</div>

<?php elseif ($action == 'delete') : ?>

	<div class="col-md-6 mx-auto">
		<form method="post">

			<h1 class="text-center fs-3 mb-3">Delete category</h1>
			<div class="alert alert-warning d-flex align-items-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
					<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
				</svg>
				Are you sure you want to delete this category
			</div>

			<?php if (!empty($row)) : ?>

				<?php if (!empty($errors)) : ?>
					<div class="alert alert-danger">Please fix the errors below</div>
				<?php endif; ?>

				<div class="form-floating">
					<div class="form-control mb-2" style="padding-top: 1.13rem;"><?= old_value('category', $row['category']) ?></div>
				</div>
				<?php if (!empty($errors['category'])) : ?>
					<div class="text-danger"><?= $errors['category'] ?></div>
				<?php endif; ?>


				<a href="<?= ROOT ?>/administrator/categories">
					<button class="mt-2 btn btn-lg btn-primary btn-sm" type="button">Back</button>
				</a>
				<button class="mt-2 btn btn-lg btn-danger  float-end btn-sm" type="submit">Delete</button>
			<?php else : ?>

				<div class="alert alert-danger text-center">Record not found!</div>
			<?php endif; ?>

		</form>
	</div>

<?php else : ?>

	<h1 class="fs-4 mb-3">
		Categories
		<a href="<?= ROOT ?>/administrator/categories/add">
			<button class="btn btn-primary float-end btn-sm">Add New Category</button>
		</a>
	</h1>

	<div class="table-responsive">
		<table class="table">

			<tr>
				<th>#</th>
				<th>Category</th>
				<!-- <th>Slug</th> -->
				<th>Active</th>
				<th>Action</th>
			</tr>
			<?php
			$limit = 10;
			$offset = ($PAGE['page_number'] - 1) * $limit;

			$query = "select * from categories order by id asc limit $limit offset $offset";
			$rows = query($query);
			?>

			<?php if (!empty($rows)) : ?>
				<?php $counter = ($PAGE['page_number'] - 1) * $limit + 1; ?>
				<?php foreach ($rows as $row) : ?>
					<tr>
						<td><?= $counter ?></td>
						<td><?= esc($row['category']) ?></td>
						<!-- <td><?= $row['slug'] ?></td> -->
						<td><?= $row['disabled'] ? 'No' : 'Yes' ?></td>
						<td>
							<a href="<?= ROOT ?>/administrator/categories/edit/<?= $row['id'] ?>">
								<button class="btn btn-warning text-white btn-sm"><i class="bi bi-pencil-square"></i></button>
							</a>
							<a href="<?= ROOT ?>/administrator/categories/delete/<?= $row['id'] ?>">
								<button class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button>
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