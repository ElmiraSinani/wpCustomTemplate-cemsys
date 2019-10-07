<?php

add_filter( 'rwmb_meta_boxes', 'your_prefix_meta_boxes' );
function your_prefix_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = array(
        'title'      => __( 'Product details', 'textdomain' ),
        'post_types' => 'products',
        'fields'     => array(
            array(
                'id'   => 'price',
                'name' => __( 'Regular Price', 'textdomain' ),
                'type' => 'number',
            ),
             array(
                'id'   => 'price-off',
                'name' => __( 'Price OFF', 'textdomain' ),
                'type' => 'number',
            ),
             array(
                'id'   => 'currency',
                'name' => __( 'Currency', 'textdomain' ),
                'type' => 'select',
                'options'=> array(
                            'ru' => __( 'RU', 'your-prefix' ),
                            'usd' => __( 'USD', 'your-prefix' ),
                            'euro' => __( 'EURO', 'your-prefix' ),
                        ),
                'std' => 'ru',
            ),
            
        ),
    );
    
    $meta_boxes[] = array(        
        'title'      => 'Add Product Options',
        'post_types' => array( 'products' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'name'  => 'Add Content',
                'desc'  => 'Display Product options for individual product.',
                'id'    => 'product_options',
                'type'  => 'wysiwyg',
                'class' => '',
                'clone' => false,                
            ),
        )
    );
    
    $meta_boxes[] = array(
       
        'title'      => 'Product Slider Images',
        'post_types' => array( 'products' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'name'  => 'Add Slider Image',
                'desc'  => 'Display individual product image slider.',
                'id'    => 'product_gallery',
                'type'  => 'image_advanced',
                'class' => '',
                'clone' => false,                
            ),
        )
    );
    
    return $meta_boxes;
}
