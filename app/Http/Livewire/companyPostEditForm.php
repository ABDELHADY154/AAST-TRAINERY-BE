<?php

namespace App\Http\Livewire;

use App\Company;
use App\InternshipPost;
use App\StudentDepartment;
use Kdion4891\LaravelLivewireForms\ArrayField;
use Kdion4891\LaravelLivewireForms\Field;
use Kdion4891\LaravelLivewireForms\FormComponent;

class companyPostEditForm extends FormComponent
{
    public function fields()
    {
        $companies = Company::orderBy('id')->get()->pluck('id', 'company_name')->all();
        $departments = StudentDepartment::orderBy('id')->get()->pluck('id', 'department_name')->all();
        return [
            Field::make('Company', 'company_id')->select($companies)->help('please choose a company')->rules('required|integer|exists:companies,id'),
            Field::make('Internship Title', 'internship_title')->input()->rules(['required', 'string']),
            Field::make('Gender', 'gender')->select(['male', 'female', 'both'])->rules(['required', 'string', 'in:Male,Female,Both']),
            Field::make('Type', 'type')->select(['full time', 'part time'])->rules(['required', 'string', 'in:Full Time,Part Time']),
            Field::make('Payment', 'salary')->select(['Paid', 'un paid'])->rules(['required', 'string', 'in:Paid,Un Paid']),
            Field::make('Application Deadline', 'application_deadline')->input('date')->rules(['required', 'date']),
            Field::make('Internship Description', 'desc')->textarea()->rules(['required', 'string']),
            Field::make('Location', 'location')->input()->rules(['required', 'string']),
            Field::make('Location URL', 'location_url')->input()->rules(['nullable', 'url']),
            Field::make('Vacancies Available', 'vacancy')->input('number')->rules(['required', 'integer', 'between:1,50']),
            Field::make('Internship Requirements', 'reqs')->array([
                ArrayField::make('req')->input()->rules(['required', 'string'])
            ])->rules(['required']),
            Field::make('Departments', 'deps')->array([
                ArrayField::make('dep')->select($departments)->rules(['required', 'integer'])
            ])->rules(['required']),

        ];
    }

    public function success()
    {
        InternshipPost::create($this->form_data);
    }

    public function saveAndStayResponse()
    {
        return redirect()->route('internshipposts.create');
    }

    public function saveAndGoBackResponse()
    {
        return redirect()->route('internshipposts.index');
    }
}
