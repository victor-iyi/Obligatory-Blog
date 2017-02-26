<h1>My Blog</h1>
<?php if ( isset($no_post) ): ?>
	<p><?=$no_post; ?></p>
<?php else: ?>
<?php foreach( $posts as $post ): ?>
	<article>
		<h3>
			<a href="single.php?id=<?= $post['id']; ?>"><?= $post['title']; ?></a>
		</h3>
		<blockquote>
			<p><?= $post['body']; ?></p>
		</blockquote>
	</article>
<?php endforeach; ?>
<?php endif; ?>