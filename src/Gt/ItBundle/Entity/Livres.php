<?php

namespace Gt\ItBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\Util\SecureRandom;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Livres
 * @Vich\Uploadable
 * 
 * @ORM\Entity(repositoryClass="Gt\ItBundle\Entity\LivresRepository")
 * @UniqueEntity(
 *     fields={"titre"},
 *     message="Le titre deja existe"
 * ) 
 * @UniqueEntity(
 *     fields={"inv"},
 *     message="Le numero INV deja existe"
 * )
 */
class Livres
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * 
     * @var Gt\ItBundle\Entity\Emp[]
     * @ORM\OneToMany(targetEntity="Gt\ItBundle\Entity\Emp", mappedBy="livre")
     * @ORM\Column(name="INV", type="string", length=255,nullable=true)
     */
    private $inv;

    /**
     * @var string
     *
     * @ORM\Column(name="TITRE", type="string", length=255,nullable=true)
     */
    private $titre;
    /**
     * @var bool
     *
     * @ORM\Column(name="status", type="boolean")
     */
    public $status;
    /**
     * @var string
     *
     * @ORM\Column(name="AUTEUR", type="string", length=255,nullable=true)
     */
    private $auteur;

    /**
     * @var string
     *
     * @ORM\Column(name="COTE", type="string", length=255,nullable=true)
     */
    private $cote;

    /**
     * @var int
     *
     * @ORM\Column(name="EXPL", type="integer",nullable=true)
     */
    private $expl;

    /**
     * @var int
     *
     * @ORM\Column(name="code_bare", type="integer",nullable=true)
     */
    private $codeBare;

    /**
     * @var string
     *
     * @ORM\Column(name="exposan", type="string", length=255,nullable=true)
     */
    private $exposan;
   /**
     * It only stores the name of the image associated with the product.
     *
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $image;

    /**
     * This unmapped property stores the binary contents of the image file
     * associated with the product.
     *
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     *
     * @var File
     */
    private $imageFile;

    /**
     * Features of the product.
     * Associative array, the key is the name/type of the feature, and the value the data.
     * Example:<pre>array(
     *     'size' => '13cm x 15cm x 6cm',
     *     'bluetooth' => '4.1'
     * )</pre>.
     *
     * @var array
     * @ORM\Column(type="array",nullable=true)
     */
    private $features = array();
    

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
     * Set inv
     *
     * @param string $inv
     *
     * @return Info
     */
    public function setInv($inv)
    {
        $this->inv = $inv;

        return $this;
    }

    /**
     * Set the list of features.
     * The parameter is an associative array (key as type, value as data.
     *
     * @param array $features
     */
    public function setFeatures($features)
    {
        $this->features = $features;
    }

    /**
     * Get all product features.
     *
     * @return array
     */
    public function getFeatures()
    {
        return $this->features;
    }
  /**
     * @param File $image
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
    /**
     * Get inv
     *
     * @return string
     */
    public function getInv()
    {
        return $this->inv;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Info
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set auteur
     *
     * @param string $auteur
     *
     * @return Info
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return string
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set cote
     *
     * @param string $cote
     *
     * @return Info
     */
    public function setCote($cote)
    {
        $this->cote = $cote;

        return $this;
    }

    /**
     * Get cote
     *
     * @return string
     */
    public function getCote()
    {
        return $this->cote;
    }

    /**
     * Set expl
     *
     * @param integer $expl
     *
     * @return Info
     */
    public function setExpl($expl)
    {
        $this->expl = $expl;

        return $this;
    }

    /**
     * Get expl
     *
     * @return int
     */
    public function getExpl()
    {
        return $this->expl;
    }

    /**
     * Set codeBare
     *
     * @param integer $codeBare
     *
     * @return Info
     */
    public function setCodeBare($codeBare)
    {
        $this->codeBare = $codeBare;

        return $this;
    }

    /**
     * Get codeBare
     *
     * @return int
     */
    public function getCodeBare()
    {
        return $this->codeBare;
    }

    /**
     * Set exposan
     *
     * @param string $exposan
     *
     * @return Info
     */
    public function setExposan($exposan)
    {
        $this->exposan = $exposan;

        return $this;
    }

    /**
     * Get exposan
     *
     * @return string
     */
    public function getExposan()
    {
        return $this->exposan;
    }
    public function __toString()

    {


        return ' '.$this->titre.' | codeBare : '.$this->codeBare .' | Inv : '.$this->inv .'| diponiblité ==>'.$this->status; }
}

