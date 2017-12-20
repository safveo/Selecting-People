<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ecran
 *
 * @ORM\Table(name="ecran")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\EcranRepository")
 */
class Ecran
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
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=100)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="string", length=5000)
     */
    private $contenu;


    /**
     * @ORM\Column(type="string",  length=255, nullable=true)
     */
    private $image;


    /**
     * @var int
     *
     * @ORM\Column(name="ordre", type="integer")
     */
    private $ordre;


    private $file;

    /**
     * @ORM\Column(type="boolean", nullable=true )
     */
    private $activated;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->activated=0;
    }

    /**
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param string $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @return int
     */
    public function getOrdre()
    {
        return $this->ordre;
    }

    /**
     * @param int $ordre
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;
    }



    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }







    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->file) {
            $this->image = uniqid() . '.' . $this->file->guessExtension();
        }
    }



    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->file) {
            return;
        }

        // If there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file->move($this->getUploadRootDir(), $this->image);

        unset($this->file);
    }

    public function getUploadDir()
    {
        return 'uploads/ecrans';
    }

    public function getBaseUrl()
{
    // output: /myproject/index.php
    $currentPath = $_SERVER['PHP_SELF'];

    // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index )
    $pathInfo = pathinfo($currentPath);

    $pos = strpos(substr($pathInfo['dirname'] . "/", 1), 'web');
    return substr(substr($pathInfo['dirname'] . "/", 1),0,$pos+4);
}

    public function getBaseUrl1()
    {
        // output: /myproject/index.php
        $currentPath = $_SERVER['PHP_SELF'];

        // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index )
        $pathInfo = pathinfo($currentPath);

        $pos = strpos(substr($pathInfo['dirname'] . "/", 1), 'web');
        return substr(substr($pathInfo['dirname'] . "/", 1),0,$pos+4);
    }
    public function getUploadRootDir()
    {
        //return __DIR__ . '/../../../../web/' . $this->getUploadDir();
        return $this->getBaseUrl() . $this->getUploadDir();
    }

    public function getWebPath()
    {
        return null === $this->image ? null : $this->getUploadDir() . '/' . $this->image;
    }

    public function getAbsolutePath()
    {
        return null === $this->image ? null : $this->getUploadRootDir() . '/' . $this->image;
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
     * Set titre
     *
     * @param string $titre
     *
     * @return Ecran
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
     * @return mixed
     */
    public function getActivated()
    {
        return $this->activated;
    }

    /**
     * @param mixed $activated
     */
    public function setActivated($activated)
    {
        $this->activated = $activated;
    }




}

