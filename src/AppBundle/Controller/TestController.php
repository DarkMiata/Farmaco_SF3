<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TestController extends Controller {
  /**
   * @Route("/lister_produits", name="lister_produits")
   */
  /**   * ** Exemple ***
    public function listerProduitsAction() {

    // Récup ts produits en DB
    $produitsRepo = $this->getDoctrine()->getRepository("AppBundle:Produit");
    $produits = $produitsRepo->findAll();

    // Envoie la var 'mesProduits'
    return $this->render("AppBundle:Test:lister_produits.html.twig", ['mesProduits' => $produits,
    'pageTitre' => "Liste des produits"]);
    }
   */
  // ==================================
  // Recherche des recettes par symptome / produit

  /**
   * @Route("/lister_recSympProd", name="lister_recSympProd")
   */
  public function listerRecettesParSymptomeProduitAction() {
    
  }

  // ==================================
  // Recherche des produits par symptôme / catégorie

  /**
   * @Route("/lister_prodSympCat", name="lister_prodSympCat")
   */
  public function listerProduitsParSymptomeCategorieAction() {
    
  }

  // ==================================
  // Recherche des symptômes par produit

  /**
   * @Route("/lister_symptProd", name="lister_symptProd")
   */
  public function listerSymptomesParProduitAction() {
    $dql =
      "SELECT s"
    . " FROM AppBundle:Symptome s"
    . " JOIN s.produit p"
    . " WHERE p.nom='doliprane'";
    
    $symptomeResult = $this->getDoctrine()->getManager()->createQuery($dql)->getResult();
    
 //   return $this->render("AppBundle:Test:com_cli_1_prod_1.html.twig", ['commandes' => $commandes]);
  }

/**  Exemple
      $dql = "SELECT cmd"
      . " FROM AppBundle:Commande cmd"
      . "   JOIN cmd.client cli"
      . "   JOIN cmd.produits prod"
      . " WHERE cli.id=1"
      . "   AND prod.id=1";

    $commandes = $this->getDoctrine()->getManager()->createQuery($dql)->getResult();

    return $this->render("AppBundle:Test:com_cli_1_prod_1.html.twig", ['commandes' => $commandes]);

 */
  
  
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
