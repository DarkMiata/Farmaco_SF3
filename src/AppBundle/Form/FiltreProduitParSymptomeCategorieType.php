<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form;

/**
 * Description of FiltreProduitParSymptomeCategorieType
 *
 * @author Formation
 */
class FiltreProduitParSymptomeCategorieType extends \Symfony\Component\Form\AbstractType {
  public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options) {
    $builder
      ->add("symptome", \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, ["class"=>"AppBundle:Symptome"])
      ->add("categorie", \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, ["class"=>"AppBundle:Categorie"])
      ->add("submit", \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)  
      ;
  }
}
