<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PainelController extends Controller
{
    public function painel(){
        $user = Auth::guard('user')->user();
        if (!$user) {
            return "sem user";
        }

        return "Logado";

    }
}
