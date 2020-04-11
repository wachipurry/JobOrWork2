<?php

namespace App\Controller\Admin;

use App\Entity\Empresa;
use App\Entity\Oferta;
use App\Form\EmpresaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\Admin\ObjectManager;

class AdminEmpresaController extends AbstractController
{
    /**
     * @Route("/admin/empresa", name="admin-empresa")
     */
    public function index()
    {
        $entityManager=$this->getDoctrine()->getManager();
        $empreses=  $entityManager->getRepository(Empresa::class)->findAll();


        return $this->render('admin/admin_empresa/index.html.twig', ['empreses' => $empreses]);
    }


    /** @Route("/admin/empresa/{id}", name="admin_empresa_modif",requirements={"id":"\d+"}) */
    function modifEmpresa(Empresa $empresa, Request $request){
        $form = $this->createForm(EmpresaType::class, $empresa);
        $entityManager=$this->getDoctrine()->getManager();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($empresa);
            $entityManager->flush();
            return $this->redirectToRoute('admin-empresa');
        }
        return $this->render('admin/admin_empresa/modifEmpresa.html.twig', ["titol" => "Edita empresa","form" => $form-> createView()]);
    }

    /** @Route("/admin/empresa/delete/{id}", name="admin_empresa_delete") */
    function deleteEmpresa(Empresa $empresa, Request $request){
        $entityManager=$this->getDoctrine()->getManager();
        $entityManager->remove($empresa);
        $entityManager->flush();
        return $this->redirectToRoute('admin-empresa');
    }
   
    /** @Route("/admin/empresa/add", name="admin_empresa_add") */
    function addEmpresa(Request $request){
        $empresa = new Empresa();
        $form = $this->createForm(EmpresaType::class, $empresa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $empresa = $form->getData();
            $entityManager=$this->getDoctrine()->getManager();

            $entityManager->persist($empresa);
            $entityManager->flush();
            return $this->redirectToRoute('admin-empresa');
        }

        return $this->render('admin/admin_empresa/modifEmpresa.html.twig', ["titol" => "Afegir empresa","form" => $form-> createView()]);

    }
    
}