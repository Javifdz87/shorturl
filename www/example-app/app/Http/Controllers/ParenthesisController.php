<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParenthesisController extends Controller
{

    public function mostrarFormulario()
    {
        return view('parenthesis');
    }
    public function validar(Request $request)
    {
        $cadena = $request->input('cadena');
        $pila = [];
        $correspondencias = [')' => '(', ']' => '[', '}' => '{'];

        foreach (str_split($cadena) as $char) {
            if (in_array($char, ['(', '[', '{'])) {
                array_push($pila, $char);
            } elseif (in_array($char, [')', ']', '}'])) {
                if (empty($pila) || $pila[count($pila) - 1] != $correspondencias[$char]) {
                    $esValida = false;
                    break;
                }
                array_pop($pila);
            }
        }

        $esValida = empty($pila);

        return view('parenthesis', ['cadena' => $cadena, 'esValida' => $esValida]);
    }
}
