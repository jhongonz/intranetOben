<?php

namespace Src\Backend\User\Domain\Entities;

final class UserId
{
    /** @var int */
    private $value;

    /**
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->validate($id);
        $this->value = $id;
    }

    /** @return int */
    public function value(): int
    {
        return $this->value;
    }

    /**
     * @param int $id
     * @throws InvalidArgumentException
     */
    private function validate(int $id): void
    {
        $options = [
            'options' => [
                'min_range' => 1
            ]
        ];

        if (!filter_var($id, FILTER_VALIDATE_INT, $options)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>', static::class, $id)
            );
        }
    }
}
