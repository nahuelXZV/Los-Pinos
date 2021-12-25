<?php

namespace App\Http\Livewire\Personal\Personal;

use App\Models\bitacora;
use App\Models\horario;
use App\Models\horarioPersonal;
use App\Models\personal;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ShowDatos extends Component
{
    public $open_add = false;
    public $open_edit = false;
    public $identify;
    public $search = '';
    public $sort = 'idHorario';
    public $direction = 'asc';

    public $last, $codigo, $nombre, $carnet, $telefono, $direccion, $fechaNac,
        $nacionalidad, $sexo, $estadoCivil, $email, $cargo, $estado;

    public $horario, $horarioPersonal,  $idHorario, $horaInicio, $horaFinal, $dia;

    protected $listeners = ['delete'];

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
        'horario.required' => 'El horario de trabajo es requerido.'
    ];

    public function mount($personal)
    {
        $this->identify = rand();
        $this->personal = $personal;
        $horario = horario::all()->first();
        $this->horario = $horario->id;

        $this->codigo = $this->personal->codigo;
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

    public function openAdd()
    {
        $this->reset(['open_add', 'horario']);
        $horario = horario::all()->first();
        $this->horario = $horario->id;
        $this->open_add = true;
    }

    public function openEdit($id)
    {
        $this->reset(['open_edit', 'horario']);
        $horario = horarioPersonal::find($id);
        $this->horarioPersonal = $horario;
        $this->horario = $horario->idHorario;
        $this->open_edit = true;
    }

    public function save()
    {
        $this->validate([
            'horario' => 'required'
        ]);
        $horarios = horarioPersonal::where('idHorario', '=', $this->horario)->count();
        if ($horarios != null || $horarios > 0) {
            $this->emit('alert', '¡Este horario ya fue asignado al personal!');
            $this->reset(['open_add', 'horario']);
        } else {
            horarioPersonal::create([
                'idHorario' => $this->horario,
                'codigoPersonal' => $this->personal->codigo
            ]);

            //DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió el horario : ' . $this->horario . ' al personal ' . $this->personal->codigo, auth()->user()->id]);
            $bitacora = new bitacora();
            $bitacora->crear('Añadió el horario : ' . $this->horario . ' al personal ' . $this->personal->codigo);
            $this->emit('alert', '¡Añadido Correctamente!');
            $this->identify = rand();
            $this->reset(['open_add', 'horario']);
        }
    }

    public function updateHorario()
    {
        $horarios = horarioPersonal::where('idHorario', '=', $this->horario)->count();
        if ($horarios != null || $horarios > 0) {
            $this->emit('alert', '¡Este horario ya fue asignado al personal!');
            $this->reset(['open_edit', 'horario']);
        } else {
            $this->horarioPersonal->idHorario = $this->horario;
            $this->horarioPersonal->update();

            //DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Actualizó el horario : ' . $this->horario . ' al personal ' . $this->personal->codigo, auth()->user()->id]);
            $bitacora = new bitacora();
            $bitacora->crear('Actualizó el horario : ' . $this->horario . ' al personal ' . $this->personal->codigo);
            $this->emit('alert', '¡Actualizado Correctamente!');
            $this->identify = rand();
            $this->reset(['open_edit', 'horario']);
        }
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

        //DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Modificó al miembro del personal: ' . $this->nombre . ' con código: ' . $this->codigo, auth()->user()->id]);
        $bitacora = new bitacora();
        $bitacora->crear('Modificó al miembro del personal: ' . $this->nombre . ' con código: ' . $this->codigo);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente!');
    }

    public function delete($idHorarioPersonal)
    {
        $h = $horario = horarioPersonal::find($idHorarioPersonal);
        $horario->delete();
        //DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó el horario: ' . $h->id . ' del personal: ' . $this->personal->codigo, auth()->user()->id]);
        $bitacora = new bitacora();
        $bitacora->crear('Eliminó el horario: ' . $h->id . ' del personal: ' . $this->personal->codigo);
        $this->emit('alert', 'Eliminado Correctamente');
    }

    public function render()
    {
        $personals = personal::find($this->personal->codigo)->horarioPersonal()
            ->where('horaInicio', 'like', '%' . $this->search . '%')
            ->orWhere('horaFinal', 'like', '%' . $this->search . '%')
            ->orWhere('dia', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)->get();
        $lista = horario::all();
        return view('livewire.personal.personal.show-datos', compact('personals', 'lista'));
    }
}
