<?php

/**
 * here make all myfunction
 * 
 * what function we created
 * 1-function to direct
 * 2-function to get and post
 * 3-function to session
 * 4-function to validation
 * 5-function to athuntcation
 * 6-function to token
 */

 //make function to view 
 function view($view){
  return  include_once '../../views/'.$view.'php';  
 }