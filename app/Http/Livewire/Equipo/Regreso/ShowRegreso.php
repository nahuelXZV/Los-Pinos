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
    public $idRegresoEquipo = 1;
    public $codigoEquipo = 1000;
    public $codigoPersonal, $nombreEquipo;
    public $idRegreso, $idRegresado, $estadoDevolucion, $fechaRegreso,
        $horaRegreso, $equi, $regreso;
    public $stockFaltante, $stockRegresado, $stockRegresadoDañado;
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

        if (($regresado->cantidadSacada < $this->stockRegresado + $this->stockRegresadoDañado  ||
            ($equipo->stockFaltante + $regresado->stockRegresado + $regresado->stockRegresadoDañado) < $this->stockRegresado + $this->stockRegresadoDañado) && $equipo->multiplicidad == "Multiple") {

            $this->reset(['open_editar', 'codigoEquipo', 'nombreEquipo', 'estadoDevolucion', 'stockRegresado', 'stockRegresadoDañado']);
            $this->identify = rand();
            $this->emit('alert', '¡Demasiado Stock Regresado para esta salida!');
        } else {

            $regresado->fechaRegreso = $this->fechaRegresoEquipo;
            $regresado->horaRegreso = $this->horaRegresoEquipo;

            if ($equipo->multiplicidad == "Multiple") {

                if ($this->stockRegresado != null || $this->stockRegresadoDañado != null) {

                    $equipo->stock = ($equipo->stock - $regresado->stockRegresado) + $this->stockRegresado;
                    $equipo->stockFaltante = ($equipo->stockFaltante + $regresado->stockRegresado + $regresado->stockRegresadoDañado) - ($this->stockRegresado + $this->stockRegresadoDañado);

                    $regresado->stockRegresado = $this->stockRegresado;
                    $regresado->stockRegresadoDañado = $this->stockRegresadoDañado;
                }
                $regresado->estadoDevolucion =  "Buen Estado";
                $equipo->estadoFuncionamiento = "Buen Estado";
            } else {
                if ($this->stockRegresado != null && $this->stockRegresado > 0) {
                    $regresado->stockRegresado = 1;
                    $regresado->stockRegresadoDañado = 0;
                } else if ($this->stockRegresadoDañado != null && $this->stockRegresadoDañado > 0) {
                    $regresado->stockRegresado = 0;
                    $regresado->stockRegresadoDañado = 1;
                }

                $regresado->estadoDevolucion =  $this->estadoDevolucion;
                $equipo->estadoFuncionamiento = $this->estadoDevolucion;
                $equipo->stockFaltante = null;
            }

            $regresado->save();
            $equipo->save();

            $this->reset(['open_editar', 'codigoEquipo', 'nombreEquipo', 'estadoDevolucion', 'stockRegresado', 'stockRegresadoDañado']);
            $this->identify = rand();
            $this->emitTo('equipo.regreso.show-regreso', 'render');
            $this->emit('alert', 'Actualizado Correctamente');
        }
    }

    //Método para eliminar la tabla
    public function delete($regresoEq)
    {
        $regresoE = regreso::find($regresoEq);
        $regresoE->delete();
        $this->emit('alert', 'Eliminado Correctamente');
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
