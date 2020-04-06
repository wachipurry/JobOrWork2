<?php

namespace App\Controller;

use App\Entity\Empresa;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EmpresaController extends AbstractController
{
    /**
     * @Route("/empresa", name="empresa")
     */
    public function index()
    {
        $entityManager=$this->getDoctrine()->getManager();
        $empreses=  $entityManager->getRepository(Empresa::class)->findAll();
        return $this->render('empresa/index.html.twig', ['empreses' => $empreses]);

    }

     /**
    * @Route("/empresa/detall", name="empresa-detall")
    */ 
    public function getEmpresaDetall(Request $request)
    {
        if (isset($_POST["id"])) {  
            $id=$_POST["id"];
            $entityManager=$this->getDoctrine()->getManager();
            $empresaDetall=  $entityManager->getRepository(Empresa::class)->findById($id);
      
            return $this->render('empresa/detall/index.html.twig', ['empreses' => $empresaDetall]);
        }
    }
}
