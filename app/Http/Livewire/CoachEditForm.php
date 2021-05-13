<?php

namespace App\Http\Livewire;

use App\Coach;
use Illuminate\Support\Facades\Storage;
use Kdion4891\LaravelLivewireForms\ArrayField;
use Kdion4891\LaravelLivewireForms\Field;
use Kdion4891\LaravelLivewireForms\FormComponent;

class CoachEditForm extends FormComponent
{
    public function fields()
    {
        return [
            Field::make('Image', 'coach_image')->file(),
            Field::make('Name', 'name')->input('text')->rules('required|string'),
            Field::make('BIO', 'bio')->textarea()->rules(['nullable', 'string']),
            Field::make('Job Title', 'job_title')->input('text')->rules(['required', 'string']),
            Field::make('Facebook URL', 'fb_url')->input()->rules(['nullable', 'url']),
            Field::make('Instagram URL', 'insta_url')->input()->rules(['nullable', 'url']),
            Field::make('LinkedIn URL', 'in_url')->input()->rules(['nullable', 'url']),
            Field::make('Youtube URL', 'y_url')->input()->rules(['nullable', 'url']),
        ];
    }

    public function success()
    {
        if (count($this->form_data["coach_image"]) > 0) {
            Storage::move('public/' . $this->form_data['coach_image'][0]["file"], 'public/images/coaches/' . basename($this->form_data['coach_image'][0]["file"]));
            $this->model->update([
                'name' => $this->form_data["name"],
                'bio' => $this->form_data["bio"],
                'job_title' => $this->form_data["job_title"],
                'fb_url' => $this->form_data["fb_url"],
                'in_url' => $this->form_data["in_url"],
                'y_url' => $this->form_data["y_url"],
                'insta_url' => $this->form_data["insta_url"],
                'image' => basename($this->form_data['coach_image'][0]["file"])
            ]);
        }
        $this->model->update([
            'name' => $this->form_data["name"],
            'bio' => $this->form_data["bio"],
            'job_title' => $this->form_data["job_title"],
            'fb_url' => $this->form_data["fb_url"],
            'in_url' => $this->form_data["in_url"],
            'y_url' => $this->form_data["y_url"],
            'insta_url' => $this->form_data["insta_url"],
        ]);
    }

    public function saveAndStayResponse()
    {
        return redirect()->route('coach.show', $this->model);
    }

    public function saveAndGoBackResponse()
    {
        return redirect()->route('coach.index');
    }
}
