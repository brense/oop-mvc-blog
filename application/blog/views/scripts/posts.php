<div id="blog-posts-overview">
	<?php foreach($this->view->posts as $post){ ?>
		<div class="item">
			<h2><?php echo $post['title']; ?></h2>
			<div class="post-body">
				<?php echo $post['message']; ?>
			</div>
		</div>
	<?php } ?>
</div>