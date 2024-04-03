<?php

namespace App\Http\Controllers;
class Suma
{
    private $sumas;

    public function sumar($numero1, $numero2)
    {
        $this->sumas = $numero1 + $numero2;
    }

    public function resultado()
    {
        return $this->sumas;
    }
}
