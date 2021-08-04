<?php

//Autoloader
// {
//     "autoload" : {
//         // "psr-4" : {
//         //     "NM_THEME\\Inc\\Classes\\" : "inc/classes/"
//         // }

//         "classmap": ["inc/classes/"]
//     }
// }

// print_r(dirname(__FILE__));
// echo "<br/>";
// print_r(NM_DIR_PATH);
// echo "<br/>";
// print_r(NM_DIR_URI);





//Singleton
//require_once NM_DIR_PATH . '/inc/traits/trait-singleton.php';

//Class
//use \NM_THEME\Inc\Classes\NM_THEME;

//require_once NM_DIR_PATH . '/inc/classes/class-nm-theme.php';

//$test45 = new NM_THEME();

//NM_THEME::get_instance();

//\NM_THEME\Inc\Classes\NM_THEME::get_instance();





// echo "<pre>";
//  print_r(NM_THEME_PATH);
//  print_r(NM_THEME_URI);
//  wp_die();


//jQuery load
// function nm_jquery_in_footer()
// {
//     if (!is_admin()) {
//         wp_deregister_script('jquery');
//         wp_register_script('jquery', home_url(trailingslashit(WPINC) . 'js/jquery/jquery.js'), false, null, true);

//         wp_enqueue_script('jquery');
//     }
// }
// add_action('init', 'nm_jquery_in_footer');



// function pagina(){
//     $data = ["A", 2, "B", 4, "C", 6];

// $pagi = 0;

// for($i=$pagi; $i<count($data); $i++){

   

//     print_r($data[$i]);
//     echo "<br>";



//     $pagi++;
   

// }

// echo "<pre>";
// print_r("");
// wp_die();

// }

// NPM PLUGIN
//https://codeytek.com/setting-up-webpack-and-babel-for-your-wordpress-theme/
// npm i webpack webpack-cli @babel/core @babel/preset-env @babel/preset-react babel-loader clean-webpack-plugin css-loader file-loader mini-css-extract-plugin optimize-css-assets-webpack-plugin cssnano style-loader uglifyjs-webpack-plugin cross-env -D


?>