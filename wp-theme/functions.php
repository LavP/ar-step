<?php

//HTML5を有効化
add_theme_support('html5');

function add_files(){
    //現在のページのスラッグを取得
    $page = get_post( get_the_ID() ); 
    $slug = $page->post_name; 

    //グローバルに読み込むもの
    wp_enqueue_style(
        'global-style',
        get_template_directory_uri().'/style/global.css',
        ['reset-style','google-fonts-style'],
        date('U')
    );
    wp_enqueue_style(
        'reset-style',
        get_template_directory_uri().'/style/reset.css',
        [],
        date('U')
    );
    wp_enqueue_style(
        'google-fonts-style',
        'https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,500,700,900&display=swap&subset=japanese',
        []
    );
    wp_enqueue_script(
        'vue',
        'https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js',
        [],
        false,
        true
    );
    //platesの場合に適用するもの
    if(get_post_type() == 'plates'){
        wp_enqueue_script(
            'plate-single-script',
            get_template_directory_uri().'/js/singel-plates.js',
            ['vue'],
            date('U'),
            true
        );
        wp_enqueue_style(
            'plate-single-style',
            get_template_directory_uri().'/style/single-plates.css',
            ['global-style'],
            date('U')
        );
        wp_enqueue_style(
            'search-style',
            get_template_directory_uri().'/style/archive-plates.css',
            ['global-style'],
            date('U')
        );
    };
    //TOPページに適用するもの
    if($slug == 'home'){
        wp_enqueue_style(
            'home-style',
            get_template_directory_uri().'/style/home.css',
            ['global-style'],
            date('U')
        );
        wp_enqueue_script(
            'home-script',
            get_template_directory_uri().'/js/home.js',
            ['vue'],
            false,
            true
        );
    };
};
add_action('wp_enqueue_scripts','add_files');