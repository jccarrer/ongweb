<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
/**
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity("username", message="This username exists!")

 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;
    /**
     * @ORM\Column(type="json_array")
     */
    private $roles= [];
    
     /**
     * @ORM\OneToOne(targetEntity="App\Entity\Osc", mappedBy="user")
     */
    private $osc;

    

 
    public function getId()
    {
        return $this->id;
    }
    public function getUsername(): ?string
    {
        return $this->username;
    }
    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }
    public function getPassword(): ?string
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        if (!is_null($password)) {
            $this->password = $password;
        }
        return $this;
    }



    public function getRoles()
    {
        $roles = $this->roles;
        if( !in_array('ROLE_USER',$roles)){
            $roles[] = 'ROLE_USER';
        }
        return $roles;
    }
    /*public function setRoles($roles)
    {
        $this->roles = $roles;
        return $this;
    }*/



    public function getSalt()
    {
        return null;
    }
    public function eraseCredentials()
    {
    }


    
    
    public function __construct()
    {
        
		$this->roles = array('ROLE_USER');

    }    
    
    /**
     * @return Collection|Osc[]
     */
    public function getOsc(): Collection
    {
        return $this->osc;
    }
     public function setOsc($osc)
    {
        $this->osc = $osc;
        return $this;
    }   
    
    
     public function __toString() {
        return $this->username;
    }

    
}
