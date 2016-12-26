<?php

//declare DOMDocument
$objDOM = new DOMDocument();

//Load xml file into DOMDocument variable
$objDOM->load("../colors_material.xml");

//Find Tag element "config" and return the element to variable $node
$node = $objDOM->getElementsByTagName("color");

//create file 
$material_colors_file = fopen("material_colors.gpl", "w") or die("Unable to open file!");

fwrite($material_colors_file, "GIMP Palette\n");
fwrite($material_colors_file, "Name: Material Colors\n");
fwrite($material_colors_file, "#\n");

//looping if tag config have more than one
foreach ($node as $searchNode) {
   $rgb_array = hextorgb($searchNode->nodeValue);  
   $rgb_value_with_name = $rgb_array['r']." ".$rgb_array['g']." ".$rgb_array['b']."\t\t".$searchNode->getAttribute('name')."\n";
   fwrite($material_colors_file, $rgb_value_with_name);
}

fclose($material_colors_file);

function hextorgb($hex, $alpha = false) {
   $hex = str_replace('#', '', $hex);
   if ( strlen($hex) == 6 ) {
      $rgb['r'] = hexdec(substr($hex, 0, 2));
      $rgb['g'] = hexdec(substr($hex, 2, 2));
      $rgb['b'] = hexdec(substr($hex, 4, 2));
   }
   else if ( strlen($hex) == 3 ) {
      $rgb['r'] = hexdec(str_repeat(substr($hex, 0, 1), 2));
      $rgb['g'] = hexdec(str_repeat(substr($hex, 1, 1), 2));
      $rgb['b'] = hexdec(str_repeat(substr($hex, 2, 1), 2));
   }
   else {
      $rgb['r'] = '0';
      $rgb['g'] = '0';
      $rgb['b'] = '0';
   }
   if ( $alpha ) {
      $rgb['a'] = $alpha;
   }
   return $rgb;
}