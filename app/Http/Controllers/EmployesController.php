<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Poste;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employes = Employe::all();
        return view('employes.index', compact('employes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emp = Employe::all();
        $post = Poste::all();
        return view('employes.create', compact('emp', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'fullname' => 'required',
            'birth_date' => 'required|date  ',
            'depart' => 'required|max:255',
            'email' => 'required',
            'phone' => 'nullable|numeric',
            'start_working' => 'required|date',
            'address' => 'nullable',
            'password' => 'required',
            'role' => 'required',
            'id_supervisor' => 'nullable',
            'id_poste' => 'required',
        ]);
        $user = User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $data = $request->except(['_token', 'password', 'email']);
        $data['user_id'] = $user->id;
        if (!isset($request->id_supervisor)) {
            $data['id_supervisor'] = 0;
        };
        $user->assignRole($request->role);
        Employe::create($data);
        return redirect()->route("employes.index")->with([
            "success" => "Employe added successfully"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $employe = Employe::find($id);
        return view("employes.show", compact('employe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employe = Employe::findorFail($id);
        $posts = Poste::all();
        $emp = Employe::where('id', '!=', $employe->id)->get();
        return view("employes.edit", compact('employe', 'posts', 'emp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $employe = Employe::findorFail($id);
        // dd($request->all());
        $request->validate([
            'fullname' => 'required',
            'birth_date' => 'required|date  ',
            'depart' => 'required|max:255',
            'phone' => 'nullable|numeric',
            'start_working' => 'required|date',
            'address' => 'nullable',
            'role' => 'required',
            'id_supervisor' => 'nullable',
            'id_poste' => 'required',
        ]);
        $data = $request->except(['_token', '_method']);
        $user = User::find($employe->user_id);
        $user->syncRoles($request->role);
        // dd($data);
        $employe->update($data);
        return redirect()->route("employes.index")->with([
            "success" => "Employe updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $employe = Employe::findOrFail($id);
        $employe->delete();
        return redirect()->route("employes.index")->with([
            "success" => "Employe deleted successfully"
        ]);
    }

    public function getWorkCertificate($id)
    {
        $employe = Employe::where('registration_number', $id)->first();
        return view("employes.certificate")->with([
            "employe" => $employe
        ]);
    }

    public function vacationRequest($id)
    {
        $employe = Employe::where('registration_number', $id)->first();
        return view("employes.vacation")->with([
            "employe" => $employe
        ]);
    }
}
