<?php if (is_page()): the_post() ?>
	<article id="page-<?php the_ID() ?>">
		<?php the_content(); ?>
	</article>

<?php else: ?>

	<?php if (have_posts()):
			while (have_posts()) : the_post() ?>

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

						<!-- The editor content -->
						<?php (is_single()) ? the_content() : the_excerpt() ?>

						<!-- Display the screenshots here -->
						<?php
						echo types_render_field( "screenshot-image",
						array( "alt" => "Screenshot",
						"class" => "screenShot",
						"proportional" => "true" ) )
						?>

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
