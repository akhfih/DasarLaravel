<?php

namespace App\Http\Controllers;

use App\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employees::paginate(5);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'employees_nama' => 'required',
            'employees_company' => 'required',
            'employees_email' => 'required'
        ]);

        Employees::create([

            'employees_nama' => $request->employees_nama,
            'employees_companies_id' => $request->employees_company,
            'employees_email' => $request->employees_email
            
        ]);

        return redirect('/employees')->with('pesan',"Employees $request->employees_nama berhasil ditambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show($employees)
    {
        $result = Employees::find($employees);
        return view('employees.show',['employees' => $result]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit($employees)
    {

        $result = Employees::find($employees);

       
        return view('employees.edit',['employees' => $result]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employees $employees)
    {

        $request->validate([
            'employees_nama' => 'required',
            'employees_companies_id' => 'required',
            'employees_email' => 'required'
        ]);
        $result = Employees::where('id',$request->id)->update([
            'employees_nama' => $request->employees_nama,
            'employees_companies_id' => $request->employees_companies_id,
            'employees_email' => $request->employees_email
        ]);

        return redirect('/employees/'.$request->id)
        ->with('pesan',"Employe $request->employees_nama berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy($employees)
    {   
        $result = Employees::find($employees)->delete();
        return redirect('/employees')->with('pesan',"Employes  berhasil dihapus");
    }
}
