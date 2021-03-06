<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FamilleProduitPrd
 *
 * @ORM\Table(name="famille_produit_prd")
 * @ORM\Entity
 */
class FamilleProduitPrd
{
    /**
     * @var integer
     *
     * @ORM\Column(name="prd_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $prdId;

    /**
     * @var string
     *
     * @ORM\Column(name="prd_libelle", type="string", length=45, nullable=false)
     */
    private $prdLibelle;
    public function getBaseUrl()
    {
        // output: /myproject/index.php
        $currentPath = $_SERVER['PHP_SELF'];

        // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index )
        $pathInfo = pathinfo($currentPath);

        $pos = strpos(substr($pathInfo['dirname'] . "/", 1), 'web');
        return substr(substr($pathInfo['dirname'] . "/", 1),0,$pos+4);
    }

}

