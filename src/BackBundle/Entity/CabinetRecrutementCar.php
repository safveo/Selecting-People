<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CabinetRecrutementCar
 *
 * @ORM\Table(name="cabinet_recrutement_car")
 * @ORM\Entity
 */
class CabinetRecrutementCar
{
    /**
     * @var integer
     *
     * @ORM\Column(name="car_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $carId;

    /**
     * @var string
     *
     * @ORM\Column(name="car_nom", type="string", length=45, nullable=false)
     */
    private $carNom;

    /**
     * @var string
     *
     * @ORM\Column(name="car_pays", type="string", length=45, nullable=true)
     */
    private $carPays;

    /**
     * @var string
     *
     * @ORM\Column(name="car_email", type="string", length=100, nullable=false)
     */
    private $carEmail;


}

