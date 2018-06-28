<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 */

class Utilisateur
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

    /**
     * @ORM\Column(type="boolean",  options={"default" : 0})
     */
    private $mediathequeStatus_utilisateur;


    public function __construct()
    {
        $this->id_groupe = new ArrayCollection();
        $this->id_typeuser = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNomUtilisateur(): ?string
    {
        return $this->nom_utilisateur;
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

    public function getMediathequeStatusUtilisateur(): ?bool
    {
        return $this->mediathequeStatus_utilisateur;
    }

    public function setMediathequeStatusUtilisateur(bool $mediathequeStatus_utilisateur): self
    {
        $this->mediathequeStatus_utilisateur = $mediathequeStatus_utilisateur;

        return $this;
    }


}
