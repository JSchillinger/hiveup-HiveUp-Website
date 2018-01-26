<?php get_header(); ?>

<div class="container-fluid">
  <div class="row">

    <div class="col-sm-12">
      <div id="content" role="main">
        <header>
          <h1>Category: <?php echo single_cat_title(); ?></h1>
        </header>

        <div class="filter">
          <?php echo do_shortcode( '[searchandfilter fields="category,search,post-type" types="radio,checkbox,select" hierarchical=",1" hide_empty=",1,1" class="" headings=",Find results for...,I am in the mood for...,Post Format" submit_label="Filter"]
          '); ?>
        </div>

        <hr/>
        <div class="row">
          <?php get_template_part('loops/content', get_post_format()); ?>
        </div>
      </div><!-- /#content -->
    </div>

  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_footer(); ?>
