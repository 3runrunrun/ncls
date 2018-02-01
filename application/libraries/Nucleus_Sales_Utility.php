<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Nucleus_Sales_Utility
{
  private $list_view_data = array();
  
  function __construct()
  {
    $CI =& get_instance();
  }

  public function password_generator($length = 5)
  {
    $stacks = "";
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for ($i=0; $i < $length; $i++) { 
      $stacks.=substr($chars, rand(0, strlen($chars)), 1);
    }

    return $stacks;
  }

  public function date_formatter($date_string, $format)
  {
    $date_object = date_create($date_string);
    $formatted_date = date_format($date_object, $format);
    return $formatted_date;
  }
}