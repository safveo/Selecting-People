<?php
/**
 * Created by PhpStorm.
 * User: hachmi.halfaoui
 * Date: 06/07/2017
 * Time: 14:36
 */

namespace BackBundle\Repository;


class RecrutementRctRepository extends \Doctrine\ORM\EntityRepository
{

    /**
     * Récupérer le nombre des recretements de l'annee courante
     *
     */
    public function getRcrtEffectueYear($year)
    {
        /** @var
         * Current year
         * $date */
        $date = new \DateTime($year.'/01/01');

        $query = $this->getEntityManager()
            ->createQuery('
            SELECT r FROM BackBundle:RecrutementRct r
            WHERE  r.rctDateRecrutement >= :date'
            )
            ->setParameter('date', $date)
        ;

        try {
            return $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }


    /**
     * Récupérer le nombre des recretements pour une date
     *
     */
    public function getRcrtEffectueDate($date)
    {

        $query = $this->getEntityManager()
            ->createQuery('
            SELECT COUNT (r) FROM BackBundle:RecrutementRct r
            WHERE  r.rctDateRecrutement = :date'
            )
            ->setParameter('date', $date)
        ;

        try {
            return $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }

}