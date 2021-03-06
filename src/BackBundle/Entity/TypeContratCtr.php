<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeContratCtr
 *
 * @ORM\Table(name="type_contrat_ctr")
 * @ORM\Entity
 */
class TypeContratCtr
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ctr_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ctrId;

    /**
     * @var string
     *
     * @ORM\Column(name="ctr_libelle", type="string", length=45, nullable=false)
     */
    private $ctrLibelle;


}

