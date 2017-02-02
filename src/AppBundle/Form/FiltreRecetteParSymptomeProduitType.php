<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form;

/**
 * Description of FiltreRecetteParSymptomeProduitType
 *
 * @author Formation
 */
class FiltreRecetteParSymptomeProduitType extends \Symfony\Component\Form\AbstractType {
  
  public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options) {
    $builder
      ->add("symptome", \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, ["class"=>"AppBundle:Symptome"])
      ->add("produit", \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, ["class"=>"AppBundle:Produit"]);
  }

}
