<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Symptome
 *
 * @ORM\Table(name="symptome")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SymptomeRepository")
 */
class Symptome
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
     * @ORM\JoinTable(name="symptome_produit")
     * @ORM\ManyToMany(targetEntity="Produit", inversedBy="symptome")
     */
    private $produit;
      
    
    /**
     * @ORM\ManyToMany(targetEntity="Recette", mappedBy="symptome")
     */
    private $recette;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=128, unique=true)
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
     * @return Symptome
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
     * @return Symptome
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->produit = new \Doctrine\Common\Collections\ArrayCollection();
        $this->recette = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add produit
     *
     * @param \AppBundle\Entity\Produit $produit
     *
     * @return Symptome
     */
    public function addProduit(\AppBundle\Entity\Produit $produit)
    {
        $this->produit[] = $produit;

        return $this;
    }

    /**
     * Remove produit
     *
     * @param \AppBundle\Entity\Produit $produit
     */
    public function removeProduit(\AppBundle\Entity\Produit $produit)
    {
        $this->produit->removeElement($produit);
    }

    /**
     * Get produit
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Add recette
     *
     * @param \AppBundle\Entity\Recette $recette
     *
     * @return Symptome
     */
    public function addRecette(\AppBundle\Entity\Recette $recette)
    {
        $this->recette[] = $recette;

        return $this;
    }

    /**
     * Remove recette
     *
     * @param \AppBundle\Entity\Recette $recette
     */
    public function removeRecette(\AppBundle\Entity\Recette $recette)
    {
        $this->recette->removeElement($recette);
    }

    /**
     * Get recette
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRecette()
    {
        return $this->recette;
    }
    
    public function __toString() {
      return $this->nom;
    }
    
    
}
