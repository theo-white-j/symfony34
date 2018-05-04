<?php

namespace WT\GalerieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * GalerieElement
 *
 * @ORM\Table(name="galerie_element")
 * @ORM\Entity(repositoryClass="WT\GalerieBundle\Repository\GalerieElementRepository")
 * @ORM\HasLifecycleCallbacks()
 *
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap( {"localimage" = "LocalImage","localvideo" = "LocalVideo", "localelement" = "LocalElement","linkedelement" = "LinkedElement"} )
 */

 //@ORM\DiscriminatorMap( {"localelement" = "LocalElement", "linkedelement" = "LinkedElement"} )
abstract class GalerieElement
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
     * @ORM\ManyToOne(targetEntity="WT\GalerieBundle\Entity\Galerie", inversedBy="galerieelements", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */

    /* manytoone ->galerie*/
    private $galerie;




    /**
     * @var string|null
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
    private $ispublished =true;









    public function __construct()
    {
        // Par défaut, la date de l'annonce est la date d'aujourd'hui
        $this->creationdate = new \Datetime();
        $this->editiondate = $this->creationdate;
        //$this->ispublished = true;

    }

    /**
     * @ORM\PreUpdate
     */
    public function updateDate()
    {
        $this->setEditiondate(new \Datetime());
    }







    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
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



    /**
     * Set info.
     *
     * @param string|null $info
     *
     * @return GalerieElement
     */
    public function setInfo($info = null)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info.
     *
     * @return string|null
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set alt.
     *
     * @param string $alt
     *
     * @return GalerieElement
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt.
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }



    /**
     * Set creationdate.
     *
     * @param \DateTime $creationdate
     *
     * @return GalerieElement
     */
    public function setCreationdate($creationdate)
    {
        $this->creationdate = $creationdate;

        return $this;
    }

    /**
     * Get creationdate.
     *
     * @return \DateTime
     */
    public function getCreationdate()
    {
        return $this->creationdate;
    }

    /**
     * Set editiondate.
     *
     * @param \DateTime $editiondate
     *
     * @return GalerieElement
     */
    public function setEditiondate($editiondate)
    {
        $this->editiondate = $editiondate;

        return $this;
    }

    /**
     * Get editiondate.
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
}



/*try single table inherithance*/
/**
 * @ORM\Entity
 */
class LinkedElement extends GalerieElement
{
    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;





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

}















/**
 * @ORM\Entity
 */
class LocalElement extends GalerieElement
{


    /**
     * @var string
     *
     * @ORM\Column(name="extension", type="string", length=5, nullable=true)
     */
    private $extension;

     //pas d'anotation car on persiste pas le fichier en BDD!!!
    private $file;
    // On ajoute cet attribut pour y stocker le nom du fichier temporairement pour la suppresion de fichier
    private $tempFilename;






    /**
     * Set extension
     *
     * @param string $extension
     *
     * @return GalerieItem
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }



    public function getFile()
    {
        return $this->file;
    }


    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        // On vérifie si on avait déjà un fichier pour cette entité
        if (null !== $this->extension) {
            // On sauvegarde l'extension du fichier pour le supprimer plus tard
            $this->tempFilename = $this->extension;

            // On réinitialise les valeurs des attributs url et alt
            $this->extension = null;
            $this->alt = null;
        }
    }


    protected function getUploadRootDir()
    {
        // On retourne le chemin relatif vers l'image pour notre code PHP
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    public function getUploadDir()
    {
        // On retourne le chemin relatif vers l'image pour un navigateur (relatif au répertoire /web donc)
        return 'uploads/img';
    }
    public function getWebPath()
    {
        return $this->getUploadDir().'/'.$this->getId().'.'.$this->getExtention();
    }


    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        // Si jamais il n'y a pas de fichier (champ facultatif), on ne fait rien
        if (null === $this->file) {return;}
        // Le nom du fichier est son id, on doit juste stocker également son extension
        // Pour faire propre, on devrait renommer cet attribut en « extension », plutôt que « url »
        $this->extension = $this->file->guessExtension();

        // Et on génère l'attribut alt de la balise <img>, à la valeur du nom du fichier sur le PC de l'internaute
        $this->alt = $this->file->getClientOriginalName();
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        // Si jamais il n'y a pas de fichier (champ facultatif), on ne fait rien
        if (null === $this->file) {return;}

        // Si on avait un ancien fichier, on le supprime
        if (null !== $this->tempFilename) {
            $oldFile = $this->getUploadRootDir().'/'.$this->id.'.'.$this->tempFilename;
            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
        }

        // On déplace le fichier envoyé dans le répertoire de notre choix
        $this->file->move(
            $this->getUploadRootDir(), // Le répertoire de destination
            $this->id.'.'.$this->extension   // Le nom du fichier à créer, ici « id.extension »
        );
    }

    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload()
    {
        // On sauvegarde temporairement le nom du fichier, car il dépend de l'id
        $this->tempFilename = $this->getUploadRootDir().'/'.$this->id.'.'.$this->extension;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        // En PostRemove, on n'a pas accès à l'id, on utilise notre nom sauvegardé
        if (file_exists($this->tempFilename)) {
            // On supprime le fichier
            unlink($this->tempFilename);
        }
    }

}


/**
 * @ORM\Entity
 */
class LocalImage extends LocalElement
{

}


/**
 * @ORM\Entity
 */
class LocalVideo extends LocalElement
{

}