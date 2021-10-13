<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);
        $this->call(PermissionsSeeder::class);

        // $this->call(CityRecuiteSeeder::class);
        // $this->call(CompanyHostSeeder::class);
        // $this->call(JobTitleSeeder::class);
        // $this->call(CompanyHomeSeeder::class);
        // $this->call(JobGradeSeeder::class);
        // $this->call(JobFamilySeeder::class);
        // $this->call(JobFunctionSeeder::class);
        // $this->call(StatusEmployeeSeeder::class);
        // $this->call(EduSeeder::class);
        // $this->call(SubStatusSeeder::class);
        // $this->call(CompetenceCoreValueSeeder::class);
        // $this->call(CompetenceLeadershipSeeder::class);
        // $this->call(ServiceHistorySeeder::class);
        // $this->call(AssignmentHistorySeeder::class);
        // $this->call(PerformanceAppraisalHistorySeeder::class);
        // $this->call(AchievementHistorySeeder::class);
        // $this->call(TrainingHistorySeeder::class);
        // $this->call(SkillsAndProfessionSeeder::class);
        // $this->call(DataThpSeeder::class);
        // $this->call(OfficeFacilitiesSeeder::class);
        // $this->call(InsuranceFacilitySeeder::class);
        // $this->call(CashBenefitSeeder::class);
        // $this->call(EducationalBackgroundSeeder::class);
        // $this->call(BandPositionSeeder::class);
        // $this->call(OtherCompetenciesSeeder::class);
        // $this->call(WorkLocationSeeder::class);
        // $this->call(FamilySeeder::class);
        // $this->call(UserSeeder::class);
        // $this->call(ProfileSeeder::class);
        // $this->call(UnitSeeder::class);
        // $this->call(DepartementSeeder::class);
        // $this->call(DivisionSeeder::class);
        // $this->call(ProvinceSeeder::class);
        // $this->call(RegencieSeeder::class);
        // $this->call(DistrictSeeder::class);
        // $this->call(VillageSeeder::class);
        // $this->call(EmergencyContactSeeder::class);
        // $this->call(ReligionSeeder::class);
        // $this->call(ContractHistorySeeder::class);
        // $this->call(AlamatKerjaSeeder::class);
        // $this->call(JabatanSeeder::class);
        // $this->call(CompetenceFanctionalSeeder::class);
        // $this->call(DirektoratSeeder::class);
    }
}
