<?php

namespace App\Http\Livewire;

use App\Company;
use App\InternshipPost;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Kdion4891\LaravelLivewireForms\ArrayField;
use Kdion4891\LaravelLivewireForms\Field;
use Kdion4891\LaravelLivewireForms\FormComponent;

class AdsPostCreateForm extends FormComponent
{
    public function fields()
    {
        $companies = Company::orderBy('id')->get()->pluck('id', 'company_name')->all();
        return [
            Field::make('Company', 'company')->select($companies)->help('please choose a company')->rules('required|integer|exists:companies,id'),
            Field::make('Image')->file()->rules(['required']),
            Field::make('Description', 'desc')->textarea()->rules(['nullable', 'string'])
        ];
    }

    public function success()
    {
        Storage::move('public/' . $this->form_data['image'][0]["file"], 'public/images/adsImages/' . basename($this->form_data['image'][0]["file"]));
        $ad = InternshipPost::create([
            'desc' => $this->form_data["desc"],
            'sponser_image' => basename($this->form_data['image'][0]["file"]),
            "company_id" => $this->form_data["company"],
            "post_type" => "adsPost",
            'published_on' => now(),
        ]);
        $this->model = $ad;
    }

    public function saveAndStayResponse()
    {
        return redirect()->route('adsPost.show', $this->model);
    }

    public function saveAndGoBackResponse()
    {
        return redirect()->route('adsPost.index');
    }
}
