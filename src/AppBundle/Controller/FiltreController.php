<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class FiltreController extends Controller
{
    /**
     * @Route("/listerRecettesParSymptomeProduit")
     */
    public function listerRecettesParSymptomeProduitAction(\Symfony\Component\HttpFoundation\Request $request)
    {
      $dto = new \AppBundle\DTO\FiltreRecetteParSymptomeProduitDTO();
      $form = $this->createForm(\AppBundle\Form\FiltreRecetteParSymptomeProduitType::class, $dto);
      
      $form->handleRequest($request);
      
      
     
        return $this->render('AppBundle:Filtre:lister_recettes_par_symptome_produit.html.twig', array(
        "monForm"=>$form->createView()
        ));
    }

}
