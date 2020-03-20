<?php

namespace App\Http\Controllers;

use App\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $companies = Companies::paginate(5);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { //dump($request->companies_logo);
        $request->validate([
            'companies_nama' => 'required',
            'companies_email' => 'required',
            'companies_logo' => 'required|file|mimes:png|max:2000',
            'companies_website' => 'required'
        ]);

        //echo $request->companies_logo->getClientOriginalName()." Lolos Validasi";

        $extFile = $request->companies_logo->getClientOriginalExtension();
        $namaFile = $request->companies_nama.'-'.time().".".$extFile;
        $path = $request->companies_logo->storeAs('public',$namaFile);
        

        Companies::create([
            'companies_nama' => $request->companies_nama,
            'companies_email' => $request->companies_email,
            'companies_logo' => $namaFile,
            'companies_website' => $request->companies_website
        ]);
        //Companies::create($validasiData);
        
        return redirect('/')->with('pesan',"Companies $request->companies_nama berhasil ditambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show($companies)
    { 
        $result = Companies::find($companies);
        return view('companies.show',['companies' => $result]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit($companies)
    {
        $result = Companies::find($companies);
        return view('companies.edit',['companies' => $result]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request->id);
        $validateData = $request->validate([
            'companies_nama' => 'required',
            'companies_email' => 'required',
            //'companies_logo' => 'required|file|mimes:png|max:2000',
            'companies_website' => 'required'
        ]);

        
        
        if($request->companies_logo === null){
            $result = Companies::where('id',$request->id)->update([
                'companies_nama' => $request->companies_nama,
                'companies_email' => $request->companies_email,
                'companies_website' => $request->companies_website
            ]);
        }else{
            $extFile = $request->companies_logo->getClientOriginalExtension();
            $namaFile = $request->companies_nama.'-'.time().".".$extFile;
            $path = $request->companies_logo->storeAs('public',$namaFile);
            $result = Companies::where('id',$request->id)->update([
                'companies_nama' => $request->companies_nama,
                'companies_email' => $request->companies_email,
                'companies_logo' => $namaFile,
                'companies_website' => $request->companies_website
            ]);
        }       
        
        return redirect('/companies/'.$request->id)
        ->with('pesan',"Companies $request->companies_nama berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy($companies)
    {
        $result = Companies::find($companies)->delete();
        return redirect('/')->with('pesan',"Companies  berhasil dihapus");
    }
}
