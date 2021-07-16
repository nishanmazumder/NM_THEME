<?php 

namespace NM_THEME\Inc\Helper;

spl_autoload_register('NM_THEME\Inc\Helper\nm_theme_autoload');

function nm_theme_autoload($class){ 
   $path = NM_DIR_PATH."/inc/classes/class-";
   $ext = ".php";
   $file = $path.$class.$ext;

   if(!file_exists($file)){
      //return false;

      echo "Not Found";
   }


   include NM_DIR_PATH. '/inc/classes/'.$class.'.php';
   //include_once $file;
}