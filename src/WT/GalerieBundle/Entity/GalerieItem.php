<?php

namespace WT\GalerieBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/*
!!! use galerie->addGalerieitem never galerieitem->setgalerie()


*/




/**
 * GalerieItem
 *
 * @ORM\Table(name="galerie_item")
 * @ORM\Entity(repositoryClass="WT\GalerieBundle\Repository\GalerieItemRepository")
 */
class GalerieItem
{
    /* manytoone ->galerie*/
    /**
     * @ORM\ManyToOne(targetEntity="WT\GalerieBundle\Entity\Galerie", inversedBy="galerieitems", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $galerie;



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
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="info", type="text", nullable=true)
     */
    private $info;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255, nullable=true)
     */
    private $alt;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=true)
     */
    private $path;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationdate", type="datetime")
     */
    private $creationdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="editiondate", type="datetime")
     */
    private $editiondate;

    /**
     * @var bool
     *
     * @ORM\Column(name="ispublished", type="boolean")
     */
    private $ispublished=true;

    /**
     * @var string
     *
     * @ORM\Column(name="extention", type="string", length=5, nullable=true)
     */
    private $extention;








    public function __construct()
    {
        // Par défaut, la date de l'annonce est la date d'aujourd'hui
        $this->creationdate = new \Datetime();
        $this->editiondate = $this->creationdate;

    }





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
     * Set name
     *
     * @param string $name
     *
     * @return GalerieItem
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
     * Set info
     *
     * @param string $info
     *
     * @return GalerieItem
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }


    /**
     * Set alt
     *
     * @param string $alt
     *
     * @return GalerieItem
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }


    /**
     * Set type
     *
     * @param string $type
     *
     * @return GalerieItem
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return GalerieItem
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return GalerieItem
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set creationdate
     *
     * @param \DateTime $creationdate
     *
     * @return GalerieItem
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
     * @return GalerieItem
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

    /**
     * Set ispublished
     *
     * @param boolean $ispublished
     *
     * @return GalerieItem
     */
    public function setIspublished($ispublished)
    {
        $this->ispublished = $ispublished;

        return $this;
    }

    /**
     * Get ispublished
     *
     * @return bool
     */
    public function getIspublished()
    {
        return $this->ispublished;
    }

    /**
     * Set extention
     *
     * @param string $extention
     *
     * @return GalerieItem
     */
    public function setExtention($extention)
    {
        $this->extention = $extention;

        return $this;
    }

    /**
     * Get extention
     *
     * @return string
     */
    public function getExtention()
    {
        return $this->extention;
    }

    /**
     * Set galerie
     *
     * @param \WT\GalerieBundle\Entity\Galerie $galerie
     *
     * @return GalerieItem
     */
    public function setGalerie(\WT\GalerieBundle\Entity\Galerie $galerie)
    {
        $this->galerie = $galerie;

        return $this;
    }

    /**
     * Get galerie
     *
     * @return \WT\GalerieBundle\Entity\Galerie
     */
    public function getGalerie()
    {
        return $this->galerie;
    }
}
