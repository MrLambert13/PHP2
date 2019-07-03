<?php

namespace core\interfaces;

interface Validated
{
    public static function check($value): bool;
}