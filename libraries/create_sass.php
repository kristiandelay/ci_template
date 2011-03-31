<?php
  include "sass/SassParser.php";

  function sass_watch() {
    $sass = new SassParser(array('style' => 'nested'));

    if ($handle = opendir('/home/ubuntu/public_html/static/stylesheets/sass')) {
      while (false !== ($file = readdir($handle))) {
        if(strstr($file, ".sass")) {
          $css = $sass->toCss("/home/ubuntu/public_html/static/stylesheets/sass/$file");
          $css_file_name = substr($file, 0, strrpos($file, '.'));
          $myFile = "/home/ubuntu/public_html/static/stylesheets/$css_file_name.css";
          echo "creating $myFile \n";
          $file_handle = fopen($myFile, 'w');
          fwrite($file_handle, $css);
        }
      }
    closedir($handle);
    }
  }
?>
