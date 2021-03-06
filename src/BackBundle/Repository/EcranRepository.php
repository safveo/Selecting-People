<?php

namespace BackBundle\Repository;

/**
 * EcranRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EcranRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Récupérer le dernier ordre inséré dans la base
     * @return mixed
     */
    public function getLastOrder(){
        return $this->createQueryBuilder('e')
            ->select('max(e.ordre)')
            ->getQuery()
            ->getSingleScalarResult();
    }





}
