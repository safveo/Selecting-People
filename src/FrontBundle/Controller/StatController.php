<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints\DateTime;
use BackBundle\Entity\ChargeRecrutementChr;
use BackBundle\Entity\IndicateursSp;
use BackBundle\Entity\AffectationDemandeAff;
use BackBundle\Entity\RecrutementRct;

class StatController extends Controller
{

    /**
     * Method Name: indexDayAction
     * Input:
     * Utility: Afficher le nombre de recretement aujourd'huiet  nombre de recretmemnt au cours de la semaine
     * Developper : Hachmi Halfaoui
     * Date of creation or last modification: 05/07/2017
     *
     */
    public function indexDayAction()
    {

        /** @var  $em
         * service doctrine entity manager
         */
        $em = $this->getDoctrine()->getManager();

        /** @var  $listRecretement
         * Recuperer la liste de tous les recretements
         */
        $listRecretement = $em->getRepository('BackBundle:RecrutementRct')->findAll();

        /** @var  $today
         * date d'houjourd'ui
         */
        $today = new \DateTime();
        /** @var  $semaine
         * Recuperer la semaine en cours de var $today
         */
        $semaine = date('W', strtotime($today->format('Y/m/d')));
        /** @var  $nbrRecretementSemaine
         * Initialiser le compteur de recretement effectués au cours à zero de la semaine courante
         */
        $nbrRecretementSemaine = 0;
        /** @var  $nbrRecretementToday
         * Initialiser le compteur de nombre de recretement au cours à zero de la journée
         */
        $nbrRecretementToday = 0;
        /** @var  $nbrObjectifRecretmntActif
         * Recuperer le nombre d'objectifs actifs
         */
        $nbrObjectifRecretmntActif = $em->getRepository('BackBundle:ChargeRecrutementChr')->getSommeObj();

        // Boucler la liste des recretement afin de calculer le nombre de recretement d'aujourd'hui et de la semiane courante
        foreach ($listRecretement as $rect) {
            // Tester la date de recretement => !=null
            if ($rect->getRctDateRecrutement()) {
                /** @var  $diff
                 * Object : nous donne la differance entre deux dates (date d'affectation et le date d'aujourd'hui)
                 */
                $diff = date_diff($rect->getRctDateRecrutement(), $today);
                // Tester si l'attribut days == 0 cad le recretement a été aujoud'hui
                if ($diff->days == 0 and $diff->invert == 0) {
                    // Incrementer
                    $nbrRecretementToday++;
                }

                // tester le nombre de semaine et l'année
                if ((date('W', strtotime($today->format('Y/m/d'))) == date('W', strtotime($rect->getRctDateRecrutement()->format('Y/m/d')))) and ($rect->getRctDateRecrutement()->format("Y") == $today->format("Y"))) {
                    // Incrementer
                    $nbrRecretementSemaine++;
                }
            }
        }


        return $this->render('FrontBundle:Default:indexDay.html.twig', array('date' => $today, 'nbrRecretement' => $nbrRecretementToday, 'semaine' => $semaine, 'nbrRecretementSemaine' => $nbrRecretementSemaine, 'nbrObjRecretement' => $nbrObjectifRecretmntActif,'ConditionBoocle'=>$this->container->getParameter('ConditionBoocle')));
    }

    /**
     * Method Name: indexWeekAction
     * Input:
     * Utility: Afficher le nombre de recretement , les missions(en cours et difficilles) de la semaine courante  ainsi le nombre de recretmemnt de mois
     * Developper : Hachmi Halfaoui
     * Date of creation or last modification: 05/07/2017
     *
     */
    public function indexWeekAction()
    {
        // Ouvrir une session en cas d'absence
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Initialiser le compteur à zero
        $_SESSION['compteur'] = 0;

        // recuperer le jour, semaine et le mois en cours
        $today = new \DateTime();
        $semaine = date('W', strtotime($today->format('Y/m/d')));
        $mois = date_format($today, 'F');

        /** @var
         * Entity manager
         * $em */
        $em = $this->getDoctrine()->getManager();

        /** @var
         * Initialiser le nombre de recretement de la semiane à zero
         * $nbrRecretementSemaine */
        $nbrRecretementSemaine = 0;
        /** @var
         * initialiser le nombre de recretement en sous traitance de mois courant à zero
         * $nbrRecretementSTmois */
        $nbrRecretementSTmois = 0;
        /** @var
         * Initialiser le nombre de recretement selecting peaple de mois à zero
         * $nbrRecretementSPmois */
        $nbrRecretementSPmois = 0;
        /** @var
         * Recuperer le nombre des objectifs de recretement qui sont activés
         * $nbrObjectifRecretmntActif */
        $nbrObjectifRecretmntActif = $em->getRepository('BackBundle:ChargeRecrutementChr')->getSommeObj();

        /** @var  $listRecretement
         * Recuperer la liste de tous les recretements
         */
        $listRecretement = $em->getRepository('BackBundle:RecrutementRct')->findAll();

        foreach ($listRecretement as $rect) {
            /* debut de Calcul de nombre de recretement pendant le semaine en cours,le mois en cours */
            if ($rect->getRctDateRecrutement()) {
                /* Semaine en cours*/
                if ((date('W', strtotime($today->format('Y/m/d'))) == date('W', strtotime($rect->getRctDateRecrutement()->format('Y/m/d')))) and ($rect->getRctDateRecrutement()->format("Y") == $today->format("Y"))) {
                    $nbrRecretementSemaine++;
                }
                /* Mois en cours */
                if ((date('m', strtotime($today->format('Y/m/d'))) == date('m', strtotime($rect->getRctDateRecrutement()->format('Y/m/d')))) and ($rect->getRctDateRecrutement()->format("Y") == $today->format("Y"))) {

                    /** @var
                     * Recuperer la list des affecations associées a la demande de recretement ordonnee par date d'affectation ascendant
                     * $ListaffAssocie */
                    $ListaffAssocie = $em->getRepository('BackBundle:AffectationDemandeAff')->findBy(array('dmd' => $rect->getDmd()->getDmdId()), array('affDateAffectation' => 'DESC'));

                    /** @var
                     * get la premiere affectation
                     * $affAssocieObj */
                    $affAssocieObj = $ListaffAssocie[0];
                    //  Test sur  AffSouTraitance(OUI/NON) puis  on incremente le compteur associé
                    if ($affAssocieObj->getAffSousTraitance() == 'OUI') {
                        $nbrRecretementSTmois++;
                    } else {
                        $nbrRecretementSPmois++;
                    }

                }
            }
            /* Fin de calcul */
        }


        /********************************* ST **************************************/
        /** @var
         * La liste des mission en cours en sous traitance: OUI
         * $ListMissionSTCours */
        $ListMissionSTCours = $em->getRepository('BackBundle:AffectationDemandeAff')->getMissionCours('OUI');

        /** @var
         * Initialiser le nombre de mission en sous traitance encours de la semaine en cours
         * $nbrMissionSTSemaineCours */
        $nbrMissionSTSemaineCours = $this->getNbrsMissionSemaine($ListMissionSTCours)[0];
        /** @var
         * Initialiser le nombre des missions difficiles (>=4 mois) en sous traitance à zéro de la semaine courante
         * $nbrMissionDiffSTSemaineCours */
        $nbrMissionDiffSTSemaineCours = $this->getNbrsMissionSemaine($ListMissionSTCours)[1];


        /******************************** SP *************************************/

        /** @var
         * La liste des mission en cours Selecting Peaple
         * $ListMissionSPCours */
        $ListMissionSPCours = $em->getRepository('BackBundle:AffectationDemandeAff')->getMissionCours('NON');
        /** @var
         * Initialiser le nombre des missions Selecting peaple en cours de la semaine en cours
         * $nbrMissionSPSemaineCours */
        $nbrMissionSPSemaineCours = $this->getNbrsMissionSemaine($ListMissionSPCours)[0];

        /** @var
         * Initialiser le nombre des missions difficiles (>=4 mois) Selecting peaple à zéro de la semaine courante
         * $nbrMissionDiffSPSemaineCours */
        $nbrMissionDiffSPSemaineCours = $this->getNbrsMissionSemaine($ListMissionSPCours)[1];


        return $this->render('FrontBundle:Default:indexWeek.html.twig', array('today'=>$today,'semaine' => $semaine, 'mois' => $mois, 'nbrRecretementSemaine' => $nbrRecretementSemaine, 'nbrObjRecretement' => $nbrObjectifRecretmntActif,
                'nbrRecretementSPmois' => $nbrRecretementSPmois, 'nbrRecretementSTmois' => $nbrRecretementSTmois,
                'nbrMissionSTSemaineCours' => $nbrMissionSTSemaineCours, 'nbrMissionSPSemaineCours' => $nbrMissionSPSemaineCours,
                'nbrMissionDiffSTSemaineCours' => $nbrMissionDiffSTSemaineCours, 'nbrMissionDiffSPSemaineCours' => $nbrMissionDiffSPSemaineCours,
                'ConditionBoocle'=>$this->container->getParameter('ConditionBoocle'))
        );

    }


    /**
     * Method Name: indexYearAction
     * Input:
     * Utility: retourne le nombre de recretement pour l'année actuelle ainsi le nombre des mission en cours et difficile pour 10 mois
     * Developper : Hachmi Halfaoui
     * Date of creation or last modification: 05/07/2017
     *
     */
    public function indexYearAction()
    {
        /** @var  $em
         * EntityManager
         */
        $em = $this->getDoctrine()->getManager();

        $ecran = array();
        /** @var
         * Retourner la liste des nouveau ecrans activés ordonnée par ordre croissant
         * $ecrans */
        $ecrans = $em->getRepository('BackBundle:Ecran')->findBy(array('activated'=>1), array('ordre' => 'ASC'));

        // Parcourir la liste des ecrans selon la position
        if (count($ecrans) > 0) {
            if ($_SESSION['compteur']) {
                $ecran = $ecrans[$_SESSION['compteur']];
            } else {
                $ecran = $ecrans[0];
            }
        }

        $today = new \DateTime();
        /** @var
         * l'année actuelle
         * $year */
        $year = date_format($today, 'Y');
        /** @var
         * l'année precedante
         * $yearBefore */
        $yearBefore = intval(date_format($today, 'Y')) - 1;

        /** @var
         * liste des affectation de recretement  au cours de l'année
         * $ListRecretementYear */
        $ListRecretementYear = $em->getRepository('BackBundle:RecrutementRct')->getRcrtEffectueYear($year);

        /** @var
         * Initialiser le nombre de recretement effectués par selecting peaple   de l'annee acutelle
         * $nbrRecretementSPYear */
        $nbrRecretementSPYear = 0;

        /** @var
         * Initialiser le nombre de recretement effectués par un prestataire  de l'annee acutelle pour Selecting peaple
         * $nbrRecretementSTYear */
        $nbrRecretementSTYear = 0;
        foreach ($ListRecretementYear as $recretement) {

            /** @var
             * Recuperer la list des affecations associées à la demande de recretement ordonnée par date d'affecation ascendant
             * $ListaffAssocie */
            $ListaffAssocie = $em->getRepository('BackBundle:AffectationDemandeAff')->findBy(array('dmd' => $recretement->getDmd()->getDmdId()), array('affDateAffectation' => 'ASC'));

            // Tester sur le deriner element de la liste
            if (end($ListaffAssocie)->getAffSousTraitance() == 'OUI') {
                $nbrRecretementSTYear++;
            } else {
                $nbrRecretementSPYear++;
            }

        }

        /* La liste des mission chez selecting peaple en cours */
        $listMissionSPEncour = $em->getRepository('BackBundle:AffectationDemandeAff')->getMissionCours('NON');
        /* La liste des mission chez selecting peaple en cours pendant chaque mois*/
        $listMissionSPParMois = json_encode($this->calculNbrMissionParMois($listMissionSPEncour, $year, $yearBefore));

        /* La liste des mission sous traités en cours */
        $listMissionSTEncour = $em->getRepository('BackBundle:AffectationDemandeAff')->getMissionCours('OUI');
        /* La liste des mission sous traités en cours pendant chaque mois*/
        $listMissionSTParMois = json_encode($this->calculNbrMissionParMois($listMissionSTEncour, $year, $yearBefore));

        /** @var
         * Initialiser la liste des missions difficiles en cours pour SP
         * $listMissionDiffSPEncour */
        $listMissionDiffSPEncour = array();
        /** @var
         * Initialiser la liste des missions difficiles encours en sous traitance
         * $listMissionDiffSTEncour */
        $listMissionDiffSTEncour = array();

        /** @var
         * Compteur de la liste des missions difficiles pour SP
         * $i */
        $i = 0;
        /** @var
         * Compteur de la liste des missions en ST
         * $j */
        $j = 0;

        /******************************** SP *********************************/
        foreach ($listMissionSPEncour as $missionDiff) {

            /** @var
             * Recuperer la demande associée
             * $demandeAssocie */
            $demandeAssocie = $em->getRepository('BackBundle:DemandeRecrutementDmd')->find($missionDiff->getDmd()->getDmdId());

            /** @var
             * Differance entre la date de demande et la date d'affectation
             * $diffSP */
            $diffSP = date_diff($demandeAssocie->getDmdDate(), $missionDiff->getAffDateAffectation());
            // Mission difficile
            if (($diffSP->y >= 1 or $diffSP->m >= 4) and $diffSP->invert == 0) {
                $listMissionDiffSPEncour[$i] = $missionDiff;
                $i++;
            }
        }
        /** @var
         * La liste des mission difficile par mois pour Selecting peaple
         * $listMissionDiffSPParMois */
        $listMissionDiffSPParMois = json_encode($this->calculNbrMissionParMois($listMissionDiffSPEncour, $year, $yearBefore));

        /***************************** ST ***************************************/

        foreach ($listMissionSTEncour as $missionDiff) {
            /** @var
             * Recuperer la demande associée
             * $demandeAssocie */
            $demandeAssocie = $em->getRepository('BackBundle:DemandeRecrutementDmd')->find($missionDiff->getDmd()->getDmdId());

            $diffST = date_diff($demandeAssocie->getDmdDate(), $missionDiff->getAffDateAffectation());
            if (($diffST->y >= 1 or $diffST->m >= 4) and $diffST->invert == 0) {
                $listMissionDiffSTEncour[$j] = $missionDiff;
                $j++;
            }
        }

        /** @var
         * La liste des mission difficile en sous traitance par mois
         * $listMissionDiffSTParMois */
        $listMissionDiffSTParMois = json_encode($this->calculNbrMissionParMois($listMissionDiffSTEncour, $year, $yearBefore));

        return $this->render('FrontBundle:Default:indexYear.html.twig', array('ecran' => $ecran,'today'=>$today, 'year' => $year, 'yearBefore' => $yearBefore,
            'nbrRecretementSPYear' => $nbrRecretementSPYear, 'nbrRecretementSTYear' => $nbrRecretementSTYear,
            'listMissionSPParMois' => $listMissionSPParMois, 'listMissionSTParMois' => $listMissionSTParMois,
            'listMissionDiffSPParMois' => $listMissionDiffSPParMois, 'listMissionDiffSTParMois' => $listMissionDiffSTParMois,
            'ConditionBoocle'=>$this->container->getParameter('ConditionBoocle')
        ));
    }


    /**
     * Method Name: calculNbrMissionParMois
     * Input: $listMissionEncour, $year, $yearBefore
     * Utility: Retourner la liste des nombres des missions En cours par mois
     * Developper : Hachmi Halfaoui
     * Date of creation or last modification: 05/07/2017
     *
     */
    public function calculNbrMissionParMois($listMissionEncour, $year, $yearBefore)
    {
        /** @var
         * Initialiser une liste de OCT annee precedante jusq'au Juillet annee actuelle
         * $listeStatMois */
        $listeStatMois = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $j = 0;
        // Boucler : OCT,NOV,DEC
        for ($i = 10; $i < 13; $i++) {
            foreach ($listMissionEncour as $mission) {
                /* Pour les mois OCT,NOV,DEC*/
                if (intval(date_format($mission->getAffDateAffectation(), 'Y')) == $yearBefore) {
                    if (date_format($mission->getAffDateAffectation(), 'm') == $i) {
                        $listeStatMois[$j]++;
                    }
                }
            }
            $j++;
        }
        // mettre le compteur a la position 3
        $k = 3;
        // Boucler les autre mois : de JAN -> Juillet
        for ($i = 1; $i < 8; $i++) {
            foreach ($listMissionEncour as $mission) {
                /* Pour les autre mois */
                if (intval(date_format($mission->getAffDateAffectation(), 'Y')) == $year) {
                    if (date_format($mission->getAffDateAffectation(), 'm') == $i) {
                        $listeStatMois[$k]++;
                    }
                }
            }
            $k++;
        }
        return $listeStatMois;
    }


    /**
     * Method Name: getNbrsMissionSemaine
     * Input: $ListMissionCours
     * Output: liste(Nombre des mission et des mission difficiles au cours de la semaine)
     * Utility: Retourner le nombre des missions en cours et le nombre des missions difficile par semaine
     * Developper : Hachmi Halfaoui
     * Date of creation or last modification: 05/07/2017
     *
     */
    public function getNbrsMissionSemaine($ListMissionCours)
    {

        /** @var
         * Entity manager
         * $em */
        $em = $this->getDoctrine()->getManager();

        /** @var
         * Initialiser le nombre des mission de la semaine en cours à zero
         * $nbrMissionSemaineCours */
        $nbrMissionSemaineCours = 0;
        /** @var
         * Initialiser le nombre des missions difficiles à zero
         * $nbrMissionDiffSemaineCours */
        $nbrMissionDiffSemaineCours = 0;
        foreach ($ListMissionCours as $mission) {

            /* Les missions sous traitées en cours durant cette semaine*/
            if (strtotime('monday this week') <= strtotime($mission->getAffDateAffectation()->format('Y/m/d')) and strtotime($mission->getAffDateAffectation()->format('Y/m/d')) <= strtotime('sunday this week')) {
                //Incrementer le compteur
                $nbrMissionSemaineCours++;

                // Les missions sous traitées difficiles (la diffeance entre la date d'affectation et la date de demande >= 4 mois )

                /** @var
                 * Recuperer la demande associée
                 * $demandeAssocie */
                $demandeAssocie = $em->getRepository('BackBundle:DemandeRecrutementDmd')->find($mission->getDmd()->getDmdId());

                /** @var
                 * La differance entre le date de demande et le date d'affectation
                 * $diff */
                $diff = date_diff($demandeAssocie->getDmdDate(), $mission->getAffDateAffectation());


                // Tester si la differnce des mois est >= 4
                if (($diff->y >= 1 or $diff->m >= 4) and $diff->invert == 0) {
                    // Incrementer le compteur
                    $nbrMissionDiffSemaineCours++;
                }
            }
        }
        return array($nbrMissionSemaineCours, $nbrMissionDiffSemaineCours);

    }


}
