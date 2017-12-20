<?php
/**
 * Created by PhpStorm.
 * User: hachmi.halfaoui
 * Date: 03/07/2017
 * Time: 09:27
 */

namespace BackBundle\Repository;


class ChargeRecrutementChrRepository  extends \Doctrine\ORM\EntityRepository
{

    /**
     * Récupérer la somme des objectifs actifs  inséré dans la base
     * @return mixed
     */
    public function getSommeObj(){
        return $this->createQueryBuilder('o')
            ->select('SUM(o.chrObjectif)')
            ->where('o.chrActif =1')
            ->getQuery()
            ->getSingleScalarResult();
    }



}