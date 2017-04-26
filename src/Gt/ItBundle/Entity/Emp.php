<?php

namespace Gt\ItBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Emp
 * @ORM\Entity(repositoryClass="Gt\ItBundle\Entity\EmpRepository")
 * @UniqueEntity(
 *     fields={"etudiant"},
 *     message="Your E-Mail adress has already been registered"
 * ) 
 * @UniqueEntity(
 *     fields={"livre"},
 *     message="Your E-Mail adress has already been registered"
 * )
 * @ORM\Table()
 * 
 */
class Emp
{
    /**
     * @var integer
     * @Vich\Uploadable
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="dateem", type="string")
     */
    public $dateem;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datere", type="datetime")
     */
    public $datere;

 
    /**
     * @var bool
     *
     * @ORM\Column(name="status", type="boolean")
     */
    public $status;

  

   /** 
     * @ORM\ManyToOne(targetEntity="Gt\ItBundle\Entity\Livres", inversedBy="inv")
     * @ORM\JoinColumn(nullable=false)
     * 
     */ 
    private $livre;
    /** 
     * @ORM\ManyToOne(targetEntity="Utilisateurs\UtilisateursBundle\Entity\Utilisateurs", inversedBy="prenom")
     * @ORM\JoinColumn(nullable=false)
     * 
     */ 
    private $etudiant;
 
 public function __construct()
    {      $this->dateem = (string)(Date('Y-m-d h:m:s'));}
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateem
     *
     * @param string $dateem
     *
     * @return Emp
     */
    public function setDateem($dateem)
    {
        $this->dateem = $dateem;

        return $this;
    }

    /**
     * Get dateem
     *
     * @return string
     */
    public function getDateem()
    {
        return $this->dateem;
    }

    /**
     * Set datere
     *
     * @param string $datere
     *
     * @return Emp
     */
    public function setDatere($datere)
    {
        $this->datere = $datere;

        return $this;
    }

    /**
     * Get datere
     *
     * @return string
     */
    public function getDatere()
    {
        return $this->datere;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Emp
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set livre
     *
     * @param \Gt\ItBundle\Entity\Livres $livre
     *
     * @return Emp
     */
    public function setLivre(\Gt\ItBundle\Entity\Livres $livre)
    {
        $this->livre = $livre;

        return $this;
    }

    /**
     * Get livre
     *
     * @return \Gt\ItBundle\Entity\Livres
     */
    public function getLivre()
    {
        return $this->livre;
    }

    /**
     * Set etudiant
     *
     * @param \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $etudiant
     *
     * @return Emp
     */
    public function setEtudiant(\Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $etudiant)
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    /**
     * Get etudiant
     *
     * @return \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs
     */
    public function getEtudiant()
    {
        return $this->etudiant;
    }


}
