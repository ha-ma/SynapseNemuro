<?php get_header(); ?>
<main class="front__main">
	<div class="front__main--container">
		<?php get_template_part( 'inc-front/front', 'MV' ); ?>
		<?php get_template_part( 'inc-front/front', 'SDGs-card-game' ); ?>
		<?php get_template_part( 'inc-front/front', 'SDGs-entry' ); ?>
		<?php // get_template_part( 'inc-front/front', 'about' ); ?>
		<?php // get_template_part( 'inc-front/front', 'activity' ); ?>
		<?php // get_template_part( 'inc-front/front', 'members' ); ?>
	</div> <!-- /.front__main--container -->
</main> <!-- /.front__main -->
<?php get_footer(); ?>
