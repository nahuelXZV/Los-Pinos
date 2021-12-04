<?php

namespace App\Http\Livewire\Equipo\Regreso;

use App\Models\equipo;
use App\Models\personal;
use App\Models\regreso;
use App\Models\regresoEquipo;
use App\Models\saco;
use App\Models\salidaEquipo;
use Livewire\Component;
use Livewire\WithPagination;

class ShowRegresoEquipos extends Component
{

    use WithPagination;

    //Atributos de la vista
    public $search = "";
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = 10;
    public $open = false;
    public $readyToLoad = false;
    public $identify;

    //Atributos de la clase
    public $hora, $fecha, $idRegreso, $idSalidaEquipo, $estadoDevolucion;
    public $codigoPersonal = 100;

    //Listener que se renderiza al método delete
    protected $listeners = ['render', 'delete'];

    //Validaciones del formulario
    protected $rules = [
        'codigoPersonal' => 'required',
        'fecha' => 'required',
        'hora' => 'required',
        'idSalidaEquipo' => 'required'
    ];

    //Mensajes de validaciones
    protected $messages = [
        'codigoPersonal.required' => 'El nombre del Personal es obligatorio',
        'fecha' => 'La fecha de Regreso es obligatorio',
        'hora' => 'La hora de regreso es obligatorio',
        'idSalidaEquipo' => 'El ID de la salida es obligatorio'
    ];

    //Inicializador
    public function mount()
    {
        $this->identify = rand();
    }

    //Metodo de reinicio de buscador
    public function updatingSearch()
    {
        $this->resetPage();
    }

    //Método para renderizar la vista
    public function render()
    {
        if($this->readyToLoad){
            $regresos = regresoEquipo::where('id', 'like', '%' . $this->search . '%')
                        ->orderBy($this->sort, $this->direction)
                        ->paginate($this->cant);
            $salidas = salidaEquipo::all();
            $personals = personal::all();
       }else{
           $personals = [];
           $salidas = [];
           $regresos= [];
       }

        return view('livewire.equipo.regreso.show-regreso-equipos', compact('regresos', 'salidas', 'personals'));
    }

    //Método para verificar la carga de la vista
    public function loadRegresos()
    {
        $this->readyToLoad = true;
    }

    //Método para ordenar
    public function order($sort){

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

    //Método para inicializar el modal
    public function openModal()
    {
        $this->lastR = regresoEquipo::latest('id')->first();
        $this->idRegreso = $this->lastR->id + 1;
        $this->open = true;
    }

    //Método para eliminar 
    public function delete(regresoEquipo $regreso)
    {
        $reg = $regreso;
        $regreso->delete();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó el regreso ' . $reg->id . ' de la salida: ' . $reg->idSalidaEquipo , auth()->user()->id]);
    }

    //Método para añadir y guardar una tupla
    public function save()
    {
        $this->validate();

        $regresado = regresoEquipo::where('idSalidaEquipo', '=', $this->idSalidaEquipo)->count();
        $sacos = saco::where('idSalidaEquipo', '=', $this->idSalidaEquipo)->get();
        if($regresado == null || $regresado ==  0)
        {
            regresoEquipo::create([
                'fecha' => $this->fecha,
                'hora' => $this->hora,
                'idSalidaEquipo' => $this->idSalidaEquipo,
                'codigoPersonal' => $this->codigoPersonal
            ]);
            foreach ($sacos as $saco) {
                regreso::create([
                    'idRegresoEquipo' => $this->idRegreso,
                    'codigoEquipo' => $saco->codigoEquipo,
                    'cantidadSacada' => $saco->stockRequerido,
                    'stockRegresado' => null,
                    'stockRegresadoDañado' => null,
                    'horaRegreso' => null,
                    'fechaRegreso' => null,
                    'estadoDevolucion' => $saco->estadoSalida
                ]);
            }
            DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió el regreso: ' . $regresado->id . ' de la salida: ' . $regresado->idSalidaEquipo , auth()->user()->id]);
            $this->emit('alert', '¡Añadido Correctamente!');
            
        }
        else{
            $this->emit('alert', '¡Error! El regreso de  la salida ya fue registrado.');
        }
        $this->reset(['fecha', 'hora', 'codigoPersonal', 'idSalidaEquipo', 'open']);
        $this->identify = rand();
        $this->emitTo('equipo.regreso.show-regreso-equipos', 'render');

    } 
    
}
