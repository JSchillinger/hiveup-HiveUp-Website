<?php 
/**
* Template Name: Retirement Calculator
**/
get_header(); ?>

<div class="container-fluid">
  <div class="row">
    
    <div class="<?php if(is_active_sidebar('sidebar-widget-area')): ?>col-sm-8<?php else: ?>col-sm-12<?php endif; ?>">
      <div id="content" role="main">
        <?php get_template_part('loops/content', 'page'); ?>
            </div><div id="content" role="main"><section class="hero">
                <div class="container">
                    <div class="row content-panel align-items-center">
                        <div class="col-md-7"></div>
                            <h1>Retirement Calculator</h1>
&nbsp;
                            <p class="lead">Please enter your details for calculating your retirement plan.</p>

                            <form>I am
                                <input id="current-age" type="number" /> years old.
                                I plan to retire in
                                <select id="location">
                                    <option value="Singapore">Singapore</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Canada">Canada</option>
                                    <option value="China">China</option>
                                    <option value="France">France</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Korea">Korea</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>
                                </select>
                                when I am
                                <input id="retirement-age" type="number" /> years old.
                                My source of income during retirement will be approximately
                                <input id="retirement-income" type="number" /> which includes CPF, investment accounts and others.
                                Currently, I am earning
                                <input id="current-income" type="number" /> every month.
                                My monthly living expense is
                                <input id="monthly-living-expense" type="number" />
                                and the monthly loan/mortgage payment is
                                <input id="monthly-loan-payment" type="number" />.
                                My additional expenses include
                                Transport by car
                                <input id="car-transport-expense" type="number" />
                                Domestic Helper
                                <input id="domestic-helper-expense" type="number" />
                                which is
                                <input id="domestic-helper" checked="checked" type="radio" value="domestic-helper-fulltime" /> Full Time
                                <input id="domestic-helper" type="radio" value="domestic-helper-parttime" /> Part Time.
                                <input type="submit" value="Submit" /></form></div>
                            </div>
                            <p class="lead">My Results</p>
                            My Total Income during Retirement will be
                            and the Total Expenditure during Retirement will be
                            My current Shortfall is

                        </section>
                    </div>
                </div>
    
    <div class="col-sm-4" id="sidebar" role="navigation">
       <?php get_sidebar(); ?>
    </div>
    
  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_footer(); ?>
