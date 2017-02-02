<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProduitRepository")
 */
class Produit
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
     * @ORM\ManyToMany(targetEntity="Symptome", mappedBy="produit")
     */
    private $symptome;  
    
    /**
     * @ORM\ManyToMany(targetEntity="Recette", mappedBy="produit")
     */
    private $recette;
    
// =================================
    
    /**
     * @ORM\JoinTable(name="categorie_id")
     * @ORM\ManyToOne(targetEntity="Categorie")
     */
    private $categorie;
// =================================  
    
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
     * @return Produit
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
     * @return Produit
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
        $this->symptome = new \Doctrine\Common\Collections\ArrayCollection();
        $this->recette = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add symptome
     *
     * @param \AppBundle\Entity\Symptome $symptome
     *
     * @return Produit
     */
    public function addSymptome(\AppBundle\Entity\Symptome $symptome)
    {
        $this->symptome[] = $symptome;

        return $this;
    }

    /**
     * Remove symptome
     *
     * @param \AppBundle\Entity\Symptome $symptome
     */
    public function removeSymptome(\AppBundle\Entity\Symptome $symptome)
    {
        $this->symptome->removeElement($symptome);
    }

    /**
     * Get symptome
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSymptome()
    {
        return $this->symptome;
    }

    /**
     * Add recette
     *
     * @param \AppBundle\Entity\Recette $recette
     *
     * @return Produit
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

    /**
     * Set categorie
     *
     * @param \AppBundle\Entity\Categorie $categorie
     *
     * @return Produit
     */
    public function setCategorie(\AppBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \AppBundle\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
}
