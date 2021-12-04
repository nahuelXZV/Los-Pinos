<?php

namespace App\Http\Livewire\Equipo\Salida;

use App\Models\equipo;
use App\Models\salidaEquipo;
use App\Models\saco;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ShowSalidas extends Component
{

    use WithPagination;

    //Atributo de la vista
    public $search = '';
    public $sort = 'codigo';
    public $direction = 'asc';
    public $pagination = 10;
    protected $listeners = ['delete' => 'delete', 'mensajeEdit' => 'actualizarDatos'];
    public $open_editar = false;
    public $open_add = false;
    public $open_editsal = false;
    public $identify;

    //Atributos de la clase
    public $idSalidaEquipo;
    public $codigoEquipo;
    public $nombreEquipo;
    public $estadoSalida;
    public $fechaSalida;
    public $horaSalida;
    public $stockRequerido;
    public $stockFaltante;
    public $salida;
    public $idSaco;
    public $idSalida;
    public $salidaE;


    //Validaciones del formulario
    protected $rules = [
        'codigoEquipo' => 'required',
        'stockRequerido' => 'required'
    ];

    //Mensajes de validaciones
    protected $messages = [
        'codigoEquipo.required' => 'El campo equipo es obligatorio.',
        'stockRequerido.required' => 'El campo stock es obligatorio'
    ];

    //Inicializador
    public function mount($salida)
    {
        $this->identify = rand();
        $this->salida = $salida;
    }

    //Método para renderizar la vista
    public function render()
    { 
        $lista = salidaEquipo::find($this->salida->id)->saco()
            ->where('nombre', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)->get();
        $listaEquipo = equipo::all();
        return view('livewire.equipo.salida.show-salidas' , compact('lista', 'listaEquipo'));
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

    //Método para inicializar el modal de edición de la salida
    public function open_editSal($idSalida)
    {
        $salida = salidaEquipo::find($idSalida);
        
        $this->idSalida = $salida->id; 

        $this->idSalidaEquipo = $salida->id;
        $this->horaSalida = $salida->hora;
        $this->fechaSalida = $salida->fecha;

        $this->open_editsal = true;
    }


    //Método para inicializar el modal de edición de la tabla intermedia y equipo
    public function open_edit($idSaco)
    {
        $saco = saco::find($idSaco);
        $equipo = equipo::find($saco->codigoEquipo);
        
        $this->idSaco = $saco->id;
        $this->idSalida = $saco->id; 

        $this->nombreEquipo = $equipo->nombre;
        $this->stockRequerido = $saco->stockRequerido;
        $this->estadoSalida = $saco->estadoSalida;

        $this->open_editar = true;
    }

    //Método para actualizar la salida
    public function updateSalida()
    {
        $salio = salidaEquipo::find($this->idSalida);

        $this->idSalidaEquipo = $salio->id;
        $salio->hora = $this->horaSalida;
        $salio->fecha = $this->fechaSalida;

        $salio->save();

        $this->salida = $salio;
        $this->reset(['open_editsal', 'idSalidaEquipo', 'horaSalida', 'fechaSalida']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente');
    }

    //Método para actualizar la tabla intermedia y el equipo
    public function updateEquipo()
    {

        $saco = saco::find($this->idSaco);
        $equipo = equipo::find($saco->codigoEquipo);

        $this->idSalida = $saco->id;

        if( $this->stockRequerido > $equipo->stock + $saco->stockRequerido)
        {
            $this->emit('alert', '¡Stock Insuficente.!');
            $this->identify = rand();
            $this->reset(['open_editar', 'codigoEquipo', 'idSalidaEquipo', 'stockRequerido', 'estadoSalida']);

        }else{ 
            if($equipo->multiplicidad == "Multiple"){
            
                $this->estadoSalida = "Buen Estado";
                $equipo->estadoFuncionamiento = "Buen Estado";
                $saco->estadoSalida = "Buen Estado";
            
                $equipo->stockFaltante = ($equipo->stockFaltante - $saco->stockRequerido) + $this->stockRequerido;
                $equipo->stock = ($equipo->stock + $saco->stockRequerido) - $this->stockRequerido;
                $saco->stockRequerido = $this->stockRequerido;
            
            }else if($equipo->multiplicidad == "Unico"){
                $equipo->stock = 0;
                $equipo->stockFaltante = 1;
                $equipo->estadoFuncionamiento = $this->estadoSalida;
                $this->stockRequerido = 1;
                $saco->estadoSalida = $this->estadoSalida;
            }
        $saco->save();
        $equipo->save();

        $this->reset(['open_editar', 'codigoEquipo', 'idSalidaEquipo', 'stockRequerido', 'estadoSalida']);
        $this->identify = rand();
        $this->emitTo('equipo.salida.show-salidas', 'render');
        $this->emit('alert', 'Actualizado Correctamente');
        }
    }


    //Método para añadir y guardar una nueva salida
    public function save()
    {
        $this->validate();

        $equipo = equipo::find($this->codigoEquipo);

        if($this->stockRequerido > $equipo->stock && $equipo->multiplicidad == "Multiple")
        {
            $this->reset(['open_add', 'codigoEquipo', 'idSalidaEquipo', 'estadoSalida', 'stockRequerido']);
            $this->identify = rand();
            $this->emit('alert', '¡Stock Insuficiente!');
        }else{

            $this->estadoSalida = $equipo->estadoFuncionamiento;
            if($equipo->multiplicidad == "Unico")
            {
                $this->stockRequerido = 1;
                $equipo->stockFaltante = 1;
                $equipo->stock = 0;
            }else{

                $equipo->stock = $equipo->stock -  $this->stockRequerido;
                $equipo->stockFaltante = $equipo->stockFaltante + $this->stockRequerido;

            }

            $contador = DB::table('sacos')->where('idSalidaEquipo', '=', $this->salida->id)
                ->where('codigoEquipo', '=', $this->codigoEquipo)->count();
            if ($contador > 0) {
                $this->reset(['open_add', 'codigoEquipo', 'idSalidaEquipo', 'estadoSalida', 'stockRequerido']);
                $this->identify = rand();
                $this->emit('alert', 'Ya se registró la Salida del Equipo');
            } else {
                saco::create([
                    'idSalidaEquipo' => $this->salida->id,
                    'codigoEquipo' => $this->codigoEquipo,
                    'stockRequerido' => $this->stockRequerido,
                    'estadoSalida' => $this->estadoSalida
                ]);
                $equipo->save();
                $this->reset(['open_add', 'codigoEquipo', 'idSalidaEquipo', 'estadoSalida', 'horaSalida', 'fechaSalida']);
                $this->identify = rand();
                $this->emitTo('equipo.salida.show-salidas', 'render');
                $this->emit('alert', 'Añadido Correctamente');
            }
        }
    }

    //Método para borrar una salida
    public function delete($idSaco)
    {
        $sacoE = saco::find($idSaco);
        $sacoE->delete();
        $this->emit('alert', 'Eliminado Correctamente');
    }

    //Método para actualizar datos
    public function actualizarDatos($idSalidaEquipo)
    {
        $this->salida = equipo::find($idSalidaEquipo);
        $this->emit('alert', 'Actualizado Correctamente');
    }

    //Método para renderizar la vista después de actualizar 
    public function NewSaco()
    {
        $this->render();
        $this->emit('alert', 'Añadido Correctamente');
    }
    
}
