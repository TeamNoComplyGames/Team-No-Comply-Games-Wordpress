<?php if (is_page()): the_post() ?>
	<article id="page-<?php the_ID() ?>">
		<?php the_content(); ?>
	</article>

<?php else: ?>

	<?php

	//Query for our custom posts
	$customPosts = new WP_Query( array(
		'post_type' => array('post', 'screenshot')
	));

	//If our query has posts
	if ($customPosts -> have_posts()):

		//While we have posts, grab a post
		while ($customPosts -> have_posts()) : $customPosts -> the_post() ?>

			<?php if(get_post_type() == 'screenshot'):?>

				<!-- Screenshots -->

				<article id="article-<?php the_ID() ?>" class="article">
					<header class="article-header">
						<?php if (has_post_thumbnail() and !is_singular()): ?>
							<div class="featured-image">
								<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail() ?></a>
							</div>
						<?php endif; ?>
						<h1 class="article-title center"><?php if(!is_singular()): ?><a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php endif; the_title() ?><?php if(!is_singular()): ?></a><?php endif; ?></h1>
						<div class="article-info center">
							<span class="date"><?php the_date('m-d-Y') ?></span>
						</div>
					</header>
					<div class="article-content">
						<?php (is_single()) ? the_content() : the_excerpt() ?>
					</div>
				</article>


			<?php else: ?>

				<!-- Default post -->

				<article id="article-<?php the_ID() ?>" class="article">
					<header class="article-header">
						<?php if (has_post_thumbnail() and !is_singular()): ?>
							<div class="featured-image">
								<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail() ?></a>
							</div>
						<?php endif; ?>
						<h1 class="article-title center"><?php if(!is_singular()): ?><a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php endif; the_title() ?><?php if(!is_singular()): ?></a><?php endif; ?></h1>
						<div class="article-info center">
							<span class="date"><?php the_date('m-d-Y') ?></span>
						</div>
					</header>
					<div class="article-content">
						<?php (is_single()) ? the_content() : the_excerpt() ?>
					</div>
				</article>

			<?php  endif; ?>


		<hr />


		<?php endwhile; ?>

	<?php else: ?>
		<p>Nothing matches your query.</p>
	<?php  endif; ?>
<?php  endif; ?>
