<h4 class="fs-3 mb-3">Statistics</h4>

<div class="row justify-content-center">

	<div class="m-2 col-md-4 rounded shadow border text-center">
		<h1><i class="my-4 me-3 bi bi-person-video3"></i></h1>
		<div class="ms-2">
			Admins
		</div>
		<?php

		$query = "select count(id) as num from admin";
		$res = query_row($query);
		?>
		<h1 class="text-primary ms-2 mb-3"><?= $res['num'] ?? 0 ?></h1>
	</div>

	<div class="m-2 col-md-4 rounded shadow border text-center">
		<h1>
			<i class="my-4 me-3 bi bi-person-circle"></i>
		</h1>
		<div class="ms-2">
			Users
		</div>
		<?php

		$query = "select count(id) as num from users where role = 'user'";
		$res = query_row($query);
		?>
		<h1 class="text-primary ms-2 mb-3"><?= $res['num'] ?? 0 ?></h1>
	</div>

	<div class="m-2 col-md-4 rounded shadow border text-center">
		<h1><i class="my-4 me-3 bi bi-tags"></i></h1>
		<div class="ms-2">
			Categories
		</div>
		<?php

		$query = "select count(id) as num from categories";
		$res = query_row($query);
		?>
		<h1 class="text-primary ms-2 mb-3"><?= $res['num'] ?? 0 ?></h1>
	</div>

	<div class="m-2 col-md-4 rounded shadow border text-center">
		<h1><i class="my-4 me-3 bi bi-file-post"></i></h1>
		<div class="ms-2">
			Posts
		</div>
		<?php

		$query = "select count(id) as num from posts";
		$res = query_row($query);
		?>
		<h1 class="text-primary ms-2 mb-3"><?= $res['num'] ?? 0 ?></h1>
	</div>

</div>