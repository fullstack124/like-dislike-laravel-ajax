<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\ResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    use ResponseService;
    public function index()
    {
        $users = User::where('role', '!=', 1)->get();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed',
                'role' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->response(false, $validator->errors()->all());
            } else {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->role = $request->role;
                $user->password = Hash::make($request->password);
                $result = $user->save();
                if ($result) {
                    return $this->response(true, ['User create successfully']);
                } else {
                    return $this->response(false, ['Server problem']);
                }
            }
        } catch (\Throwable $th) {
            return $this->response(false, [$th->getMessage()]);
        }
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = [
            2 => 'Sale',
            3 => 'Designer',
            4 => 'Production',
            5 => 'Shipping',
        ];
        return view('admin.users.update', compact('user', 'roles'));
    }


    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'role' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->response(false, $validator->errors()->all());
            } else {
                $user = User::findOrFail($request->id);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->role = $request->role;
                $result = $user->save();
                if ($result) {
                    return $this->response(true, ['User Update successfully']);
                } else {
                    return $this->response(false, ['Server problem']);
                }
            }
        } catch (\Throwable $th) {
            return $this->response(false, [$th->getMessage()]);
        }
    }

    public function delete(Request $request)
    {
        try {
            $id = $request->id;
            User::findOrFail($id)->delete();
            return $this->response(true, ['Delete successfully']);
        } catch (\Throwable $th) {
            return $this->response(false, [$th->getMessage()]);
        }
    }

    public function profile_view()
    {
        return view('admin.admin.update-profile');
    }

    public function update_profile(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
            ]);

            if ($validator->fails()) {
                return $this->response(false, $validator->errors()->all());
            } else {
                $user = User::findOrFail(auth()->id());
                $user->name = $request->name;
                $user->email = $request->email;
                $result = $user->save();
                if ($result) {
                    return $this->response(true, ['Profile Update successfully']);
                } else {
                    return $this->response(false, ['Server problem']);
                }
            }
        } catch (\Throwable $th) {
            return $this->response(false, [$th->getMessage()]);
        }
    }


    public function change_password(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'old_password' => 'required',
                'password' => 'required|confirmed',
            ]);

            if ($validator->fails()) {
                return $this->response(false, $validator->errors()->all());
            } else {
                $user = User::findOrFail(auth()->id());
                if ($user) {
                    if (Hash::check($request->old_password, $user->password)) {
                        $user->password = Hash::make($request->password);
                        $user->save();
                        return $this->response(true, ['Password change successfully']);
                    } else {
                        return $this->response(false, ['Invalid current password']);
                    }
                } else {
                    return $this->response(false, ['User nto found']);
                }
            }
        } catch (\Throwable $th) {
            return $this->response(false, [$th->getMessage()]);
        }
    }
}
