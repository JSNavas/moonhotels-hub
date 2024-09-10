<?php

namespace App\Interfaces;

interface ProviderInterface
{
    public function search(array $request): array;
}