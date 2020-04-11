<?php

namespace App\Controller\Admin;
use App\Entity\Empresa;
use App\Entity\Oferta;
use App\Form\OfertaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\Admin\ObjectManager;

class AdminOfertaController extends AbstractController
{
    /**
     * @Route("/admin/oferta", name="admin-oferta")
     */
    public function index()
    {
        $entityManager=$this->getDoctrine()->getManager();
        $ofertes=  $entityManager->getRepository(Oferta::class)->findAll();


        return $this->render('admin/admin_oferta/index.html.twig', ['ofertes' => $ofertes]);
    }


    /** @Route("/admin/oferta/{id}", name="admin_oferta_modif",requirements={"id":"\d+"}) */
    function modifOferta(Oferta $oferta, Request $request){
        $form = $this->createForm(OfertaType::class, $oferta);
        $entityManager=$this->getDoctrine()->getManager();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($oferta);
            $entityManager->flush();
            return $this->redirectToRoute('admin-oferta');
        }
        return $this->render('admin/admin_oferta/modifOferta.html.twig', ["titol" => "Edita oferta","form" => $form-> createView()]);
    }

    /** @Route("/admin/oferta/delete/{id}", name="admin_oferta_delete") */
    function deleteOferta(Oferta $oferta, Request $request){
        $entityManager=$this->getDoctrine()->getManager();
        $entityManager->remove($oferta);
        $entityManager->flush();
        return $this->redirectToRoute('admin-oferta');
    }
   
    /** @Route("/admin/oferta/add", name="admin_oferta_add") */
    function addOferta(Request $request){
        $oferta = new Oferta();
        $form = $this->createForm(OfertaType::class, $oferta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $oferta = $form->getData();
            $entityManager=$this->getDoctrine()->getManager();

            $entityManager->persist($oferta);
            $entityManager->flush();
            return $this->redirectToRoute('admin-oferta');
        }

        return $this->render('admin/admin_oferta/modifOferta.html.twig', ["titol" => "Afegir oferta","form" => $form-> createView()]);

    }
    
}
