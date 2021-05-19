<?php

namespace App\Http\Livewire;

use App\Company;
use App\InternshipPost;
use App\Mail\subscribeEmail;
use App\Student;
use App\StudentDepartment;
use App\TrainingAdvisor;
use Illuminate\Support\Facades\Mail;
use Kdion4891\LaravelLivewireForms\ArrayField;
use Kdion4891\LaravelLivewireForms\Field;
use Kdion4891\LaravelLivewireForms\FormComponent;

class AdvisorPostCreateForm extends FormComponent
{
    public function __construct()
    {
        $this->model = null;
    }

    public function fields()
    {
        $companies = Company::orderBy('id')->get()->pluck('id', 'company_name')->all();
        $departments = StudentDepartment::orderBy('id')->get()->pluck('id', 'department_name')->all();
        $advisors = TrainingAdvisor::orderBy('id')->get()->pluck('id', 'advisor_name')->all();
        return [
            Field::make('Company', 'company_id')->select($companies)->help('please choose a company')->rules('required|integer|exists:companies,id'),
            Field::make('Training Advisor', 'training_advisor_id')->select($advisors)->help('please choose a company')->rules('required|integer|exists:training_advisors,id'),
            Field::make('Internship Title', 'internship_title')->input()->rules(['required', 'string']),
            Field::make('Gender', 'gender')->select(['male', 'female', 'any'])->rules(['required', 'string', 'in:male,female,any']),
            Field::make('Type', 'type')->select(['full time', 'part time'])->rules(['required', 'string', 'in:full time,part time']),
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

        $intern =  InternshipPost::create([
            'company_id' => $this->form_data['company_id'],
            'internship_title' => $this->form_data['internship_title'],
            'gender' => $this->form_data['gender'],
            'type' => $this->form_data['type'],
            'salary' => $this->form_data['salary'],
            'application_deadline' => $this->form_data['application_deadline'],
            'published_on' => now(),
            'desc' => $this->form_data['desc'],
            'location' => $this->form_data['location'],
            'location_url' => $this->form_data['location_url'],
            'vacancy' => $this->form_data['vacancy'],
            'post_type' => 'advisorPost',
            'training_advisor_id' => $this->form_data["training_advisor_id"]
        ]);
        foreach ($this->form_data['reqs'] as $req) {
            $intern->internshipReqs()->create(['req' => $req['req'], 'internship_post_id' => $intern->id]);
        }
        $deps = [];
        foreach ($this->form_data['deps'] as  $dep) {
            $deps[] = [
                'internship_post_id' => $intern->id,
                'student_department_id' => $dep['dep']
            ];
        }
        $intern->internDepartments()->attach($deps);
        $this->model = $intern;
    }


    public function saveAndStayResponse()
    {
        $students = Student::where("subscribe", true)->get();
        foreach ($students as $student) {
            $email = $student->email;
            Mail::to($email)->send(new subscribeEmail($this->model));
        }
        return  redirect()->route('trainingAdvisorPost.show', $this->model);
    }

    public function saveAndGoBackResponse()
    {
        return redirect()->route('trainingAdvisorPost.index');
    }
}
