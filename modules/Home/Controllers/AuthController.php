<?php

namespace App\Modules\Home\Controllers;

use App\Main\Controller;
use App\Modules\Home\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Exception;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $errors = new MessageBag();

        if (empty($_SESSION["auth"]) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $validator = $this->validator()->make($request->all(), [
                'name' => 'required|string|max:255|exists:users,name',
                'password' => 'required|string|min:3',
            ]);

            if (!$validator->fails()) {
                $user = User::where('name', $request->name)->first();

                if ($user && password_verify($request->password, $user->password)) {

                    $_SESSION["auth"] = $user;

                    header("Location: /");
                    exit();

                } else {
                    $errors->add('name', 'You should enter correct email and password');
                }

            } else {
                $errors = $validator->errors();
            }
        }

        echo $this->render('home.auth.login', [
            'accessDenied' => (bool) $request->access_denied,
            'errors' => $errors
        ]);
    }

    public function regist(Request $request)
    {
        $errors = new MessageBag();

        if (empty($_SESSION["auth"]) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $validator = $this->validator()->make($request->all(), [
                'name' => 'required|string|max:100|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:3|confirmed'
            ]);

            if (!$validator->fails()) {
                $password = password_hash($request->password, PASSWORD_DEFAULT);
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $password,
                    'role' => 'user',
                    'status' => 'active',
                ]);

                $_SESSION["auth"] = $user;

                header("Location: /");
                exit();

            } else {
                $errors = $validator->errors();
            }
        }

        echo $this->render('home.auth.regist', ['errors' => $errors]);
    }

    public function logout()
    {
        if ($_SESSION["auth"]) {
            unset($_SESSION["auth"]);
        }

        header("Location: /");
        exit();
    }
}
