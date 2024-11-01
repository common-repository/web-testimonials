<?php
/*
Plugin Name: Testimonials Plugin
Plugin URI: http://www.plumeriawebdesign.com/testimonials-plugin
Description: Plugin to add testimonials to a page or widget
Author: Elke Hinze, Plumeria Web Design
Version: 1.2
Author URI: http://www.plumeriawebdesign.com
*/

function testimonials_menu(){
  add_menu_page('Testimonial', 'Testimonials', 'manage_options', 'testimonial-options', 'list_testimonials');
  add_submenu_page('testimonial-options','Testimonial Functions', 'Testimonial Functions', 'manage_options', 'new-testimonial', 'new_testimonial');
}

add_action('admin_menu', 'testimonials_menu');

function list_testimonials() {
  include('list-testimonials.php');
}

function new_testimonial() {
  include('add-testimonial.php');  	
}

//We need to create our tables
function testimonials_create_table() {  
  global $wpdb;
  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
  
  $testimonials_table = $wpdb->prefix . "testimonials";
  
  $sql = "CREATE TABLE " . $testimonials_table . "(
		  testimonial_id int not null auto_increment,
		  testimonial varchar(3000),
		  testimonial_name varchar(100),
		  primary key(testimonial_id));";		  
  
  dbDelta($sql); 

}

register_activation_hook(__FILE__,'testimonials_create_table'); //create table on activation

function create_testimonials($atts) {
  global $wpdb; 
  
  $testimonials_table = $wpdb->prefix . "testimonials";
  
  extract(shortcode_atts(array('size' => '', 'ending' => '', 'num' => '', 'type' => '', 'class' => '', 'id' => '', 'childclass' => '' ), $atts));

  //first we build the string to limit the size of the testimonial chars returned.  If there is no size specified we want all of text
  if ($size != "") {
    $limchars = "LEFT(testimonial, ".$size.") as testimonial ";
  } else {
	$limchars = "testimonial";  
  }
  
  //let the user limit how many to return, if blank we'll get all of the testimonials in the db
  if ($num != "") {
	$limitrows = "LIMIT " .$num;  
  }
  $testimonials = $wpdb->get_results("SELECT ". $limchars . ", testimonial_name FROM ". $testimonials_table . " ORDER BY rand() ".$limitrows);
  $attributes = "";
  $childattributes = "";
	  if ($class != "") {
		$attributes .= "class=\"".$class."\" ";  
	  }
	  
	  if ($id != "") {
		$attributes .= "id=\"".$id."\" ";  
	  }
	  
	  if ($childclass  != "") {
		$childattributes = "class=\"".$childclass."\" ";  
	  }
  
  switch ($type) {
	case "list":
	  $beg_container = "<ul ".$attributes.">";
	  $beg_wrap = "<li ".$childattributes.">";  
	  $end_wrap = "</li>\n";
	  $end_container = "</ul>\n";
	  break;
	case "para":
	  $beg_wrap = "<p ".$attributes.">";
	  $end_wrap = "</p>\n";
	  break;
	case "span":
	  $beg_wrap = "<span ".$attributes.">";
	  $end_wrap = "</span>\n";
	  break;
	case "div":
	  $beg_wrap = "<div ".$attributes.">";
	  $end_wrap = "</div>\n";
	  break;
	default:
	  $beg_container = "<ul ".$attributes.">";
	  $beg_wrap = "<li>";  
	  $end_wrap = "</li>\n";
	  $end_container = "</ul>\n";  
  }
  
  if ($beg_container != "") {
	$output .= $beg_container;  
  }
  
  foreach($testimonials as $testimonies) {
    $output .= $beg_wrap .stripslashes($testimonies->testimonial.$ending) ." - ".stripslashes($testimonies->testimonial_name). $end_wrap;		
  }
  
  if ($end_container != "") {
	$output .= $end_container;  
  }
  
  return $output;
}

add_shortcode( 'plumwd-testimonials', 'create_testimonials');
?>