<?php

namespace App\Http\Livewire\Sistema;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Roles extends Component
{
    use WithPagination;
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $pagination = 10;
    protected $listeners = ['delete' => 'delete', 'actualizar' => 'actualizar'];
    public $open = false;
    public $identify;

    public $name;

    protected $rules = [
        'name' => 'required|unique:roles'
    ];

    protected $messages = [];

    public function mount()
    {
        $this->identify = rand();
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

        $this->open = true;
    }
    public function update()
    {

        $this->reset(['open', 'name']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente!');
    }
    public function delete(Role $idrole)
    {
        $idrole->delete();
        $this->emit('alert', 'Eliminado Correctamente!');
    }
    public function render()
    {
        $roles = Role::where('name', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->pagination);
        $permisos = Permission::all();
        return view('livewire.sistema.roles', compact('roles', 'permisos'));
    }
}
