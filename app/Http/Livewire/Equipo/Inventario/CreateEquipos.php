<?php

namespace App\Http\Livewire\Equipo\Inventario;

use App\Models\almacen;
use App\Models\bitacora;
use App\Models\equipo;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CreateEquipos extends Component
{
    //Atributo de la vista
    public $open = false;

    //Atributos de la clase
    public $multiplicity = "Único", $stock, $estadoFuncionamiento = 'Buen Estado', $estadoServicio = 'Activo',
        $codigo, $nombre, $modelo, $marca, $descripcion;
    public $idAlmacen;

    //Validaciones del formulario
    protected $rules = [
        'nombre' => 'required|max:30',
        'modelo' => 'max:10',
        'marca' => 'max:10',
        'stock' => 'required|int|min:0',
        'multiplicity' => 'required|string',
        'descripcion' => 'max:150',
        'estadoFuncionamiento' => 'required',
        'estadoServicio' => 'required',
        'idAlmacen' => 'required|max:10',

    ];

    //Mensajes de Validaciones
    protected $messages = [
        'nombre.required' => 'El campo nombre es obligatorio.',
        'estadoFuncionamiento.required' => 'El campo Estado de Funcionamiento es obligatorio.',
        'multiplicity.required' => 'El campo tipo de equipos es obligatorio.',
        'stock.required' => 'El campo stock es obligatorio.',
        'stock.min' => 'La cantidad mínima del stock es 0',
        'estadoServicio.required' => 'El campo Estado de Servicio es obligatorio.',
        'idAlmacen.required' => 'El campo código del Almacen es obligatorio.',
    ];

    //Inicializador
    public function mount()
    {
        $this->resetSelect();
    }

    //Método para guardar
    public function save()
    {
        $this->validate();
        if ($this->multiplicity == "Único" && $this->stock > 1) {
            $this->emit('alert', 'Tipo de equipo y stock incorrecto');
            return;
        }
        if ($this->multiplicity == 'Múltiple' && $this->estadoFuncionamiento != 'Buen Estado') {
            $this->emit('alert', 'Tipo de equipo y estado de funcionamiento incorrecto!' . $this->estadoFuncionamiento);
            return;
        }
        equipo::create([
            'nombre' => $this->nombre,
            'modelo' => $this->modelo,
            'marca' => $this->marca,
            'descripcion' => $this->descripcion,
            'multiplicidad' => $this->multiplicity,
            'stock' => $this->stock,
            'estadoServicio' => $this->estadoServicio,
            'estadoFuncionamiento' => $this->estadoFuncionamiento,
            'idAlmacen' => $this->idAlmacen,
        ]);

        $last = equipo::latest('codigo')->first();
        $this->codigo = $last->codigo;
        //DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió el equipo: ' . $this->nombre . ' con código: ' . $this->codigo, auth()->user()->id]);
        $bitacora = new bitacora();
        $bitacora->crear('Añadió el equipo: ' . $this->nombre . ' con código: ' . $this->codigo);
        $this->reset(['open', 'codigo', 'nombre', 'modelo', 'marca', 'descripcion', 'multiplicity', 'stock', 'estadoServicio', 'estadoFuncionamiento']);
        $this->identify = rand();
        $this->emitTo('equipo.inventario.show-equipos', 'render');
        $this->emit('alert', 'Añadido Correctamente!');
    }

    //Metodo de reseto de select
    public function resetSelect()
    {
        $almacen = almacen::all()->first();
        $this->idAlmacen = $almacen->id;
    }
    //Método para renderizar la vista
    public function render()
    {
        $almacens = almacen::all();
        return view('livewire.equipo.inventario.create-equipos', compact('almacens'));
    }
}
