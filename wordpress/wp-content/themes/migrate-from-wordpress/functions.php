<?php

add_action( 'init', 'migrate_payload_setup' );

function migrate_payload_setup() {

  /////////////////////////////////////////
  // Add options pages 
  /////////////////////////////////////////

  if (function_exists('acf_add_options_page')) {   
    acf_add_options_sub_page(array(
      'page_title'    	=> 'Header',
      'menu_title'	    => 'Header',
      'parent_slug'   	=> 'themes.php',
      'show_in_graphql' => true
    ));
  }

  /////////////////////////////////////////
  // Register post types 
  /////////////////////////////////////////

  register_post_type( 'custom-posts', array(
    'hierarchical' => true,
    'public' => true,
    'has_archive' => false,
    'menu_position' => 21, // places menu item directly below Pages
    'labels' => array(
      'name' => __( 'Custom Posts' ),
      'singular_name' => __( 'Custom Post' ),
      'add_new' => __( 'Add New' ),
      'add_new_item' => __( 'Add New Custom Post' ),
      'edit' => __( 'Edit' ),
      'edit_item' => __( 'Edit Custom Post' ),
      'new_item' => __( 'New Custom Post' ),
      'view' => __( 'View Custom Post' ),
      'view_item' => __( 'View Custom Posts' ),
      'search_items' => __( 'Search Custom Posts' ),
      'not_found' => __( 'No Custom Posts found' ),
      'not_found_in_trash' => __( 'No Custom Posts found in Trash' ),
      'parent' => __( 'Parent Custom Post' )
    ),
    'supports' => array( 'title', 'editor', 'revisions', 'thumbnail', 'page-attributes' ),
    'show_in_graphql' => true,
    'graphql_single_name' => 'customPost',
    'graphql_plural_name' => 'customPosts'
  ) );

  /////////////////////////////////////////
  // Register custom fields 
  /////////////////////////////////////////
  
  if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
      'key' => 'group_6339af459ebe9',
      'title' => 'Custom Posts',
      'fields' => array(
        array(
          'key' => 'field_6339b6876f94e',
          'label' => 'Custom Field',
          'name' => 'custom_field',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'show_in_graphql' => 1,
          'default_value' => '',
          'maxlength' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'custom-posts',
          ),
        ),
      ),
      'menu_order' => 0,
      'position' => 'acf_after_title',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => array(
        0 => 'permalink',
        1 => 'the_content',
        2 => 'excerpt',
        3 => 'discussion',
        4 => 'comments',
        5 => 'revisions',
        6 => 'slug',
        7 => 'author',
        8 => 'format',
        9 => 'page_attributes',
        10 => 'featured_image',
        11 => 'categories',
        12 => 'tags',
        13 => 'send-trackbacks',
      ),
      'active' => true,
      'description' => '',
      'show_in_rest' => 0,
      'show_in_graphql' => 1,
      'graphql_field_name' => 'customPostsACF',
      'map_graphql_types_from_location_rules' => 0,
      'graphql_types' => '',
    ));
    
    acf_add_local_field_group(array(
      'key' => 'group_6339ad3aad4f9',
      'title' => 'Header',
      'fields' => array(
        array(
          'key' => 'field_6339ad3a3c80c',
          'label' => 'Menu Items',
          'name' => 'items',
          'type' => 'repeater',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'show_in_graphql' => 1,
          'layout' => 'block',
          'pagination' => 0,
          'min' => 0,
          'max' => 0,
          'collapsed' => '',
          'button_label' => 'Add Row',
          'rows_per_page' => 20,
          'sub_fields' => array(
            array(
              'key' => 'field_6339ad673c80d',
              'label' => 'Type',
              'name' => 'type',
              'type' => 'radio',
              'instructions' => '',
              'required' => 1,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'show_in_graphql' => 1,
              'choices' => array(
                'link' => 'Link',
                'subMenu' => 'Sub Menu',
              ),
              'default_value' => '',
              'return_format' => 'value',
              'allow_null' => 0,
              'other_choice' => 0,
              'layout' => 'horizontal',
              'save_other_choice' => 0,
              'parent_repeater' => 'field_6339ad3a3c80c',
            ),
            array(
              'key' => 'field_6339add93c810',
              'label' => 'Label',
              'name' => 'label',
              'type' => 'text',
              'instructions' => '',
              'required' => 1,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'show_in_graphql' => 1,
              'default_value' => '',
              'maxlength' => '',
              'placeholder' => '',
              'prepend' => '',
              'append' => '',
              'parent_repeater' => 'field_6339ad3a3c80c',
            ),
            array(
              'key' => 'field_6339ad933c80e',
              'label' => 'Link',
              'name' => 'link',
              'type' => 'group',
              'instructions' => '',
              'required' => 1,
              'conditional_logic' => array(
                array(
                  array(
                    'field' => 'field_6339ad673c80d',
                    'operator' => '==',
                    'value' => 'link',
                  ),
                ),
              ),
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'show_in_graphql' => 1,
              'layout' => 'block',
              'sub_fields' => array(
                array(
                  'key' => 'field_6339ad9c3c80f',
                  'label' => 'Link Type',
                  'name' => 'type',
                  'type' => 'radio',
                  'instructions' => '',
                  'required' => 1,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'show_in_graphql' => 1,
                  'choices' => array(
                    'custom' => 'Custom',
                    'reference' => 'Link to another document',
                  ),
                  'default_value' => 'reference',
                  'return_format' => 'value',
                  'allow_null' => 0,
                  'other_choice' => 0,
                  'layout' => 'horizontal',
                  'save_other_choice' => 0,
                ),
                array(
                  'key' => 'field_6339adf13c811',
                  'label' => 'URL',
                  'name' => 'url',
                  'type' => 'text',
                  'instructions' => '',
                  'required' => 1,
                  'conditional_logic' => array(
                    array(
                      array(
                        'field' => 'field_6339ad9c3c80f',
                        'operator' => '==',
                        'value' => 'custom',
                      ),
                    ),
                  ),
                  'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'show_in_graphql' => 1,
                  'default_value' => '',
                  'maxlength' => '',
                  'placeholder' => '',
                  'prepend' => '',
                  'append' => '',
                ),
                array(
                  'key' => 'field_6339ae063c812',
                  'label' => 'Document to link to',
                  'name' => 'reference',
                  'type' => 'post_object',
                  'instructions' => '',
                  'required' => 1,
                  'conditional_logic' => array(
                    array(
                      array(
                        'field' => 'field_6339ad9c3c80f',
                        'operator' => '==',
                        'value' => 'reference',
                      ),
                    ),
                  ),
                  'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'show_in_graphql' => 1,
                  'post_type' => array(
                    0 => 'post',
                    1 => 'page',
                  ),
                  'taxonomy' => '',
                  'return_format' => 'object',
                  'multiple' => 0,
                  'allow_null' => 0,
                  'ui' => 1,
                ),
              ),
              'parent_repeater' => 'field_6339ad3a3c80c',
            ),
            array(
              'key' => 'field_6339afe7d3513',
              'label' => 'Sub Menu',
              'name' => 'subMenu',
              'type' => 'repeater',
              'instructions' => '',
              'required' => 1,
              'conditional_logic' => array(
                array(
                  array(
                    'field' => 'field_6339ad673c80d',
                    'operator' => '==',
                    'value' => 'subMenu',
                  ),
                ),
              ),
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'show_in_graphql' => 1,
              'layout' => 'block',
              'pagination' => 0,
              'min' => 1,
              'max' => 0,
              'collapsed' => '',
              'button_label' => 'Add Row',
              'rows_per_page' => 20,
              'sub_fields' => array(
                array(
                  'key' => 'field_6339b059f09b3',
                  'label' => 'Label',
                  'name' => 'label',
                  'type' => 'text',
                  'instructions' => '',
                  'required' => 1,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'show_in_graphql' => 1,
                  'default_value' => '',
                  'maxlength' => '',
                  'placeholder' => '',
                  'prepend' => '',
                  'append' => '',
                  'parent_repeater' => 'field_6339afe7d3513',
                ),
                array(
                  'key' => 'field_6339b059f09b2',
                  'label' => 'Link Type',
                  'name' => 'type',
                  'type' => 'radio',
                  'instructions' => '',
                  'required' => 1,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'show_in_graphql' => 1,
                  'choices' => array(
                    'custom' => 'Custom',
                    'reference' => 'Link to another document',
                  ),
                  'default_value' => 'reference',
                  'return_format' => 'value',
                  'allow_null' => 0,
                  'other_choice' => 0,
                  'layout' => 'horizontal',
                  'save_other_choice' => 0,
                  'parent_repeater' => 'field_6339afe7d3513',
                ),
                array(
                  'key' => 'field_6339b059f09b4',
                  'label' => 'URL',
                  'name' => 'url',
                  'type' => 'text',
                  'instructions' => '',
                  'required' => 1,
                  'conditional_logic' => array(
                    array(
                      array(
                        'field' => 'field_6339b059f09b2',
                        'operator' => '==',
                        'value' => 'custom',
                      ),
                    ),
                  ),
                  'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'show_in_graphql' => 1,
                  'default_value' => '',
                  'maxlength' => '',
                  'placeholder' => '',
                  'prepend' => '',
                  'append' => '',
                  'parent_repeater' => 'field_6339afe7d3513',
                ),
                array(
                  'key' => 'field_6339b059f09b5',
                  'label' => 'Document to link to',
                  'name' => 'reference',
                  'type' => 'post_object',
                  'instructions' => '',
                  'required' => 1,
                  'conditional_logic' => array(
                    array(
                      array(
                        'field' => 'field_6339b059f09b2',
                        'operator' => '==',
                        'value' => 'reference',
                      ),
                    ),
                  ),
                  'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'show_in_graphql' => 1,
                  'post_type' => array(
                    0 => 'post',
                    1 => 'page',
                  ),
                  'taxonomy' => '',
                  'return_format' => 'object',
                  'multiple' => 0,
                  'allow_null' => 0,
                  'ui' => 1,
                  'parent_repeater' => 'field_6339afe7d3513',
                ),
              ),
              'parent_repeater' => 'field_6339ad3a3c80c',
            ),
          ),
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'options_page',
            'operator' => '==',
            'value' => 'acf-options-header',
          ),
        ),
      ),
      'menu_order' => 0,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => '',
      'active' => true,
      'description' => '',
      'show_in_rest' => 0,
      'show_in_graphql' => 1,
      'graphql_field_name' => 'header',
      'map_graphql_types_from_location_rules' => 0,
      'graphql_types' => '',
    ));
    
    acf_add_local_field_group(array(
      'key' => 'group_6337058d945ba',
      'title' => 'Pages and Posts',
      'fields' => array(
        array(
          'key' => 'field_6337058dc2064',
          'label' => 'Hero Type',
          'name' => 'hero_type',
          'type' => 'select',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'show_in_graphql' => 1,
          'choices' => array(
            'basic' => 'Basic',
            'fullscreen' => 'Fullscreen',
          ),
          'default_value' => 'basic',
          'return_format' => 'value',
          'multiple' => 0,
          'allow_null' => 0,
          'ui' => 0,
          'ajax' => 0,
          'placeholder' => '',
        ),
        array(
          'key' => 'field_633708fb84389',
          'label' => 'Content',
          'name' => 'content',
          'type' => 'wysiwyg',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'show_in_graphql' => 1,
          'default_value' => '',
          'delay' => 0,
          'tabs' => 'all',
          'toolbar' => 'full',
          'media_upload' => 1,
        ),
        array(
          'key' => 'field_633709078438a',
          'label' => 'Background',
          'name' => 'background',
          'type' => 'image',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => array(
            array(
              array(
                'field' => 'field_6337058dc2064',
                'operator' => '==',
                'value' => 'fullscreen',
              ),
            ),
          ),
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'show_in_graphql' => 1,
          'return_format' => 'array',
          'library' => 'all',
          'min_width' => '',
          'min_height' => '',
          'min_size' => '',
          'max_width' => '',
          'max_height' => '',
          'max_size' => '',
          'mime_types' => '',
          'preview_size' => 'medium',
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'page',
          ),
        ),
        array(
          array(
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'post',
          ),
        ),
      ),
      'menu_order' => 0,
      'position' => 'acf_after_title',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => '',
      'active' => true,
      'description' => '',
      'show_in_rest' => 0,
      'show_in_graphql' => 1,
      'graphql_field_name' => 'acf',
      'map_graphql_types_from_location_rules' => 0,
      'graphql_types' => '',
    ));
    
    endif;		
}