<?php

namespace App\Http\Livewire\AreaComun\AreaComun;
 
use Livewire\Component;
use App\Models\areaComun;
use Illuminate\Support\Facades\DB;

class LwAddAreaComun extends Component
{
    //Atributos de la vista
    public $open_add = false;
    public $identify;

    //Atributos de la clase
    public $area;
    public $codigo;
    public $nombre;
    public $calle;
    public $manzano;
    public $estadoRes = "Reservación";

    //Validaciones del formulario
    protected $rules = [
        'nombre' => 'required',
        'calle' => 'required',
        'manzano' => 'required|int|min:1',
        'estadoRes' => 'required',
    ];

    //Mensajes de Validaciones
    protected $messages = [
        'nombre.required' => 'El campo nombre de área común es obligatorio.',
        'calle.required' => 'El campo calle es obligatorio.',
        'manzano.required' => 'El campo manzano es obligatorio.',
        'manzano.min' => 'El campo manzano debe ser mayor que 0.',
        'estadoRes.required' => 'El campo estado de reserva es obligatorio.',
    ];

    //Iniciador
    public function mount()
    {
        $this->identify = rand();
    }

    //Metodo de guardar
    public function save()
    {
        $this->validate();
        areaComun::create([
            'nombre' => $this->nombre,
            'calle' => $this->calle,
            'manzano' => $this->manzano,
            'estadoRes' => $this->estadoRes
        ]);
        $last = areaComun::latest('codigo')->first();
        $this->codigo = $last->codigo;
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió una área común con código: ' . $this->codigo, auth()->user()->id]);
        $this->reset(['open_add', 'codigo', 'nombre', 'calle', 'manzano', 'estadoRes']);
        $this->identify = rand();
        $this->emit('actualizar');
    }

    //Abrir modal de añadir
    public function open_modal_add()
    {
        $this->reset(['open_add', 'codigo', 'nombre', 'calle', 'manzano', 'estadoRes']);
        $this->open_add = true;
    }

    public function render()
    {
        return view('livewire.area-comun.area-comun.lw-add-area-comun');
    }
}
