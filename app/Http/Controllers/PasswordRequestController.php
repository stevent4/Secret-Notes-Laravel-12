<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PasswordRequest;

class PasswordRequestController extends Controller
{
    public function create()
    {
        return view('auth.request-password');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => [
                'required',
                'email',
                'exists:users,email',
                'unique:password_requests,email',
            ],
            'reason' => ['nullable', 'string', 'max:255'],
        ]);

        PasswordRequest::create([
            'email' => $validated['email'],
            'reason' => $validated['reason'] ?? null,
        ]);

        return redirect()->route('login')->with('status', 'Permintaan password baru berhasil dikirim.');
    }
}
