<?php

function hiveup_search_form( $form ) {
    $form = '<form class="form-inline" role="search" method="get" id="searchform" action="' . home_url('/') . '" >
	<input class="form-control" type="text" value="' . get_search_query() . '" placeholder="' . esc_attr__('Search', 'hiveup') . '..." name="s" id="s" />
	<button type="submit" id="searchsubmit" value="'. esc_attr__('Search', 'hiveup') .'" class="btn btn-primary"><i class="fa fa-search"></i></button>
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'hiveup_search_form' );
