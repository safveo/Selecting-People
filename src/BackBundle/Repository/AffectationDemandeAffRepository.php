<?php
/**
 * Created by PhpStorm.
 * User: hachmi.halfaoui
 * Date: 04/07/2017
 * Time: 08:56
 */

namespace BackBundle\Repository;


class AffectationDemandeAffRepository  extends \Doctrine\ORM\EntityRepository
{
    /**
     * Récupérer le nombre des recretements selon $type : SP ou ST
     *
     */
    public function getRcrtEffectueSelonType($type,$year)
    {
        /** @var
         * Current year
         * $date */
        $date = new \DateTime($year.'/01/01');

        $query = $this->getEntityManager()
            ->createQuery('
            SELECT COUNT (DISTINCT a) FROM BackBundle:AffectationDemandeAff a
            JOIN a.dmd  dm
            JOIN BackBundle:IndicateursSp i
            WHERE a.dmd = dm.dmdId AND  i.typeRecruteur = :type and i.statut like :statut and dm.dmdId = i.idDemande and a.affDateAffectation >= :date'
            )
            ->setParameter('date', $date)
            ->setParameter('type', $type)
            ->setParameter('statut','En cours')
        ;

        try {
            return $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }



    /**
     * Récupérer la liste des missions en cours (stmId == 1) selon le $type
     * @return mixed
     */
    public function getMissionCours($type){

        $query = $this->getEntityManager()
            ->createQuery('SELECT  a FROM BackBundle:AffectationDemandeAff a 
                        JOIN a.dmd d
                        WHERE a.affSousTraitance like :type and d.stmId = :etat ')
            ->setParameter('etat','1')
            ->setParameter('type',$type)
        ;
        return $query->getResult();


    }

}