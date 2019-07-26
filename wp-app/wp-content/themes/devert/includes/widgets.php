<?php

    function ju_widgets() {
        register_sidebar(
            array(
                'name' => __('My First Theme Sidebar', 'devert'),
                'id' => 'ju_sidebar',
                'description' => __('Sidebar for the theme devert', 'devert'),
                'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4>',
                'after_title' => '</h4>',
            )
        );
    }