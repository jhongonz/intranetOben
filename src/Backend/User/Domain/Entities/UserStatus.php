<?php

namespace Src\Backend\User\Domain\Entities;

final class UserStatus
{
    /** @var int */
    private $value;

    /** @param $status */
    public function __construct(?int $status)
    {
        $this->value = $status;
    }

    /** @return int|null */
    public function value(): ?int
    {
        return $this->value;
    }
}
