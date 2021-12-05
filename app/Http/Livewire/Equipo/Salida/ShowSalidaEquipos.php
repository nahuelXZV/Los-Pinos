<?php

namespace App\Http\Livewire\Equipo\Salida;

use App\Models\equipo;
use App\Models\personal;
use App\Models\saco;
use App\Models\salidaEquipo;
use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ShowSalidaEquipos extends Component
{

    use WithPagination;

    //Atributos de la vista
    public $search = "";
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = 10;
    public $open = false;
    public $identify;

    //Atributos de la clase
    public $fecha, $hora, $motivo, $estadoSalida, $stockRequerido, $stockFaltante, $idSalida, $lastS, $multiplicidad;
    public $codigoP;
    public $codigoEquipo = null;

    //Listener que se renderiza al método delete
    protected $listeners = ['render', 'delete'];

    //Validaciones del formulario
    protected $rules = [
        'codigoP' => 'required',
        'fecha' => 'required',
        'hora' => 'required',
        'motivo' => 'required'
    ];

    //Mensajes de validaciones
    protected $messages = [
        'codigoP.required' => 'El nombre del personal es obligatorio',
        'fecha.required' => 'El fecha de salida del equipo es obligatorio.',
        'hora.required' => 'La hora de salida del equipo es obligatorio.',
        'motivo.required' => 'El motivo de la salida del equipo es obligatorio.'
    ];

    //Inicializador
    public function mount()
    {
        $this->identify = rand();
        $personal = personal::all()->first();
        $this->codigoP = $personal->codigo;
    }

    //Metodo de reinicio de buscador
    public function updatingSearch()
    {
        $this->resetPage();
    }

    //Método para ordenar
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

    //Método para eliminar
    public function delete(salidaEquipo $salida)
    {
        $sal = $salida;
        $salida->delete();
        $this->emit('alert', 'Eliminado Correctamente');DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó la salida ' . $sal->id, auth()->user()->id]);
        $this->emit('alert', 'Eliminado Correctamente');
    }

    //Método para inicializar el modal
    public function open()
    {
        $lastS = salidaEquipo::latest('id')->first();
        $this->idSalida = $lastS->id;
        $this->open = true;
    }

    //Método para guardar
    public function save()
    {
        $this->validate();
        salidaEquipo::create([
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'motivo' => $this->motivo,
            'codigoPersonal' => $this->codigoP
        ]);
     
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió la salida: ' . $this->idSalida , auth()->user()->id]);
        $this->reset(['fecha', 'hora', 'motivo', 'codigoP', 'stockRequerido', 'open']);
        $this->identify = rand();
        $this->emit('alert', 'Añadido Correctamente');
    }

    //Método para renderizar la vista
    public function render()
    {
        $equipos = equipo::all();
        $listaPersonal = personal::all();
        $salidas = salidaEquipo::where('id', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cant);
        return view('livewire.equipo.salida.show-salida-equipos', compact('salidas', 'equipos', 'listaPersonal'));
    }
}
