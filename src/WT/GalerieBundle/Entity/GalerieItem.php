<?php

namespace WT\GalerieBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/*
!!! use galerie->addGalerieitem never galerieitem->setgalerie()


*/




/**
 * GalerieItem
 *
 * @ORM\Table(name="galerie_item")
 * @ORM\Entity(repositoryClass="WT\GalerieBundle\Repository\GalerieItemRepository")
 * @ORM\HasLifecycleCallbacks()
 */
//has lifecycleback pour utiliser les events pour gerer les fichier envoyer
class GalerieItem
{
    /**
     * @ORM\ManyToOne(targetEntity="WT\GalerieBundle\Entity\Galerie", inversedBy="galerieitems", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */

    /* manytoone ->galerie*/
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
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
    private $ispublished =true;

    /**
     * @var string
     *
     * @ORM\Column(name="extention", type="string", length=5, nullable=true)
     */
    private $extention;


    //pas d'anotation car on persiste pas le fichier en BDD!!!
    private $file;
    // On ajoute cet attribut pour y stocker le nom du fichier temporairement pour la suppresion de fichier
    private $tempFilename;





/**********************************************************************************/
/**********************************************************************************/
    
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

    public function getWebPath()
    {
        return $this->getUploadDir().'/'.$this->getId().'.'.$this->getExtention();
    }


    /*public function upload()
    {
        // Si jamais il n'y a pas de fichier (champ facultatif), on ne fait rien
        if (null === $this->file) {
            return;
        }

        // On récupère le nom original du fichier de l'internaute
        $filename = $this->file->getClientOriginalName();

        // On déplace le fichier envoyé dans le répertoire de notre choix
        $this->file->move($this->getUploadRootDir(), $filename);

        // On sauvegarde le nom de fichier dans notre attribut $name /////$url
        $this->name = $filename;

        // On crée également le futur attribut alt de notre balise <img>
        $this->alt = $filename;
    }*/

    public function getUploadDir()
    {
        // On retourne le chemin relatif vers l'image pour un navigateur (relatif au répertoire /web donc)
        return 'uploads/img';
    }

    protected function getUploadRootDir()
    {
        // On retourne le chemin relatif vers l'image pour notre code PHP
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }


    public function getFile()
    {
        return $this->file;
    }


    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        // On vérifie si on avait déjà un fichier pour cette entité
        if (null !== $this->extention) {
            // On sauvegarde l'extension du fichier pour le supprimer plus tard
            $this->tempFilename = $this->extention;

            // On réinitialise les valeurs des attributs url et alt
            $this->extention = null;
            $this->alt = null;
        }
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
        $this->extention = $this->file->guessExtension();

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
            $this->id.'.'.$this->extention   // Le nom du fichier à créer, ici « id.extension »
        );
    }

    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload()
    {
        // On sauvegarde temporairement le nom du fichier, car il dépend de l'id
        $this->tempFilename = $this->getUploadRootDir().'/'.$this->id.'.'.$this->extention;
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
