<?php get_header(); ?>

<div class="container-fluid">
  <div class="row">

    <div class="<?php if(is_active_sidebar('sidebar-widget-area')): ?>col-sm-8<?php else: ?>col-sm-12<?php endif; ?>">
      <div id="content" role="main">
        <header>
          <h1>Category: <?php echo single_cat_title(); ?></h1>
          <hr>
        </header>
        <div class="row">
          <?php get_template_part('loops/content', get_post_format()); ?>
        </div>
      </div><!-- /#content -->
    </div>

    <div class="col-sm-4" id="sidebar" role="navigation">
       <?php get_sidebar(); ?>
    </div>

  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_footer(); ?>
