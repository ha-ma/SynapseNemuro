<?php
/* Template Name: SDGs Card Game Entry */
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
        <h2 class="front__SDGsEntry__heading">SDGsカードゲーム応募フォーム</h2>
        <p class="front__SDGsEntry__desc">2019年12月7日（土）13:00 ~ 17:00開催、SDGsカードゲームinねむろへのご応募は下記フォームからお願いいたします。
    なお、人数制限がございますので、お早めにお申し込みください。</p>

        <div class="front__SDGsEntry__entryform">
          <?php echo do_shortcode('[contact-form-7 id="14" title="SDGsカードゲームエントリーフォーム"]'); ?>
        </div> <!-- /.front__SDGsEntry__entryform -->

      </div> <!-- /.front__SDGsEntry--container -->
    </section> <!-- /.front__SDGsEntry__members -->
  </div> <!-- /.front__main--container -->
</main> <!-- /.front__main -->

<?php get_footer(); ?>