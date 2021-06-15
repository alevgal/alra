<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AgentsServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        add_action( 'init', [__CLASS__,  'registerPostType'], 0 );

        add_filter( 'get_the_archive_title', [__CLASS__, 'getArchivePageTitle'], 0, 2);

//        if( function_exists('acf_add_options_sub_page') ) {
//            acf_add_options_sub_page(array(
//                'page_title' 	=> 'Agents Page Settings',
//                'menu_title'	=> 'Page Settings',
//                'parent_slug'	=> 'edit.php?post_type=agents',
//            ));
//        }

    }

    public static function registerPostType()
    {
        $labels = array(
            'name'                  => _x( 'List of Agents', 'Post Type General Name', 'alra' ),
            'singular_name'         => _x( 'Agent', 'Post Type Singular Name', 'alra' ),
            'menu_name'             => __( 'Agents', 'alra' ),
            'name_admin_bar'        => __( 'Agents', 'alra' ),
            'archives'              => __( 'Agents Archives', 'alra' ),
            'attributes'            => __( 'Agents Attributes', 'alra' ),
            'parent_item_colon'     => __( 'Parent Agent:', 'alra' ),
            'all_items'             => __( 'All Agents', 'alra' ),
            'add_new_item'          => __( 'Add New Agent', 'alra' ),
            'add_new'               => __( 'Add New', 'alra' ),
            'new_item'              => __( 'New Agent', 'alra' ),
            'edit_item'             => __( 'Edit Agent', 'alra' ),
            'update_item'           => __( 'Update Agent', 'alra' ),
            'view_item'             => __( 'View Agent', 'alra' ),
            'view_items'            => __( 'View Agent', 'alra' ),
            'search_items'          => __( 'Search Agents', 'alra' ),
            'not_found'             => __( 'Not found', 'alra' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'alra' ),
            'featured_image'        => __( 'Photo', 'alra' ),
            'set_featured_image'    => __( 'Set photo', 'alra' ),
            'remove_featured_image' => __( 'Remove photo', 'alra' ),
            'use_featured_image'    => __( 'Use as photo', 'alra' ),
            'insert_into_item'      => __( 'Insert into item', 'alra' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Agent', 'alra' ),
            'items_list'            => __( 'Agents list', 'alra' ),
            'items_list_navigation' => __( 'Agents list navigation', 'alra' ),
            'filter_items_list'     => __( 'Filter Agents list', 'alra' ),
        );
        $args = array(
            'label'                 => __( 'Agent', 'alra' ),
            'description'           => __( 'Agents', 'alra' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-admin-users',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
        );
        register_post_type( 'agents', $args );
    }

    public static function getArchivePageTitle( $title, $original_title  ) {
        return is_post_type_archive('agents') ? $original_title : $title;
    }
}
