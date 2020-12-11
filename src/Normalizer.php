<?php declare(strict_types=1);

namespace Aeviiq\ValueObject;

final class Normalizer
{
    public static function removeWhitespace(string $value): string
    {
        return (string) \preg_replace('/\s+/', '', $value);
    }
}
