<?php

namespace App\Validations\IValidation;

interface IValidation
{
    function check(): bool;
}