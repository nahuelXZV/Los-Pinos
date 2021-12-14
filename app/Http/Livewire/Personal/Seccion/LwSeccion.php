<?php

namespace App\Http\Livewire\Personal\Seccion;

use App\Models\bitacora;
use Livewire\WithPagination;
use App\Models\seccion;
use Illuminate\Support\Facades\DB;

use Livewire\Component;


class LwSeccion extends Component
{
    use WithPagination;

    //Atributos Vista
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $pagination = 10;
    protected $listeners = ['delete' => 'delete', 'actualizar' => 'actualizar'];
    public $open = false;
    public $identify;

    //Atributos de la clase
    public $calle;
    public $manzano;
    public $seccion;

    //validaciones del formulario
    protected $rules = [
        'calle' => 'required|max:50',
        'manzano' => 'required',
    ];
    //mensajes de validaciones

    protected $messages = [
        'calle.required' => 'El campo calle es obligatorio.',
        'manzano.required' => 'El campo manzano es obligatorio.',
        'manzano.min' => 'El campo manzano debe ser mayor que 0.',
    ];

     //Iniciador
     public function mount()
     {
         $this->identify = rand();
     }

      //Metodo de ordenado
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


     public function actualizar()
    {
        $this->emit('alert', 'Añadido Correctamente!');
        $this->render();
    }


    public function datos($idSeccion)
    {
        $this->seccion = seccion::find($idSeccion);
        $this->calle = $this->seccion->calle;
        $this->manzano = $this->seccion->manzano;
        $this->open = true;
    }
    
    public function update()
    {
        if ($this->seccion->calle == $this->calle) {
            $this->validate([
                'calle' => 'required|max:50',
                'manzano' => 'required',
            ]);
        } else {
            $this->validate();
        }
        $this->seccion->calle = $this->calle;
        $this->seccion->manzano = $this->manzano;
        $this->seccion->update();
        //BITACORA
        $seccion = seccion::latest('id')->first();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Modifico una seccion con codigo: ' . $seccion->id, auth()->user()->id]);
        //END BITACORA
        $this->reset(['open', 'calle', 'manzano']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente!');
    }

    public function delete(seccion $seccion)
    {
        $idS = $seccion->id;
        $seccion->delete();
        $seccion = seccion::latest('id')->first();
        bitacora::create([
            'fecha' => now()->format('Y-m-d'),
            'hora' => now()->format('H:i'),
            'accion' => 'Elimino una seccion con Codigo: ' . $idS,
            'idUsuario' => auth()->user()->id
        ]);
        $this->emit('alert', 'Eliminado Correctamente!');
    }

    public function render()
    {
        $seccions = seccion::where('manzano', 'like', '%' . $this->search . '%')
            ->orWhere('calle', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->pagination);
        //return view('livewire.seguridad.vivienda.lw-vivienda', compact('viviendas'));
        return view('livewire.personal.seccion.lw-seccion', compact('seccions'));
    }
}
