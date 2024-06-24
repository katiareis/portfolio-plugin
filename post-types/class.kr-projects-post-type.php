<?php
//Creates Custom Post Type Projects for KR Portfolio Plugin
if (!class_exists('KR_Projects_Post_Type')) {
  class KR_Projects_Post_Type
  {
    function __construct()
    {
      add_action('init', array($this, 'create_post_type'));
      add_action('init', array($this, 'create_taxonomy'));

    }

    public function create_post_type()
    {
      register_post_type(
        'kr-projects',
        array(
          'label'      => 'Projects',
          'description'      => 'Projects Directory for online portfolio website.',
          'labels'      => array(
            'name'          => __('Projects', 'textdomain'),
            'singular_name' => __('Project', 'textdomain'),
            'featured_image' => __('Featured Image', 'textdomain'),
            'set_featured_image' => __('Set Featured Image', 'textdomain'),
            'remove_featured_image' => __('Remove Featured Image', 'textdomain'),
            'use_featured_image' => __('Use Featured Image', 'textdomain'),
            'archives' => __('Portfolio Archives', 'textdomain'),
            'add_new' => __('Add New Project', 'textdomain'),
            'add_new_item' => __('Add New Item', 'textdomain'),
          ),
          'public'      => true,
          'has_archive' => true,
          'rewrite'     => array('slug' => 'projects'),
          'supports'    => array('title', 'editor', 'excerpt', 'thumbnail', 'author', 'post-formats'),
          //'has_archive' => 'portfolio',
          'hierarchical'  => false,
          'show_in_ui'  => true,
          'show_in_menu'  => true,
          'menu_position' => 5,
          'show_in_admin_bar' => true,
          'show_in_nav_menu'  => true,
          'can_export' => true,
          'exclude_from_search' => false,
          'public_queryable'  => true,
          'show_in_rest'  => true,
          'menu_icon' => 'dashicons-portfolio',
          //'register_meta_box_cb' => array($this, 'add_meta_boxes')
        )
      );
    }

    public function create_taxonomy()
    {
      // Register taxonomy "project-category"
      register_taxonomy(
        'project-category',
        "kr-projetos",
        array(
          'labels' => array(
            'name' => __('Project Categories', 'textdomain'),
            'singular_name' => __('Project Category', 'textdomain'),
            'add_new_item' => __('Add New Category', 'textdomain'),
          ),
          'public' => true,
          'show_admin_column' => true,
          'show_in_quick_edit' => true,
          'show_in_rest' => true,
          'hierarchical' => true,
          'rewrite' => array('hierarchical' => true, 'has_front' => true),
        )
      );

      // Register taxonomy "project-tag"
      register_taxonomy(
        'project-tag',
        "kr-projetos",
        array(
          'labels' => array(
            'name' => __('Tags', 'textdomain'),
            'singular_name' => __('Tag', 'textdomain'),
            'add_new_item' => __('Add New Tag', 'textdomain'),
          ),
          'public' => true,
          'show_admin_column' => true,
          'show_in_quick_edit' => true,
          'show_in_rest' => true,
          'hierarchical' => false,
          'rewrite' => array('hierarchical' => false, 'has_front' => true),
        )
      );
    }
  }
}
