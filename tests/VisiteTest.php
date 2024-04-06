<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Tests;

use App\Entity\Environnement;
use App\Entity\Visite;
use DateTime;
use PHPUnit\Framework\TestCase;


/**
 * Description of VisiteTest
 *
 * @author Toochi
 */
class VisiteTest extends TestCase {
    
    public function testGetDatecreationString(){
        $visite = new Visite();
        $visite->setDatecreation(new DateTime("2022-04-14"));
        $this->assertEquals("14/04/2022", $visite->getDatecreationString());
    }
    
    public function testAddEnvironnement(){
        $environnement = new Environnement();
        $environnement->setNom("plage");
        $visite = new Visite();
        $visite->addEnvironnement($environnement);
        $nbEnvironnementAvant = $visite->getEnvironnements()->count();
        $visite->addEnvironnement($environnement);
        $nbEnvironnementApres = $visite->getEnvironnements()->count();
        $this->assertEquals($nbEnvironnementAvant, $nbEnvironnementApres, "ajout même environnement devrait échouer");
    }
}
