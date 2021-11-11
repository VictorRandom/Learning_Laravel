<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginAuthRequest;
use App\Http\Requests\Auth\RegisterAuthRequest;


class AuthController extends Controller
{
    public function login(LoginAuthRequest $request)
    {

        //criando 2 variaveis para email e senha da request (digitados no form)
        $email = $request->email;
        $password = $request->password;

        // if(empty($email) || empty($password)) {
        //     //se o campo de email ou senha estiverem vazios retorna esse erro
        //     return redirect()->back()->with('errors', 'Digitar usuário e senha');
        // }

        // na variavel user, comparar o email/senha do banco de dados com o email da request(digitado no formulario) achar o primeiro
        $user = User::where([
                    "email" => $email,
                    "password" => $password
                ])->first();

         if (empty($user)) {
            //se não encontrar o user, redirecionar de volta para a pagina inicial com o erro
            return redirect()->back()->withErrors(['invalid_password' => 'Usuário ou senha invalida']);
        }

        Auth::login($user);
        return redirect('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function register(RegisterAuthRequest $request){

        try {
            $name = $request->name;
            $email = $request->email;
            $password = $request->password;

            User::create([
                'name'=>$name,
                'email'=>$email,
                'password'=>$password,
            ]);

            return redirect('home');
        }
        catch (\Exception $e) {
            Log::info(json_encode($e->getMessage()));
            return redirect()->back(); 
        }
    }
}
