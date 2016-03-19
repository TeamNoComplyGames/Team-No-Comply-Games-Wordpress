<?php if (is_page()): the_post() ?>
	<article id="page-<?php the_ID() ?>">
		<?php the_content(); ?>
	</article>

<?php else: ?>

	<?php if (have_posts()):
			while (have_posts()) : the_post() ?>

			<!-- Automatically create the Header -->
			<article id="article-<?php the_ID() ?>" class="article">

				<header class="article-header">

					<?php if (has_post_thumbnail()): ?>
						<div class="featured-image center">
							<?php the_post_thumbnail() ?>
						</div>
					<?php endif; ?>

					<h1 class="article-title center">
						<?php if(!is_singular()): ?>
							<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
						<?php endif; the_title() ?>
						<?php if(!is_singular()): ?>
							</a>
						<?php endif; ?>
					</h1>

					<div class="article-info center">

						<!-- Post Categories -->
						<?php if (has_category()): ?>
							<?php the_category( ", " ); ?>
							<br>
						<?php endif; ?>


						<span class="date">
							<?php the_date('F j, Y') ?>
						</span>
					</div>
				</header>

			<!-- Screenshots -->
			<?php if(get_post_type() == 'screenshot'):?>

					<div class="article-content">

						<!-- The editor content -->
						<?php the_content()?>

						<!-- Display the screenshots here -->
						<div class = "screenShotContainer">
							<?php
							echo types_render_field( "screenshot-image",
							array( "alt" => "Screenshot",
							"class" => "screenShot",
							"proportional" => "true" ) )
							?>
						</div>

					</div>

			<!-- Trailers -->
			<?php elseif(get_post_type() == 'trailer'):?>

					<div class="article-content">

						<!-- The editor content -->
						<?php the_content()?>

						<!-- Display the trailer here -->
						<div class = "trailerVideo">

							<a href = "<?php
							echo types_render_field("trailer-video",
							array("output" => "raw"))
							?>">
								Video Link
							</a>


							<?php
							echo types_render_field("trailer-video")
							?>
						</div>

					</div>
				</article>


			<!-- Games -->
			<?php elseif(get_post_type() == 'game'):?>

				<!-- Show the game info, followed by the iframe -->
					<div class="article-content">
						<?php the_content()?>

						<!-- Show the controls -->
						<h3 class = "center">Controls</h3>

						<div class = "center">
							<?php
							echo types_render_field("game-controls")
							?>
						</div>

						<iframe src="/<?php echo types_render_field( "directory-name", array( ) ) ?>"
						scrolling="no"
						class="unityGame">
						</iframe>
					</div>

			<!-- Default post -->
			<?php else: ?>
				<div class="article-content">
					<?php the_content()?>
				</div>

			<?php  endif; ?>

			<!--End the article tag -->
			</article>

		<!-- Show horizontal divider if not the last post -->
		<?php if ( more_posts() != 0 ) {
    		echo '<hr class="post-separator" />';
		}
		?>

		<?php endwhile; ?>

	<?php else: ?>
		<p>Nothing matches your query.</p>
	<?php  endif; ?>
<?php  endif; ?>
