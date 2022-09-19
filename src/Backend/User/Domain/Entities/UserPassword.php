<?php

namespace Src\Backend\User\Domain\Entities;

final class UserPassword
{
    /** @var string */
    private $value;

    /** @param string $password */
    public function __construct(string $password)
    {
        $this->value = $password;
    }

    /** @return string */
    public function value(): string
    {
        return $this->value;
    }
}
