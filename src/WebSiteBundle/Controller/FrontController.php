<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 12/07/15
 * Time: 16:24
 */

namespace WebSiteBundle\Controller;


use Carbon\Carbon;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use WebSiteBundle\Form\ContactType;


class FrontController extends Controller {

    /**
     * @Route("/{_locale}/", name="website_index")
     * @Route("/", defaults={"_locale"="fr"}, requirements = {"_locale" = "fr|en|de"})
     */
    public function indexAction(Request $request) {

        $date = json_decode(file_get_contents('../src/WebSiteBundle/Resources/JsonData/Ouvertures.json'), true);

        $ouverture = Carbon::createFromFormat('Y-m-d',  $date['ouverture']);
        $fermeture = Carbon::createFromFormat('Y-m-d',  $date['fermeture']);

        $date = array(
            'ouverture' => $ouverture,
            'fermeture' => $fermeture
        );

        return $this->render('WebSiteBundle:Front:index.html.twig', array('date' => $date));
    }

    /**
     * @Route("/{_locale}/parcours", name="website_parcours")
     * @Route("/parcours", defaults={"_locale"="fr"}, requirements = {"_locale" = "fr|en|de"})
     */
    public function parcoursAction() {
        return $this->render('WebSiteBundle:Front:parcours.html.twig', array());
    }

    /**
     * @Route("/{_locale}/horaires", name="website_horaires")
     * @Route("/horaires", defaults={"_locale"="fr"}, requirements = {"_locale" = "fr|en|de"})
     */
    public function horairesAction() {
        $date = json_decode(file_get_contents('../src/WebSiteBundle/Resources/JsonData/Ouvertures.json'), true);

        $ouverture = Carbon::createFromFormat('Y-m-d',  $date['ouverture']);
        $fermeture = Carbon::createFromFormat('Y-m-d',  $date['fermeture']);

        $date = array(
            'ouverture' => $ouverture,
            'fermeture' => $fermeture
        );

        return $this->render('WebSiteBundle:Front:ouvertures.html.twig', array('date' => $date));
    }

    /**
     * @Route("/{_locale}/tarif", name="website_tarif")
     * @Route("/tarif", defaults={"_locale"="fr"}, requirements = {"_locale" = "fr|en|de"})
     */
    public function tarifAction() {
        return $this->render('WebSiteBundle:Front:tarif.html.twig', array());
    }

    /**
     * @Route("/{_locale}/contact", name="website_contact")
     * @Route("/contact", defaults={"_locale"="fr"}, requirements = {"_locale" = "fr|en|de"})
     */
    public function contactAction(Request $request) {

        $form = $this->createForm(new ContactType());

        $form->handleRequest($request);

        if ($form->isValid()) {

            $contact = $form->getData();

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'Pour: Oc-Aventures info@oc-aventures.com' . "\r\n";
            $headers .= 'From: '.$contact['nom'].' <'.$contact['mail'].'> ' . "\r\n";

            mail("info@oc-aventures.com","Demande information",$contact['message'], $headers);
        }
        return $this->render('WebSiteBundle:Front:contact.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("{_locale}/lien", name="website_lien")
     * @Route("/lien", defaults={"_locale"="fr"}, requirements = {"_locale" = "fr|en|de"})
     */
    public function lienAction() {

        $data = array(
            array(
                'address'=> 'www.canoe-cevennes.com',
                'desc'=> 'Canoë Montana, Saint Bauzille de Putois'
            ),
            array(
                'address'=> 'www.labellevigne.com',
                'desc'=> 'Cave à vin... Et à manger'
            ),

        );

        file_put_contents('../src/WebSiteBundle/Resources/JsonData/Partenaires.json', json_encode($data));

        $link = json_decode(file_get_contents('../src/WebSiteBundle/Resources/JsonData/Partenaires.json'));

        return $this->render('WebSiteBundle:Front:link.html.twig', array('partenaires' => $link));
    }
}