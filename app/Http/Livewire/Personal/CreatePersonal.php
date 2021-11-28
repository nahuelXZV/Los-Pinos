<?php

namespace App\Http\Livewire\Personal;

use App\Models\personal;
use Livewire\Component;

class CreatePersonal extends Component
{
    public $open = false;

    public $codigo, $nombre, $carnet, $telefono, $direccion, $fechaNac, 
    $nacionalidad, $sexo, $estadoCivil, $email, $cargo, $estado;

    protected $rules = [
        'nombre' => 'required|max:50',
        'carnet' => 'required|max:10',
        'telefono' => 'max:10',
        'direccion' => 'max:70',
        'fechaNac' => 'required',
        'nacionalidad' => 'required|max:20',
        'sexo' => 'required|max:2',
        'estadoCivil' => 'required|max:15',
        'email' => 'required|max:50',
        'cargo' => 'required|max:20',
        'estado' => 'required|max:20',

    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        personal::create([
            'nombre' => $this->nombre,
            'carnet' => $this->carnet,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'fechaNac' => $this->fechaNac,
            'nacionalidad' => $this->nacionalidad,
            'sexo' => $this->sexo,
            'estadoCivil' => $this->estadoCivil,
            'email' => $this->email,
            'cargo' => $this->cargo,
            'estado' => $this->estado       
        ]);

        $this->emitTo('personal.show-personal', 'render');
        $this->reset(['open', 'nombre', 'carnet', 'telefono', 'fechaNac', 'nacionalidad','sexo','estadoCivil','email','cargo','estado']);

    }

    public function render()
    {
        return view('livewire.personal.create-personal');
    }
}
