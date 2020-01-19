<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class MenusTableSeeder extends Seeder
{
    private $menuId = null;
    private $dropdownId = array();
    private $dropdown = false;
    private $sequence = 1;
    private $joinData = array();
    private $adminRole = null;
    private $userRole = null;

    public function join($roles, $menusId){
        $roles = explode(',', $roles);
        foreach($roles as $role){
            array_push($this->joinData, array('role_name' => $role, 'menus_id' => $menusId));
        }
    }

    /*
        Function assigns menu elements to roles
        Must by use on end of this seeder
    */
    public function joinAllByTransaction(){
        DB::beginTransaction();
        foreach($this->joinData as $data){
            DB::table('menu_role')->insert([
                'role_name' => $data['role_name'],
                'menus_id' => $data['menus_id'],
            ]);
        }
        DB::commit();
    }

    public function insertLink($roles, $name, $href, $icon = null){
        if($this->dropdown === false){
            DB::table('menus')->insert([
                'slug' => 'link',
                'name' => $name,
                'icon' => $icon,
                'href' => $href,
                'menu_id' => $this->menuId,
                'sequence' => $this->sequence
            ]);
        }else{
            DB::table('menus')->insert([
                'slug' => 'link',
                'name' => $name,
                'icon' => $icon,
                'href' => $href,
                'menu_id' => $this->menuId,
                'parent_id' => $this->dropdownId[count($this->dropdownId) - 1],
                'sequence' => $this->sequence
            ]);
        }
        $this->sequence++;
        $lastId = DB::getPdo()->lastInsertId();
        $this->join($roles, $lastId);
        $permission = Permission::where('name', '=', $name)->get();
        if(empty($permission)){
            $permission = Permission::create(['name' => 'visit ' . $name]);
        }
        $roles = explode(',', $roles);
        if(in_array('user', $roles)){
            $this->userRole->givePermissionTo($permission);
        }
        if(in_array('admin', $roles)){
            $this->adminRole->givePermissionTo($permission);
        }
        return $lastId;
    }

    public function insertTitle($roles, $name){
        DB::table('menus')->insert([
            'slug' => 'title',
            'name' => $name,
            'menu_id' => $this->menuId,
            'sequence' => $this->sequence
        ]);
        $this->sequence++;
        $lastId = DB::getPdo()->lastInsertId();
        $this->join($roles, $lastId);
        return $lastId;
    }

    public function beginDropdown($roles, $name, $icon = ''){
        if(count($this->dropdownId)){
            $parentId = $this->dropdownId[count($this->dropdownId) - 1];
        }else{
            $parentId = null;
        }
        DB::table('menus')->insert([
            'slug' => 'dropdown',
            'name' => $name,
            'icon' => $icon,
            'menu_id' => $this->menuId,
            'sequence' => $this->sequence,
            'parent_id' => $parentId
        ]);
        $lastId = DB::getPdo()->lastInsertId();
        array_push($this->dropdownId, $lastId);
        $this->dropdown = true;
        $this->sequence++;
        $this->join($roles, $lastId);
        return $lastId;
    }

    public function endDropdown(){
        $this->dropdown = false;
        array_pop( $this->dropdownId );
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        /* Get roles */
        $this->adminRole = Role::where('name' , '=' , 'admin' )->first();
        $this->adminRole = Role::where('name' , '=' , 'staff' )->first();
        $this->userRole = Role::where('name', '=', 'penduduk' )->first();
        /* Create Sidebar menu */
        DB::table('menulist')->insert([
            'name' => 'sidebar menu'
        ]);
        $this->menuId = DB::getPdo()->lastInsertId();  //set menuId
        //Auth
        $this->insertLink('guest', 'Login', '/login', 'cil-account-logout');
        $this->insertLink('guest', 'Register', '/register', 'cil-account-logout');
        
        //Dashboard
        $this->insertLink('admin', 'Dashboard', '/dashboard', 'cil-speedometer');
        $this->insertLink('staff', 'Dashboard', '/dashboard', 'cil-speedometer');
        $this->insertLink('penduduk', 'Dashboard', '/home', 'cil-speedometer');

        //Admin
        $this->insertTitle('admin', 'Admin');
        $this->beginDropdown('admin', 'Kelola', 'cil-puzzle');
            $this->insertLink('admin', 'User', '/users', 'cil-drop1');
            $this->insertLink('admin', 'App', '/admin/app', 'cil-pencil');         
        $this->endDropdown();
        $this->insertTitle('admin', 'Pengajuan');
        $this->beginDropdown('admin', 'Kelola', 'cil-cursor');
            $this->insertLink('admin', 'Pengajuan', '/pengajuan', 'cil-drop1');
            $this->insertLink('admin', 'Jadwal', '/jadwal', 'cil-pencil');
        $this->endDropdown();
        $this->insertTitle('admin', 'Laporan');
        $this->beginDropdown('admin', 'Data', 'cil-star');
            $this->insertLink('admin', 'Pengajuan', '/laporan/pengajuan', 'cil-chart-pie');
            $this->insertLink('admin', 'Jadwal','/laporan/jadwal', 'cil-bell');
        $this->endDropdown();

        //Staff


        //Penduduk
        $this->insertTitle('penduduk', 'Data Anda');
        $this->beginDropdown('penduduk', 'Informasi', 'cui-cursor');
            $this->insertLink('penduduk', 'Pengajuan', '/data/pengajuan', 'cui-drop1');
            $this->insertLink('penduduk', 'Jadwal', '/data/jadwal', 'cui-chart-pie');
        $this->endDropdown();
        $this->insertTitle('penduduk', 'Registrasi');
        $this->beginDropdown('penduduk', 'Pengajuan', 'cui-pencil');
            $this->insertLink('penduduk', 'KK Baru', '/pengajuan/regkk', 'cui-pencil');
            $this->insertLink('penduduk', 'Edit KK', '/pengajuan/editkk', 'cui-pencil');
            $this->insertLink('penduduk', 'Ganti KK', '/pengajuan/gantikk', 'cui-pencil');
            $this->insertLink('penduduk', 'Mutasi KK', '/pengajuan/mutasikk', 'cui-pencil');
        $this->endDropdown();


        /* Create top menu */
        DB::table('menulist')->insert([
            'name' => 'top menu'
        ]);
        $this->menuId = DB::getPdo()->lastInsertId();  //set menuId
        $id = $this->insertLink('admin', 'Dashboard', '/dashboard');
        $id = $this->insertLink('penduduk', 'Home', '/home');
        $id = $this->insertLink('penduduk,admin', 'Kontak', '/kontak');
        $id = $this->insertLink('admin', 'Users', '/users');
        $id = $this->beginDropdown('admin', 'Settings');

        $id = $this->insertLink('admin', 'Edit menu', '/menu/menu');
        $id = $this->insertLink('admin', 'Edit menu elements', '/menu/element');
        $id = $this->insertLink('admin', 'Edit roles', '/roles');
        $this->endDropdown();

        $this->joinAllByTransaction(); ///   <===== Must by use on end of this seeder
    }
}
