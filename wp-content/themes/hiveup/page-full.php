<?php
/**
* Template Name: Full Width
**/

get_header(); ?>

<div class="container-fluid">
  <div class="row">

    <div class="col-sm-12">
      <div id="content" role="main">
        <?php get_template_part('loops/content', 'page'); ?>
      </div><!-- /#content -->
    </div>

  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_footer(); ?>
