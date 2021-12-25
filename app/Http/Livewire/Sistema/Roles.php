<?php

namespace App\Http\Livewire\Sistema;

use App\Models\bitacora;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class Roles extends Component
{
    use WithPagination;

    //Atributos de la vista
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $pagination = 10;
    public $identify;
    public $open_add = false;
    public $open_edit = false;
    protected $listeners = ['delete' => 'delete', 'actualizar' => 'actualizar'];

    //Atributos de la clase
    public $name;
    public $role;
    public $permisosR = [];
    public $selectPermissions;

    //Reglas de validacion
    protected $rules = [
        'name' => 'required|unique:roles'
    ];

    //Mensajes de validacion
    protected $messages = [
        'name' => 'el campo nombre es obligatorio.'
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

    //Abrir modal de añadir
    public function open_modal_add()
    {
        $this->reset(['open_add', 'name', 'permisosR']);
        $this->open_add = true;
    }

    //Abrir modal de editar
    public function open_modal_edit($idRol)
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

    //Metodo de guardar
    public function save()
    {
        $this->validate();
        $role = Role::create([
            'name' => $this->name,
        ]);
        foreach ($this->permisosR as $permi) {
            $role->givePermissionTo($permi);
        }
        // DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadio el rol: ' . $this->name, auth()->user()->id]);
        $bitacora = new bitacora();
        $bitacora->crear('Añadio el rol: ' . $this->name);
        $this->reset(['open_add', 'name', 'permisosR']);
        $this->identify = rand();
        $this->emit('alert', 'Añadido Correctamente!');
    }

    //Metodo de editar
    public function update()
    {
        if ($this->role->name == $this->name) {
            $this->role->name = $this->name;
            $this->role->update();
        } else {
            $this->validate();
            $this->role->name = $this->name;
            $this->role->update();
        }
        foreach ($this->selectPermissions as $permi) {
            $this->role->revokePermissionTo($permi);
        }
        foreach ($this->permisosR as $permi) {
            $this->role->givePermissionTo($permi);
        }
        $this->role->update();
        //DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Modificó el rol: ' . $this->name, auth()->user()->id]);
        $bitacora = new bitacora();
        $bitacora->crear('Modificó el rol: ' . $this->name);
        $this->reset(['open_edit', 'name', 'permisosR', 'selectPermissions']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente!');
    }

    //Metodo de eliminar
    public function delete(Role $idrole)
    {
        $name = $idrole->name;
        $idrole->delete();
        //DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó el rol: ' . $name, auth()->user()->id]);
        $bitacora = new bitacora();
        $bitacora->crear('Eliminó el rol: ' . $name);
        $this->emit('alert', 'Eliminado Correctamente!');
    }

    //Metodo de renderizado
    public function render()
    {
        $roles = Role::where('name', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->pagination);
        $permisos = Permission::all();
        return view('livewire.sistema.roles', compact('roles', 'permisos'));
    }
}
