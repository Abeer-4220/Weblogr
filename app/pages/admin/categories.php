<h1 class="fs-4 mb-3">
	Categories

</h1>

<div class="table-responsive">
	<table class="table">

		<tr>
			<th>#</th>
			<th>Category</th>
			<!-- <th>Slug</th> -->
			<th>Active</th>
			<!-- <th>Action</th> -->
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
						<!-- <a href="<?= ROOT ?>/admin/categories/edit/<?= $row['id'] ?>">
					<button class="btn btn-warning text-white btn-sm"><i class="bi bi-pencil-square"></i></button>
				</a>
				<a href="<?= ROOT ?>/admin/categories/delete/<?= $row['id'] ?>">
					<button class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button>
				</a> -->
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