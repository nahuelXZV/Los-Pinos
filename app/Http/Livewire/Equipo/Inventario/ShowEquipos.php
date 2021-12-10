<?php

namespace App\Http\Livewire\Equipo\Inventario;

use App\Models\almacen;
use Livewire\Component;
use App\Models\equipo;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;


class ShowEquipos extends Component
{
    use WithPagination;

    //Atributos de la vista
    public $search = "";
    public $sort = 'codigo';
    public $direction = 'desc';
    public $cant = 10;
    public $open = false;
    public $identify;

    //Atributos de la clase
    public $equipo;
    public $codigo, $nombre, $modelo, $marca, $descripcion, $stock,
        $multiplicidad, $estadoServicio, $estadoFuncionamiento, $idAlmacen, $almacen;

    //Listener que manda el equipo al metodo delete de otra vista
    protected $listeners = ['render', 'delete'];

    //Arreglo para acortar link de la página en casos especificos
    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'codigo'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => ''],
    ];

    //Validaciones del formulario
    protected $rules = [
        'nombre' => 'required',
        'multiplicidad' => 'required',
        'estadoServicio' => 'required',
        'estadoFuncionamiento' => 'required',
        'idAlmacen' => 'required'
    ];

    //Mensajes de Validaciones
    protected $messages = [
        'nombre.required' => 'El campo nombre es obligatorio.',
        'estadoFuncionamiento.required' => 'El campo Estado de Funcionamiento es obligatorio.',
        'idAlmacen.required' => 'El campo código del Almacen es obligatorio.',
    ];

    //Metodo de reinicio de buscador
    public function updatingSearch()
    {
        $this->resetPage();
    }
    //Iniciador
    public function mount()
    {
        $this->resetSelect();
    }
    //Método para renderizar la vista
    public function render()
    {
        $equipos = equipo::where('codigo', 'like', '%' . $this->search . '%')
            ->orWhere('nombre', 'like', '%' . $this->search . '%')
            ->orWhere('descripcion', 'like', '%' . $this->search . '%')
            ->orWhere('estadoServicio', 'like', '%' . $this->search . '%')
            ->orWhere('estadoFuncionamiento', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cant);
            
        $almacens = almacen::all();
        return view('livewire.equipo.inventario.show-equipos', compact('equipos', 'almacens'));
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
    public function open($codigoEquipo)
    {
        $this->equipo = equipo::find($codigoEquipo);
        $this->codigo = $this->equipo->codigo;
        $this->nombre = $this->equipo->nombre;
        $this->modelo = $this->equipo->modelo;
        $this->marca = $this->equipo->marca;
        $this->descripcion = $this->equipo->descripcion;
        $this->stock = $this->equipo->stock;
        $this->multiplicidad = $this->equipo->multiplicidad;
        $this->estadoServicio = $this->equipo->estadoServicio;
        $this->estadoFuncionamiento = $this->equipo->estadoFuncionamiento;
        $this->idAlmacen = $this->equipo->idAlmacen;
        $this->open = true;
    }

    //Método para actualizar
    public function update()
    {
        $this->validate();
        if ($this->multiplicidad == "Único" && $this->stock > 1) {
            $this->emit('alert', 'Tipo de equipo y stock incorrecto!');
            return;
        }
        if ($this->multiplicidad == 'Múltiple' && $this->estadoFuncionamiento != 'Buen Estado') {
            $this->emit('alert', 'Tipo de equipo y estado de funcionamiento incorrecto!');
            return;
        }
        $this->equipo->nombre = $this->nombre;
        $this->equipo->modelo = $this->modelo;
        $this->equipo->marca = $this->marca;
        $this->equipo->descripcion = $this->descripcion;
        $this->equipo->stock = $this->stock;
        $this->equipo->multiplicidad = $this->multiplicidad;
        $this->equipo->estadoFuncionamiento = $this->estadoFuncionamiento;
        $this->equipo->estadoServicio = $this->estadoServicio;
        $this->equipo->idAlmacen = $this->idAlmacen;
        $this->equipo->update();

        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Modificó el equipo: ' . $this->nombre . ' con código: ' . $this->codigo, auth()->user()->id]);
        $this->reset(['open', 'nombre', 'modelo', 'marca', 'descripcion', 'stock', 'multiplicidad', 'estadoServicio', 'estadoFuncionamiento']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente!');
    }

    //Metodo de reseteo de select
    public function resetSelect()
    {
        $this->almacen = almacen::all()->first();
        $this->idAlmacen = $this->almacen->id;
    }

    //Método para borrar
    public function delete(equipo $equipo)
    {
        $e = equipo::find($equipo->codigo);
        $equipo->delete();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó el equipo: ' . $e->nombre . ' con código: ' . $e->codigo, auth()->user()->id]);
        $this->emit('alert', 'Eliminado Correctamente!');
        $this->reset();
    }
}
