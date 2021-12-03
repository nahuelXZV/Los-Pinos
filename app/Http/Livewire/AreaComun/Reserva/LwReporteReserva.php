<?php

namespace App\Http\Livewire\AreaComun\Reserva;

use App\Models\reporteAc;
use App\Models\reserva;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class LwReporteReserva extends Component
{
    //Atributos de la vista
    public $open_add = false;
    public $open_edit = false;
    public $identify;

    //Atributos de la clase
    public $reserva;
    public $idR;
    public $editRep;
    public $descripcion;
    protected $listeners = ['delete' => 'delete'];

    //Reglas de validacion
    protected $rules = [
        'descripcion' => 'required',
    ];

    //Mensajes de validacion
    protected $messages = [
        'descripcion.required' => 'El campo descripción es obligatorio.'
    ];

    //Inicializador
    public function mount($reserva)
    {
        $this->identify = rand();
        $this->reserva = reserva::find($reserva);
    }

    //Abrir modal de editar
    public function open_modal_edit($idReporte)
    {
        $this->editRep = reporteAc::find($idReporte);
        $this->descripcion = $this->editRep->reporte;
        $this->idR = $idReporte;
        $this->open_edit = true;
    }

    //Metodo de editar
    public function update()
    {
        $this->validate();
        $this->editRep->reporte = $this->descripcion;
        $this->editRep->update();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Modificó el reporte con codigo ' . $this->editRep->id . '  a la reserva con código: ' . $this->reserva->id, auth()->user()->id]);
        $this->reset(['idR', 'descripcion', 'editRep', 'open_edit']);
        $this->identify = rand();
        $this->emit('actualizar');
    }
    //Metodo de añadir
    public function save()
    {
        $this->validate();
        reporteAc::create([
            'reporte' => $this->descripcion,
            'codigoRes' => $this->reserva->id,
            'codigoAC' => $this->reserva->codigoAC
        ]);
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió un nuevo reporte a la reserva con código: ' . $this->reserva->id, auth()->user()->id]);
        $this->reset(['idR', 'descripcion', 'editRep', 'open_add']);
        $this->identify = rand();
        $this->emit('guardar');
    }

    //Metodo de eliminar
    public function delete(reporteAc $reported)
    {
        $codigoR = $reported->id;
        $reported->delete();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó el reporte con codigo ' . $codigoR . ' a la reserva con código: ' . $this->reserva->id, auth()->user()->id]);
        $this->emit('eliminar');
    }

    //Metodo de renderizado
    public function render()
    {
        $reportes = reporteAc::where('codigoRes', '=', $this->reserva->id)->get();
        return view('livewire.area-comun.reserva.lw-reporte-reserva', compact('reportes'));
    }
}
