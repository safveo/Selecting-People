<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChargeRecrutementChr
 *
 * @ORM\Table(name="charge_recrutement_chr", indexes={@ORM\Index(name="usr_matricule", columns={"usr_matricule"})})
 * @ORM\Entity(repositoryClass="BackBundle\Repository\ChargeRecrutementChrRepository")
 */
class ChargeRecrutementChr
{
    /**
     * @var string
     *
     * @ORM\Column(name="usr_matricule", type="string", length=6, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $usrMatricule;

    /**
     * @var integer
     *
     * @ORM\Column(name="chr_objectif", type="integer", nullable=false)
     */
    private $chrObjectif = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="chr_actif", type="boolean", nullable=false)
     */
    private $chrActif = '1';


}
