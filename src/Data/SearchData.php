<?php

namespace App\Data;

use App\Entity\NiveauScolaire;

class SearchData{


  /**  
  * @var int
  */

  public $page = 1;

    /**
     * @var string
     */

     public $q = '';

     /**
      * @var NiveauScolaire[];
    */

     public $niveauscolaire = [];

       /**
      * @var Ecoles[];
    */

    public $ecole = [];

     /**
      * @var null/integer
      */

      public $max;

      /**
       * @var null/integer
       */

      public $min;
}