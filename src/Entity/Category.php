<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=Utilisateur::class, mappedBy="lacategory")
     */
    private $lesutilisateurs;

    public function __construct()
    {
        $this->lesutilisateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getLesutilisateurs(): Collection
    {
        return $this->lesutilisateurs;
    }

    public function addLesutilisateur(Utilisateur $lesutilisateur): self
    {
        if (!$this->lesutilisateurs->contains($lesutilisateur)) {
            $this->lesutilisateurs[] = $lesutilisateur;
            $lesutilisateur->setLacategory($this);
        }

        return $this;
    }

    public function removeLesutilisateur(Utilisateur $lesutilisateur): self
    {
        if ($this->lesutilisateurs->removeElement($lesutilisateur)) {
            // set the owning side to null (unless already changed)
            if ($lesutilisateur->getLacategory() === $this) {
                $lesutilisateur->setLacategory(null);
            }
        }

        return $this;
    }
}
