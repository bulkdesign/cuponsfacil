<?php
/**
 * The template for displaying Search Results pages.
 */
?>


<?php get_header(); ?>
<?php
$s=get_search_query();
$args = array(
                's' =>$s
            );
    // The Query
?>

<div class="container">

<?php  global $wp_query; ?>
<h1 class="search-title"><?php echo $wp_query->found_posts; ?> Results found for: <span><?php the_search_query(); ?></span></h1>

         <?php if ( have_posts() ) { ?>
           <ul class="results">
             <?php while ( have_posts() ) { the_post(); ?>
                <li>
                  <?php if ( has_post_thumbnail() ) { ?><div class="post-image"><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('thumbnail');?></a></div><?php }?>
                                    <div class="post-content">
                                    <h3><a href="<?php echo get_permalink(); ?>"><?php the_title();  ?></a></h3>
                  <p><?php echo substr(get_the_excerpt(), 0,140); ?>... <a href="<?php the_permalink(); ?>">Read More</a></p>
                                </div>
                </li>
             <?php } ?>
             </ul>
         <?php } ?>

</div>

<?php get_footer(); ?>