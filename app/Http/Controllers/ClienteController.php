<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function soma($n1, $n2){
        return $n1 + $n2;
    }

    public function getNome($id){
        
        $meu_array[0] = "Maria";
        $meu_array[1] = "João";
        $meu_array[2] = "Mariana";
        $meu_array[3] = "Floriosvaldo";
        $meu_array[4] = "Joaquim";

        if($id < count($meu_array))
            return $meu_array[$id];
        else
            return "Cliente não existente";
    }
}
