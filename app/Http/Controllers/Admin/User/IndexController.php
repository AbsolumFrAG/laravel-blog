<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function __invoke(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.user.index', compact('users'));
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $roles = User::getRole();
        return view('admin.user.create', compact('roles'));
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $password = $data['password'];
        $data['password'] = Hash::make($password);
        User::firstOrCreate(['email' => $data['email']], $data);
        Mail::to($data['email'])->send(new PasswordMail($password));
        return redirect()->route('admin.user.index');
    }

    public function show(User $user): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.user.show', compact('user'));
    }

    public function edit(User $user): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $roles = User::getRole();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function update(UpdateRequest $request, User $user): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $data = $request->validated();

        if (isset($data['password']))
            $data['password'] = Hash::make($data['password']);

        $user->update($data);
        return view('admin.user.show', compact('user'));
    }

    public function delete(User $user)
    {
        try {
            $user->delete();
        } catch (Exception $exception) {
            \Session::flash('success', $exception->getMessage());
        }

        return redirect()->route('admin.user.index');
    }
}
