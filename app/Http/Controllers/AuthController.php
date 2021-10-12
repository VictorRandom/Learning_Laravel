<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){

        // dump($request->password);
        // dump($req["password"]);

        //criando 2 variaveis para email e senha da request (digitados no form)
        $email = $request->email;
        $password = $request->password;

        // na variavel user, comparar o email/senha do banco de dados com o email da request(digitado no formulario) achar o primeiro
        $user = User::where(["email"=>$email, "password"=>$password])->first();

        // dd($password); string vazia = null
        if(empty($user)) {
            //se não encontrar o user, redirecionar de volta para a pagina inicial com o erro
            return redirect()->back()->with('errors', 'Usuário invalido');
        }
        Auth::login($user);
        return view('home');
    }
}