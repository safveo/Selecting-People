<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaysPys
 *
 * @ORM\Table(name="pays_pys")
 * @ORM\Entity
 */
class PaysPys
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pys_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pysId;

    /**
     * @var string
     *
     * @ORM\Column(name="pys_nom", type="string", length=45, nullable=false)
     */
    private $pysNom;


}

