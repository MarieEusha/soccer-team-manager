<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\StatsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=StatsRepository::class)
 * @ApiResource(
 *     attributes={

 *     },
 *     normalizationContext={
            "groups"={"stats_read"}
 *     }
 * )
 */
class Stats
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"stats_read", "encounters_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"stats_read"})
     */
    private $redcard;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"stats_read"})
     */
    private $yellowCard;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"stats_read"})
     */
    private $passAssist;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"stats_read"})
     */
    private $goal;

    /**
     * @ORM\ManyToOne(targetEntity=Encounter::class, inversedBy="stats")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"stats_read"})
     */
    private $encounter;

    /**
     * @ORM\ManyToOne(targetEntity=Player::class, inversedBy="stats")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"stats_read"})
     */
    private $player;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRedcard(): ?int
    {
        return $this->redcard;
    }

    public function setRedcard(int $redcard): self
    {
        $this->redcard = $redcard;

        return $this;
    }

    public function getYellowCard(): ?int
    {
        return $this->yellowCard;
    }

    public function setYellowCard(int $yellowCard): self
    {
        $this->yellowCard = $yellowCard;

        return $this;
    }

    public function getPassAssist(): ?int
    {
        return $this->passAssist;
    }

    public function setPassAssist(int $passAssist): self
    {
        $this->passAssist = $passAssist;

        return $this;
    }

    public function getGoal(): ?int
    {
        return $this->goal;
    }

    public function setGoal(int $goal): self
    {
        $this->goal = $goal;

        return $this;
    }

    public function getEncounter(): ?Encounter
    {
        return $this->encounter;
    }

    public function setEncounter(?Encounter $encounter): self
    {
        $this->encounter = $encounter;

        return $this;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function setPlayer(?Player $player): self
    {
        $this->player = $player;

        return $this;
    }
}