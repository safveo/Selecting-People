<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatutMissionStm
 *
 * @ORM\Table(name="statut_mission_stm")
 * @ORM\Entity
 */
class StatutMissionStm
{
    /**
     * @var integer
     *
     * @ORM\Column(name="stm_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $stmId;

    /**
     * @var string
     *
     * @ORM\Column(name="stm_libelle", type="string", length=45, nullable=false)
     */
    private $stmLibelle;

    /**
     * @var string
     *
     * @ORM\Column(name="stm_statut_origine", type="string", length=20, nullable=false)
     */
    private $stmStatutOrigine;


}

