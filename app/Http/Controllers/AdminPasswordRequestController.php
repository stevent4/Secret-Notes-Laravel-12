<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminPasswordRequestController extends Controller
{
    public function index()
    {
        $requests = PasswordRequest::latest()->get();
        return view('admin.password-requests.index', compact('requests'));
    }

    public function reset(Request $request, $id)
    {
        $request->validate([
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $passwordRequest = PasswordRequest::findOrFail($id);
        $user = User::where('email', $passwordRequest->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'User dengan email tersebut tidak ditemukan.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        $passwordRequest->delete(); // Hapus permintaan setelah diproses

        return back()->with('status', 'Password berhasil direset.');
    }

    public function destroy($id)
    {
        PasswordRequest::destroy($id);
        return back()->with('status', 'Permintaan dihapus.');
    }
}
