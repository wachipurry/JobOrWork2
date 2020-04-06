<?php

namespace App\Controller;

use App\Entity\Oferta;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OfertaController extends AbstractController
{
    /**
     * @Route("/oferta", name="oferta")
     * @Route("/", name="home")
     */
    public function index()
    {
        $entityManager=$this->getDoctrine()->getManager();
        $ofertes=  $entityManager->getRepository(Oferta::class)->findAll();


        return $this->render('oferta/index.html.twig', ['ofertes' => $ofertes]);
    }

     /**
    * @Route("/oferta/detall", name="oferta-detall")
    */ 
    public function getOfertaDetall(Request $request)
    {
        if (isset($_POST["id"])) {  
            $id=$_POST["id"];
            $entityManager=$this->getDoctrine()->getManager();
            $ofertaDetall=  $entityManager->getRepository(Oferta::class)->findById($id);
      
            return $this->render('oferta/detall/index.html.twig', ['ofertes' => $ofertaDetall]);
        }
    }
         
    

}
