<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head();?>
</head>
 <body>
 <header class="wck_head">
 <div class="container">
 <div class="row">
 <div class="col-md-12">
 <h1 class="wck_head_logo"><a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
 <h2 class="wck_head_description"><?php bloginfo( 'description' ); ?></h2>
 </div>
  </div>
       <div class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="navbar-ex-collapse">
            <?php
            $args = array(
                'theme_location' => 'Header Navigation',
                'items_wrap'     => '<ul id="%1$s" class="%2$s nav navbar-nav wck_nav">%3$s</ul>',
            );
            wp_nav_menu( $args ) ;
            ?>
          </div>
      </div>
 </div>
 </header>

<?php if ( is_front_page() ) { ?>
<!-- [ トップビジュアル ] -->
<div class="container wck_top_visual">
<div class="row">
<div class="col-md-12">
<img id="top_visual_image" class="thumbnail" src="<?php echo get_template_directory_uri(); ?>/images/top_visual.png" alt="" />
</div>
</div>
</div>
<!-- [ /トップビジュアル ] -->
<?php } else { ?>
<!-- [ パンくずリスト ] -->
<div class="container wck_breadcrumb">
<ol class="breadcrumb">
  <li><a href="<?php echo home_url( '/' ); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>HOME</a></li>
  <?php if ( is_archive() ) { ?>
    <li><?php the_archive_title(); ?></li>
  <?php } else if ( is_single() ) { ?>
    <li><?php the_category(','); ?></li>
    <li><?php the_title();?></li>
  <?php } ?>
</ol>
</div>
<!-- [ /パンくずリスト ] -->
<?php } ?>

<div class="section">
  <div class="container">
    <div class="row">

      <!-- [ #main ] -->
      <div id="main" class="col-md-8">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <article class="wck_section">
          <header class="page-header">
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <div class="wck_post_meta">
            <span class="glyphicon glyphicon-time" aria-hidden="true"></span> <?php the_date(); ?>　 
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php the_author(); ?>　 
            <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> <?php the_category(','); ?>
            </div>
          </header>
          <div>
          <!-- [ 記事の本文 ] -->
          <?php the_content(); ?>
          <!-- [ /記事の本文 ] -->
          </div>
        </article>

      <?php endwhile; ?>

      <?php the_posts_pagination(); ?>

      </div>
      <!-- [ /#main ] -->

      <!-- [ #sub ] -->
      <div id="sub" class="col-md-4">

      <?php 
      // ウィジェットエリアid 'sidebar-widget-area' にウィジェットアイテムが何かセットされていた時
      if ( is_active_sidebar( 'sidebar-widget-area' ) ) 
        // sidebar-widget-area に入っているウィジェットアイテムを表示する
        dynamic_sidebar( 'sidebar-widget-area' );
      ?>

      <aside class="wck_sub_section wck_section"">
      <h4 class="wck_sub_section_title">カテゴリー</h4>
      <ul>
      <?php wp_list_categories('title_li='); ?>
      </ul>
      </aside>

      <aside class="wck_sub_section wck_section">
      <h4 class="wck_sub_section_title">月別</h4>
      <ul>
      <?php wp_get_archives('type=monthly'); ?>
      </ul>
      </aside>

      </div>
      <!-- [ /#sub ] -->

    </div>
  </div>  
</div>

<footer class="wck_footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <p class="text-center">Copyright © kurudrive All Rights Reserved.</p>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer();?>
</body>
</html>