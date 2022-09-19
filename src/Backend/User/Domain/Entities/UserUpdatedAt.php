<?php

namespace Src\Backend\User\Domain\Entities;

final class UserUpdatedAt {

    /** @var Datetime */
    private $value;

    /** @param Datetime|null $date */
    public function __construct(Datetime $date)
    {
        $this->value = $date;
    }

    /** @return Datetime|null */
    public function value(): ?Datetime
    {
        return $this->value;
    }
}
