<?php

namespace App\Data;

use App\Entity\NiveauScolaire;

class SearchData{

    /**
     * @var string
     */

     public $q = '';

     /**
      * @var NiveauScolaire[];
    */

     public $niveauscolaire = [];

     /**
      * @var null/integer
      */

      public $max;

      /**
       * @var null/integer
       */

      public $min;
}