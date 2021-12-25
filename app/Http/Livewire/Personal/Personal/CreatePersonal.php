<?php

namespace App\Http\Livewire\Personal\Personal;

use App\Models\bitacora;
use App\Models\personal;
use Livewire\Component;
use Illuminate\Support\Facades\DB;


class CreatePersonal extends Component
{
    public $open = false;

    public $last, $codigo, $nombre, $carnet, $telefono, $direccion, $fechaNac, 
    $nacionalidad, $sexo = 'M', $estadoCivil = 'Soltero', $email, $cargo = 'Ninguno', $estado = 'Activo';

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

    protected $messages = [
        'nombre.required' => 'El campo nombre es obligatorio.',
        'carnet.required' => 'El campo carnet es obligatorio.',
        'telefono.max' => 'El campo teléfono requiere máximo 10 caracteres.',
        'direccion.max' => 'El campo dirección requiere máximo 70 caracteres.',
        'fechaNac.required' => 'El campo fecha de nacimiento  es obligatorio.',
        'nacionalidad.required' => 'El campo nacionalidad es obligatorio.',
        'nacionalidad.max' => 'El campo nacionalidad requiere máximo 20 caracteres.',
        'email.required' => 'El campo email es obligatorio.',
        'email.max' => 'El campo email requiere máximo 50 caracteres.',
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

        $last = personal::latest('codigo')->first();
        $this->codigo = $last->codigo;
        //DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió al miembro del personal: ' . $this->nombre . ' con código: ' . $this->codigo, auth()->user()->id]);
        $bitacora = new bitacora();
        $bitacora->crear('Añadió al miembro del personal: ' . $this->nombre . ' con código: ' . $this->codigo);
        $this->emitTo('personal.personal.show-personal', 'render');
        $this->reset(['open', 'nombre', 'carnet', 'telefono', 'direccion', 'fechaNac', 'nacionalidad','sexo','estadoCivil','email','cargo','estado']);
        $this->emit('alert', 'Añadido Correctamente!');
    }

    public function render()
    {
        return view('livewire.personal.personal.create-personal');
    }
}
