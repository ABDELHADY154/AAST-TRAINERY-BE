<?php

namespace App\Http\Livewire;

use App\Coach;
use App\Session;
use Illuminate\Support\Facades\Storage;
use Kdion4891\LaravelLivewireForms\ArrayField;
use Kdion4891\LaravelLivewireForms\Field;
use Kdion4891\LaravelLivewireForms\FormComponent;

class SessionEditForm extends FormComponent
{
    public function fields()
    {
        $coaches = Coach::orderBy('id')->get()->pluck('id', 'name')->all();
        return [
            Field::make('Coach', 'coach_id')->select($coaches)->help('please choose a coach')->rules('required|integer|exists:coaches,id'),
            Field::make('Title')->input()->rules(['required', 'string']),
            Field::make('Description', 'desc')->textarea()->rules(['required', 'string']),
            Field::make('Price')->input('number')->rules(['required', 'integer']),
            Field::make('Image', 'img')->file(),

        ];
    }

    public function success()
    {
        if (count($this->form_data["img"]) > 0) {
            Storage::move('public/' . $this->form_data['img'][0]["file"], 'public/images/coaches/' . basename($this->form_data['img'][0]["file"]));
            $this->model->update([
                'title' => $this->form_data["title"],
                'desc' => $this->form_data["desc"],
                'price' => $this->form_data["price"],
                'image' => basename($this->form_data['img'][0]["file"]),
                'coach_id' => $this->form_data["coach_id"]
            ]);
        }
        $this->model->update([
            'title' => $this->form_data["title"],
            'desc' => $this->form_data["desc"],
            'price' => $this->form_data["price"],
            'coach_id' => $this->form_data["coach_id"]
        ]);
    }

    public function saveAndStayResponse()
    {
        return redirect()->route('session.show', $this->model);
    }

    public function saveAndGoBackResponse()
    {
        return redirect()->route('session.index');
    }
}
