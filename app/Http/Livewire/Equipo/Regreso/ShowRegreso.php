<?php

namespace App\Http\Livewire\Equipo\Regreso;

use App\Models\regreso;
use App\Models\regresoEquipo;
use App\Models\equipo;
use App\Models\personal;
use App\Models\saco;
use App\Models\salidaEquipo;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShowRegreso extends Component
{

    use WithPagination;

    //Atributos de la vista
    public $search = '';
    public $sort = 'codigo';
    public $direction = 'asc';
    public $pagination = 10;
    public $open_editar = false;
    public $open_add = false;
    public $open_editreg = false;
    public $identify;

    //Listener para mandar el objeto a otro controlador
    protected $listeners = ['delete' => 'delete', 'mensajeEdit' => 'actualizarDatos'];

    //Atributos de la clase
    public $idRegresoEquipo;
    public $codigoEquipo;
    public $codigoPersonal, $nombreEquipo;
    public $idRegreso, $idRegresado, $estadoDevolucion, $fechaRegreso,
        $horaRegreso, $equi, $regreso;
    public $stockFaltante, $stockRegresado, $stockRegresadoDañado, $cantidadSacada;
    public $horaRegresoEquipo, $fechaRegresoEquipo;

    //Validaciones del formulario
    protected $rules = [
        'fechaRegresoEquipo' => 'required',
        'horaRegresoEquipo' => 'required'
    ];

    //Mensajes de las validaciones
    protected $messages = [
        'fechaRegresoEquipo.required' => 'El fecha de regreso del equipo es obligatorio.',
        'horaRegresoEquipo.required' => 'La hora de regreso del equipo es obligatorio.',
    ];

    //Inicializador
    public function mount($regreso)
    {
        $this->identify = rand();
        $this->regreso = $regreso;
        $last = equipo::latest('codigo')->first();
        $this->codigoEquipo = $last->codigo;
        $lastR = regresoEquipo::latest('id')->first();
        $this->idRegresoEquipo = $lastR->id;
    }

    //Método para renderizar la vista
    public function render()
    {
        $lista = regresoEquipo::find($this->regreso->id)->regreso()
            ->where('nombre', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)->get();
        $listaEquipo = equipo::all();
        $listaSalida = salidaEquipo::all();
        $personals = personal::all();
        return view('livewire.equipo.regreso.show-regreso', compact('lista', 'listaEquipo', 'listaSalida', 'personals'));
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

    //Metodo de reinicio de buscador
    public function updatingSearch()
    {
        $this->resetPage();
    }

    //Método para inicializar el modal de edición del regreso
    public function open_editReg($idRegreso)
    {
        $regreso = regresoEquipo::find($idRegreso);

        $this->idRegreso = $regreso->id;  // Guarda el Id regristrado en la vista

        $this->idRegresoEquipo = $regreso->id;
        $this->horaRegreso = $regreso->hora;
        $this->fechaRegreso = $regreso->fecha;

        $this->open_editreg = true;
    }


    //Método para inicializar el modal de edición de la tabla intermedia y equipo
    public function open_edit($idRegreso)
    {
        $regresado = regreso::find($idRegreso);
        $regreso = regresoEquipo::find($regresado->idRegresoEquipo);
        $equipo = equipo::find($regresado->codigoEquipo);

        $this->idRegresado = $regresado->id;  // Guarda el Id registrado en la vista

        $this->idRegresoEquipo = $regresado->id;
        $this->codigoEquipo = $equipo->codigo;
        $this->nombreEquipo = $equipo->nombre;
        $this->stockRegresado = $regresado->stockRegresado;
        $this->stockRegresadoDañado = $regresado->stockRegresadoDañado;
        $this->fechaRegresoEquipo = $regreso->fecha;
        $this->horaRegresoEquipo = $regreso->hora;
        $this->estadoDevolucion = $regresado->estadoDevolucion;

        $this->open_editar = true;
    }

    //Método para actualizar la tabla Regreso del equipo
    public function updateRegreso()
    {
        $regreso = regresoEquipo::find($this->idRegreso);

        $regreso->hora = $this->horaRegreso;
        $regreso->fecha = $this->fechaRegreso;

        $regreso->save();

        $this->regreso = $regreso;

        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Modificó el regreso: ' . $this->idRegreso, auth()->user()->id]);
        $this->reset(['open_editreg', 'horaRegreso', 'fechaRegreso']);
        $this->identify = rand();
        $this->emitTo('equipo.regreso.show-regreso', 'render');
        $this->emit('alert', 'Actualizado Correctamente');
    }

    //Método para actualizar la tabla intermedia de regreso del equipo y el equipo
    public function updateEquipo()
    {
        $this->validate();

        $regresado = regreso::find($this->idRegresado);
        $equipo = equipo::find($regresado->codigoEquipo);

        if ($this->verifStockRegresado($regresado, $equipo)) {
            $this->reset(['open_editar', 'codigoEquipo', 'nombreEquipo', 'estadoDevolucion', 'stockRegresado', 'stockRegresadoDañado']);
            $this->identify = rand();
            $this->emit('alert', '¡Demasiado Stock Regresado para esta salida!');
        } else {

            $regresado->fechaRegreso = $this->fechaRegresoEquipo;
            $regresado->horaRegreso = $this->horaRegresoEquipo;

            if ($equipo->multiplicidad == "Multiple") {

                $this->stockRegresadoMultiple($regresado, $equipo);

                $regresado->estadoDevolucion =  "Buen Estado";
                $equipo->estadoFuncionamiento = "Buen Estado";
            } else {

                $this->stockRegresadoUnico($regresado);

                $regresado->estadoDevolucion =  $this->estadoDevolucion;
                $equipo->estadoFuncionamiento = $this->estadoDevolucion;
                $equipo->stockFaltante = null;
            }

            $regresado->save();
            $equipo->save();

            DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Modificó el regreso del equipo: ' . $equipo->codigo . ' en el regreso : ' . $regresado->idRegresoEquipo, auth()->user()->id]);
            $this->reset(['open_editar', 'codigoEquipo', 'nombreEquipo', 'estadoDevolucion', 'stockRegresado', 'stockRegresadoDañado']);
            $this->identify = rand();
            $this->emitTo('equipo.regreso.show-regreso', 'render');
            $this->emit('alert', 'Actualizado Correctamente');
        }
    }

    //Verifica que el stock regresado actual no sea mayor a la cantidad sacada en la salida
    public function verifStockRegresado($regresado, $equipo)
    {
        if (($regresado->cantidadSacada < $this->stockRegresado + $this->stockRegresadoDañado  ||
            ($equipo->stockFaltante + $regresado->stockRegresado + $regresado->stockRegresadoDañado) < $this->stockRegresado + $this->stockRegresadoDañado) && $equipo->multiplicidad == "Multiple") {
            return true;
        } else {
            return false;
        }
    }

    //Actualiza la cantidad regresada cuando el equipo es Multiple 
    public function stockRegresadoMultiple($regresado, $equipo)
    {
        if ($this->stockRegresado != null || $this->stockRegresadoDañado != null) {

            $equipo->stock = ($equipo->stock - $regresado->stockRegresado) + $this->stockRegresado;
            $equipo->stockFaltante = ($equipo->stockFaltante + $regresado->stockRegresado + $regresado->stockRegresadoDañado) - ($this->stockRegresado + $this->stockRegresadoDañado);

            $regresado->stockRegresado = $this->stockRegresado;
            $regresado->stockRegresadoDañado = $this->stockRegresadoDañado;
        }
    }

    //Actualiza la cantidad regresada cuando el equipo es Único 
    public function stockRegresadoUnico($regresado)
    {
        if ($this->stockRegresado != null && $this->stockRegresado > 0) {
            $regresado->stockRegresado = 1;
            $regresado->stockRegresadoDañado = 0;
        } else if ($this->stockRegresadoDañado != null && $this->stockRegresadoDañado > 0) {
            $regresado->stockRegresado = 0;
            $regresado->stockRegresadoDañado = 1;
        }
    }

    //Método para actualizar los datos
    public function actualizarDatos($idRegresoEquipo)
    {
        $this->regreso = equipo::find($idRegresoEquipo);
        $this->emit('alert', 'Actualizado Correctamente');
    }

    //Método para renderizar la vista después de actualizar 
    public function NewRegresado()
    {
        $this->render();
        $this->emit('alert', 'Añadido Correctamente');
    }
}
