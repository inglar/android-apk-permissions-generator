<?php

declare(strict_types=1);

namespace App\Dto;

class PermissionsDictionary
{
    /**
     * @var array<string, mixed>
     */
    private array $all = [];
    private array $dangerous = [];
    private array $privileged = [];
    private array $signature = [];

    public function getAll(): array
    {
        return $this->all;
    }

    public function addAll(array $permissions): self
    {
        $this->all[] = $permissions;

        return $this;
    }

    public function getDangerous(): array
    {
        return $this->dangerous;
    }

    public function addDangerous(string $name): self
    {
        $this->dangerous[] = $name;

        return $this;
    }

    public function getPrivileged(): array
    {
        return $this->privileged;
    }

    public function addPrivileged(string $name): self
    {
        $this->privileged[] = $name;

        return $this;
    }

    public function getSignature(): array
    {
        return $this->signature;
    }

    public function addSignature(string $name): self
    {
        $this->signature[] = $name;

        return $this;
    }
}
