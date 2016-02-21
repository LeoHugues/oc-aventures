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
use WebSiteBundle\Form\DateOuvertureType;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

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
     * @Route("/images", name="admin_images")
     */
    public function imagesAction(Request $request)
    {
        return $this->render('WebSiteBundle:Back:images.html.twig');
    }

    /**
     * @Route("/saveImg", name="save_to_file")
     */
    public function saveToFileAction() {

        $imagePath = "front/images/";
        $allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
        $temp = explode(".", $_FILES["img"]["name"]);
        $extension = end($temp);

        //Check write Access to Directory
        if (!is_writable($imagePath)) {
            $response = Array(
                "status" => 'error',
                "message" => 'Can`t upload File; no write Access'
            );

            return Response::create(json_encode($response), 200);
        }

        if ( in_array($extension, $allowedExts)) {
            if ($_FILES["img"]["error"] > 0) {
                $response = array(
                    "status" => 'error',
                    "message" => 'ERROR Return Code: '. $_FILES["img"]["error"],
                );
            } else {
                $filename = $_FILES["img"]["tmp_name"];
                list($width, $height) = getimagesize( $filename );
                $path = $imagePath . $_POST['imgName'] . '.' . $extension;
                move_uploaded_file($filename, $path);
                $response = array(
                    "status" => 'success',
                    "url" => $imagePath . $_POST['imgName'] . '.' . $extension,
                    "width" => $width,
                    "height" => $height
                );
            }
        } else {
            $response = array(
                "status" => 'error',
                "message" => 'something went wrong, most likely file is to large for upload. check upload_max_filesize, post_max_size and memory_limit in you php.ini',
            );
        }

        return Response::create(json_encode($response),200);
    }

    /**
     * @Route("/cropImg", name="crop_to_file")
     */
    public function cropToFileAction() {
        /*
*	!!! THIS IS JUST AN EXAMPLE !!!, PLEASE USE ImageMagick or some other quality image processing libraries
*/
        $imgUrl = $_POST['imgUrl'];
// original sizes
        $imgInitW = $_POST['imgInitW'];
        $imgInitH = $_POST['imgInitH'];
// resized sizes
        $imgW = $_POST['imgW'];
        $imgH = $_POST['imgH'];
// offsets
        $imgY1 = $_POST['imgY1'];
        $imgX1 = $_POST['imgX1'];
// crop box
        $cropW = $_POST['cropW'];
        $cropH = $_POST['cropH'];
// rotation angle
        $angle = $_POST['rotation'];
        $jpeg_quality = 100;
      //  $output_filename = "front/images/slide-1";
// uncomment line below to save the cropped image in the same location as the original image.
$output_filename = dirname($imgUrl). "/" . $_POST['slideName'];
        $what = getimagesize($imgUrl);
        switch(strtolower($what['mime'])) {
            case 'image/png':
                $img_r = imagecreatefrompng($imgUrl);
                $source_image = imagecreatefrompng($imgUrl);
                $type = '.png';
                break;
            case 'image/jpeg':
                $img_r = imagecreatefromjpeg($imgUrl);
                $source_image = imagecreatefromjpeg($imgUrl);
                error_log("jpg");
                $type = '.jpeg';
                break;
            case 'image/gif':
                $img_r = imagecreatefromgif($imgUrl);
                $source_image = imagecreatefromgif($imgUrl);
                $type = '.gif';
                break;
            default: die('image type not supported');
        }
//Check write Access to Directory
        if(!is_writable(dirname($output_filename))){
            $response = Array(
                "status" => 'error',
                "message" => 'Can`t write cropped File'
            );
        }else{           // resize the original image to size of editor
            $resizedImage = imagecreatetruecolor($imgW, $imgH);
            imagecopyresampled($resizedImage, $source_image, 0, 0, 0, 0, $imgW, $imgH, $imgInitW, $imgInitH);
            // rotate the rezized image
            $rotated_image = imagerotate($resizedImage, -$angle, 0);
            // find new width & height of rotated image
            $rotated_width = imagesx($rotated_image);
            $rotated_height = imagesy($rotated_image);
            // diff between rotated & original sizes
            $dx = $rotated_width - $imgW;
            $dy = $rotated_height - $imgH;
            // crop rotated image to fit into original rezized rectangle
            $cropped_rotated_image = imagecreatetruecolor($imgW, $imgH);
            imagecolortransparent($cropped_rotated_image, imagecolorallocate($cropped_rotated_image, 0, 0, 0));
            imagecopyresampled($cropped_rotated_image, $rotated_image, 0, 0, $dx / 2, $dy / 2, $imgW, $imgH, $imgW, $imgH);
            // crop image into selected area
            $final_image = imagecreatetruecolor($cropW, $cropH);
            imagecolortransparent($final_image, imagecolorallocate($final_image, 0, 0, 0));
            imagecopyresampled($final_image, $cropped_rotated_image, 0, 0, $imgX1, $imgY1, $cropW, $cropH, $cropW, $cropH);
            // finally output png image
            //imagepng($final_image, $output_filename.$type, $png_quality);

            imagejpeg($final_image, $output_filename . $type, $jpeg_quality);
            $response = Array(
                "status" => 'success',
                "url" => '../'. $output_filename . $type
            );
            if(file_exists($imgUrl)) unlink($imgUrl);
        }

        return Response::create(json_encode($response),200);
    }
}