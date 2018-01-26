<?php
/*
The Default Loop (used by index.php and category.php)
=====================================================

If you require only post excerpts to be shown in index and category pages, then use the [---more---] line within blog posts.

If you require different templates for different post types, then simply duplicate this template, save the copy as, e.g. "content-aside.php", and modify it the way you like it. (The function-call "get_post_format()" within index.php, category.php and single.php will redirect WordPress to use your custom content template.)

Alternatively, notice that index.php, category.php and single.php have a post_class() function-call that inserts different classes for different post types into the section tag (e.g. <section id="" class="format-aside">). Therefore you can simply use e.g. .format-aside {your styles} in css/hiveup.css style the different formats in different ways.
*/
?>

  <?php if(have_posts()): while(have_posts()): the_post();?>
  <article role="article" id="post_<?php the_ID()?>" class="col-md-6 col-lg-4 col-xl-3">
    <div class="post-wrapper" style="background-image: url('<?php echo get_the_post_thumbnail_url( $post_id, 'large' ); ?>')">
      <div class="post-content">
        <header>
          <?php the_category( ' ' ); ?><br>
          <span class="entry-date"><?php echo get_the_date(); ?></span>
          <h2>
            <a href="<?php the_permalink(); ?>">
              <?php the_title()?>
            </a>
          </h2>
        </header>
        <a href="<?php the_permalink() ?>" class="btn button-inverse">
          Read more
        </a>
      </div>
    </div>

  </article>
  <?php endwhile; ?>

  <break></break>

  <?php if ( function_exists('hiveup_pagination') ) { hiveup_pagination(); } else if ( is_paged() ) { ?>
  <ul class="pagination">
    <li class="page-item older">
      <?php next_posts_link('<i class="fa fa-arrow-left"></i> ' . __('Previous', 'hiveup')) ?></li>
    <li class="page-item newer">
      <?php previous_posts_link(__('Next', 'hiveup') . ' <i class="fa fa-arrow-right"></i>') ?></li>
  </ul>
  <?php } ?>

  <?php else: wp_redirect(get_bloginfo('url').'/404', 404); exit; endif; ?>
