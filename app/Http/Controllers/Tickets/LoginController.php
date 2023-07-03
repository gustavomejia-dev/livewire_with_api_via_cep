<?php

namespace App\Http\Controllers\Tickets;


use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Tickets\User as TicketsUser;

class LoginController extends Controller
{
    public function index(Request $request){
        
        $erro = '';
        if($request->get('erro') == 1){
            $erro = 'Usuario ou senha não existem';

        }
        if($request->get('erro') == 2){
            $erro = 'Necessario Realizar';
        }

        
        return view('tickets.login', ['erro' => $erro]);
    }

    public function autenticar(Request $request){
        $email = $request->get('email');
        $senha = $request->get('senha');
        //verificando se o usuario existe
        $user = TicketsUser::where('email', $email)
        ->where('senha', $senha)
        ->get()
        ->first();
       
        if(isset($user->email)){
            session_start();
            $_SESSION['nome'] = $user->name;
            $_SESSION['email'] = $user->email;
            return redirect()->route('search-zipcode');
        }
        else{
            dd('usuario não existe');
            // return redirect()-route('loginSistema', ['erro' =>1]);

        }
    }
    

    public function deslogar(){
        if($_GET['sair'] == 1){
            session_start();
            dd($_SESSION['email']);
            return redirect()->route('loginSistema');
        }
        else{
            dd('você já está logado');
        }
    }
}
