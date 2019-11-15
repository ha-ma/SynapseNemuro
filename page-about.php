<?php
/* Template Name: シナプスねむろについて */
?>

<?php get_header(); ?>

<section class="pageMV">
  <img src="<?php echo get_template_directory_uri(); ?>/images/earth.png" alt="Earth Image" class="pageMV__earth">
  <h1 class="pageMV__heading"><?php the_title(); ?></h1>
</section> <!-- /.pageMV -->

<main class="front__main">
	<div class="front__main--container">
    <?php the_content(); ?>
  </div> <!-- /.front__main--container -->
</main> <!-- /.front__main -->

<?php get_footer(); ?>