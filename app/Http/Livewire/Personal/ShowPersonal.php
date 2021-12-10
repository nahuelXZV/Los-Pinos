<?php

namespace App\Http\Livewire\Personal;

use Livewire\Component;
use App\Models\personal;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;



class ShowPersonal extends Component
{

    use WithPagination;

    public $search = "";
    public $sort = 'codigo';
    public $direction = 'desc';
    public $cant = 10;
    public $open = false;

    public $personal;
    public $codigoP, $nombre, $carnet, $telefono, $direccion, $fechaNac, 
    $nacionalidad, $sexo, $estadoCivil, $email, $cargo, $estado;



    protected $listeners = ['render', 'delete'];

    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'codigo'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => ''],
    ];

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


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $personals = personal::where('codigo', 'like', '%' . $this->search . '%')
            ->orWhere('nombre', 'like', '%' . $this->search . '%')
            ->orWhere('carnet', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cant);

        return view('livewire.personal.show-personal', compact('personals'));
    }

    public function order($sort)
    {

        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function openModal($codigoPersonal)
    {
        $this->personal = personal::find($codigoPersonal);
        $this->codigoP = $this->personal->codigo;
        $this->nombre = $this->personal->nombre;
        $this->carnet = $this->personal->carnet;
        $this->telefono = $this->personal->telefono;
        $this->direccion = $this->personal->direccion;
        $this->fechaNac = $this->personal->fechaNac;
        $this->nacionalidad = $this->personal->nacionalidad;
        $this->sexo = $this->personal->sexo;
        $this->estadoCivil = $this->personal->estadoCivil;
        $this->email = $this->personal->email;
        $this->cargo = $this->personal->cargo;
        $this->estado = $this->personal->estado;

        $this->open = true;
    }

    public function update()
    {
        $this->validate();
        $this->personal->nombre = $this->nombre;
        $this->personal->carnet = $this->carnet;
        $this->personal->telefono = $this->telefono;
        $this->personal->direccion = $this->direccion;
        $this->personal->fechaNac = $this->fechaNac;
        $this->personal->nacionalidad = $this->nacionalidad;
        $this->personal->sexo = $this->sexo;
        $this->personal->estadoCivil = $this->estadoCivil;
        $this->personal->email = $this->email;
        $this->personal->cargo = $this->cargo;
        $this->personal->estado = $this->estado;
        $this->personal->update();

        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Modificó al miembro del personal: ' . $this->nombre . ' con código: ' . $this->codigoP, auth()->user()->id]);
        $this->reset(['open', 'codigoP', 'nombre', 'carnet', 'telefono', 'direccion', 'fechaNac', 'nacionalidad', 'sexo', 'estadoCivil', 'email', 'cargo', 'estado']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente!');
    }

    
    public function delete(personal $personal)
    {
        $miembro = $personal;
        $personal->delete();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó al miembro del personal: ' . $miembro->nombre . ' con código: ' . $miembro->codigo, auth()->user()->id]);
        $this->emit('alert', 'Eliminado Correctamente!');
        $this->reset();
    }
}
