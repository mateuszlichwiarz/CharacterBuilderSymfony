<?php declare(strict_types=1);

namespace App\Service\Character\Attribute;

use Symfony\Component\HttpFoundation\Request;

class RequestAttributes
{
    private int $str;
    private int $dex;
    private int $wis;

    public function __construct(private Request $request)
    {
        $this->str = $request->get('str');
        $this->dex = $request->get('dex');
        $this->wis = $request->get('wis');
    }

    public function getStr(): int
    {
        return $this->str;
    }

    public function getDex(): int
    {
        return $this->dex;
    }

    public function getWis(): int
    {
        return $this->wis;
    }

    public function getAttributesArray(): array
    {
        $attributes = [$this->str, $this->dex, $this->wis];
        return $attributes;
    }
}