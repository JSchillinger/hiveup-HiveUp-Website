<?php
/*
The Search Loop
===============
*/
?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
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

  <!-- <article role="article" id="post_<#?php the_ID()?>" <#?php post_class()?>>
    <header>
      <h4><a href="<#?php the_permalink(); ?>"><#?php the_title()?></a></h4>
    </header>
    <#?php the_excerpt(); ?>
  </article> -->
<?php endwhile; else: ?>
  <div class="col-12">
  <div class="alert alert-warning">
    <i class="fa fa-exclamation-triangle"></i> <?php _e('Sorry, your search yielded no results.', 'hiveup'); ?>
  </div>
  </div>
<?php endif; ?>
