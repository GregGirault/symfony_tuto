<?php

namespace App\Controller;

use App\Form\CustomerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Customer;

class CustomerController extends AbstractController
{
    #[Route('/formcustomer', name: 'formcustomer')]
    public function index(Request $request)
    {
        $customer = new Customer();
       $customerform = $this->createForm(CustomerType::class, $customer);

       $customerform->handleRequest($request);

       if($customerform->isSubmitted() && $customerform->isValid())
       {
        // afficher les informations du formulaire
        dump($request->request->all());

       }


        return $this->render('customer/index.html.twig', [
            'customerform'=> $customerform->createView()
        ]);
    }
}
