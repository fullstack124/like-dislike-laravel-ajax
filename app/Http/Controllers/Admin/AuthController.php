<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\ResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use ResponseService;
    public function index()
    {
        return view('admin.login');
    }

    public function user_login_view()
    {
        return view('login');
    }


    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users',
                'password' => 'required'
            ]);
            if ($validator->fails()) {
                return $this->response(false, $validator->errors()->all());
            } else {
                $user = User::whereEmailAndRole($request->email, 1)->first();
                if ($user) {
                    $auth = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
                    if ($auth) {
                        return $this->response(true, ['Login Successfully']);
                    } else {
                        return $this->response(false, ['Invalid email and password']);
                    }
                } else {
                    return $this->response(false, ['Invalid email and password']);
                }
            }
        } catch (\Throwable $th) {
            return $this->response(false, [$th->getMessage()]);
        }
    }

    public function user_login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users',
                'password' => 'required'
            ]);
            if ($validator->fails()) {
                return $this->response(false, $validator->errors()->all());
            } else {
                $user = User::whereEmail($request->email)->first();
                if ($user) {
                    if ($user->role != 1) {
                        $auth = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
                        if ($auth) {
                            return $this->response(true, ['Login Successfully']);
                        } else {
                            return $this->response(false, ['Invalid email and password']);
                        }
                    } else {
                        return $this->response(false, ['Invalid email and password']);
                    }
                } else {
                    return $this->response(false, ['Invalid email and password']);
                }
            }
        } catch (\Throwable $th) {
            return $this->response(false, [$th->getMessage()]);
        }
    }
}
