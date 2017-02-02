<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class FiltreController extends Controller {

  /**
   * @Route("/listerRecettesParSymptomeProduit")
   */
  public function listerRecettesParSymptomeProduitAction(\Symfony\Component\HttpFoundation\Request $request) {
    $dto = new \AppBundle\DTO\FiltreRecetteParSymptomeProduitDTO();
    $form = $this->createForm(\AppBundle\Form\FiltreRecetteParSymptomeProduitType::class, $dto);

    $form->handleRequest($request);

    // par défaut, on renvoit toutes les recettes
    $qb = new \Doctrine\ORM\QueryBuilder($this->getDoctrine()->getManager());
    $qb->select("r")->from("AppBundle:Recette", "r")->orderBy("r.nom");

    // Limite les requetes si l utilisateur à rempli les filtres
    if ($form->isSubmitted()) {

      // complete la requete dans le cas ou l'on filtre sur le produit
      if ($dto->getProduit() != NULL) {
        $qb->join("r.produit", "p")
          ->where("p.id=:idProd")->setParameter("idProd", $dto->getProduit()->getId());
      }

      // complete la requete dans le cas ou l'on filtre sur le symptome
      if ($dto->getSymptome() != NULL) {
        $qb->join("r.symptome", "s")
          ->where("s.id=:idSympt")->setParameter("idSympt", $dto->getSymptome()->getId());
      }

      // récupère les recettes en fonction du filtre

      $recettes = $qb->getQuery()->getResult();

      return $this->render('AppBundle:Filtre:lister_recettes_par_symptome_produit.html.twig', ["monForm" => $form->createView(), "recettes" => $recettes]);
   
  }

}
