<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 */

class Utilisateur implements UserInterface
{


    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(name="id_utilisateur",type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_utilisateur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom_utilisateur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password_utilisateur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email_utilisateur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $avatar_utilisateur;


    public function __construct()
    {
        $this->id_groupe = new ArrayCollection();
        $this->id_typeuser = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNomUtilisateur(): ?string
    {
        return $this->nom_utilisateur;
    }

    public function getRoles(): array
    {
        if($this->roles != null)
            return array_unique(array_merge(['ROLE_USER'], $this->roles));
        else
            return array_unique(['ROLE_USER']);
    }

    public function setRoles(string $roles)
    {
        $this->roles = $roles;
    }

    public function resetRoles()
    {
        $this->roles = [];
    }

    public function setNomUtilisateur(string $nom_utilisateur): self
    {
        $this->nom_utilisateur = $nom_utilisateur;

        return $this;
    }

    public function getPrenomUtilisateur(): ?string
    {
        return $this->prenom_utilisateur;
    }

    public function setPrenomUtilisateur(string $prenom_utilisateur): self
    {
        $this->prenom_utilisateur = $prenom_utilisateur;

        return $this;
    }

    public function getPasswordUtilisateur(): ?string
    {
        return $this->password_utilisateur;
    }

    public function setPasswordUtilisateur(string $password_utilisateur): self
    {
        $this->password_utilisateur = $password_utilisateur;

        return $this;
    }

    public function getEmailUtilisateur(): ?string
    {
        return $this->email_utilisateur;
    }

    public function setEmailUtilisateur(string $email_utilisateur): self
    {
        $this->email_utilisateur = $email_utilisateur;

        return $this;
    }

    public function getAvatarUtilisateur(): ?string
    {
        return $this->avatar_utilisateur;
    }

    public function setAvatarUtilisateur(string $avatar_utilisateur): self
    {
        $this->avatar_utilisateur = $avatar_utilisateur;

        return $this;
    }

    //
    public function getPassword()
    {
        // TODO: Implement getPassword() method.
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function getUsername()
    {
        // TODO: Implement getUsername() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }


}
