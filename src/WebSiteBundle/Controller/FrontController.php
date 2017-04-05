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

        $image = json_decode(file_get_contents('../src/WebSiteBundle/Resources/JsonData/Image/gallery.json'), true);
        $tarifs = json_decode(file_get_contents('../src/WebSiteBundle/Resources/JsonData/Tarifs.json'), true);
        $partenaires = json_decode(file_get_contents('../src/WebSiteBundle/Resources/JsonData/Partenaires.json'), true);
        
        return $this->render('WebSiteBundle:Front:index.html.twig', array(
            'image'         => $image,
            'tarifs'        => $tarifs,
            'partenaires'   => $partenaires,
        ));
    }


    /**
     * @param $numImage
     * @Route("/get-image/{numImage}", name="website_index")
     */
    public function ajaxCallGetImage($numImage)
    {
        
    }
}