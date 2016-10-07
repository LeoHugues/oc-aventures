<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 12/02/2016
 * Time: 18:12
 */

namespace WebSiteBundle\Controller;


use Carbon\Carbon;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Yaml\Dumper;
use WebSiteBundle\Form\DateOuvertureType;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use WebSiteBundle\Form\Image\GalleryAccueilType;
use WebSiteBundle\Form\Image\ParcoursType;
use WebSiteBundle\Form\Image\PlanType;
use WebSiteBundle\Form\PartenairesType;
use WebSiteBundle\Form\TarifsType;
use WebSiteBundle\Form\TextFormType;

/**
 * @Route("/admin")
 */
class BackController extends Controller
{
    /**
     * @Route("/", name="admin_index")
     */
    public function indexAction(Request $request)
    {
        return $this->render('WebSiteBundle:Back:index.html.twig');
    }

    /**
     * @Route("/ouvertures", name="admin_date_ouvertures")
     */
    public function dateOuverturesAction(Request $request)
    {
        $date = json_decode(file_get_contents('../src/WebSiteBundle/Resources/JsonData/Ouvertures.json'), true);

        $form = $this->createForm(
            new DateOuvertureType(),
            array(
                'ouverture' => Carbon::createFromFormat('Y-m-d', $date['ouverture']),
                'fermeture' => Carbon::createFromFormat('Y-m-d', $date['fermeture']),
            )
        );

        $form->handleRequest($request);

        if ($form->isValid()) {

            $serializer = new Serializer(
                array(
                    new ObjectNormalizer(),
                ),
                array(
                    new JsonEncoder(),
                )
            );

            $jsonContent = $serializer->serialize(
                array(
                    'ouverture' => $form->getData()['ouverture']->format('Y-m-d'),
                    'fermeture' => $form->getData()['fermeture']->format('Y-m-d')
                ),
                'json'
            );

            file_put_contents('../src/WebSiteBundle/Resources/JsonData/Ouvertures.json', $jsonContent);

            $this->addFlash(
                'notice',
                'Les dates d\'ouvertures ont bien étaient enregistrées !'
            );

            return $this->render('WebSiteBundle:Back:index.html.twig');
        }

        return $this->render('WebSiteBundle:Back:ouvertures.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/images/{page}", name="admin_images")
     */
    public function imagesAction(Request $request, $page)
    {
        $jsonPath = '../src/WebSiteBundle/Resources/JsonData/Image/' . $page .'.json';
        $gallery = json_decode(file_get_contents($jsonPath), true);
        if ($page == "accueil") {
            $form = $this->createForm(new GalleryAccueilType($gallery));
        } elseif($page == "plan") {
            $form = $this->createForm(new PlanType($gallery));
        } else {
            $form = $this->createForm(new ParcoursType($gallery));
        }

        $form->handleRequest($request);
        if ($form->isValid()) {
            $jsonContent = json_encode($form->getData());
            file_put_contents($jsonPath, $jsonContent);
        }

        return $this->render('WebSiteBundle:Back:images.html.twig', array('form' => $form->createView(), 'page' => $page));
    }

    /**
     * @Route("/partenaires", name="admin_partenaires")
     */
    public function partenairesAction(Request $request)
    {
        $partenaires = json_decode(file_get_contents('../src/WebSiteBundle/Resources/JsonData/Partenaires.json'), true);
        $form = $this->createForm(new PartenairesType(), array('partenaires' => $partenaires));

        $form->handleRequest($request);

        if ($form->isValid()) {
            $jsonContent = json_encode(array_values($form->getData()['partenaires']));
            file_put_contents('../src/WebSiteBundle/Resources/JsonData/Partenaires.json', $jsonContent);
            $this->addFlash(
                'notice',
                'Les liens des partenaires ont bien étaient enregistrées !'
            );

            return $this->render('WebSiteBundle:Back:index.html.twig');
        }

        return $this->render('WebSiteBundle:Back:partenaires.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/tarifs", name="admin_tarifs")
     */
    public function tarifsAction(Request $request)
    {
        $tarifs = json_decode(file_get_contents('../src/WebSiteBundle/Resources/JsonData/Tarifs.json'), true);
        $form = $this->createForm(new TarifsType(), $tarifs);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $jsonContent = json_encode($form->getData());
            file_put_contents('../src/WebSiteBundle/Resources/JsonData/Tarifs.json', $jsonContent);
            $this->addFlash(
                'notice',
                'Les nouveaux tarifs ont bien étaient enregistrées !'
            );

            return $this->render('WebSiteBundle:Back:index.html.twig');
        }

        return $this->render('WebSiteBundle:Back:tarifs.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/textes/{lang}", name="admin_text")
     */
    public function textAction(Request $request, $lang)
    {
        $yaml = new Parser();
        $traduction = $yaml->parse(file_get_contents('../src/WebSiteBundle/Resources/translations/traduction.' . $lang . '.yml'));

        $form = $this->createForm(
            new TextFormType(),
            $traduction
        );

        $form->handleRequest($request);

        if ($form->isValid()) {
            $traduction = $form->getData();
            $dumper = new Dumper();

            file_put_contents(
                '../src/WebSiteBundle/Resources/translations/traduction.' . $lang . '.yml',
                $dumper->dump($traduction)
            );

            $this->addFlash(
                'notice',
                'Les nouveaux textes ont bien étaient enregistrées !'
            );

            return $this->render('WebSiteBundle:Back:index.html.twig');
        }

        return $this->render('WebSiteBundle:Back:text.html.twig', array('form' => $form->createView(), 'lang' => $lang));
    }
}