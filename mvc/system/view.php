<?php
 class View{
     private $data = [];
     private $tpl;
     
     function __construct($name , $data=[]) {
         $this->data = $data;
         $this->tpl = DOC_ROOT . '/views/' . $name . '.php';
         }
         
         function __set($name, $val){
             $this->data[$name] = $val;
         }
                 
     function render($flag = FALSE){
         extract($this->data);
         ob_start();
         include $this->tpl;
         $content = ob_get_contents();
         ob_end_clean();
         if($flag){
         
             print $content;
         }
         return $content;
     }
 }

