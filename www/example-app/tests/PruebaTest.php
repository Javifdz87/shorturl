<?php
use PHPUnit\Framework\TestCase;
use App\Http\Controllers\Suma;
class PruebaTest extends TestCase
{
    /** @test */
    public function comprobar_que_suma_bien()
    {
        // Setup
        $suma = new Suma();

        //Acción
        $suma->sumar(1,1);
        $this->assertEquals(2,$suma->resultado());
    }
}
