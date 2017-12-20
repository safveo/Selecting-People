<?php

namespace BackBundle\Controller;

use BackBundle\Entity\Ecran;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Ecran controller.
 *
 */
class EcranController extends Controller
{
    /**
     * Method Name: indexAction
     * Input:
     * Utility: Afficher la liste des ecrans ordonnée par ordre
     * Developper : Hachmi Halfaoui
     * Date of creation or last modification: 07/07/2017
     *
     */
    public function indexAction()
    {
        /** @var
         * service doctrine entity manager
         * $em */
        $em = $this->getDoctrine()->getManager();

        /** @var
         * Liste des ecrans activés deja ajoutés ordonnée par ordre croissant
         * $ecrans */
        $ecrans = $em->getRepository('BackBundle:Ecran')->findBy(array(), array('ordre' => 'ASC'));

        return $this->render('ecran/index.html.twig', array(
            'ecrans' => $ecrans,
        ));
    }

    /**
     * Method Name: newAction
     * Input: Request $request
     * Utility: Ajouter nouvelle vue/ecran
     * Developper : Hachmi Halfaoui
     * Date of creation or last modification: 07/07/2017
     *
     */
    public function newAction(Request $request)
    {
        /** @var
         * Creer l'object Ecran
         * $ecran */
        $ecran = new Ecran();
        $form = $this->createForm('BackBundle\Form\EcranType', $ecran);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var
             * service doctrine entity manager
             * $em */
            $em = $this->getDoctrine()->getManager();

            /** @var
             * Recuperer la derniere ordre des ecrans ajoutés
             * $ordre */
            $ordre = $em->getRepository('BackBundle:Ecran')->getLastOrder();
            // Modifier l'attribut ordre en ajoutant 1
            $ecran->setOrdre($ordre + 1);

            $em->persist($ecran);
            $em->flush();

            /**
             * message de succès
             */
            $this->get('session')->getFlashBag()->add('notice', 'Insertion avec succés');

            return $this->redirectToRoute('ecran_index');
        }

        return $this->render('ecran/new.html.twig', array(
            'ecran' => $ecran,
            'form' => $form->createView(),
        ));
    }

    /**
     * Method Name: updateOrdreEcranAction
     * Input: Request $request
     * Utility: Modifier l'ordre de vue/ecran
     * Developper : Hachmi Halfaoui
     * Date of creation or last modification: 07/07/2017
     *
     */
    public function updateOrdreEcranAction(Request $request)
    {
        /** @var  $em
         * EntityManager
         */
        $em = $this->getDoctrine()->getManager();

        //récupérer les ordres
        $order = $request->get("order");

        //parcourir les ordres et mettre à jour les entités
        foreach ($order as $field => $value) {
            $order = $field;
            $id = $value;
            // à jour l'ordre
            $ecran = $em->getRepository('BackBundle:Ecran')->find($id);
            // modification ordre
            $ecran->setOrdre($order);
            $em->persist($ecran);
        }
        $em->flush();
        return new Response('ok');

    }


    /**
     * Method Name: showAction
     * Input:
     * Utility: Afficher un  vue/ecran
     * Developper : Hachmi Halfaoui
     * Date of creation or last modification: 07/07/2017
     *
     */
    public function showAction()
    {
        $em = $this->getDoctrine()->getManager();

        /** @var
         * liste des ecrans triée par ordre croissant
         * $ecrans */
        $ecrans = $em->getRepository('BackBundle:Ecran')->findBy(array('activated'=>1), array('ordre' => 'ASC'));


        // redirect to page 1 ds le cas le nombre des ecran attient le max
        if ($_SESSION['compteur'] >= count($ecrans)) {
            return $this->redirectToRoute('stat_1');
        }

        /** @var
         * Recuperer l'ecran associé  a $_SESSION['compteur']
         * $ecran */
        $ecran = $ecrans[$_SESSION['compteur']];


        // Incrementer le compteur
        $_SESSION['compteur'] = $_SESSION['compteur'] + 1;
        return $this->render('ecran/show.html.twig', array(
            'ecran' => $ecran,'ConditionBoocle'=>$this->container->getParameter('ConditionBoocle')
        ));

    }

    /**
     * Method Name: editAction
     * Input: Request $request, Ecran $ecran
     * Utility: modifier un  vue/ecran
     * Developper : Hachmi Halfaoui
     * Date of creation or last modification: 07/07/2017
     *
     */
    public function editAction(Request $request, Ecran $ecran)
    {

        $editForm = $this->createForm('BackBundle\Form\EcranType', $ecran);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            /**
             * message de succès
             */
            $this->get('session')->getFlashBag()->add('notice', 'Modification avec succés');

            return $this->redirectToRoute('ecran_index');
        }

        return $this->render('ecran/edit.html.twig', array(
            'ecran' => $ecran,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Method Name: deleteAction
     * Input: Request $request
     * Utility: supprimer un  vue/ecran
     * Developper : Hachmi Halfaoui
     * Date of creation or last modification: 07/07/2017
     *
     */
    public function deleteAction(Request $request)
    {
        //récupérer l'id
        $id = $request->get('id');
        //récupérer l'entité
        $em = $this->getDoctrine()->getManager();

        /** @var
         * recuperer l'ecran associé a l'id
         * $ecran */
        $ecran = $em->getRepository('BackBundle:Ecran')->find($id);

        /***vérifier l'existance ecran ***/
        if (!$ecran) {
            throw $this->createNotFoundException("Impossible de trouver l'Entity.");
        }

        // Suppression
        $em->remove($ecran);
        $em->flush();
        return new Response('deleted');
    }



    /**
     * Method Name : activeAction
     * Utility: activer/désactiver une ecran .
     * @param Request $request
     * @return Response
     * Developper: Hachmi Halfaoui
     * Date of creation or last modification: 13/07/2017
     */
    public function activeAction(Request $request)
    {
       /** @var
        * Recuperer l'identifiant de l'ecran
        * $id */
        $id = $request->get('id');

        /** @var
         * service doctrine entity manager
         * $em */
        $em = $this->getDoctrine()->getManager();

        /** @var
         * Recuperer l'ecran associé a l'identifiant
         * $ecran */
        $ecran = $em->getRepository('BackBundle:Ecran')->find($id);

        /***vérifier l'existance de l'ecran ***/
        if (!$ecran) {
            throw $this->createNotFoundException("Impossible de trouver l'Entity.");
        }

        //vérifier l'etat d'activation
        $etat = (int)$ecran->getActivated();

        if ($etat == 1) {
            $reponse = "desactive";
            $ecran->setActivated('0');
        } else {
            $reponse = "active";
            $ecran->setActivated('1');
        }
        $em->flush();
        return new Response($reponse);
    }

    /**
     * Method Name : showOneAction
     * Utility: Afficher un ecran .
     * @param Request $request
     * @return Response
     * Developper: Hachmi Halfaoui
     * Date of creation or last modification: 13/07/2017
     */
    public  function showOneAction($id){
        $em = $this->getDoctrine()->getManager();

        /** @var
         * Recuperer l'ecran associé
         * $ecran */
        $ecran = $em->getRepository('BackBundle:Ecran')->find($id);

        /***vérifier l'existance de l'ecran ***/
        if (!$ecran) {
            throw $this->createNotFoundException("Impossible de trouver l'Entity.");
        }

        /** @var
         * Condition sur le boocle des ecran
         * $ConditionBoocle */
        $ConditionBoocle = 1;

        return $this->render('ecran/show.html.twig', array(
            'ecran' => $ecran,'ConditionBoocle'=>$ConditionBoocle
        ));


    }







}
