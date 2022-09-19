<?php

namespace Src\Backend\User\Domain\Entities;

final class UserProfileId
{
    /** @var int */
    private $value;

    /**
     * @param int $id
     */
    public function __contruct(int $id)
    {
        $this->value = $id;
    }

    /** @return int */
    public function value(): int
    {
        return $this->value;
    }
}
