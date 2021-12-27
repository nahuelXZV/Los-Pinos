<?php

namespace App\Http\Livewire\Personal\ReporteTrabajo;

use App\Models\bitacora;
use App\Models\personal;
use App\Models\reporteT;
use App\Models\realizo;
use App\Models\trabajo;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class ShowRealizo extends Component
{

    use WithPagination;

    public $search = "";
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = 10;
    public $open_add_realizo = false;
    public $open_edit_reporte = false;
    public $open_edit_realizo = false;
    public $identify;

    public $reporte, $realizo, $fecha, $hora, $actividad, $calle, $manzano, $seccion;


    //Listener que se renderiza al método delete
    protected $listeners = ['delete'];

    //Validaciones del formulario
    protected $rules = [
        'fecha' => 'required',
        'hora' => 'required',
        'actividad' => 'required',
        'seccion' => 'required'
    ]; 

    //Mensajes de las validaciones
    protected $messages = [
        'fecha.required' => 'El campo fecha es obligatorio.',
        'hora.required' => 'El campo hora es obligatorio.',
        'actividad.required' => 'El campo trabajo es obligatorio.',
        'seccion.required' => 'El campo calle es obligatorio.'
    ];

    public function mount($reporte)
    {
        $this->identify = rand();
        $trabajo = trabajo::all()->first();
        $this->actividad = $trabajo->id;
        $this->reporte = $reporte;
        
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

    public function openEditReporte()
    {
        $this->reset(['open_edit_reporte', 'fecha']);
        $this->fecha = $this->reporte->fecha;
        $this->open_edit_reporte = true;
    }

    public function openAddRealizo()
    {
        $this->reset(['open_add_realizo', 'hora', 'actividad']);
        $this->open_add_realizo = true;
    }

    public function openEditRealizo($idRealizo)
    {
        $this->reset(['open_edit_realizo', 'hora', 'actividad']);
        $realizo = realizo::find($idRealizo);
        $trabajo = trabajo::find($realizo->idTrabajo);

        $this->realizo = $realizo;
        $this->hora = $realizo->hora;
        $this->actividad = $trabajo->id;
        $this->open_edit_realizo = true;
    }

    public function updateReporte()
    {
        $this->reporte->fecha = $this->fecha;
        $this->reporte->update();

        // DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Modificó el reporte de asistencia: ' . $this->reporte->id, auth()->user()->id]);
        $bitacora = new bitacora();
        $bitacora->crear('Modificó el reporte de trabajo: ' . $this->reporte->id);
        $this->reset(['open_edit_reporte', 'fecha']);
        $this->identify = rand();
        $this->emit('alert', '¡Actualizado Correctamente!');

    }



    public function updateRealizo()
    {
        $this->validate([
            'hora' => 'required',
            'actividad' => 'required'
        ]);

        $this->realizo->hora = $this->hora;
        $this->realizo->idTrabajo = $this->actividad;
        $this->realizo->update();

        //DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió el trabajo realizado : ' . $this->idR . ' del reporte de trabajo: ' . $this->reporte->id, auth()->user()->id]);
        $bitacora = new bitacora();
        $bitacora->crear('Modificó el trabajo relizado : ' . $this->realizo->id . ' del reporte de trabajo: ' . $this->reporte->id);
        $this->emit('alert', '¡Actualizado Correctamente!');
        $this->identify = rand();
        $this->reset(['open_edit_realizo', 'hora', 'actividad']);

    }

    public function saveRealizo()
    {
        $this->validate([
            'hora' => 'required',
            'actividad' => 'required'
        ]);

        realizo::create([
            'hora' => $this->hora,
            'idReporteT' => $this->reporte->id,
            'idTrabajo' => $this->actividad
        ]);

        $realizo = realizo::latest('id')->first();
        $this->idR = $realizo->id;

        //DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió el trabajo realizado : ' . $this->idR . ' del reporte de trabajo: ' . $this->reporte->id, auth()->user()->id]);
        $bitacora = new bitacora();
        $bitacora->crear('Añadió el trabajo relizado : ' . $this->idR . ' del reporte de trabajo: ' . $this->reporte->id);
        $this->emit('alert', '¡Añadido Correctamente!');
        $this->identify = rand();
        $this->reset(['open_add_realizo', 'hora', 'actividad']);

    }

    public function delete($idRealizo)
    {
        $r = $realizo = realizo::find($idRealizo);
        $realizo->delete();
        // DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó el trabajo realizado: ' . $r->id . ' del reporte de trabajo: ' . $this->reporte->id, auth()->user()->id]);
        $bitacora = new bitacora();
        $bitacora->crear('Eliminó el trabajo realizado: ' . $r->id . ' del reporte de trabajo: ' . $this->reporte->id);
        $this->emit('alert', '¡Eliminado Correctamente!');
    }

    public function render()
    {
        $realizos = realizo::where('idReporteT', '=', $this->reporte->id)
            ->Where('id', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)->get();
        $trabajos = trabajo::all();
        return view('livewire.personal.reporte-trabajo.show-realizo', compact('realizos','trabajos'));
    }
}
