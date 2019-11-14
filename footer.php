<?php get_template_part( 'components/sdgsColorBars' ); ?>

<footer class="footer">
	<div class="footer__container">

	<div class="footer__logo">
		<a href="<?php bloginfo( 'url' ); ?>" class="footer__logo__link"><img class="footer__logo__img" src="<?php echo get_template_directory_uri(); ?>/images/logo_full.png" alt="footer__logo"/></a>
	</div> <!-- /.footer__logo -->

	<?php
		$args = array(
			'menu' => 'Footer Nav',
			'menu_class' => 'footer__menu__list d-flex flex-wrap justify-content-between',
			'container_class' => 'footer__menu',
			'link_class' => 'footer__menu__link'
		);
	?>
	<?php wp_nav_menu( $args ); ?>

	<div class="footer__entryLink">
		<a href="<?php bloginfo( 'url' ); ?>/entry" class="footer__entryLink__link">◆ エントリーはこちらから</a>
	</div> <!-- /.footer__entryLink -->

	<p class="footer__copyright"><?php echo date( 'Y' ); ?> Copyright &copy; SDGs Quest Mirai Koshien.</p>
	</div> <!-- /.footer__container -->

</footer>
<?php wp_footer(); ?>
</body>
</html>