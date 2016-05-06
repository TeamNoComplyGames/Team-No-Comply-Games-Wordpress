<!--Loop to return only published games to us -->

<!-- Create our games query -->
<?php

	//Query for our custom posts
	$customPosts = new WP_Query( array(
		'post_type' => array('game')
	));
	?>

<!-- Loop! -->
<?php if ($customPosts -> have_posts()):
		while ($customPosts -> have_posts()) : $customPosts -> the_post() ?>

		<!-- Show the game info, and omit the iframe -->
		<article id="article-<?php the_ID() ?>" class="article">
			<header class="article-header">
				<h1 class="article-title center">

					<a href="<?php the_permalink() ?>"
						title="<?php the_title_attribute() ?>">
							<?php the_title() ?>
					</a>

				</h1>
				<div class="article-info center">
					<span class="date"><?php the_date('F j, Y') ?></span>
				</div>

				<?php if (has_post_thumbnail()): ?>
					<div class="featured-image center">
						<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail() ?></a>
					</div>
				<?php endif; ?>
			</header>

			<!-- Game Header Image -->
			<div class = "center gameHeader">
				<a href="<?php the_permalink() ?>">
				<?php
				echo types_render_field("game-screenshot")
				?>
				</a>
			</div>

			<div class="article-content">
				<?php the_content()?>
			</div>
		</article>

	<!-- Show horizontal divider if not the last post -->
	<?php if ( custom_more_posts($customPosts) != 0 ) {
		echo '<hr class="post-separator" />';
	}
	?>

	<?php endwhile; ?>

<?php else: ?>
	<p>
		<?php
			_e("Nothing Matches your query.");
		?>
	</p>
<?php  endif; ?>
