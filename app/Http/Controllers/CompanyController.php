<?php

namespace App\Http\Controllers;

use App\Models\Company;
use FontLib\Table\Type\cmap;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $company = Company::all();
        // return view('dashboard.perusahaan.index', compact('Company'));
        return view('dashboard.perusahaan.index', [
            'users'         => Auth::user(),
            'companies'    => Company::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('dashboard.perusahaan.create');
        return view('dashboard.perusahaan.create', [
            'users' => Auth::user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'perusahaan'  => 'required',
            'dkr'         => 'max:255',
            'gambar'      => 'mimes:png,jpg,jpeg'
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = $file->getClientOriginalName();
            Storage::disk('public')->put('gambar-perusahaan/' . $fileName, file_get_contents($file));
            $validated['gambar'] = 'gambar-perusahaan/' . $fileName;
        }

        $validated['user_id'] = auth()->user()->id;
        $validated['excerpt'] = Str::limit(strip_tags($request->dkr), 50);

        Company::create($validated);
        Alert::success('Berhasil', 'perusahaan berhasil ditambahkan!');
        return redirect('/dashboard/perusahaan');
    }

    /**
     * Display the specified resource.
     */
    public function show(company $company, $id)
    {
        $company = Company::find($id);
        return view('dashboard.perusahaan.show', [
            'users'     => Auth::user(),
            'company'  => $company
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(company $company, $id)
    {
        $company = Company::find($id);
        return view('dashboard.perusahaan.edit', [
            'users' => Auth::user(),
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, company $company, $id)
    {
        $rules = [
            'perusahaan'  => 'required',
            'dkr'         => 'max:255',
            'gambar'      => 'mimes:png,jpg,jpeg',
        ];
        $company = Company::find($id);
        $validated = $request->validate($rules);

        if ($request->hasFile('gambar')) {
            if ($company->gambar) {
                Storage::delete($company->gambar);
            }
            $file = $request->file('gambar');
            $fileName = $file->getClientOriginalName();
            Storage::disk('public')->put('gambar-perusahaan/' . $fileName, file_get_contents($file));
            $validated['gambar'] = 'gambar-perusahaan/' . $fileName;
        }

        $validated['user_id'] = auth()->user()->id;

        Company::where('id', $company->id)
            ->update($validated);

        Alert::success('Berhasil !', 'Berhasil Mengedit Perusahaan');
        return redirect('/dashboard/perusahaan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(company $company, $id)
    {
        if ($company->gambar) {
            Storage::delete($company->gambar);
        }

        // Company::destroy($company->id);
        $company::find($id)->delete();
        Alert::success('Berhasil', 'company berhasil dihapus');
        return redirect('dashboard/perusahaan');
    }
}
