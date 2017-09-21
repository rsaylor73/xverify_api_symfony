<?php

namespace AppBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\xverify;

class xverifyController extends Controller {


    /**
     * @Route("/xverify", name="xverify")
     */    
    public function xverifyAction(Request $request, xverify $xverify) {
        // Note: you would access the API www.yourname.com/xverify?phone=8035551212
        
        $phone = $request->query->get('phone'); 

    	$data = array();
    	$data['phone'] = $phone;
    	$result = $xverify->verify('phone',$data);
        $json = json_decode($result,true);

        return $this->render('api/external_api.html.twig',[
        	'response' => $json,
        ]);
    }

}
?>
