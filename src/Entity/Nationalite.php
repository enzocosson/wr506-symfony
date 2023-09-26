<?php

namespace App\Entity;

use App\Repository\NationaliteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Metadata\ApiResource;
use App\DataFixtures\useFixtures;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Delete;

#[ORM\Entity(repositoryClass: NationaliteRepository::class)]
#[ApiResource()]
class Nationalite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nationalite = null;

    #[ORM\OneToMany(mappedBy: 'nationalite', targetEntity: Author::class)]
    private Collection $actor;

    public function __construct()
    {
        $this->actor = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(string $nationalite): static
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    /**
     * @return Collection<int, Author>
     */
    public function getActor(): Collection
    {
        return $this->actor;
    }

    public function addActor(Author $actor): static
    {
        if (!$this->actor->contains($actor)) {
            $this->actor->add($actor);
            $actor->setNationalite($this);
        }

        return $this;
    }

    public function removeActor(Author $actor): static
    {
        if ($this->actor->removeElement($actor)) {
            // set the owning side to null (unless already changed)
            if ($actor->getNationalite() === $this) {
                $actor->setNationalite(null);
            }
        }

        return $this;
    }
}
