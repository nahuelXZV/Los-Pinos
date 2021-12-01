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
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $pagination = 10;
    protected $listeners = ['delete' => 'delete', 'actualizar' => 'actualizar'];
    public $open = false;
    public $identify;

    public $codigo;
    public $nombre;
    public $email;
    public $cargo;
    public $idUser;
    public $idRol;
    public $rolAct;
    public $userA;

    protected $rules = [
        'idRol' => 'required'
    ];

    protected $messages = [];

    public function mount()
    {
        $this->identify = rand();
        $rol = Role::all()->first();
        $this->idRol = $rol->id;
    }
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
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function actualizar()
    {
        $this->render();
        $this->emit('alert', 'Añadido Correctamente!');
    }

    public function datos($idpersona)
    {
        $this->userA = User::find($idpersona);
        if ($this->userA->Vpersonal) {
            $this->idRol = $this->userA->Vpersonal->cargo;
            $this->rolAct = $this->userA->Vpersonal->cargo;
        } else {
            $this->rolAct = 'Ninguno';
        }
        $this->open = true;
    }

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
        $this->reset(['open', 'idRol', 'rolAct']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente!');
    }

    public function delete(User $persona)
    {
        $codigo = $persona->Vpersonal->codigo;
        $persona->delete();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó un usuario con código: ' . $codigo, auth()->user()->id]);
        $this->emit('alert', 'Eliminado Correctamente!');
    }

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
