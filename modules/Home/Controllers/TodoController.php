<?php

namespace App\Modules\Home\Controllers;

use App\Main\Controller;
use App\Modules\Home\Models\User;
use App\Modules\Home\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Exception;

class TodoController extends Controller
{
    public $auth;

    public function __construct()
    {
        parent::__construct();

        if (isset($_SESSION["auth"]) && $_SESSION["auth"]) {
            $this->auth = $_SESSION["auth"];
        } else {
            $this->auth = new User();
        }
    }

    public function index(Request $request)
    {
        $validator = $this->validator()->make($request->all(), [
            'order_by' => 'nullable|string|max:8|in:user_name,user_email,text,ready',
            'order' => 'nullable|string|max:4|in:asc,desc',
            'page' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            $request->page = 1;
            $request->order = 'asc';
            $request->order_by = 'user_name';
        }

        $request->page = $request->page ?? 1;
        $request->order = $request->order ?? 'asc';
        $request->order_by = $request->order_by ?? 'user_name';

//var_dump($request->all()); exit();
//
//        $list = Todo::orderBy($request->get('order_by'), $request->get('order'))
//            ->paginate(3, ['*'], 'page', $request->get('page'));

        $list = Todo::paginate(3, ['*'], 'page', $request->get('page'));

        echo $this->render('home.todo.index', [
            'auth' => $this->auth,
            'list' => $list,
            'request' => $request,
            'success' => [
                'add' => (bool) $request->success_add,
                'edit' => (bool) $request->success_edit,
            ],
        ]);
    }

    public function add(Request $request)
    {
        $errors = new MessageBag();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $validator = $this->validator()->make($request->all(), [
                'user_name' => 'required|string|max:100',
                'user_email' => 'required|string|email|max:255',
                'text' => 'required|string',
                'ready' => 'nullable|boolean',
            ]);

            if (!$validator->fails()) {

                $newTodo = [
                    'user_id' => $this->auth->id ? : null,
                    'user_name' => $request->user_name,
                    'user_email' => $request->user_email,
                    'text' => $request->text,
                    'ready' => false,
                    'updated_by_admin' => false,
                ];

                if ($this->auth->role === 'admin') {
                    $newTodo['ready'] = $request->ready ?? $newTodo['ready'];
                }

                Todo::create($newTodo);

                header("Location: /?success_add=1");

            } else {
                $errors = $validator->errors();
            }
        }

        echo $this->render('home.todo.add', [
            'auth' => $this->auth,
            'errors' => $errors,
            'request' => $request,
        ]);
    }

    public function edit(Request $request)
    {
        if (!$this->auth->id) {
            header("Location: /login?access_denied=1");
        }

        $errors = new MessageBag();
        $todo = Todo::findOrFail($request->id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $validator = $this->validator()->make($request->all(), [
                'text' => 'required|string',
                'ready' => 'nullable|boolean',
            ]);

            if (!$validator->fails()) {

                $todo->text = $request->text;

                if ($this->auth->role === 'admin') {
                    $todo->ready = $request->ready;
                    $todo->updated_by_admin = true;
                }

                $todo->save();

                header("Location: /?success_edit=1");

            } else {
                $errors = $validator->errors();
            }
        }

        echo $this->render('home.todo.edit', [
            'auth' => $this->auth,
            'errors' => $errors,
            'todo' => $todo
        ]);
    }

    public function ready(Request $request)
    {
        if ($this->auth->role !== 'admin') {
            header("Location: /login?access_denied=1");
        }

        $todo = Todo::findOrFail($request->id);
        $todo->ready = true;
        $todo->save();

        header("Location: /?success_edit=1");
    }
}