<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php wp_head(); ?>

	</head>
	<body>
		<!-- SP ドロワーボタン -->
		<div class="spmenu"><span></span></div>

		<header class="header" id="header">
			<div class="header__logoSP">
				<a href="<?php bloginfo( 'url' ); ?>" class="header__logoSP__link"><img class="header__logoSP__img" src="<?php echo get_template_directory_uri(); ?>/images/logo_full.png" alt="header__logoSP"/></a>
			</div> <!-- /.header__logoSP -->

			<div class="header__logoPC">
				<a href="<?php bloginfo( 'url' ); ?>" class="header__logoPC__link"><img class="header__logoSP__img" src="<?php echo get_template_directory_uri(); ?>/images/logo_full.png" alt="header__logoPC"/></a>
			</div> <!-- /.header__logoPC -->

			<?php
			$args = array(
				'menu' => 'Global Nav',
				'menu_class' => 'header__menu__list',
				'container_class' => 'header__menu',
				'link_class' => 'header__menu__link'
			);
			?>
			<?php wp_nav_menu( $args ); ?>

		</header>