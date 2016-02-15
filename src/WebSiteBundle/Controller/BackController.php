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
use WebSiteBundle\Form\DateOuvertureType;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class BackController extends Controller
{
    /**
     * @Route("/admin", name="admin_index")
     */
    public function indexAction(Request $request) {

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        /*$date = json_decode(file_get_contents('../src/WebSiteBundle/Resources/JsonData/Ouvertures.json'), true);

        $ouverture = Carbon::createFromFormat('Y-m-d',  $date['ouverture']);
        $fermeture = Carbon::createFromFormat('Y-m-d',  $date['fermeture']);

        $date = array(
            'ouverture' => $ouverture,
            'fermeture' => $fermeture
        );*/

        $form = $this->createForm(
            new DateOuvertureType()
       /*     array(
                'ouverture' => $ouverture,
                'fermeture' => $fermeture
            )*/
        );

        $form->handleRequest($request);

        if ($form->isValid()) {

            $jsonContent = $serializer->serialize($form->getData(), 'json');
            file_put_contents('../src/WebSiteBundle/Resources/YmlData/Ouvertures.yml', $jsonContent);

            $this->addFlash(
                'notice',
                'Les dates d\'ouvertures ont bien étaient enregistrées !'
            );
        }

        return $this->render('WebSiteBundle:Back:index.html.twig', array('form' => $form->createView()));
    }
}