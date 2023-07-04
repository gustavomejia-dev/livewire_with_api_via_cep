<?php

namespace App\Http\Controllers\Tickets;


use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Tickets\User as TicketsUser;

class LoginController extends Controller
{
   
    public array $usuarioLogado = [];
   
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
        // dd($request->all());
        $email = $request->get('email');
        $senha = $request->get('senha');
        //verificando se o usuario existe
        $user = TicketsUser::where('email', $email)
        ->where('senha', $senha)
        ->get()
        ->first();
        $this->usuarioLogado = [
            'usuario' => $user->name, 
            'email' => $user->email
        ];
        // dd($this->usuarioLogado);
        if(isset($user->email)){
            $this->usuarioLogado = [
                // 'usuario' => $user->name, 
                'email' => $user->email
            ];
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
        $logado = '';
        session_start();
        session_destroy();
        return redirect()->route('loginSistema');
        // session_start();
        // $_SESSION['email'] = $this->usuarioLogado['email'];
        // //destruir a session de usuario logado
        // if($_GET['sair'] == 1){
        //     session_destroy();
        //     return redirect()->route('loginSistema');
        // }
        // else{
        //     print_r('você já está logado');
        // }
    }
}
