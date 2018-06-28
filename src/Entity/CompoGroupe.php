<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompoGroupeRepository")
 *
 */
class CompoGroupe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur")
<<<<<<< HEAD
     * @ORM\Column(type="integer")
=======
>>>>>>> b98cf1014d9c4bd60ce62a929f3fca7232cd0766
     * @ORM\JoinColumn(nullable=false,name="id_utilisateur",referencedColumnName="id_utilisateur")
     */
    private $id_utilisateur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeUtilisateurGroupe")
<<<<<<< HEAD
     *  @ORM\Column(type="integer")
=======
>>>>>>> b98cf1014d9c4bd60ce62a929f3fca7232cd0766
     * @ORM\JoinColumn(nullable=false, name="id_typeuser",referencedColumnName="id")
     *
     */
    private $id_typeuser;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\GroupeUtilisateur")
<<<<<<< HEAD
     *  @ORM\Column(type="integer")
=======
>>>>>>> b98cf1014d9c4bd60ce62a929f3fca7232cd0766
     * @ORM\JoinColumn(nullable=false,name="id_groupe",referencedColumnName="id")
     */
    private $id_groupe;

    public function getId()
    {
        return $this->id;
    }

    public function getIdUtilisateur()
    {
        return $this->id_utilisateur;
    }



    public function setIdUtilisateur( $id_utilisateur): self

    {
        $this->id_utilisateur = $id_utilisateur;

        return $this;
    }

    public function getIdTypeuser()
    {
        return $this->id_typeuser;
    }

    public function setIdTypeuser( $id_typeuser): self

    {
        $this->id_typeuser = $id_typeuser;

        return $this;
    }


    public function getIdGroupe()
    {
        return $this->id_groupe;
    }


    public function setIdGroupe( $id_groupe): self

    {
        $this->id_groupe = $id_groupe;

        return $this;
    }
}
