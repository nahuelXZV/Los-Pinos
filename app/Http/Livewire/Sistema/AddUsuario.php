<?php

namespace App\Http\Livewire\Sistema;

use App\Models\personal;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class AddUsuario extends Component
{
    public $open = false;
    public $contra;
    public $codigoPersonal;
    public $idRol;
    public $email;

    protected $rules = [
        'contra' => 'required',
        'codigoPersonal' => 'required|unique:users',
        'idRol' => 'required',
        'email' => 'required|unique:users',
    ];
    protected $messages = [
        'contra.required' => 'El campo contraseña es obligatorio.',
        'codigoPersonal.required' => 'El campo empleado es obligatorio.',
        'codigoPersonal.unique' => 'El empleado ya tiene un usuario.',
        'idRol.required' => 'El campo rol es obligatorio.',
        'email.required' => 'El campo correo electrónico es obligatorio.',
        'email.unique' => 'El correo electronico ya esta en uso',
    ];
    public function save()
    {
        $this->validate();
        $empleado = personal::find($this->codigoPersonal);
        $rol = Role::find($this->idRol);
        User::create([
            'name' => $empleado->nombre,
            'email' => $this->email,
            'password' => bcrypt($this->contra),
            'codigoPersonal' => $this->codigoPersonal
        ])->assignRole($rol->name);
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió un usuario para el empleado con código: ' . $this->codigoPersonal, auth()->user()->id]);
        $this->reset(['open', 'contra', 'codigoPersonal', 'idRol', 'email']);
        $this->emit('actualizar');
    }
    public function mount()
    {
        $this->identify = rand();
        $Personal = personal::all()->first();
        $this->codigoPersonal = $Personal->codigo;
        $rol = Role::all()->first();
        $this->idRol = $rol->id;
    }
    public function render()
    {
        $personal = personal::all();
        $roles = Role::all();
        return view('livewire.sistema.add-usuario', compact('personal', 'roles'));
    }
}
