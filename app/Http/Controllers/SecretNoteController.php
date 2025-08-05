<?php

namespace App\Http\Controllers;

use App\Models\SecretNote;
use App\Models\NoteLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SecretNoteController extends Controller
{
    public function create()
    {
        return view('notes.create');
    }

    public function created($uuid)
    {
        $note = SecretNote::where('uuid', $uuid)->firstOrFail();

        return view('notes.created', [
            'note' => $note,
            'url' => route('notes.show', $note->uuid),
            'alreadyOpened' => false,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'note' => 'required|string',
            'password' => 'nullable|string',
            'expire_minutes' => 'nullable|integer|min:1|max:1440',
        ]);

        $note = SecretNote::create([
            'note' => encrypt($request->note),
            'password' => $request->password ? bcrypt($request->password) : null,
            'expires_at' => $request->expire_minutes ? now()->addMinutes((int)$request->expire_minutes) : null,
            'user_id' => auth()->id(),
        ]);

        session()->put("opened_notes.{$note->uuid}", false);

        // Buat histori log
        NoteLog::create([
            'uuid' => $note->uuid,
            'user_id' => auth()->id(),
            'expires_at' => $note->expires_at,
        ]);

        return redirect()->route('notes.created', $note->uuid);
    }

    public function show($uuid)
    {
        $note = SecretNote::where('uuid', $uuid)->firstOrFail();

        if ($note->isExpired()) {
            $note->delete();
            abort(410, 'Catatan telah kedaluwarsa.');
        }

        // Antisipasi jika expires_at masih string
        if ($note->expires_at && is_string($note->expires_at)) {
            $note->expires_at = Carbon::parse($note->expires_at);
        }

        return view('notes.show', compact('note'));
    }

    public function access(Request $request, $uuid)
    {
        $note = SecretNote::where('uuid', $uuid)->firstOrFail();

        if ($note->isExpired()) {
            $note->delete();
            abort(410, 'Catatan telah kedaluwarsa.');
        }

        if ($note->password && !Hash::check($request->password, $note->password)) {
            return back()->withErrors(['password' => 'Password salah.']);
        }

        $decrypted = decrypt($note->note);

        // Update histori bahwa sudah dibuka
        NoteLog::where('uuid', $uuid)->update([
            'opened_at' => now(),
        ]);

        $note->delete(); // self-destruct

        session()->put("opened_notes.{$uuid}", true);

        return view('notes.read', ['note' => $decrypted]);
    }

    public function history()
    {
        $logs = NoteLog::where('user_id', auth()->id())
            ->orderByDesc('created_at')
            ->get();

        return view('notes.history', compact('logs'));
    }

    public function destroyLog($uuid)
    {
        $log = NoteLog::where('uuid', $uuid)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $log->delete();

        return back()->with('status', 'Histori catatan berhasil dihapus.');
    }
}
