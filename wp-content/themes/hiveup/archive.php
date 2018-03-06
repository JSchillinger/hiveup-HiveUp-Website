<?php get_header(); ?>

<div class="container-fluid">
  <div class="row">

    <!--<div class="<#?php if(is_active_sidebar('sidebar-widget-area')): ?>col-sm-8<#?php else: ?>col-sm-12<#?php endif; ?>">-->
    <div class="col-sm-12">
      <div id="content" role="main" class="row">
        <div class="col-md-12">
          <h1>Stay in the game and <br><span class="green-text">ahead of the curve</span></h1>
          <p class="lead">Weekly doses of inspiration straight to your inbox.</p>
          <div class="filter">
            <?php echo do_shortcode( '[searchandfilter fields="category,search,post-type" types="radio,checkbox,select" hierarchical=",1" hide_empty=",1,1" class="" headings=",Find results for...,I am in the mood for...,Post Format" submit_label="Filter"]
            '); ?>
          </div>
          <hr class="page-divider">
        </div>

        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('blog-widget-area') ) :
        endif; ?>
        <break></break>
        <?php get_template_part('loops/content', get_post_format()); ?>
      </div><!-- /#content -->
    </div>



  </div><!-- /.row -->

  <div class="row subscribe-box">
    <div class="col-6 mr-auto ml-auto">
      <h3>Like our content?</h3>
      <p class="lead">Subscribe to our mailing list and get our content delivered right to your inbox!</p>
      <?php es_subbox($desc = "", $group = "Public"); ?>
    </div>
  </div>
</div><!-- /.container -->

<?php get_footer(); ?>
