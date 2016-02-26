<?php get_header(); ?>
<div id="page-content" class = "animated fadeIn">
	<?php get_template_part('loop', 'single'); ?>
	<?php comments_template(); ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
