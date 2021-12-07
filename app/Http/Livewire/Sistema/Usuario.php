<?php

namespace App\Http\Livewire\Sistema;

use App\Models\personal;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class Usuario extends Component
{
    use WithPagination;

    //Atributos de la vista
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $pagination = 10;
    public $identify;
    public $open_edit = false;
    protected $listeners = ['delete' => 'delete', 'actualizar' => 'actualizar'];

    //Atributos de la clase
    public $idRol;
    public $rolAct;
    public $userA;

    //Reglas de validacion
    protected $rules = [
        'idRol' => 'required'
    ];

    //Mensajes de validacion
    protected $messages = [
        'idRol' => 'El campo rol es obligatorio.'
    ];

    //Iniciador
    public function mount()
    {
        $this->identify = rand();
        $this->resetSelect();
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

    //Metodo para actualizar la vista
    public function actualizar()
    {
        $this->render();
        $this->emit('alert', 'Añadido Correctamente!');
    }

    //Abrir el modal de editar
    public function open_modal_edit($idpersona)
    {
        $this->userA = User::find($idpersona);
        if ($this->userA->Vpersonal) {
            $this->idRol = $this->userA->Vpersonal->cargo;
            $this->rolAct = $this->userA->Vpersonal->cargo;
        } else {
            $this->rolAct = 'Ninguno';
        }
        $this->open_edit = true;
    }

    //Metodo de editar
    public function update()
    {
        $this->validate();
        $this->userA->removeRole($this->rolAct);
        $this->userA->assignRole($this->idRol);
        $this->userA->save();
        $persona = personal::find($this->userA->Vpersonal->codigo);
        $persona->cargo = $this->idRol;
        $persona->save();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Modificó un usuario con código: ' . $persona->codigo, auth()->user()->id]);
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Modificó el cargo del empleado: ' . $persona->nombre, auth()->user()->id]);
        $this->reset(['open_edit', 'idRol', 'rolAct']);
        $this->resetSelect();
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente!');
    }

    //Metodo de eliminar
    public function delete(User $persona)
    {
        $nombre = $persona->Vpersonal->nombre;
        $persona->delete();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó el usuario de: ' . $nombre, auth()->user()->id]);
        $this->emit('alert', 'Eliminado Correctamente!');
    }

    //Metodo de reseteo de select
    public function resetSelect()
    {
        $rol = Role::all()->first();
        $this->idRol = $rol->id;
    }

    //Metodo de rederizado
    public function render()
    {
        $usuarios = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->pagination);
        $roles = Role::all();
        return view('livewire.sistema.usuario', compact('usuarios', 'roles'));
    }
}
