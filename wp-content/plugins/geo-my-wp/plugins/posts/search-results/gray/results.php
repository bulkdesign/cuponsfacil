<?php 
/**
 * Posts locator "gray" search results template file. 
 * 
 * The information on this file will be displayed as the search results.
 * 
 * The function pass 2 args for you to use:
 * $gmw  - the form being used ( array )
 * $post - each post in the loop
 * 
 * You could but It is not recomemnded to edit this file directly as your changes will be overridden on the next update of the plugin.
 * Instead you can copy-paste this template ( the "gray" folder contains this file and the "css" folder ) 
 * into the theme's or child theme's folder of your site and apply your changes from there. 
 * 
 * The template folder will need to be placed under:
 * your-theme's-or-child-theme's-folder/geo-my-wp/posts/search-results/
 * 
 * Once the template folder is in the theme's folder you will be able to choose it when editing the posts locator form.
 * It will show in the "Search results" dropdown menu as "Custom: gray".
 */
?>
<!--  Main results wrapper - wraps the paginations, map and results -->
<div class="gmw-results-wrapper gmw-results-wrapper-<?php echo $gmw['ID']; ?> gmw-pt-gray-results-wrapper">
	
	<?php do_action( 'gmw_search_results_start' , $gmw ); ?>
	
	<!-- results count -->
	<div class="results-count-wrapper">
		<p><?php gmw_results_message( $gmw, false ); ?></p>
	</div>
	
	 <!-- GEO my WP Map -->
    <?php 
    if ( $gmw['search_results']['display_map'] == 'results' ) {
        gmw_results_map( $gmw );
    }
    ?>
		
	<?php do_action( 'gmw_search_results_before_loop' , $gmw ); ?>
	
	<!--  Results wrapper -->
	<table class="striped" id="table" data-toggle="table" data-filter-control="true">
	    <thead>
	        <tr>					        	
	            <th data-field="estabelecimento" data-filter-control="input"><strong>Estabelecimento</strong></th>
	            <th data-field="ramo_de_atuacao" data-filter-control="input"><strong>Ramo de Atuação</strong></th>
	            <th data-field="distancia" data-filter-control="input"><strong>Distância</strong></th>
	            <th data-field="endereco" data-filter-control="input"><strong>Endereço</strong></th>
	        </tr>
	    </thead>
	    <tbody>

			<?php while ( $gmw_query->have_posts() ) : $gmw_query->the_post(); ?>
			
			<?php $featured = ( !empty( $post->feature ) ) ? 'gmw-featured-post' : ''; ?>

			<?php do_action( 'gmw_search_results_loop_item_start' , $gmw, $post ); ?>

	        <tr>
	        	<!-- Estabelecimento -->
				<td>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_title(); ?>
					</a>
				</td>
				<!-- Ramo de Atuacao -->
				<td>
					<?php echo get_field('ramo_de_atuacao'); ?>
				</td>
				<!-- Distancia -->
				<td>
					<span class="radius"><?php gmw_distance_to_location( $post, $gmw ); ?></span>
				</td>
				<!-- Endereco -->
				<td>
					<div class="address-wrapper">
				    	<span class="fa fa-map-marker address-icon"></span>
				    	<span class="address"><?php gmw_location_address( $post, $gmw ); ?></span>
					</div>
				</td>
        	</tr>


				<?php do_action( 'gmw_posts_loop_before_content' , $gmw, $post ); ?>
	   						
    			<!-- Get directions -->	 	
				<?php if ( isset( $gmw['search_results']['get_directions'] ) ) { ?>
					
					<?php do_action( 'gmw_posts_loop_before_get_directions' , $gmw, $post ); ?>
					
					<div class="get-directions-link">
    					<?php gmw_directions_link( $post, $gmw, false ); ?>
    				</div>
    			<?php } ?>
    			
				<!--  Driving Distance -->
				<?php if ( isset( $gmw['search_results']['by_driving'] ) ) { ?>
    				<?php gmw_driving_distance( $post, $gmw, false ); ?>
    			<?php } ?>
    			
    			<?php do_action( 'gmw_search_results_loop_item_end' , $gmw, $post ); ?>
				
		<?php endwhile;	 ?>
	    
	    </tbody>
		
	</table>
	
	<?php do_action( 'gmw_search_results_after_loop' , $gmw ); ?>
	
	<?php do_action( 'gmw_search_results_end' , $gmw ); ?>
	
</div> <!-- output wrapper -->