<?php

namespace App\Entity;

use App\Repository\ActorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ActorRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['actor:read']],
)]
class Actor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['actor:read', 'movie:read', 'nationalite:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups(['actor:read', 'movie:read', 'nationalite:read'])]
    #[Assert\Length(min: 2, max: 50, maxMessage: 'Ecrire votre message en 50 caractères ou moins.')]    
    #[ApiFilter(SearchFilter::class, strategy: 'partial')]
    private ?string $firstName = null;

    #[ORM\Column(length: 50)]
    #[Groups(['actor:read', 'movie:read', 'nationalite:read'])]
    #[Assert\Length(min: 2, max: 50, maxMessage: 'Ecrire votre message en 50 caractères ou moins.')]
    #[ApiFilter(SearchFilter::class, strategy: 'partial')]
    private ?string $lastName = null;

    #[ORM\ManyToMany(targetEntity: Movie::class, mappedBy: 'actors', cascade: ['persist'])]
    #[Groups(['actor:read'])]
    private Collection $movies;

    #[ORM\ManyToOne(inversedBy: 'actor')]
    #[Groups(['actor:read'])]
    private ?Nationalite $nationalite = null;

    #[ORM\Column(length: 500)]
    #[Groups(['actor:read'])]
    private ?string $photo = null;

    public function __construct()
    {
        $this->movies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return Collection<int, Movie>
     */
    public function getMovies(): Collection
    {
        return $this->movies;
    }

    public function addMovie(Movie $movie): static
    {
        if (!$this->movies->contains($movie)) {
            $this->movies->add($movie);
            $movie->addActor($this);
        }

        return $this;
    }

    public function removeMovie(Movie $movie): static
    {
        if ($this->movies->removeElement($movie)) {
            $movie->removeActor($this);
        }

        return $this;
    }

    public function getNationalite(): ?Nationalite
    {
        return $this->nationalite;
    }

    public function setNationalite(?Nationalite $nationalite): static
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }
}
