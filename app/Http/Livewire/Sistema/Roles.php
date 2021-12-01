<?php

namespace App\Http\Livewire\Sistema;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class Roles extends Component
{
    use WithPagination;
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $pagination = 10;
    protected $listeners = ['delete' => 'delete', 'actualizar' => 'actualizar'];
    public $open = false;
    public $open_edit = false;
    public $identify;

    public $name;
    public $role;
    public $permisosR = [];
    public $selectPermissions;
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

    public function abrirADD()
    {
        $this->reset(['open', 'name', 'permisosR']);
        $this->open = true;
    }
    public function datos($idRol)
    {
        $this->reset(['name', 'permisosR', 'selectPermissions']);
        $this->role = Role::find($idRol);
        $this->name =  $this->role->name;
        $this->selectPermissions  = $this->role->getAllPermissions()->pluck('id')->toArray();
        foreach ($this->selectPermissions as $selectPermission) {
            $this->permisosR[$selectPermission] = $selectPermission;
        }
        $this->open_edit = true;
    }

    public function save()
    {
        $this->validate();
        $role = Role::create([
            'name' => $this->name,
        ]);
        foreach ($this->permisosR as $permi) {
            $role->givePermissionTo($permi);
        }
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadio el rol: ' . $this->name, auth()->user()->id]);
        $this->reset(['open', 'name', 'permisosR']);
        $this->identify = rand();
        $this->emit('alert', 'Añadido Correctamente!');
    }
    public function update()
    {
        if ($this->role->name == $this->name) {
            $this->role->name = $this->name;
            $this->role->save();
        } else {
            $this->validate();
            $this->role->name = $this->name;
            $this->role->save();
        }
        foreach ($this->selectPermissions as $permi) {
            $this->role->revokePermissionTo($permi);
        }
        foreach ($this->permisosR as $permi) {
            $this->role->givePermissionTo($permi);
        }
        $this->role->update();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Modificó el rol: ' . $this->name, auth()->user()->id]);
        $this->reset(['open_edit', 'name', 'permisosR', 'selectPermissions']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente!');
    }
    public function delete(Role $idrole)
    {
        $name = $idrole->name;
        $idrole->delete();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó el rol: ' . $name, auth()->user()->id]);
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
