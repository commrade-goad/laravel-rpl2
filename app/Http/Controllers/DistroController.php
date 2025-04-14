<?php

namespace App\Http\Controllers;

use App\Models\Distro;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DistroController extends Controller
{
    function getAllDistros(): View
    {
        $distros = Distro::all();
        return view("DistroView", ["distros" => $distros]);
    }
    /**
     * @param number $id
     */
    function getDistro($id): View
    {
        $distro = Distro::find($id);
        if (!$distro) {
            return view("DistroView", ["distros" => []]);
        }
        return view("DistroView", ["distros" => [$distro]]);
    }
    /**
     * @param number $id
     */
    public function editDistro($id): View
    {
        $distro = Distro::findOrFail($id);
        return view('DistroEdit', compact('distro'));
    }
    /**
     * @param number $id
     */
    public function updateDistro($id): RedirectResponse
    {
        $distro = Distro::findOrFail($id);

        $distro->name = request('name');
        $distro->version = request('version');
        $distro->package_manager = request('package_manager');
        $distro->home_url = request('home_url');
        $distro->save();

        return redirect()->route('get-distro');
    }
    /**
     * @param number $id
     */
    public function deleteDistro($id): RedirectResponse
    {
        $distro = Distro::findOrFail($id);
        if ($distro) {
            $distro->delete();
        }
        return redirect()->route('get-distro');
    }

    public function createDistro(Request $request): RedirectResponse
    {
        $distro = new Distro();
        $distro->name = $request->input("name");
        $distro->version = $request->input("version");
        $distro->package_manager = $request->input("package_manager");
        $distro->home_url = $request->input("home_url");
        $distro->save();
        return redirect()->route("get-distro");
    }
}
