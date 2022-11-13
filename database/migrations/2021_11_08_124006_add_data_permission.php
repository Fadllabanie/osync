<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Admin;

class AddDataPermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('permissions')->truncate();

        DB::table('role_has_permissions')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Role::create(['name' => 'super admin']);
        Role::create(['name' => 'dashboard admin']);
        Role::create(['name' => 'corporate admin']);
        Role::create(['name' => 'corporate manager']);

        ## Users
        Permission::create(['name' => 'access users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'export users']);
        Permission::create(['name' => 'freeze users']);

        ## Corporate Admins
        Permission::create(['name' => 'access admins']);
        Permission::create(['name' => 'create admins']);
        Permission::create(['name' => 'edit admins']);
        Permission::create(['name' => 'delete admins']);
        Permission::create(['name' => 'activate admins']);

        ## Corporate Managers
        Permission::create(['name' => 'access managers']);
        Permission::create(['name' => 'create managers']);
        Permission::create(['name' => 'edit managers']);
        Permission::create(['name' => 'delete managers']);
        Permission::create(['name' => 'activate managers']);

        ## Dashboard Admins
        Permission::create(['name' => 'access dashboard admins']);
        Permission::create(['name' => 'create dashboard admins']);
        Permission::create(['name' => 'edit dashboard admins']);
        Permission::create(['name' => 'delete dashboard admins']);
        Permission::create(['name' => 'activate dashboard admins']);

        ## Profiles
        Permission::create(['name' => 'access profiles']);
        Permission::create(['name' => 'create profiles']);
        Permission::create(['name' => 'edit profiles']);
        Permission::create(['name' => 'delete profiles']);
        Permission::create(['name' => 'attach profiles']);

        ## Categories
        Permission::create(['name' => 'access categories']);
        Permission::create(['name' => 'create categories']);
        Permission::create(['name' => 'edit categories']);
        Permission::create(['name' => 'delete categories']);

        ## Industries
        Permission::create(['name' => 'access industries']);
        Permission::create(['name' => 'create industries']);
        Permission::create(['name' => 'edit industries']);
        Permission::create(['name' => 'delete industries']);

        ## Cards
        Permission::create(['name' => 'access cards']);
        Permission::create(['name' => 'create cards']);
        Permission::create(['name' => 'edit cards']);
        Permission::create(['name' => 'delete cards']);
        Permission::create(['name' => 'export cards']);

        ## FAQs
        Permission::create(['name' => 'access faqs']);
        Permission::create(['name' => 'create faqs']);
        Permission::create(['name' => 'edit faqs']);
        Permission::create(['name' => 'delete faqs']);

        ## Messages
        Permission::create(['name' => 'access messages']);
        Permission::create(['name' => 'delete messages']);

        ## Roles
        Permission::create(['name' => 'access roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'delete roles']);
        ## AppSetting
        Permission::create(['name' => 'access notifications']);
        Permission::create(['name' => 'send notifications']);
        Permission::create(['name' => 'access app settings']);
        Permission::create(['name' => 'access activity logs']);

        ## Static Page
        Permission::create(['name' => 'access static page']);
        Permission::create(['name' => 'create static page']);
        Permission::create(['name' => 'edit static page']);
        Permission::create(['name' => 'delete static page']);

        ##admin role
        $role = Role::whereName('super admin')->first();
        $permission = Permission::get();
        $role->givePermissionTo($permission);

        $admin = Admin::where('email', 'admin@admin.com')->first();
       
        $admin->assignRole('super admin');

        ##dashboard role
        $dashboard_admin_role = Role::whereName('dashboard admin')->first();
        $dashboard_admin_role->givePermissionTo($permission);

        ##corporate role
        $corporate_role = Role::whereName('corporate admin')->first();
        $corporate_role->givePermissionTo(['access managers', 'create managers','edit managers','delete managers','activate managers','access profiles','create profiles','edit profiles','delete profiles','attach profiles','access cards','create cards','edit cards','delete cards','export cards']);

        ##manager role
        $corporate_role = Role::whereName('corporate manager')->first();
        $corporate_role->givePermissionTo(['access profiles','create profiles','edit profiles','delete profiles','attach profiles','access cards','create cards','edit cards','delete cards','export cards']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('model_has_permissions')->truncate();
            DB::table('model_has_roles')->truncate();
            DB::table('role_has_permissions')->truncate();
            DB::table('permissions')->truncate();
            DB::table('roles')->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        });
    }
}
