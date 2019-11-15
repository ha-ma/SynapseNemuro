<?php

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
add_theme_support( 'html5', array( 'search-form' ) );



// CSSファイルの読み込み
function theme_styles() {
  wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );


// JSファイルの読み込み
function theme_js() {

  global $wp_scripts;

  wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', '', '', false );
  wp_register_script( 'respond_js', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', '', '', false );

  $wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
  $wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );

  wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '', true );
  wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/js/theme.js', array('jquery'), '', true );
  wp_enqueue_script( 'header_js', get_template_directory_uri() . '/js/header.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'theme_js' );



/* ==================================================================== */
/* 記事抜粋 the_excerpt(); の文字数調整 */
/* -------------------------------------------------------------------- */
function change_excerpt_length($length) {
  return 40;
}
add_filter('excerpt_length', 'change_excerpt_length');



/* ==================================================================== */
/* 記事抜粋 the_excerpt(); の最大文字数を超えた場合の動作 */
/* -------------------------------------------------------------------- */
function change_excerpt_more($more) {
  return '…';
}
add_filter('excerpt_more', 'change_excerpt_more');



/* ==================================================================== */
/* 記事抜粋 the_excerpt(); のpタグ削除 */
/* -------------------------------------------------------------------- */
remove_filter('the_excerpt', 'wpautop');




/* ==================================================================== */
/* 記事タイトル the_title(); の文字数調整 */
/* -------------------------------------------------------------------- */
function limit_title_char($title){
  if(mb_strlen($title) > 24 && !(is_single()) && !(is_page())){
    $title = mb_substr($title,0,24) . "…";
  }
  return $title;
}
add_filter( 'the_title', 'limit_title_char' );


/* ==================================================================== */
/* メニュー */
/* -------------------------------------------------------------------- */

register_nav_menus( array(
'global'    => __( 'Global Menu', 'SynapseNemuro' ),
'footer' => __( 'Footer Menu', 'SynapseNemuro' ),
) );



/* ==================================================================== */
/* サイドバーを1つ設置する */
/* -------------------------------------------------------------------- */

register_sidebar(array(
'name'=>'sidebar-blog',
'before_widget'=>'<div class="sidebar-block">',
'after_widget'=>'</div>',
'before_title' => '<h2 class="sidebar-title">',
'after_title' => '</h2>'
));


/* ==================================================================== */
/* ページネーション */
/* -------------------------------------------------------------------- */
//Pagenation
function pagination($pages = '', $range = 2)
{
  $showitems = ($range * 2)+1;//表示するページ数（５ページを表示）
  
  global $paged;//現在のページ値
  if(empty($paged)) $paged = 1;//デフォルトのページ
  
  if($pages == '')
  {
    global $wp_query;
    $pages = $wp_query->max_num_pages;//全ページ数を取得
    if(!$pages)//全ページ数が空の場合は、１とする
    {
      $pages = 1;
    }
  }
  
  if(1 != $pages)//全ページが１でない場合はページネーションを表示する
  {
    echo "<div class=\"pagenation\">\n";
    echo "<ul>\n";
    //Prev：現在のページ値が１より大きい場合は表示
    if($paged > 1) echo "<li class=\"prev\"><a href='".get_pagenum_link($paged - 1)."'>Prev</a></li>\n";
    
    for ($i=1; $i <= $pages; $i++)
    {
      if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
      {
        //三項演算子での条件分岐
        echo ($paged == $i)? "<li class=\"active\">".$i."</li>\n":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>\n";
      }
    }
    //Next：総ページ数より現在のページ値が小さい場合は表示
    if ($paged < $pages) echo "<li class=\"next\"><a href=\"".get_pagenum_link($paged + 1)."\">Next</a></li>\n";
    echo "</ul>\n";
    echo "</div>\n";
  }
}
/* ==================================================================== */
/* ページャーのHTML構造変更用（WP-PageNavi）　*/
/* -------------------------------------------------------------------- */

function my_pagenavi($args=array()){
  if( !function_exists('wp_pagenavi') ) return;

  $defaults = array(
    'before' => '<nav id="pager" class="pageNavWrapper mainSearch__articleList__recArea__pageNavWrapper">',
    'after' => '</nav>',
    'wrapper_tag' => 'ul',
  );

  $args = is_array($args) ? array_merge($defaults, $args) : $args;

  add_filter('wp_pagenavi', 'my_filter_wp_pagenavi', 10, 1);
  wp_pagenavi($args);
  remove_filter('wp_pagenavi', 'my_filter_wp_pagenavi', 10);
}

function my_filter_wp_pagenavi($html) {
  // <ul>タグにpageNavクラスを付与
  $ul_patn = "/<ul class=[\'\"]wp-pagenavi[\'\"] role=[\'\"]navigation[\'\"]>/u";
  $ul_rep  = '<ul class="wp-pagenavi pageNav mainSearch__articleList__recArea__pageNav" role="navigation">';
  $html    = preg_replace($ul_patn, $ul_rep, $html);
  // <a>タグの不要なclassの削除＋<li>で囲む
  $pattern     = "/<a[\s\S]+?href=.([^\'\"]+)[\'\"][^>]*?>([^<]*?)<\/a>/u";
  $replacement = '<li><a href=${1}>${2}</a></li>';
  $html        = preg_replace($pattern, $replacement, $html);
  // class="pages"付きの<span>を置換
  $pages_ptn = "/<span class=[\'\"]pages[\'\"]>([\s\S]*?)<\/span>/u";
  $pages_rep = '<li class="pages" style="display:none"><a>${1}</a></li>';
  $html      = preg_replace($pages_ptn, $pages_rep, $html);
  // class="current"付きの<span>を置換
  $current_href = esc_attr( get_pagenum_link( get_query_var('paged', 1) ) );
  // $current_ptn = "/<span class=[\'\"]current[\'\"]>([\s\S]*?)<\/span>/u";
  $current_ptn = "/<span aria-current=[\'\"]page[\'\"] class=[\'\"]current[\'\"]>([\s\S]*?)<\/span>/u";
  $current_rep  = '<li class="current"><a>${1}</a></li>';
  $html         = preg_replace($current_ptn, $current_rep, $html);

  return $html;
}



/* ==================================================================== */
/* ヘッダーメニューのliに独自クラスを設定
/* -------------------------------------------------------------------- */
function set_menu_class( $classes, $item ) {

  $global_menu = 'Global Nav';
  $footer_menu = 'Footer Nav';

  if( has_term( $global_menu, 'nav_menu', $item ) ) {
    return $class = array( 'header__menu__item' );
  } elseif ( has_term( $footer_menu, 'nav_menu', $item ) ) {
    return $class = array( 'footer__menu__item' );
  } else {
    return $classes;
  }

}
add_filter( 'nav_menu_css_class', 'set_menu_class', 10, 2);


/* ==================================================================== */
/* ヘッダーメニューのaタグに独自クラスを設定するためのプロパティ追加
/* -------------------------------------------------------------------- */

function add_menu_link_class( $atts, $item, $args ) {
  if (property_exists($args, 'link_class')) {
    $atts['class'] = $args->link_class;
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );
