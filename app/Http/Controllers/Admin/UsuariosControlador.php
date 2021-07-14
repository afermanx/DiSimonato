<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuariosControlador extends Controller
{
    public function logar(){
        return view('THEME.admin.login');
    }
    public function login(Request $request){

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $credenciais = [
            'username' => $request->username,
            'password' => $request->password


        ];


        $authOK = Auth::guard('user')->attempt($credenciais);
        if ($authOK) {

//            return redirect()->intended(route('painel'));
            $login['success']=true;
            echo json_encode($login);
            return;


        }


        //return back()->withInput();
        $login['success']=false;
        $login['message']='OS DADOS INSERIDOS NÃO CONFEREM';
        echo json_encode($login);
        return;

    }

}
