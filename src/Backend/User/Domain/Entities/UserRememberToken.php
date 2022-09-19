<?php

namespace Src\Backend\User\Domain\Entities;

final class UserRememberToken
{
    /** @var string */
    private $value;

    /** @param string|null $token */
    public function __construct(?string $token)
    {
        $this->value = $token;
    }

    /** @return string|null */
    public function value(): ?string
    {
        return $this->value;
    }
}
