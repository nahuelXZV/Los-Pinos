<?php

namespace App\Http\Livewire\Personal\Seccion;


use App\Models\bitacora;
use App\Models\seccion;
use Carbon\Carbon;
use Carbon\Doctrine\CarbonType;
use Livewire\Component;

class LwAddSeccion extends Component
{
    public $calle;
    public $manzano;
    public $seccion;
    public $open = false;


    protected $rules = [
        'calle' => 'required|max:50',
        'manzano' => 'required',
    ];

    protected $messages = [
        'calle.required' => 'El campo Nombre de calle es obligatorio.',
        'manzano.required' => 'El campo Numero de manzano es obligatorio.',
    ];

    public function save()
    {
        $this->validate();
        seccion::create([
            'calle' => $this->calle,
            'manzano' => $this->manzano,
        ]);
        $seccion = seccion::latest('id')->first();
        $bitacora = new bitacora();
        $bitacora->crear('Añadió una nueva Sección con código: ' . $seccion->id);
        $this->reset(['open', 'calle', 'manzano']);
        $this->identify = rand();
        $this->emit('actualizar');
    }

    public function render()
    {
        return view('livewire.personal.seccion.lw-add-seccion');
    }
}
