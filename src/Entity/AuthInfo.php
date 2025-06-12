<?php

namespace App\Entity;

use App\Repository\AuthInfoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuthInfoRepository::class)]
class AuthInfo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'authInfos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $client = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $password_hash = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reset_token = null;

    #[ORM\Column(type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $token_expiration = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $provider = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $provider_user_id = null;

    #[ORM\Column(type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $last_login = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): static
    {
        $this->client = $client;

        return $this;
    }

    public function getPasswordHash(): ?string
    {
        return $this->password_hash;
    }

    public function setPasswordHash(?string $password_hash): static
    {
        $this->password_hash = $password_hash;

        return $this;
    }

    public function getResetToken(): ?string
    {
        return $this->reset_token;
    }

    public function setResetToken(?string $reset_token): static
    {
        $this->reset_token = $reset_token;

        return $this;
    }

    public function getTokenExpiration(): ?\DateTimeImmutable
    {
        return $this->token_expiration;
    }

    public function setTokenExpiration(?\DateTimeImmutable $token_expiration): static
    {
        $this->token_expiration = $token_expiration;

        return $this;
    }

    public function getProvider(): ?string
    {
        return $this->provider;
    }

    public function setProvider(?string $provider): static
    {
        $this->provider = $provider;

        return $this;
    }

    public function getProviderUserId(): ?string
    {
        return $this->provider_user_id;
    }

    public function setProviderUserId(?string $provider_user_id): static
    {
        $this->provider_user_id = $provider_user_id;

        return $this;
    }

    public function getLastLogin(): ?\DateTimeImmutable
    {
        return $this->last_login;
    }

    public function setLastLogin(?\DateTimeImmutable $last_login): static
    {
        $this->last_login = $last_login;

        return $this;
    }
}
