<?php
// SEARCH BY LOCATION
/**
 * Modify the main search query of WordPress to search by location
 * 
 */
function query_search_by_distance( $clauses, $query ) {
  global $wpdb;

  //about if not WordPress main search query
  if ( !$query->is_search )
    return $clauses;
    
  //get the user's current location ( lat/ lng )
  $user_lat = ( isset( $_COOKIE['gmw_lat'] ) ) ? urldecode($_COOKIE['gmw_lat']) : false;
  $user_lng = ( isset( $_COOKIE['gmw_lng'] ) ) ? urldecode($_COOKIE['gmw_lng']) : false;
  
  //abort if user's current location not exist
  if ( $user_lat == false || $user_lng == false )
    return $clauses;

  //set some values
  $radius  = 200; //can be any value
  $orderby = 'distance'; //can be user with post_title, post_date, ID and so on...
  $units   = 6371; //3959 for miles or 6371 for kilometers
    
  // join the location table into the query
  $clauses['join']   .= " INNER JOIN `{$wpdb->prefix}places_locator` gmwlocations ON $wpdb->posts.ID = gmwlocations.post_id ";

  // add the radius calculation and add the locations fields into the results
  $clauses['fields'] .= $wpdb->prepare( ", gmwlocations.formatted_address , ROUND( %d * acos( cos( radians( %s ) ) * cos( radians( gmwlocations.lat ) ) * cos( radians( gmwlocations.long ) - radians( %s ) ) + sin( radians( %s ) ) * sin( radians( gmwlocations.lat) ) ),1 ) AS distance",
      array( $units, $user_lat, $user_lng, $user_lat ) );
  $clauses['groupby'] = $wpdb->prepare( " $wpdb->posts.ID HAVING distance <= %d OR distance IS NULL", $radius );
  $clauses['orderby'] = $orderby;
    
  return $clauses;
  
}
add_filter('posts_clauses','query_search_by_distance', 10, 2);

/**
 * Add the distance of the post from the user's location into the title
 * Can be also added to the content using the_content instead
 * 
 * @param  $title the original title
 * @return the modified title
 */
function gmw_modify_the_tile_with_distance( $title ) {
  global $post;

  $distance = ' ('.$post->distance.'km)';
  $title .= $distance;
  
  return $title;

}

/**
 *  Add the_title filter above into the search results of
 *  WordPress main query. We dont want the to effect other queries on the page
 */
function gmw_add_the_title_filter( $query ){

  if( $query->is_main_query() ){  
    add_filter( 'the_title', 'gmw_modify_the_tile_with_distance' );
  }
  
}
add_action( 'loop_start', 'gmw_add_the_title_filter' );

/**
 * Remove the_title filter once the main query is done
 * @param $query
 */
function gmw_remove_the_title_filter( $query ){

  if( $query->is_main_query() ){
    remove_filter( 'the_title', 'gmw_modify_the_tile_with_distance' );
  }

}
add_action( 'loop_end', 'gmw_remove_the_title_filter' );

?>