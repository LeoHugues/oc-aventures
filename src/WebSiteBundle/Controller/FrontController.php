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
        $image = json_decode(file_get_contents('../src/WebSiteBundle/Resources/JsonData/Image/accueil.json'), true);
        $tarifs = json_decode(file_get_contents('../src/WebSiteBundle/Resources/JsonData/Tarifs.json'), true);

        $ouverture = Carbon::createFromFormat('Y-m-d',  $date['ouverture']);
        $fermeture = Carbon::createFromFormat('Y-m-d',  $date['fermeture']);

        $date = array(
            'ouverture' => $ouverture,
            'fermeture' => $fermeture
        );

        return $this->render('WebSiteBundle:Front:index.html.twig', array(
            'date' => $date,
            'image' => $image,
            'tarifs' => $tarifs,
        ));
    }

    /**
     * @Route("/{_locale}/parcours", name="website_parcours")
     * @Route("/parcours", defaults={"_locale"="fr"}, requirements = {"_locale" = "fr|en|de"})
     */
    public function parcoursAction() {
        $image['adult']  = json_decode(file_get_contents('../src/WebSiteBundle/Resources/JsonData/Image/adulte.json'), true);
        $image['enfant'] = json_decode(file_get_contents('../src/WebSiteBundle/Resources/JsonData/Image/enfant.json'), true);
        $image['plan']   = json_decode(file_get_contents('../src/WebSiteBundle/Resources/JsonData/Image/plan.json'), true);

        return $this->render('WebSiteBundle:Front:parcours.html.twig', array(
            'image' => $image
        ));
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
        $tarifs = json_decode(file_get_contents('../src/WebSiteBundle/Resources/JsonData/Tarifs.json'), true);

        return $this->render('WebSiteBundle:Front:tarif.html.twig', array('tarifs' => $tarifs));
    }

    /**
     * @Route("/{_locale}/contact", name="website_contact")
     * @Route("/contact", defaults={"_locale"="fr"}, requirements = {"_locale" = "fr|en|de"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function contactAction(Request $request) {

        $form = $this->createForm(new ContactType());

        $form->handleRequest($request);

        if ($form->isValid()) {

            $contact = $form->getData();

            $message = \Swift_Message::newInstance()
                ->setSubject('Hello Email')
                ->setFrom($contact['mail'])
                ->setTo('leo.hugues@hotmail.fr')
                ->setBody($contact['message'])
            ;
            $this->get('mailer')->send($message);
        }

        return $this->render('WebSiteBundle:Front:contact.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("{_locale}/lien", name="website_lien")
     * @Route("/lien", defaults={"_locale"="fr"}, requirements = {"_locale" = "fr|en|de"})
     */
    public function lienAction() {

        $partenaires = json_decode(file_get_contents('../src/WebSiteBundle/Resources/JsonData/Partenaires.json'), true);
        return $this->render('WebSiteBundle:Front:link.html.twig', array('partenaires' => $partenaires));
    }

    /**
     * @Route("{_locale}/laser-game", name="website_laser")
     * @Route("/laser-game", defaults={"_locale"="fr"}, requirements = {"_locale" = "fr|en|de"})
     * @param Request $request
     */
    public function laserAction(Request $request) {
        $image = json_decode(file_get_contents('../src/WebSiteBundle/Resources/JsonData/Image/laser.json'), true);
        
        return $this->render('WebSiteBundle:Front:laser.html.twig', array('image' => $image));
    }
}