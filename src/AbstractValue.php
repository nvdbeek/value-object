<?php declare(strict_types=1);

namespace Aeviiq\ValueObject;

/**
 * @template TValue
 */
abstract class AbstractValue implements EquatableInterface, ValidatableInterface
{
    /**
     * @psalm-var TValue
     * @phpstan-var TValue
     *
     * @var mixed
     */
    protected $value;

    /**
     * @psalm-param TValue $value
     * @phpstan-param TValue $value
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        $value = $this->normalize($value);
        $this->value = $value;
        Validator::validateBy($this);
    }

    /**
     * @psalm-return TValue
     * @phpstan-return TValue
     *
     * {@inheritDoc}
     */
    final public function get()
    {
        return $this->value;
    }

    /**
     * {@inheritDoc}
     */
    final public function isEqualTo($value): bool
    {
        if ($value instanceof self) {
            return $this->value === $value->get();
        }

        return $value === $this->value;
    }

    public function __toString(): string
    {
        return (string)$this->value;
    }

    /**
     * @psalm-param TValue $value
     * @phpstan-param TValue $value
     *
     * @psalm-return TValue
     * @phpstan-return TValue
     *
     * @return mixed
     */
    protected function normalize($value)
    {
        return $value;
    }
}
