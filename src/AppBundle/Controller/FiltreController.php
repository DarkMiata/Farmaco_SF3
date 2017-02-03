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
    }

    // récupère les recettes en fonction du filtre

    $recettes = $qb->getQuery()->getResult();

    return $this->render('AppBundle:Filtre:lister_recettes_par_symptome_produit.html.twig'
        , ["monForm" => $form->createView()
        , "recettes" => $recettes
        , "filtreProd" => $dto->getProduit()
        , "filtreSympt" => $dto->getSymptome()]
    );
  }

  // ==================================
  // Recherche des produits par symptôme / catégorie

  /**
   * @Route("/listerProduitsParSymptomeCategorie")
   */
  public function listerProduitsParSymptomeCategorieAction(\Symfony\Component\HttpFoundation\Request $request) {
    $dto = new \AppBundle\DTO\FiltreProduitParSymptomeCategorieDTO();
    $form = $this->createForm(\AppBundle\Form\FiltreProduitParSymptomeCategorieType::class, $dto);

    $form->handleRequest($request);

    $qb = new \Doctrine\ORM\QueryBuilder($this->getDoctrine()->getManager());
    
    $qb->
      select("p")
      ->from("AppBundle:Produit", "p")
      ->orderBy("p.nom");
    
        // Limite les requetes si l utilisateur à rempli les filtres
    if ($form->isSubmitted()) {

      // complete la requete dans le cas ou l'on filtre sur le categorie
      if ($dto->getProduit() != NULL) {
        $qb->join("p.categorie", "cat")
          ->where("cat.id=:idCat")->setParameter("idCat", $dto->getCategorie()->getId());
      }

      // complete la requete dans le cas ou l'on filtre sur le symptome
      if ($dto->getSymptome() != NULL) {
        $qb->join("p.symptome", "symp")
          ->where("symp.id=:idSympt")->setParameter("idSympt", $dto->getSymptome()->getId());
      }
    }
    
    $produits = $qb->getQuery()->getResult();  
    
    return $this->render('AppBundle:Filtre:lister_produits_par_symptome_categorie.html.twig'
        , ["monForm" => $form->createView()
        , "produits" => $produits
        , "filtreCat" => $dto->getCategorie()
        , "filtreSympt" => $dto->getSymptome()]
    );
  }

  // ==================================
  // Recherche des symptômes par produit

  /**
   * @Route("/lister_symptProd", name="lister_symptProd")
   */
  public function listerSymptomesParProduitAction() {
    
  }

// ==================================
  // Liste des dernières recettes parues ( avec pagination )

  /**
   * @Route("/lister_lastRecetParues", name="lister_lastRecetParues")
   */
  public function listerDernieresRecettesParuesAction() {
    
  }

  // ==================================
  // Liste des derniers produits décrits ( avec pagination )

  /**
   * @Route("/lister_lastProdsDecrits", name="lister_lastProdsDecrits")
   */
  public function listerDerniersProduitsDecritsAction() {
    
  }

  // ==================================
  // Interface de connexion

  /**
   * @Route("/connexion", name="connexion")
   */
  public function connexionAction() {
    
  }

  // ==================================
  // Interface de inscription

  /**
   * @Route("/inscription", name="inscription")
   */
  public function inscriptionAction() {
    
  }

  // ==================================
  // Publication de recettes pour les inscrits ( à modérer par l’admin )

  /**
   * @Route("/publication", name="publication")
   */
  public function publicationAction() {
    
  }

}
