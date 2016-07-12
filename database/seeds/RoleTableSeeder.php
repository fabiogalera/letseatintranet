<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Role;
class RoleTableSeeder extends Seeder{
    public function run()
    {
        DB::table('role')->truncate();
        Role::create([
            'id'            => 1,
            'name'          => 'administrator',
            'description'   => 'Acesso inteiro do site'
        ]);
        Role::create([
            'id'            => 2,
            'name'          => 'manager',
            'description'   => 'Acesso a apenas algumas funcionários de gerente'
        ]);
        Role::create([
            'id'            => 3,
            'name'          => 'employee',
            'description'   => 'Apenas ferramentas comuns, como Voucher e Fila de espera'
        ]);
    }
}