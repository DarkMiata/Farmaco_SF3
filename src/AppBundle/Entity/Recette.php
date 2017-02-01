<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recette
 *
 * @ORM\Table(name="recette")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RecetteRepository")
 */
class Recette
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\JoinTable(name="utilisateur_id")
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     */
    private $utilisateur;

    /**
     * @ORM\JoinTable(name="symptome_id")
     * @ORM\ManyToMany(targetEntity="Symptome")
     */
    private $symptome;
    
// ================================= 
    
    /**
     * @ORM\JoinTable(name="produit_id")
     * @ORM\ManyToMany(targetEntity="Produit")
     */
    private $produit;
    
// ================================= 
    /**
     * @ORM\JoinColumn(name="categorie_id")
     * @ORM\ManyToOne(targetEntity="Categorie")
     */
    private $categorie;
    
// =================================     
    
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Recette
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Recette
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
