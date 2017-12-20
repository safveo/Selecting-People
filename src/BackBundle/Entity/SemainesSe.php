<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SemainesSe
 *
 * @ORM\Table(name="semaines_se")
 * @ORM\Entity
 */
class SemainesSe
{
    /**
     * @var string
     *
     * @ORM\Column(name="semaine", type="string", length=6, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $semaine;

    /**
     * @var string
     *
     * @ORM\Column(name="mois_dominant", type="string", length=6, nullable=false)
     */
    private $moisDominant;


}

