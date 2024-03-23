<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Services\MahasiswaService;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * The index function retrieves and paginates Mahasiswa data based on search input, and also
     * calculates the count of male and female Mahasiswa.
     * 
     * @return The `index` function is returning a view called 'mahasiswa.index' with an array of data.
     * The array includes the paginated results of a search query on the Mahasiswa model, the count of
     * male students ('L'), and the count of female students ('P').
     */
    public function index()
    {
        $data_mahasiswa = Mahasiswa::search(request('search'))->orderBy('nim', 'desc')->paginate(9);

        return view('mahasiswa.index', [
            'data_mahasiswa' => $data_mahasiswa,
            'jumlah_mahasiswa' => Mahasiswa::getMahasiswaByGender('L')->count(),
            'jumlah_mahasiswi' => Mahasiswa::getMahasiswaByGender('P')->count(),
        ]);
    }

    /**
     * The create function returns a view called 'mahasiswa.admin.create'.
     * 
     * @return The `create` function is returning a view called 'mahasiswa.admin.create'.
     */
    public function create()
    {
        return view('mahasiswa.admin.create');
    }

    /**
     * The store function validates the request data and stores the Mahasiswa data.
     * 
     * @param Request $request The request object.
     * @param MahasiswaService $mahasiswaService The MahasiswaService object.
     * @return The `store` function redirects to the 'mahasiswa.index' route with a success or error message.
     */
    public function store(Request $request, MahasiswaService $mahasiswaService)
    {
        $validatedData = $request->validate([
            'nim' => 'required|unique:mahasiswa,nim',
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'gender' => 'required',
            'usia' => 'required',
        ]);

        $result = $mahasiswaService->store($validatedData);

        if ($result) {
            return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan');
        } else {
            return back()->with('error', 'Data mahasiswa gagal ditambahkan');
        }
    }

    /**
     * The edit function returns a view called 'mahasiswa.admin.edit' with the Mahasiswa data.
     * 
     * @param Mahasiswa $mahasiswa The Mahasiswa object.
     * @return The `edit` function is returning a view called 'mahasiswa.admin.edit' with the Mahasiswa data.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.admin.edit', compact('mahasiswa'));
    }

    /**
     * The update function validates the request data and updates the Mahasiswa data.
     * 
     * @param Request $request The request object.
     * @param Mahasiswa $mahasiswa The Mahasiswa object.
     * @return The `update` function redirects to the 'mahasiswa.index' route with a success or error message.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'gender' => 'required',
            'usia' => 'required',
        ]);

        $result = $mahasiswa->update($validatedData);

        if ($result) {
            return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diubah');
        } else {
            return back()->with('error', 'Data mahasiswa gagal diubah');
        }
    }

    /**
     * The destroy function deletes the Mahasiswa data.
     * 
     * @param Mahasiswa $mahasiswa The Mahasiswa object.
     * @return The `destroy` function redirects to the 'mahasiswa.index' route with a success or error message.
     */
    public function destroy(Mahasiswa $mahasiswa, MahasiswaService $mahasiswaService)
    {
        $result = $mahasiswaService->delete($mahasiswa);

        if ($result) {
            return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus');
        } else {
            return redirect()->route('mahasiswa.index')->with('error', 'Data mahasiswa gagal dihapus');
        }
    }
}
