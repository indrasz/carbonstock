<?php

namespace App\Http\Controllers\Client;

use App\Models\Tim;
use App\Models\Users;
use App\Models\AnggotaTim;
use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function index()
    {
        $team = Tim::with('anggota.users')->get();
        return view('pages.team.index', [
            'team' => $team
        ]);
    }
    public function create($id)
    {
        $users = Users::all();
        return view('pages.team.create', [
            'users' => $users,
            'id' => $id
        ]);
    }

    public function store(TeamRequest $request)
    {
        $data = $request->all();
        // dd($data);
        Tim::create($data);

        return redirect()->route('team.index');
    }
    public function tambahAnggota(Request $request)
    {
        $validatedData = $request->validate([
            'id_tim' => 'required|exists:tim,id',
            'id_user' => 'required|array',
            'id_user.*' => 'required:integer',
        ]);

        $anggotaExist = false;

        foreach ($validatedData['id_user'] as $idUser) {
            if (AnggotaTim::where('id_tim', $validatedData['id_tim'])->where('id_user', $idUser)->exists()) {
                $anggotaExist = true;
                break;
            }
        }

        // foreach ($validatedData['id_user'] as $idUser) {
        //     if (AnggotaTim::where('id_tim', $validatedData['id_tim'])->where('id_user', $idUser)->count()) {
        //         $anggotaExist = true;
        //         break;
        //         // if ($check_anggota_terdaftar > 0) {
        //         //     return $this->responses(false, 'gagal menambahkan. user sudah menjadi anggota');
        //         // }
        //     }
        // }

        if ($anggotaExist) {
            toastr()->error('anggota telah terdaftar di tim');
            return redirect()->back(); // Redirect ke halaman sebelumnya
        }

        foreach ($validatedData['id_user'] as $idUser) {
            $anggotaTim = new AnggotaTim();
            $anggotaTim->id_tim = $validatedData['id_tim'];
            $anggotaTim->id_user = $idUser;

            $anggotaTim->save();
        }

        // Redirect atau berikan respons sesuai kebutuhan Anda
        return redirect()->route('team.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $team = Tim::with('anggota')->findOrFail($id);
        // dd($team->anggota->first()->users->nama);
        // $users = Users::all();
        return view('pages.team.edit', [
            // 'users' => $users,
            'team' => $team,
            'id' => $id
        ]);
    }

    public function update(TeamRequest $request, string $id)
    {
        $team = Tim::findOrFail($id);

        $data = $request->all();
        $team->update($data);

        return redirect()->route('team.index');
    }

    public function destroyAnggota(string $id)
    {
        $anggota = AnggotaTim::findorFail($id);
        dd($anggota->users->nama);
        $anggota->delete();

        return redirect()->route('team.index');
    }

    public function destroy(string $id)
    {
        $team = Tim::findorFail($id);
        $team->delete();

        return redirect()->route('team.index');
    }
}
