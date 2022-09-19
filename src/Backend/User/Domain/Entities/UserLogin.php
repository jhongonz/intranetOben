<?php

namespace Src\Backend\User\Domain\Entities;

final class UserLogin
{
    /** @var string */
    private $value;

    /**
     * @param string $email
     * @throws InvalidArgumentException
     */
    public function __construct(string $email)
    {
        $this->value = $email;
    }

    /** @return string */
    public function value(): string
    {
        return $this->value;
    }

    /**
     * @param string $email
     * @throws InvalidArgumentException
     */
    private function validate(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the invalid email: <%s>', static::class, $email)
            );
        }
    }
}
