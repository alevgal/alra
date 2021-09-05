<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PeopleServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        add_action( 'init', [__CLASS__,  'registerPostType'], 0 );
        add_action( 'init', [__CLASS__,  'registerSector'], 0 );

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
            'name'                  => _x( 'List of People', 'Post Type General Name', 'alra' ),
            'singular_name'         => _x( 'Person', 'Post Type Singular Name', 'alra' ),
            'menu_name'             => __( 'People', 'alra' ),
            'name_admin_bar'        => __( 'People', 'alra' ),
            'archives'              => __( 'People Archives', 'alra' ),
            'attributes'            => __( 'People Attributes', 'alra' ),
            'parent_item_colon'     => __( 'Parent Person:', 'alra' ),
            'all_items'             => __( 'All People', 'alra' ),
            'add_new_item'          => __( 'Add New Person', 'alra' ),
            'add_new'               => __( 'Add New', 'alra' ),
            'new_item'              => __( 'New Person', 'alra' ),
            'edit_item'             => __( 'Edit Person', 'alra' ),
            'update_item'           => __( 'Update Person', 'alra' ),
            'view_item'             => __( 'View Person', 'alra' ),
            'view_items'            => __( 'View Person', 'alra' ),
            'search_items'          => __( 'Search People', 'alra' ),
            'not_found'             => __( 'Not found', 'alra' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'alra' ),
            'featured_image'        => __( 'Photo', 'alra' ),
            'set_featured_image'    => __( 'Set photo', 'alra' ),
            'remove_featured_image' => __( 'Remove photo', 'alra' ),
            'use_featured_image'    => __( 'Use as photo', 'alra' ),
            'insert_into_item'      => __( 'Insert into item', 'alra' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Agent', 'alra' ),
            'items_list'            => __( 'People list', 'alra' ),
            'items_list_navigation' => __( 'People list navigation', 'alra' ),
            'filter_items_list'     => __( 'Filter People list', 'alra' ),
        );
        $args = array(
            'label'                 => __( 'People', 'alra' ),
            'description'           => __( 'People', 'alra' ),
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
            'capability_type'       => 'post',
            'show_in_rest'          => true,
            'taxonomies'            => ['sector']
        );
        register_post_type( 'people', $args );
    }

    public static function registerSector() {

        $labels = array(
            'name'                       => _x( 'Sectors', 'Taxonomy General Name', 'alra' ),
            'singular_name'              => _x( 'Sector', 'Taxonomy Singular Name', 'alra' ),
            'menu_name'                  => __( 'Sector', 'alra' ),
            'all_items'                  => __( 'All Sectors', 'alra' ),
            'parent_item'                => __( 'Parent Sector', 'alra' ),
            'parent_item_colon'          => __( 'Parent Sector:', 'alra' ),
            'new_item_name'              => __( 'New Sector Name', 'alra' ),
            'add_new_item'               => __( 'Add New Sector', 'alra' ),
            'edit_item'                  => __( 'Edit Sector', 'alra' ),
            'update_item'                => __( 'Update Sector', 'alra' ),
            'view_item'                  => __( 'View Sector', 'alra' ),
            'separate_items_with_commas' => __( 'Separate Sectors with commas', 'alra' ),
            'add_or_remove_items'        => __( 'Add or remove Sectors', 'alra' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'alra' ),
            'popular_items'              => __( 'Popular Sectors', 'alra' ),
            'search_items'               => __( 'Search Sectors', 'alra' ),
            'not_found'                  => __( 'Not Found', 'alra' ),
            'no_terms'                   => __( 'No Sectors', 'alra' ),
            'items_list'                 => __( 'Sectors list', 'alra' ),
            'items_list_navigation'      => __( 'Sectors list navigation', 'alra' ),
        );
        $args   = array(
            'labels'            => $labels,
            'hierarchical'      => true,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud'     => false,
            'show_in_rest'      => true,
        );
        register_taxonomy( 'sector', array( 'people' ), $args );
    }

    public static function getArchivePageTitle( $title, $original_title  ) {
        return is_post_type_archive('people') ? $original_title : $title;
    }
}
