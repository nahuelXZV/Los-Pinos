<?php

namespace App\Http\Livewire\Equipo\Regreso;

use App\Models\bitacora;
use App\Models\equipo;
use App\Models\personal;
use App\Models\regreso;
use App\Models\regresoEquipo;
use App\Models\saco;
use App\Models\salidaEquipo;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ShowRegresoEquipos extends Component
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
    public $hora, $fecha, $idRegreso, $idSalidaEquipo, $estadoDevolucion;
    public $codigoPersonal;

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
        $personal = personal::latest('codigo')->first();
        $this->codigoPersonal = $personal->id;
        $salida = salidaEquipo::latest('id')->first();
        $this->idSalidaEquipo = $salida->id;
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

    //Método para inicializar el modal
    public function openModal()
    {
        $this->open = true;
    }

    //Método para eliminar 
    public function delete(regresoEquipo $regreso)
    {
        $reg = $regreso;
        $regreso->delete();
        //DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó el regreso ' . $reg->id . ' de la salida: ' . $reg->idSalidaEquipo, auth()->user()->id]);
        $bitacora = new bitacora();
        $bitacora->crear('Eliminó el regreso ' . $reg->id . ' de la salida: ' . $reg->idSalidaEquipo);

        $this->emit('alert', 'Eliminado Correctamente');
    }

    //Método para añadir y guardar una tupla
    public function save()
    {
        $this->validate();

        $regresado = regresoEquipo::where('idSalidaEquipo', '=', $this->idSalidaEquipo)->count();
        $sacos = saco::where('idSalidaEquipo', '=', $this->idSalidaEquipo)->get();
        if ($regresado == null || $regresado ==  0) {
            regresoEquipo::create([
                'fecha' => $this->fecha,
                'hora' => $this->hora,
                'idSalidaEquipo' => $this->idSalidaEquipo,
                'codigoPersonal' => $this->codigoPersonal
            ]);
            $this->lastR = regresoEquipo::latest('id')->first();
            $this->idRegreso = $this->lastR->id;
            //DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió el regreso: ' . $this->idRegreso . ' de la salida: ' . $this->idSalidaEquipo, auth()->user()->id]);
            $bitacora = new bitacora();
            $bitacora->crear('Añadió el regreso: ' . $this->idRegreso . ' de la salida: ' . $this->idSalidaEquipo);
            $this->emit('alert', '¡Añadido Correctamente!');
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
        } else {
            $this->emit('alert', '¡Error! El regreso de  la salida ya fue registrado.');
        }
        $this->identify = rand();
        $this->reset(['fecha', 'hora', 'codigoPersonal', 'idSalidaEquipo', 'open']);
    }

    //Método para renderizar la vista
    public function render()
    {

        $regresos = regresoEquipo::where('id', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cant);
        $salidas = salidaEquipo::all();
        $personals = personal::all();
        return view('livewire.equipo.regreso.show-regreso-equipos', compact('regresos', 'salidas', 'personals'));
    }
}
