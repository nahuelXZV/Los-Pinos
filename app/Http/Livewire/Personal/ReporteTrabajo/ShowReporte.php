<?php

namespace App\Http\Livewire\Personal\ReporteTrabajo;

use App\Models\bitacora;
use App\Models\personal;
use App\Models\reporteT;
use App\Models\realizo;

use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class ShowReporte extends Component
{
    use WithPagination;

    public $search = "";
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = 10;
    public $open = false;
    public $open_edit = false;
    public $identify;

    public $idR, $fecha, $codigoPersonal;

    //Listener que se renderiza al método delete
    protected $listeners = ['delete'];

    //Validaciones del formulario
    protected $rules = [
        'fecha' => 'required',
        'codigoPersonal' => 'required'
    ]; 

    //Mensajes de las validaciones
    protected $messages = [
        'fecha.required' => 'El campo fecha es obligatorio.',
        'codigoPersonal.required' => 'El campo codigo es obligatorio.',
    ];

    public function mount()
    {
        $this->identify = rand();
        $personal = personal::all()->first();
        $this->codigoPersonal = $personal->codigo;
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

    public function open_add()
    {
        $this->open = true;
    }

    public function save()
    {
        $this->validate();

        reporteT::create([
            'fecha' => $this->fecha,
            'codPersonal' => $this->codigoPersonal
        ]);

        $reporte = reporteT::latest('id')->first();
        $this->idR = $reporte->id;

        //DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió el reporte de trabajo : ' . $this->idR . ' del personal: ' . $this->codigoPersonal, auth()->user()->id]);
        $bitacora = new bitacora();
        $bitacora->crear('Añadió el reporte de trabajo : ' . $this->idR . ' del personal: ' . $this->codigoPersonal);
        $this->emit('alert', '¡Añadido Correctamente!');
        $this->identify = rand();
        $this->reset(['open', 'fecha', 'codigoPersonal']);

        $personal = personal::all()->first();
        $this->codigoPersonal = $personal->codigo;
    }

    //Método para eliminar 
    public function delete($idReporte)
    {
        $r = $reporte = reporteT::find($idReporte);
        $reporte->delete();
        // DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó el reporte de trabajo ' . $r->id, auth()->user()->id]);
        $bitacora = new bitacora();
        $bitacora->crear('Eliminó el reporte de trabajo ' . $r->id);

        $this->emit('alert', 'Eliminado Correctamente');
    }

    public function render()
    {
        $reportes = reporteT::where('codPersonal', 'like', '%' . $this->search . '%')
        ->orderBy($this->sort, $this->direction)
        ->paginate($this->cant);
        $personals = personal::all();
        return view('livewire.personal.reporte-trabajo.show-reporte', compact('reportes', 'personals'));
    }
}
