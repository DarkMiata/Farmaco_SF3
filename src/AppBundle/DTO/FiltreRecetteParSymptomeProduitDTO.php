<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\DTO;

/**
 * Description of FiltreRecetteParSymptomeProduit
 *
 * @author Formation
 */
class FiltreRecetteParSymptomeProduitDTO {
  private $symptome;
  private $produit;
  
  function getSymptome() {
    return $this->symptome;
  }

  function getProduit() {
    return $this->produit;
  }

  function setSymptome($symptome) {
    $this->symptome = $symptome;
  }

  function setProduit($produit) {
    $this->produit = $produit;
  }


}
