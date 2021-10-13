<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list cityrecuites']);
        Permission::create(['name' => 'view cityrecuites']);
        Permission::create(['name' => 'create cityrecuites']);
        Permission::create(['name' => 'update cityrecuites']);
        Permission::create(['name' => 'delete cityrecuites']);

        Permission::create(['name' => 'list companyhosts']);
        Permission::create(['name' => 'view companyhosts']);
        Permission::create(['name' => 'create companyhosts']);
        Permission::create(['name' => 'update companyhosts']);
        Permission::create(['name' => 'delete companyhosts']);

        Permission::create(['name' => 'list jobtitles']);
        Permission::create(['name' => 'view jobtitles']);
        Permission::create(['name' => 'create jobtitles']);
        Permission::create(['name' => 'update jobtitles']);
        Permission::create(['name' => 'delete jobtitles']);

        Permission::create(['name' => 'list companyhomes']);
        Permission::create(['name' => 'view companyhomes']);
        Permission::create(['name' => 'create companyhomes']);
        Permission::create(['name' => 'update companyhomes']);
        Permission::create(['name' => 'delete companyhomes']);

        Permission::create(['name' => 'list jobgrades']);
        Permission::create(['name' => 'view jobgrades']);
        Permission::create(['name' => 'create jobgrades']);
        Permission::create(['name' => 'update jobgrades']);
        Permission::create(['name' => 'delete jobgrades']);

        Permission::create(['name' => 'list jobfamilies']);
        Permission::create(['name' => 'view jobfamilies']);
        Permission::create(['name' => 'create jobfamilies']);
        Permission::create(['name' => 'update jobfamilies']);
        Permission::create(['name' => 'delete jobfamilies']);

        Permission::create(['name' => 'list jobfunctions']);
        Permission::create(['name' => 'view jobfunctions']);
        Permission::create(['name' => 'create jobfunctions']);
        Permission::create(['name' => 'update jobfunctions']);
        Permission::create(['name' => 'delete jobfunctions']);

        Permission::create(['name' => 'list statusemployees']);
        Permission::create(['name' => 'view statusemployees']);
        Permission::create(['name' => 'create statusemployees']);
        Permission::create(['name' => 'update statusemployees']);
        Permission::create(['name' => 'delete statusemployees']);

        Permission::create(['name' => 'list edus']);
        Permission::create(['name' => 'view edus']);
        Permission::create(['name' => 'create edus']);
        Permission::create(['name' => 'update edus']);
        Permission::create(['name' => 'delete edus']);

        Permission::create(['name' => 'list substatuses']);
        Permission::create(['name' => 'view substatuses']);
        Permission::create(['name' => 'create substatuses']);
        Permission::create(['name' => 'update substatuses']);
        Permission::create(['name' => 'delete substatuses']);

        Permission::create(['name' => 'list competencecorevalues']);
        Permission::create(['name' => 'view competencecorevalues']);
        Permission::create(['name' => 'create competencecorevalues']);
        Permission::create(['name' => 'update competencecorevalues']);
        Permission::create(['name' => 'delete competencecorevalues']);

        Permission::create(['name' => 'list competenceleaderships']);
        Permission::create(['name' => 'view competenceleaderships']);
        Permission::create(['name' => 'create competenceleaderships']);
        Permission::create(['name' => 'update competenceleaderships']);
        Permission::create(['name' => 'delete competenceleaderships']);

        Permission::create(['name' => 'list servicehistories']);
        Permission::create(['name' => 'view servicehistories']);
        Permission::create(['name' => 'create servicehistories']);
        Permission::create(['name' => 'update servicehistories']);
        Permission::create(['name' => 'delete servicehistories']);

        Permission::create(['name' => 'list assignmenthistories']);
        Permission::create(['name' => 'view assignmenthistories']);
        Permission::create(['name' => 'create assignmenthistories']);
        Permission::create(['name' => 'update assignmenthistories']);
        Permission::create(['name' => 'delete assignmenthistories']);

        Permission::create(['name' => 'list performanceappraisalhistories']);
        Permission::create(['name' => 'view performanceappraisalhistories']);
        Permission::create(['name' => 'create performanceappraisalhistories']);
        Permission::create(['name' => 'update performanceappraisalhistories']);
        Permission::create(['name' => 'delete performanceappraisalhistories']);

        Permission::create(['name' => 'list achievementhistories']);
        Permission::create(['name' => 'view achievementhistories']);
        Permission::create(['name' => 'create achievementhistories']);
        Permission::create(['name' => 'update achievementhistories']);
        Permission::create(['name' => 'delete achievementhistories']);

        Permission::create(['name' => 'list traininghistories']);
        Permission::create(['name' => 'view traininghistories']);
        Permission::create(['name' => 'create traininghistories']);
        Permission::create(['name' => 'update traininghistories']);
        Permission::create(['name' => 'delete traininghistories']);

        Permission::create(['name' => 'list skillsandprofessions']);
        Permission::create(['name' => 'view skillsandprofessions']);
        Permission::create(['name' => 'create skillsandprofessions']);
        Permission::create(['name' => 'update skillsandprofessions']);
        Permission::create(['name' => 'delete skillsandprofessions']);

        Permission::create(['name' => 'list datathps']);
        Permission::create(['name' => 'view datathps']);
        Permission::create(['name' => 'create datathps']);
        Permission::create(['name' => 'update datathps']);
        Permission::create(['name' => 'delete datathps']);

        Permission::create(['name' => 'list allofficefacilities']);
        Permission::create(['name' => 'view allofficefacilities']);
        Permission::create(['name' => 'create allofficefacilities']);
        Permission::create(['name' => 'update allofficefacilities']);
        Permission::create(['name' => 'delete allofficefacilities']);

        Permission::create(['name' => 'list insurancefacilities']);
        Permission::create(['name' => 'view insurancefacilities']);
        Permission::create(['name' => 'create insurancefacilities']);
        Permission::create(['name' => 'update insurancefacilities']);
        Permission::create(['name' => 'delete insurancefacilities']);

        Permission::create(['name' => 'list cashbenefits']);
        Permission::create(['name' => 'view cashbenefits']);
        Permission::create(['name' => 'create cashbenefits']);
        Permission::create(['name' => 'update cashbenefits']);
        Permission::create(['name' => 'delete cashbenefits']);

        Permission::create(['name' => 'list educationalbackgrounds']);
        Permission::create(['name' => 'view educationalbackgrounds']);
        Permission::create(['name' => 'create educationalbackgrounds']);
        Permission::create(['name' => 'update educationalbackgrounds']);
        Permission::create(['name' => 'delete educationalbackgrounds']);

        Permission::create(['name' => 'list bandpositions']);
        Permission::create(['name' => 'view bandpositions']);
        Permission::create(['name' => 'create bandpositions']);
        Permission::create(['name' => 'update bandpositions']);
        Permission::create(['name' => 'delete bandpositions']);

        Permission::create(['name' => 'list allothercompetencies']);
        Permission::create(['name' => 'view allothercompetencies']);
        Permission::create(['name' => 'create allothercompetencies']);
        Permission::create(['name' => 'update allothercompetencies']);
        Permission::create(['name' => 'delete allothercompetencies']);

        Permission::create(['name' => 'list worklocations']);
        Permission::create(['name' => 'view worklocations']);
        Permission::create(['name' => 'create worklocations']);
        Permission::create(['name' => 'update worklocations']);
        Permission::create(['name' => 'delete worklocations']);

        Permission::create(['name' => 'list families']);
        Permission::create(['name' => 'view families']);
        Permission::create(['name' => 'create families']);
        Permission::create(['name' => 'update families']);
        Permission::create(['name' => 'delete families']);

        Permission::create(['name' => 'list profiles']);
        Permission::create(['name' => 'view profiles']);
        Permission::create(['name' => 'create profiles']);
        Permission::create(['name' => 'update profiles']);
        Permission::create(['name' => 'delete profiles']);

        Permission::create(['name' => 'list units']);
        Permission::create(['name' => 'view units']);
        Permission::create(['name' => 'create units']);
        Permission::create(['name' => 'update units']);
        Permission::create(['name' => 'delete units']);

        Permission::create(['name' => 'list departements']);
        Permission::create(['name' => 'view departements']);
        Permission::create(['name' => 'create departements']);
        Permission::create(['name' => 'update departements']);
        Permission::create(['name' => 'delete departements']);

        Permission::create(['name' => 'list divisions']);
        Permission::create(['name' => 'view divisions']);
        Permission::create(['name' => 'create divisions']);
        Permission::create(['name' => 'update divisions']);
        Permission::create(['name' => 'delete divisions']);

        Permission::create(['name' => 'list provinces']);
        Permission::create(['name' => 'view provinces']);
        Permission::create(['name' => 'create provinces']);
        Permission::create(['name' => 'update provinces']);
        Permission::create(['name' => 'delete provinces']);

        Permission::create(['name' => 'list regencies']);
        Permission::create(['name' => 'view regencies']);
        Permission::create(['name' => 'create regencies']);
        Permission::create(['name' => 'update regencies']);
        Permission::create(['name' => 'delete regencies']);

        Permission::create(['name' => 'list districts']);
        Permission::create(['name' => 'view districts']);
        Permission::create(['name' => 'create districts']);
        Permission::create(['name' => 'update districts']);
        Permission::create(['name' => 'delete districts']);

        Permission::create(['name' => 'list villages']);
        Permission::create(['name' => 'view villages']);
        Permission::create(['name' => 'create villages']);
        Permission::create(['name' => 'update villages']);
        Permission::create(['name' => 'delete villages']);

        Permission::create(['name' => 'list emergencycontacts']);
        Permission::create(['name' => 'view emergencycontacts']);
        Permission::create(['name' => 'create emergencycontacts']);
        Permission::create(['name' => 'update emergencycontacts']);
        Permission::create(['name' => 'delete emergencycontacts']);

        Permission::create(['name' => 'list religions']);
        Permission::create(['name' => 'view religions']);
        Permission::create(['name' => 'create religions']);
        Permission::create(['name' => 'update religions']);
        Permission::create(['name' => 'delete religions']);

        Permission::create(['name' => 'list contracthistories']);
        Permission::create(['name' => 'view contracthistories']);
        Permission::create(['name' => 'create contracthistories']);
        Permission::create(['name' => 'update contracthistories']);
        Permission::create(['name' => 'delete contracthistories']);

        Permission::create(['name' => 'list alamatkerjas']);
        Permission::create(['name' => 'view alamatkerjas']);
        Permission::create(['name' => 'create alamatkerjas']);
        Permission::create(['name' => 'update alamatkerjas']);
        Permission::create(['name' => 'delete alamatkerjas']);

        Permission::create(['name' => 'list jabatans']);
        Permission::create(['name' => 'view jabatans']);
        Permission::create(['name' => 'create jabatans']);
        Permission::create(['name' => 'update jabatans']);
        Permission::create(['name' => 'delete jabatans']);

        Permission::create(['name' => 'list competencefanctionals']);
        Permission::create(['name' => 'view competencefanctionals']);
        Permission::create(['name' => 'create competencefanctionals']);
        Permission::create(['name' => 'update competencefanctionals']);
        Permission::create(['name' => 'delete competencefanctionals']);

        Permission::create(['name' => 'list direktorats']);
        Permission::create(['name' => 'view direktorats']);
        Permission::create(['name' => 'create direktorats']);
        Permission::create(['name' => 'update direktorats']);
        Permission::create(['name' => 'delete direktorats']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
