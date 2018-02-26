<?php get_header(); ?>

<section id="hero">

  <nav class="navbar navbar-expand-md navbar-light">
    <div class="container-fluid">
      <div class="logo">
        <img class="logo-mark" src="<?php echo get_bloginfo('template_url') ?>/theme/img/hiveup-logo.svg"/>
        <img class="logo-text" src="<?php echo get_bloginfo('template_url') ?>/theme/img/hiveup-wordmark-white.svg"/>
      </div>

      <div class="mobile-menu">
        <div class="open-menu"><span class="navbar-toggler-icon"></span></div>
      </div>

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <?php
          wp_nav_menu( array(
            'theme_location'	=> 'navbar',
            'container'       => false,
            'menu_class'		  => '',
            'fallback_cb'		  => '__return_false',
          	'items_wrap'		  => '<ul id="%1$s" class="navbar-nav ml-auto mr-auto mt-2 mt-lg-0 %2$s">%3$s</ul>',
            'depth'			      => 2,
    	      'walker'  	      => new hiveup_walker_nav_menu()
          ) );
        ?>
        <!-- <#?php get_template_part('navbar-search'); ?> -->

      </div>

      <?php
      wp_nav_menu( array(
          'theme_location' => 'social-links',
          'container_class' => 'custom-menu-class' ) );
      ?>

    </div>
  </nav>

  <div class="container">
    <div class="row hero-content align-items-center">
        <!-- <h2>Tips Worth Sharing</h2>
        <p class="lead">We encourage you to take a moment to think about all the dreams you've ever had.  Overwhelmed and maybe even a little pessimistic you would ever achieve them?</p>
        <p>At Hive Up, we aim to equip you with the tools, knowledge and resources to make aid you in making informed financial decisions. We do this by making health and finance advice fun and educational.</p>
        <p>Don't worry, we've made our material visually appetizing and easily understandable to help get you inspired?</p> -->
      <div class="col-md-12">
        <h1>Empowering you
          <br>with the knowledge</h1>

        <div class="filter-title button button-primary">Let's get started</div>

        <div class="filter hidden-sm">
          <?php echo do_shortcode( '[searchandfilter fields="category,search,post-type" types="radio,checkbox,select" hierarchical=",1" hide_empty=",1,1" class="" headings=",Find results for...,I am in the mood for...,Post Format" submit_label="Filter"]
          '); ?>
          <div class="filter-close">Close</div>
        </div>

      </div>

      <div class="scrolldown">
        <div class="scrolldown-text">
          <svg class="scroll-arrow-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 12"><path fill-rule="evenodd" clip-rule="evenodd" fill="#3EE7AD" d="M0 0l7 6.5L14 0v5.5L7 12 0 5.5V0z"></path></svg>
        </div>
      </div>

    </div>
  </div>
</section>

<section id="blog-panel">
<div class="container-fluid">
  <div class="row intro">

  </div>

  <div class="row animation-element slide-up">
    <div class="col-md-12">
    </div>
  <?php $the_query = new WP_Query( 'posts_per_page=12' ); ?>
  <?php while ($the_query -> have_posts()) : $the_query -> the_post(); $counter = 0; ?>

    <article class="col-md-6 col-lg-4 col-xl-3" id="post-<?php the_ID(); ?>">
      <div class="post-wrapper" style="background-image: url('<?php echo get_the_post_thumbnail_url( $post_id, 'large' ); ?>')">
        <div class="post-content">
          <?php the_category( ' ' ); ?><br>
          <span class="entry-date"><?php echo get_the_date(); ?></span>
          <h3>
            <a href="<?php the_permalink() ?>">
            <?php the_title(); ?>
            </a>
          </h3>
          <a href="<?php the_permalink() ?>" class="btn btn-inverse">
            Read more
          </a>
        </div>
      </div>

    </article>
  <?php if ($the_query -> current_post == 7): ?>

    <div class="col-md-8 col-lg-8 col-xl-12 ml-auto mr-auto">
      <div class="subscribe-box">
        <div class="row">
          <div class="col-sm-12 col-md-6 ml-auto mr-auto">
            <h3>Like our content?</h3>
            <p class="lead">Subscribe to our mailing list and get our content delivered right to your inbox!</p>
            <!-- <@?php get_search_form(); ?> -->
            <?php es_subbox($desc = "", $group = "Public"); ?>
          </div>
        </div>
      </div>
    </div>


  <?php endif; ?>

  <?php
  endwhile;
  wp_reset_postdata();
  ?>

  </div>

  <div class="row blog-more align-items-center">
    <div class="col text-center">
      <a class="button button-primary" href="./blog">View all</a>
    </div>

    <!-- <div class="col-md-6 ml-auto search-blog">
      <h4>Have a particular topic you are interested in?</h4>
      <?php get_template_part('navbar-search'); ?>

    </div> -->
  </div>
</div>
</section>

<section id="about-panel">
  <div class="container-fluid">
    <div class="row about-panel">
      <div class="col-md-6 order-sm-12 align-self-end animation-element slide-up">
        <img class="img-fluid" src="<?php echo get_bloginfo('template_url') ?>/theme/img/community-1.jpg">
      </div>

    	<div class="col-md-6 order-sm-1 align-self-center animation-element slide-up">
    		<h2>We've worked hard to make it this easy</h2>
        <p class="lead">We created HIVE UP to design the financial planning experience you have always wanted for yourselves and your loved ones.</p>

        <p class="lead">Understanding finances and insurance isn't easy for everyone. That is why our team of creative writers, designers and experienced advisors have come together to bring you content that you will enjoy as you learn.</p>

        <a class="btn btn-inverse" href="./about">Read more</a>
    	</div>
    </div>

  </div>
</section>

<div class="container-fluid">
  <div class="row">

    <div class="col-sm-12">
      <div id="content" role="main">
        <?php get_template_part('loops/content', 'home', get_post_format()); ?>

      </div><!-- /#content -->
    </div>


  </div><!-- /.row -->
</div><!-- /.container -->


<?php get_footer(); ?>
