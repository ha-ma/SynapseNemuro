<?php
/* Template Name: お問い合わせ */
?>

<?php get_header(); ?>

<section class="pageMV">
  <img src="<?php echo get_template_directory_uri(); ?>/images/earth.png" alt="Earth Image" class="pageMV__earth">
  <h1 class="pageMV__heading"><?php the_title(); ?></h1>
</section> <!-- /.pageMV -->

<main class="front__main">
	<div class="front__main--container">
    <section id="front__SDGsEntry" class="front__SDGsEntry">
      <div class="front__SDGsEntry--container">
        <h2 class="front__SDGsEntry__heading">お問い合わせはこちら</h2>
        <p class="front__SDGsEntry__desc">シナプスねむろへのお問い合わせはこちらからお願いいたします。</p>

        <div class="front__SDGsEntry__entryform">
          <?php echo do_shortcode('[contact-form-7 id="21" title="お問い合わせフォーム"]'); ?>
        </div> <!-- /.front__SDGsEntry__entryform -->

      </div> <!-- /.front__SDGsEntry--container -->
    </section> <!-- /.front__SDGsEntry__members -->
  </div> <!-- /.front__main--container -->
</main> <!-- /.front__main -->

<?php get_footer(); ?>