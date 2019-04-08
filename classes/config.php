<?php

//make the class of config
// $GLOBALS['ali']=array(
// 'color'=>array(
//     'red'=>'#ee',
//     'green'=>'#f1f1f1f',
//     'blue'=>'#fff',
//     'white'=>'aaa'
// ),
// 'person'=>array(
//     'first_name'=>'ali',
//     'last_name'=>'alzubair',
//     'email'=>'ali@gmail.com'
// ),
// 'work'=>array(
//     'part1'=>'design',
//     'part2'=>'progrming'
// )
// );

class Config{
    // public static function put($x=null){
    //     //ckeck the x
    //     if($x){
    //         //set the x to ali
    //         $ali=$GLOBALS['ali'];
    //         // print_r($ali);
    //         $x=explode('/',$x);
    //         // print_r($x);
    //         //loop throw $ali
    //         foreach($x as $a){
    //             if(isset($ali[$a])){
    //                 $ali=$ali[$a];

    //             }
    //         }
    //         return $ali;
    //     }
    // }
    // make the get method
    public static function get($path=null){
        //check the path
        if($path){
            //set the globals to var config
            $config=$GLOBALS['config'];
            $path=explode('/',$path);

           //loop throw the path
           foreach($path as $bit){
               //check if iseet bit inside config
               if(isset($config[$bit])){
                   //pass the bit to config
                   $config=$config[$bit];
               }
           }
           //return the config
           return $config;


        }
        return false;
    }
     
}