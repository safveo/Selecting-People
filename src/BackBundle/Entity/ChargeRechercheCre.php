<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChargeRechercheCre
 *
 * @ORM\Table(name="charge_recherche_cre", uniqueConstraints={@ORM\UniqueConstraint(name="usr_matricule", columns={"usr_matricule"})})
 * @ORM\Entity
 */
class ChargeRechercheCre
{
    /**
     * @var string
     *
     * @ORM\Column(name="usr_matricule", type="string", length=6, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $usrMatricule;


}

