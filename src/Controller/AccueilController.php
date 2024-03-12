<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * Description of AccueilControllers
 *
 * @author Toochi
 */
class AccueilController extends AbstractController{
    
    /**
     * @Route("/", name="accueil")
     * @return Response
     */
    public function index(): Response{
        return $this->render("pages\accueil.html.twig");
    }
    //put your code here
}
