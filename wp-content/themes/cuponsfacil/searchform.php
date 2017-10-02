<div class="col m12 busca">
	<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
	    <input type="search" placeholder="O que você está procurando? Digite aqui..." value="<?php echo get_search_query() ?>" name="s" title="Buscar"/>
	    <input type="submit" value="ENCONTRAR">
	</form>
</div>