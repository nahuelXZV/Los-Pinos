<?php

namespace App\Http\Livewire\Personal\ReporteAsistencia;

use App\Models\ingresoPersonal;
use App\Models\permiso;
use App\Models\reporteA;
use App\Models\salidaPersonal;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ShowPermisos extends Component
{

    public $search = '';
    public $sort = 'id';
    public $direction = 'asc';

    public $open_add_permiso = false;
    public $open_edit_report = false;
    public $open_edit_permiso = false;
    public $open_add_ingreso = false;
    public $open_edit_ingreso = false;
    public $open_add_salida = false;
    public $open_edit_salida = false;
    public $identify;
    public $verif = true;

    public $idP, $reporte, $permiso, $motivo, $fecha;

    public $idI, $hora, $retraso, $ingreso;

    public $idS, $horaSalida, $salida;

    //Listener que se renderiza al método delete
    protected $listeners = ['delete', 'deleteI', 'deleteS'];


    //Mensajes de las validaciones
    protected $messages = [
        'motivo.required' => 'El campo motivo es obligatorio.',
        'hora.required' => 'El campo hora es obligatorio.',
        'horaSalida.required' => 'El campo hora de salida es obligatorio.',
    ];

    public function mount($reporte)
    {
        $this->identify = rand();
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

    public function openAdd()
    {
        $this->reset(['open_add_permiso', 'motivo']);
        $this->open_add_permiso = true;
    }

    public function openEditReport($idReporte)
    {
        $this->reset(['open_edit_report', 'fecha']);
        $reporte = reporteA::find($idReporte);
        $this->fecha = $reporte->fecha;
        $this->open_edit_report = true;
    }

    public function openEditPermiso($idPermiso)
    {
        $this->reset(['open_edit_permiso', 'motivo']);
        $permiso = permiso::find($idPermiso);
        $this->permiso = $permiso;
        $this->motivo = $permiso->motivo;
        $this->open_edit_permiso = true;
    }

    public function openAddIngreso()
    {
        $this->reset(['open_add_ingreso', 'hora', 'retraso']);
        $this->open_add_ingreso = true;
    }

    public function openAddSalida()
    {
        $this->reset(['open_add_salida', 'horaSalida']);
        $this->open_add_salida = true;
    }

    public function openEditIngreso($idIngreso)
    {
        $this->reset(['open_edit_ingreso', 'hora', 'retraso']);
        $ingreso = ingresoPersonal::find($idIngreso);
        $this->ingreso = $ingreso;
        $this->hora = $ingreso->hora;
        $this->retraso = $ingreso->retraso;
        $this->open_edit_ingreso = true;
    }

    public function openEditSalida($idSalida)
    {
        $this->reset(['open_edit_salida', 'horaSalida']);
        $salida = salidaPersonal::find($idSalida);
        $this->salida = $salida;
        $this->horaSalida = $salida->hora;
        $this->open_edit_salida = true;
    }

    public function updateReport()
    {
        $reporte = reporteA::find($this->reporte->id);
        $reporte->fecha = $this->fecha;
        $reporte->update();

        $this->reporte = $reporte;

        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Modificó el reporte de asistencia: ' . $this->reporte->id, auth()->user()->id]);
        $this->reset(['open_edit_report', 'fecha']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente');
    }

    public function updatePermiso()
    {
        $permiso = permiso::find($this->permiso->id);
        $permiso->motivo = $this->motivo;
        $permiso->update();

        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Modificó el permiso: ' . $this->permiso->id . ' del reporte de asistencia: ' . $this->reporte->id, auth()->user()->id]);
        $this->reset(['open_edit_permiso', 'motivo']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente');
    }

    public function updateIngreso()
    {
        $this->ingreso->hora = $this->hora;
        if ($this->retraso == null) {
            $this->retraso = 0;
        }
        $this->ingreso->retraso = $this->retraso;
        $this->ingreso->update();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Modificó el ingreso: ' . $this->ingreso->id . ' del reporte de asistencia: ' . $this->reporte->id, auth()->user()->id]);
        $this->reset(['open_edit_ingreso', 'hora', 'retraso']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente');
    }

    public function updateSalida()
    {
        $this->salida->hora = $this->horaSalida;
        $this->salida->update();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Modificó la salida: ' . $this->salida->id . ' del reporte de asistencia: ' . $this->reporte->id, auth()->user()->id]);
        $this->reset(['open_edit_salida', 'horaSalida']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente');
    }

    public function savePermiso()
    {
        $this->validate([
            'motivo' => 'required',
        ]);

        permiso::create([
            'motivo' => $this->motivo,
            'idReporteA' => $this->reporte->id
        ]);

        $permiso = permiso::latest('id')->first();
        $this->idP = $permiso->id;

        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió el permiso : ' . $this->idP . ' del reporte de asistencia: ' . $this->reporte->id, auth()->user()->id]);
        $this->emit('alert', '¡Añadido Correctamente!');
        $this->identify = rand();
        $this->reset(['open_add_permiso', 'motivo']);
    }

    public function saveIngreso()
    {
        $this->validate([
            'hora' => 'required',
        ]);

        if ($this->retraso == null) {
            $this->retraso = 0;
        }
        ingresoPersonal::create([
            'hora' => $this->hora,
            'retraso' => $this->retraso,
            'idReporteA' => $this->reporte->id
        ]);

        $ingreso = ingresoPersonal::latest('id')->first();
        $this->idI = $ingreso->id;

        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió el ingreso : ' . $this->idI . ' del reporte de asistencia: ' . $this->reporte->id, auth()->user()->id]);
        $this->emit('alert', '¡Añadido Correctamente!');
        $this->identify = rand();
        $this->reset(['open_add_ingreso', 'hora', 'retraso']);
    }

    public function saveSalida()
    {
        $this->validate([
            'horaSalida' => 'required',
        ]);

        salidaPersonal::create([
            'hora' => $this->horaSalida,
            'idReporteA' => $this->reporte->id
        ]);

        $salida = salidaPersonal::latest('id')->first();
        $this->idS = $salida->id;

        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió la salida : ' . $this->idS . ' del reporte de asistencia: ' . $this->reporte->id, auth()->user()->id]);
        $this->emit('alert', '¡Añadido Correctamente!');
        $this->identify = rand();
        $this->reset(['open_add_salida', 'horaSalida']);
    }

    public function delete($idPermiso)
    {
        $p = $permiso = permiso::find($idPermiso);
        $permiso->delete();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó el permiso: ' . $p->id . ' del reporte de asistencia: ' . $this->reporte->id, auth()->user()->id]);
        $this->emit('alert', 'Eliminado Correctamente');
    }

    public function deleteI($idIngreso)
    {
        $i = $ingreso = ingresoPersonal::find($idIngreso);
        $ingreso->delete();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó el ingreso: ' . $i->id . ' del reporte de asistencia: ' . $this->reporte->id, auth()->user()->id]);
        $this->emit('alert', 'Eliminado Correctamente');
    }

    public function deleteS($idSalida)
    {
        $s = $salida = salidaPersonal::find($idSalida);
        $salida->delete();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó la salida: ' . $s->id . ' del reporte de asistencia: ' . $this->reporte->id, auth()->user()->id]);
        $this->emit('alert', 'Eliminado Correctamente');
    }

    public function verifIngreso()
    {
        $this->verif = true;
    }

    public function verifSalida()
    {
        $this->verif = false;
    }

    public function render()
    {
        $permisos = permiso::where('idReporteA', '=', $this->reporte->id)->get();
        $ingresos = ingresoPersonal::where('idReporteA', '=', $this->reporte->id)
            ->Where('id', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)->get();
        if ($this->verif == false) {
            $salidas = salidaPersonal::where('idReporteA', '=', $this->reporte->id)
                ->Where('id', 'like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)->get();
        }else{
            $salidas = [];
        }
        return view('livewire.personal.reporte-asistencia.show-permisos', compact('permisos', 'ingresos', 'salidas'));
    }
}
