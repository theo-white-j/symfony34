<?php

namespace WT\GalerieBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert; //for valdation
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/*
!!! use galerie->addGalerieitem never galerieitem->setgalerie()


*/


/**
 * Galerie
 *
 * @ORM\Table(name="galerie")
 * @ORM\Entity(repositoryClass="WT\GalerieBundle\Repository\GalerieRepository")
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity(fields="name", message="Une annonce existe déjà avec ce titre.")
 */
class Galerie
{
    /************************************************************************/
    /* liste et info des relation de cette entité                           */
    /* onetomany -> galerieitem     | bidirectional     owner:GalerieItem   */
    /* onetoone  -> user            | unidir            owner:itself        */
    /************************************************************************/
    /* liste et info des relation de cette entité                           */
    /* onetomany -> galerieitem     | bidirectional     owner:GalerieItem   */
    /* onetoone  -> user            | unidir            owner:itself        */
    /************************************************************************/
    


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255, unique=true, nullable=false)
     * @Assert\Length(min=4, minMessage="Le titre doit faire au moins {{ limit }} caractères.")
     * @Assert\NotBlank()
     */
    private $name;


//@var string
//@ORM\Column(name="owner", type="string", length=255, nullable=true)

    /**
     * @ORM\ManyToOne(targetEntity="WT\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false, unique=false)
     */
    private $owner;


    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;


    /**
     * @ORM\OneToMany(targetEntity="WT\GalerieBundle\Entity\GalerieItem", mappedBy="galerie",cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    private $galerieitems; // Notez le « s », une annonce est liée à plusieurs candidatures

/**********************************/
    /**
     * @ORM\OneToMany(targetEntity="WT\GalerieBundle\Entity\GalerieElement", mappedBy="galerie",cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    private $galerieelements; // Notez le « s », une annonce est liée à plusieurs candidatures

/**********************************/


    /**
     * @var \DateTime
     * @ORM\Column(name="creationdate", type="datetime")
     * @Assert\DateTime()
     */
    private $creationdate;

    /**
     * @var \DateTime
     * @ORM\Column(name="editiondate", type="datetime")
     * @Assert\DateTime()
     */
    private $editiondate;

    /**
     * @var \Text
     *
     * @ORM\Column(name="descr", type="text", nullable=false)
     * @Assert\NotBlank()
     */
    private $descr;


    /************************************************************************/
    /* LES FONCTIONS                                                        */
    /* Cyclebackfunction:                                                   */
    /*    updateDate                                                        */
    /************************************************************************/

    /**
     * Get id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }





    /**
     * Set name
     *
     * @param string $name
     * @return Galerie
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }





    /**
     * Set creationdate
     *
     * @param \DateTime $creationdate
     *
     * @return Galerie
     */
    public function setCreationdate($creationdate)
    {
        $this->creationdate = $creationdate;

        return $this;
    }

    /**
     * Get creationdate
     *
     * @return \DateTime
     */
    public function getCreationdate()
    {
        return $this->creationdate;
    }




    /**
     * Set editiondate
     *
     * @param \DateTime $editiondate
     *
     * @return Galerie
     */
    public function setEditiondate($editiondate)
    {
        $this->editiondate = $editiondate;

        return $this;
    }

    /**
     * Get editiondate
     *
     * @return \DateTime
     */
    public function getEditiondate()
    {
        return $this->editiondate;
    }




    public function __construct()
    {
        // Par défaut, la date de l'annonce est la date d'aujourd'hui
    $this->creationdate = new \Datetime();
    $this->editiondate = $this->creationdate;
    $this->galerieitems = new ArrayCollection();

    }

    



    /**
     * @ORM\PreUpdate
     */
    public function updateDate()
    {
        $this->setEditiondate(new \Datetime());
    }





    /**
     * Set owner
     *
     * @param \WT\UserBundle\Entity\User $owner
     *
     * @return Galerie
     */
    public function setOwner(\WT\UserBundle\Entity\User $owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \WT\UserBundle\Entity\User
     */
    public function getOwner()
    {
        return $this->owner;
    }




    /**
     * Add galerieitem
     *
     * @param \WT\galerieBundle\Entity\GalerieItem $galerieitem
     *
     * @return Galerie
     */
    public function addGalerieitem(\WT\galerieBundle\Entity\GalerieItem $galerieitem)
    {

        $this->galerieitems[] = $galerieitem;
        // On lie le galerieItem  à la galerie
        $galerieitem->setGalerie($this);
        return $this;
    }

    /**
     * Remove galerieitem
     *
     * @param \WT\galerieBundle\Entity\GalerieItem $galerieitem
     */
    public function removeGalerieitem(\WT\galerieBundle\Entity\GalerieItem $galerieitem)
    {
        $this->galerieitems->removeElement($galerieitem);
        
        // Et si notre relation était facultative (nullable=true, ce qui n'est pas notre cas ici attention) :        
        // $application->setAdvert(null);
    }

    /**
     * Get galerieitems
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGalerieitems()
    {
        return $this->galerieitems;
    }
/*****************************************/

/**
     * Add galerieitem
     *
     * @param \WT\galerieBundle\Entity\GalerieElement $galerieelement
     *
     * @return Galerie
     */
    public function addGalerieelement(\WT\galerieBundle\Entity\GalerieElement $galerieelement)
    {

        $this->galerieelement[] = $galerieelement;
        // On lie le galerieItem  à la galerie
        $galerieelement->setGalerie($this);
        return $this;
    }

    /**
     * Remove galerieitem
     *
     * @param \WT\galerieBundle\Entity\GalerieItem $galerieitem
     */
    public function removeGalerieelement(\WT\galerieBundle\Entity\GalerieElement $galerieelement)
    {
        $this->galerieelements->removeElement($GalerieElement);
        
        // Et si notre relation était facultative (nullable=true, ce qui n'est pas notre cas ici attention) :        
        // $application->setAdvert(null);
    }

    /**
     * Get galerieElements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGalerieelements()
    {
        return $this->galerieelements;
    }

/**************************************/




    /**
     * Set slug.
     *
     * @param string $slug
     *
     * @return Galerie
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }




    /**
     * Set descr.
     *
     * @param string $descr
     *
     * @return Galerie
     */
    public function setDescr($descr)
    {
        $this->descr = $descr;

        return $this;
    }

    /**
     * Get descr.
     *
     * @return string
     */
    public function getDescr()
    {
        return $this->descr;
    }
}
