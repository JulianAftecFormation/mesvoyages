<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;


/**
 * Description of Contact
 *
 * @author Toochi
 */
class Contact {
    
    #[Assert\NotBlank()]
    #[Assert\Length(min: 2, max: 100)]
    private ?String $nom = null;
    
    #[Assert\NotBlank()]
    #[Assert\Email()]
    private ?String $email = null;
    
    #[Assert\NotBlank()]
    private ?String $message = null;
    
    
    function getNom(): ?String {
        return $this->nom;
    }

    function getEmail(): ?String {
        return $this->email;
    }

    function getMessage(): ?String {
        return $this->message;
    }

    function setNom(?String $nom): self {
        $this->nom = $nom;
        return $this;
    }

    function setEmail(?String $email): self {
        $this->email = $email;
        return $this;
    }

    function setMessage(?String $message): self {
        $this->message = $message;
        return $this;
    }
    
}


