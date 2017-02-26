<h1>Create New Post</h1>
<form action="" method="POST">
<ul>
	<li>
		<label for="title">Title</label>
		<input type="text" id="title" name="title" value="<?= Blog\Helper\FUNCS\old('title'); ?>">
	</li>
	<li>
		<label for="body">Body</label>
		<textarea name="body" id="body"><?= Blog\Helper\FUNCS\old('body'); ?></textarea>
	</li>
	<li><input type="submit" value="Create New Post"></li>
</ul>
<?php if ( isset($status) ): ?>
	<p class="error"><?= $status; ?></p>
<?php endif; ?>
</form>