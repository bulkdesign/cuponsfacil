<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<script type="text/javascript">
jQuery(document).ready(function () {
	jQuery('#datalist').DataTable(<?php do_action('wow_fb_members_table'); ?>);
});
</script>
    <table id="datalist">
    <thead>
      <tr>
        <th><u><?php esc_attr_e("Order", "wow-fb-login") ?></u></th>
		<th><u><?php esc_attr_e("Email", "wow-fb-login") ?></u></th>
		 <th><u><?php esc_attr_e("First name", "wow-fb-login") ?></u></th>
		 <th><u><?php esc_attr_e("Last name", "wow-fb-login") ?></u></th>
		 <th><u><?php esc_attr_e("Profile", "wow-fb-login") ?></u></th>		 
		<th><u><?php esc_attr_e("Action", "wow-fb-login") ?></u></th>		
      </tr>
    </thead>
   <tbody>
      <?php
           if ($resultat) {			   
			   $i=0;
			   foreach ($resultat as $key => $value) {
				 if(!empty($value->email)){
				    $i++;
					$id = $value->ID;					
					$email = $value->email;
					$first_name = $value->first_name;
					$last_name = $value->last_name;
					$link = $value->link;
					
                ?>
      <tr>
	    <td><?php echo "$i"; ?></td>
		<td><?php echo $email; ?></td> 
		<td><?php echo $first_name; ?></td> 
		<td><?php echo $last_name; ?></td>
		<td><a href="<?php echo $link; ?>" target="_blank">link</a></td>
		<td><u><a href="admin.php?page=wow-fb-login&wow=members&info=del&did=<?php echo $id; ?>"><?php esc_attr_e("Delete", "wow-fb-login") ?></a></u></td>
		
		        
      </tr>
      <?php
	  }
            }
        } 
            ?>
     
    </tbody>
  </table>