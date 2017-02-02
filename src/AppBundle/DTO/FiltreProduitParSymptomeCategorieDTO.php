<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\DTO;

/**
 * Description of FiltrelProduitParSymptomeCategorieDTO
 *
 * @author Formation
 */
class FiltrelProduitParSymptomeCategorieDTO {
  private $symptome;
  private $categorie;
  
  function getSymptome() {
    return $this->symptome;
  }

  function getCategorie() {
    return $this->categorie;
  }

  function setSymptome($symptome) {
    $this->symptome = $symptome;
  }

  function setCategorie($categorie) {
    $this->categorie = $categorie;
  }
}
