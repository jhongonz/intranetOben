<?php

namespace Src\Backend\User\Domain\Entities;

final class UserCreatedAt {

    /** @var Datetime|null */
    private $value;

    /** @param Datetime $date */
    public function __construct(?Datetime $date)
    {
        $this->value = $date;
    }

    /** @return Datetime|null */
    public function value(): ?Datetime
    {
        return $this->value;
    }
}
