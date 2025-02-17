<?php

namespace Models;

class Stat extends Mongodb
{

      public function getAllObjet()
    {
        return $this->getAlls('animaux');
    }
   
}