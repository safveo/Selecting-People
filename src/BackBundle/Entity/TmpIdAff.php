<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TmpIdAff
 *
 * @ORM\Table(name="tmp_id_aff")
 * @ORM\Entity
 */
class TmpIdAff
{
    /**
     * @var integer
     *
     * @ORM\Column(name="aff_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $affId;


}

