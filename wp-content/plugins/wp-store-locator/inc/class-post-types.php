<?php
/**
 * Store Locator custom post type.
 *
 * @author Tijmen Smit
 * @since  2.0.0
 */

if ( !defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'WPSL_Post_Types' ) ) {
    
    class WPSL_Post_Types {
        
        /**
         * Constructor
         */
        public function __construct() {
            add_action( 'init',                                     array( $this, 'register_post_types' ), 10, 1 );
            add_action( 'init',                                     array( $this, 'register_taxonomies' ), 10, 1 );
            add_action( 'manage_wpsl_stores_posts_custom_column',   array( $this, 'custom_columns' ), 10, 2 );
            
            add_filter( 'enter_title_here',                         array( $this, 'change_default_title' ) );
            add_filter( 'manage_edit-wpsl_stores_columns',          array( $this, 'edit_columns' ) );
            add_filter( 'manage_edit-wpsl_stores_sortable_columns', array( $this, 'sortable_columns' ) );
            add_filter( 'request',                                  array( $this, 'sort_columns' ) );
        }        
        
        /**
         * Register the WPSL post type.
         * 
         * @since 2.0.0
         * @return void
         */
        public function register_post_types() {

            global $wpsl_settings;
            
            // Enable permalinks for the post type?
            if ( isset( $wpsl_settings['permalinks'] ) && $wpsl_settings['permalinks'] ) {
                $public              = true;
                $exclude_from_search = false;
                $rewrite             = array( 'slug' => $wpsl_settings['permalink_slug'] );
            } else {
                $public              = false;
                $exclude_from_search = true;
                $rewrite             = false;
            }

            // The labels for the wpsl_stores post type.
            $labels = apply_filters( 'wpsl_post_type_labels', array(
                    'name'               => __( 'Estabelecimentos', 'wpsl' ),
                    'all_items'          => __( 'Ver Todos', 'wpsl' ),
                    'singular_name'      => __( 'Estabelecimento', 'wpsl' ),
                    'add_new'            => __( 'Adicionar Novo', 'wpsl' ),
                    'add_new_item'       => __( 'Adicionar Novo Estabelecimento', 'wpsl' ),
                    'edit_item'          => __( 'Editar', 'wpsl' ),
                    'new_item'           => __( 'Novo Estabelecimento', 'wpsl' ),
                    'view_item'          => __( 'Ver Estabelecimentos', 'wpsl' ),
                    'search_items'       => __( 'Buscar Estabelecimentos', 'wpsl' ),
                    'not_found'          => __( 'Nenhum Estabelecimento Encontrado', 'wpsl' ),
                    'not_found_in_trash' => __( 'Não encontrado na lixeira', 'wpsl' ),
                ) 
            );
            
            // The arguments for the wpsl_stores post type.
            $args = apply_filters( 'wpsl_post_type_args', array(
                    'labels'              => $labels, 
                    'public'              => $public,
                    'exclude_from_search' => $exclude_from_search,
                    'show_ui'             => true,
                    'menu_position'       => apply_filters( 'wpsl_post_type_menu_position', null ),
                    'capability_type'     => 'store',
                    'map_meta_cap'        => true,
                    'rewrite'             => $rewrite,
                    'query_var'           => 'wpsl_stores',
                    'supports'            => array( 'title', 'editor', 'author', 'excerpt', 'revisions', 'thumbnail' )
                )
            );
            
            register_post_type( 'wpsl_stores', $args );
        }
        
        /**
         * Register the WPSL custom taxonomy.
         * 
         * @since 2.0.0
         * @return void
         */
        public function register_taxonomies() {
            
            global $wpsl_settings;
                        
            // Enable permalinks for the taxonomy?
            if ( isset( $wpsl_settings['permalinks'] ) && $wpsl_settings['permalinks'] ) {
                $public  = true;
                $rewrite = array( 'slug' => $wpsl_settings['category_slug'] );
            } else {
                $public  = false;
                $rewrite = false;
            }

            $labels = array(
				'name'              => __( 'Categorias', 'wpsl' ),
				'singular_name'     => __( 'Categoria', 'wpsl' ),
				'search_items'      => __( 'Buscar Categorias', 'wpsl' ),
				'all_items'         => __( 'Todas as Categorias', 'wpsl' ),
				'parent_item'       => __( 'Categoria Mãe', 'wpsl' ),
				'parent_item_colon' => __( 'Categoria Mãe:', 'wpsl' ),
				'edit_item'         => __( 'Editar Categoria', 'wpsl' ),
				'update_item'       => __( 'Atualizar Categoria', 'wpsl' ),
				'add_new_item'      => __( 'Adicionar Nova', 'wpsl' ),
				'new_item_name'     => __( 'Nova Categoria', 'wpsl' ),
				'menu_name'         => __( 'Categorias', 'wpsl' ),
			);
                        
            $args = apply_filters( 'wpsl_store_category_args', array(
                    'labels'                => $labels,
                    'public'                => $public,
                    'hierarchical'          => true,
                    'show_ui'               => true,
                    'show_admin_column'     => true,
                    'update_count_callback' => '_update_post_term_count',
                    'query_var'             => true,
                    'rewrite'               => $rewrite
                )
            );

            register_taxonomy( 'wpsl_store_category', 'wpsl_stores', $args );    
        }

        /**
         * Change the default "Enter title here" placeholder.
         *
         * @since 2.0.0
         * @param  string $title The default title placeholder
         * @return string $title The new title placeholder
         */
        public function change_default_title( $title ) {

            $screen = get_current_screen();

            if ( $screen->post_type == 'wpsl_stores' ) {
               $title = __( 'Insira o nome do Estabelecimento', 'wpsl' );
            }

            return $title;
        }  

        /**
         * Add new columns to the store list table.
         *
         * @since 2.0.0
         * @param  array $columns The default columns
         * @return array $columns Updated column list
         */
        public function edit_columns( $columns ) {
            
            $columns['address'] = __( 'Endereço', 'wpsl' );
            $columns['city']    = __( 'Cidade', 'wpsl' );
            $columns['state']   = __( 'Estado', 'wpsl' );
            $columns['zip']     = __( 'CEP', 'wpsl' );

            return $columns;
        }
        
        /**
         * Show the correct store content in the correct custom column.
         *
         * @since 2.0.0
         * @param  string $column  The column name
         * @param  int    $post_id The post id
         * @return void
         */
        public function custom_columns( $column, $post_id ) {
            
            switch ( $column ) {
                case 'address':
                    echo esc_html( get_post_meta( $post_id, 'wpsl_address', true ) );
				break; 
                case 'city':
                    echo esc_html( get_post_meta( $post_id, 'wpsl_city', true ) );
                break;
                case 'state':
                    echo esc_html( get_post_meta( $post_id, 'wpsl_state', true ) );
                break;
                case 'zip':
                    echo esc_html( get_post_meta( $post_id, 'wpsl_zip', true ) );
                break;
            }
        }
        
        /**
         * Define the columns that are sortable.
         *
         * @since 2.0.0
         * @param  array $columns List of sortable columns
         * @return array
         */
        public function sortable_columns( $columns ) {

            $custom = array(
                'address' => 'wpsl_address',
                'city'    => 'wpsl_city',
                'state'   => 'wpsl_state',
                'zip'     => 'wpsl_zip'
            );
           
            return wp_parse_args( $custom, $columns );
        }
        
        /**
         * Set the correct column sort parameters.
         *
         * @since 2.0.0
         * @param  array $vars Column sorting parameters
         * @return array $vars The column sorting parameters inc the correct orderby and wpsl meta_key
         */
        public function sort_columns( $vars ) {
            
            if ( isset( $vars['post_type'] ) && $vars['post_type'] == 'wpsl_stores' ) {
                if ( isset( $vars['orderby'] ) ) {
                    if ( $vars['orderby'] === 'wpsl_address' ) {
                        $vars = array_merge( $vars, array(
                            'meta_key' => 'wpsl_address',
                            'orderby'  => 'meta_value'
                        ) );
                    }
                    
                    if ( $vars['orderby'] === 'wpsl_city' ) {
                        $vars = array_merge( $vars, array(
                            'meta_key' => 'wpsl_city',
                            'orderby'  => 'meta_value'
                        ) );
                    }
                    
                    if ( $vars['orderby'] === 'wpsl_state' ) {
                        $vars = array_merge( $vars, array(
                            'meta_key' => 'wpsl_state',
                            'orderby'  => 'meta_value'
                        ) );
                    }
                    
                    if ( $vars['orderby'] === 'wpsl_zip' ) {
                        $vars = array_merge( $vars, array(
                            'meta_key' => 'wpsl_zip',
                            'orderby'  => 'meta_value'
                        ) );
                    }
                }
            }
            
            return $vars;
        }
    }
       
}