<?php
namespace Utilisateurs\UtilisateursBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\Util\SecureRandom;
use Symfony\Component\HttpFoundation\File\File;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @Vich\Uploadable
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="utilisateurs")
 * @UniqueEntity("cin")
 * @UniqueEntity("email")
 * 
 */
class Utilisateurs extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

   
      
    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     * 
     */
    public $nom;           
 
 
    /**
     * @ORM\Column(type="string",nullable=true,length=255,nullable=true)
     * @var Gt\ItBundle\Entity\Emp[]
     * @ORM\OneToMany(targetEntity="Gt\ItBundle\Entity\Emp", mappedBy="etudiant", cascade={"remove"})
     */
    public $prenom;           





        /**
     * @ORM\Column(type="string", length=255,nullable=true)
     * 
     * @Assert\Range(
     *      min = 00000000,
     *      max = 99999999,minMessage="Entrer un numero de cin correct svp",maxMessage="Entrer un numero de cin correct svp"
     * )
     */
    protected $cin;
   
    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     * 
     */    
    protected $ville;
    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     * 
     */    
    protected $class;
    /**
     * @ORM\Column(type="string", length=255 ,nullable=true)
     * 
     */    
    protected $phone;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $lastEdited;



    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     * @var string
     */
    private $image;


    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image",nullable=true)
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     * @var \DateTime
     */
    public $updatedAt;

    public function __construct()
    {
        parent::__construct();
        // your own logic

    $this->referance =md5(uniqid());
    }

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
     * Set referance 
     *
     * @param string $referance 
     * 
     */
    public function setReferance($referance )
    {if($this->referance==NULL)        $referance ='2';
        $this->referance  = $referance ;

        return $this;
    }

    /**
     * Get referance 
     *
     * @return string 
     */
    public function getReferance ()
    {
        return $this->referance ;
    }


  
    /**
     * Set cin
     *
     * @param string $cin
     * 
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return string 
     */
    public function getCin()
    {
        return $this->cin;
    }




    /**
     * Set forename
     *
     * @param string $forname
     * @return User
     */
    public function setForename($forename)
    {
        $this->forname = $forename;

        return $this;
    }

    /**
     * Get forename
     *
     * @return string 
     */
    public function getForename()
    {
        return $this->forname;
    }

    /**
     * Asks whether the user is granted a particular role
     * 
     * @return boolean
     */
    public function isGranted($role)
    {
        return in_array($role, $this->getRoles());
    }

    /**
     * Set nickname
     *
     * @param string $nickname
     * @return User
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get nickname
     *
     * @return string 
     */
    public function getNickname()
    {
        return $this->nickname;
    }



    /**
     * Set lastEdited
     *
     * @param \DateTime $lastEdited
     * @return User
     */
    public function setLastEdited($lastEdited)
    {
        $this->lastEdited = $lastEdited;

        return $this;
    }

    /**
     * Get lastEdited
     *
     * @return \DateTime 
     */
    public function getLastEdited()
    {
        return $this->lastEdited;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function setLastEditedValueAsNow() {
        $this->setLastEdited(new \DateTime());
    }

 



    /**
     * Set surname
     *
     * @param string $surname
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;


        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }



    public function setNom_agance($n){$this->nom_agance=$n;}
    /**
     * Get nom_agance
     *
     * @return string
     */
    public function getNom_agance(){return $this->nom_agance;}





    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Utilisateurs
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set forname
     *
     * @param string $forname
     *
     * @return Utilisateurs
     */
    public function setForname($forname)
    {
        $this->forname = $forname;

        return $this;
    }

    /**
     * Get forname
     *
     * @return string
     */
    public function getForname()
    {
        return $this->forname;
    }

    public function __toString()

    {


        return $this->prenom.' '.$this->nom.'  |  cin : '.$this->cin ; }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Utilisateurs
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Utilisateurs
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Utilisateurs
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set class
     *
     * @param string $class
     *
     * @return Utilisateurs
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class
     *
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Utilisateurs
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }
}
