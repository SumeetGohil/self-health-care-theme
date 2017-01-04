<?php
function ares_child_enqueue_styles() {

    $parent_style = 'ares-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );

    //optionsframework-css

}
add_action( 'wp_enqueue_scripts', 'ares_child_enqueue_styles' );

function ares_child_eqnueue_admin_styles($hook){


	wp_enqueue_style( 'optionsframework',  get_stylesheet_directory_uri() . '/inc/css/optionsframework.css', array(),wp_get_theme()->get('Version') );

}

add_action( 'admin_enqueue_scripts', 'ares_child_eqnueue_admin_styles' );

require_once dirname(__FILE__) . '/inc/engine/avenue.php';
require_once dirname(__FILE__) . '/merakii.php';

function add_javascript(){
  wp_register_script('my_add_ajax',get_stylesheet_directory_uri() . '/js/submit.js',array('jquery'),'3.1.1',false);
  wp_enqueue_script('my_add_ajax');
  wp_localize_script('my_add_ajax','my_ajax_url',array(
    'ajax_url'=>admin_url('admin-ajax.php')
  ));
}
add_action('wp_enqueue_scripts','add_javascript');
add_action( 'wp_ajax_store_info','store_info' );
add_action( 'wp_ajax_nopriv_store_info','store_info' );

function store_info(){
  require_once('../wp-config.php');
  //global $wpdb;

  $name=$_POST['name'];
  $countryCode=$_POST['countryCode'];
  $contact=$_POST['contact'];
  $email=$_POST['email'];
  $occupation=$_POST['occupation'];
  $age=$_POST['age'];
  $gender=$_POST['gender'];
  $smoking=$_POST['smoking'];
  $alcohol=$_POST['alcohol'];
  $height=$_POST['height'];
  $heightUnit=$_POST['heightUnit'];
  $weight=$_POST['weight'];
  $weightUnit=$_POST['weightUnit'];

  $error=array();
  if(empty($_POST['age']) || empty($_POST['gender']) || empty($_POST['height']) || empty($_POST['weight']) || !preg_match("/^[a-zA-Z ]*$/",$name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("/^[a-zA-Z ]*$/",$occupation) || !is_numeric($_POST['age'])){
    if (!preg_match("/^[a-zA-Z ]*$/",$name) && !empty($_POST["name"])) {
    array_push($error,"Only letters and white space allowed");
    }
    else {
      array_push($error," ");
    }
    if(!empty($_POST["contct"])){
      array_push($error,"please enter valid mobile number");
    }
    else{
      array_push($error," ");
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($_POST["email"])){
      array_push($error,"please enter valid email address");
    }
    else{
              array_push($error," ");
      }
      if (!preg_match("/^[a-zA-Z ]*$/",$occupation) && !empty($_POST["occupation"])) {
      array_push($error,"Only letters and white space allowed");
      }
      else {
        array_push($error," ");
      }
    if(empty($_POST['age'])){
      array_push($error,"please enter age");
    }
    elseif (!(is_numeric($_POST['age'])) && !empty($_POST['age'])) {
      array_push($error,"please enter valid number");
    }
    else{
    array_push($error," ");
  }
  if(empty($_POST['gender'])){
    array_push($error,"please select gender");
  }

  else{
    array_push($error," ");
  }
  if(empty($_POST['height'])){
    array_push($error,"please enter height");
  }
  else{
    array_push($error," ");
  }
  if(empty($_POST['weight'])){
    array_push($error,"please enter weight");
  }
  else{
    array_push($error," ");
  }
  }
  if(!empty($error)){

      //$info['success']=false;
      //print_r($info['success']);
         $a= json_encode(array("status"=>false,"errors"=>$error));
        //var_dump($info);
    }
    else{
    $data =array(
        'name' => $name,
        'countryCode' => $countryCode,
        'contact' => $contact,
        'email' => $email,
        'occupation' => $occupation,
        'age' => $age,
        'gender' => $gender,
        'smoking' => $smoking,
        'alcohol' => $alcohol,
        'height' => $height,
        'heightUnit' => $heightUnit,
        'weight' => $weight,
        'weightUnit' => $weightUnit
      );
      $a= json_encode(array("status"=>true,"success"=>"Thank You"));
    }
header('Content-Type: application/json');
//wp_die();
echo $a;
//var_dump($a);

die();

}
