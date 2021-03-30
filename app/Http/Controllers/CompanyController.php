<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Sopamo\LaravelFilepond\Filepond;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('admin.company.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
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
            'company_name' => ['required', 'string'],
            'website' => ['required', 'url', 'unique:companies,website'],
            'email' => ['required', 'email', 'unique:companies,email'],
            'company_logo' => ['required', 'file', 'mimes:png,jpg,jpeg'],
            'address' => ['required', 'string'],
            'phone_number' => ['required', 'numeric'],
            'company_field' => ['required', 'string'],
            'desc' => ['required', 'string']
        ]);
        if ($request->file('company_logo')) {
            $fileName = $request->file('company_logo')->hashName();
            $path = $request->file('company_logo')->storeAs(
                'public/images/companyLogo',
                $fileName
            );
        }
        Company::create([
            'image' => $fileName,
            'company_name' => $request->input('company_name'),
            'address' => $request->input('address'),
            'company_field' => $request->input('company_field'),
            'company_desc' => $request->input('desc'),
            'phone_number' => $request->input('phone_number'),
            'website' => $request->input('website'),
            'email' => $request->input('email')
        ]);
        return redirect(route('company.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {

        return view('admin.company.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin.company.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'company_name' => ['required', 'string'],
            'website' => ['required', 'url',  Rule::unique('companies')->ignore($company->id)],
            'email' => ['required', 'email', Rule::unique('companies')->ignore($company->id)],
            'company_logo' => ['file', 'mimes:png,jpg,jpeg'],
            'address' => ['required', 'string'],
            'phone_number' => ['required', 'numeric'],
            'company_field' => ['required', 'string'],
            'desc' => ['required', 'string']
        ]);
        if ($request->file('company_logo')) {
            $fileName = $request->file('company_logo')->hashName();
            $path = $request->file('company_logo')->storeAs(
                'public/images/companyLogo',
                $fileName
            );

            $company->update([
                'image' => $fileName,
                'company_name' => $request->input('company_name'),
                'address' => $request->input('address'),
                'company_field' => $request->input('company_field'),
                'company_desc' => $request->input('desc'),
                'phone_number' => $request->input('phone_number'),
                'website' => $request->input('website'),
                'email' => $request->input('email')
            ]);
        }

        $company->update([

            'company_name' => $request->input('company_name'),
            'address' => $request->input('address'),
            'company_field' => $request->input('company_field'),
            'company_desc' => $request->input('desc'),
            'phone_number' => $request->input('phone_number'),
            'website' => $request->input('website'),
            'email' => $request->input('email')
        ]);

        $company->save();

        return redirect(route('company.show', $company->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {

        $company->delete();
        return redirect(route('company.index'));
    }
}
