<?php

class BaseController{

    public function renderHtml($filename, $data = []){
        include($filename);
      

    }
}