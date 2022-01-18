<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EduController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UnitController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\FamilyController;
use App\Http\Controllers\Api\MyTeamsController;
use App\Http\Controllers\Api\DataThpController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\VillageController;
use App\Http\Controllers\Api\JabatanController;
use App\Http\Controllers\Api\JobTitleController;
use App\Http\Controllers\Api\JobGradeController;
use App\Http\Controllers\Api\EduUsersController;
use App\Http\Controllers\Api\DivisionController;
use App\Http\Controllers\Api\ProvinceController;
use App\Http\Controllers\Api\RegencieController;
use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\ReligionController;
use App\Http\Controllers\Api\JobFamilyController;
use App\Http\Controllers\Api\SubStatusController;
use App\Http\Controllers\Api\UnitUsersController;
use App\Http\Controllers\Api\DirektoratController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\CityRecuiteController;
use App\Http\Controllers\Api\CompanyHostController;
use App\Http\Controllers\Api\CompanyHomeController;
use App\Http\Controllers\Api\JobFunctionController;
use App\Http\Controllers\Api\EduFamiliesController;
use App\Http\Controllers\Api\CashBenefitController;
use App\Http\Controllers\Api\DepartementController;
use App\Http\Controllers\Api\AlamatKerjaController;
use App\Http\Controllers\Api\BandPositionController;
use App\Http\Controllers\Api\WorkLocationController;
use App\Http\Controllers\Api\UserFamiliesController;
use App\Http\Controllers\Api\JabatanUsersController;
use App\Http\Controllers\Api\JobTitleUsersController;
use App\Http\Controllers\Api\JobGradeUsersController;
use App\Http\Controllers\Api\DivisionUsersController;
use App\Http\Controllers\Api\JobFamilyUsersController;
use App\Http\Controllers\Api\StatusEmployeeController;
use App\Http\Controllers\Api\SubStatusUsersController;
use App\Http\Controllers\Api\ServiceHistoryController;
use App\Http\Controllers\Api\TrainingHistoryController;
use App\Http\Controllers\Api\ContractHistoryController;
use App\Http\Controllers\Api\DirektoratUsersController;
use App\Http\Controllers\Api\CityRecuiteUsersController;
use App\Http\Controllers\Api\CompanyHostUsersController;
use App\Http\Controllers\Api\CompanyHomeUsersController;
use App\Http\Controllers\Api\JobFunctionUsersController;
use App\Http\Controllers\Api\OfficeFacilitiesController;
use App\Http\Controllers\Api\UserCashBenefitsController;
use App\Http\Controllers\Api\DepartementUsersController;
use App\Http\Controllers\Api\DepartementUnitsController;
use App\Http\Controllers\Api\DistrictVillagesController;
use App\Http\Controllers\Api\EmergencyContactController;
use App\Http\Controllers\Api\ReligionProfilesController;
use App\Http\Controllers\Api\AssignmentHistoryController;
use App\Http\Controllers\Api\InsuranceFacilityController;
use App\Http\Controllers\Api\BandPositionUsersController;
use App\Http\Controllers\Api\OtherCompetenciesController;
use App\Http\Controllers\Api\WorkLocationUsersController;
use App\Http\Controllers\Api\ProvinceRegenciesController;
use App\Http\Controllers\Api\RegencieDistrictsController;
use App\Http\Controllers\Api\AchievementHistoryController;
use App\Http\Controllers\Api\StatusEmployeeUsersController;
use App\Http\Controllers\Api\CompetenceCoreValueController;
use App\Http\Controllers\Api\SkillsAndProfessionController;
use App\Http\Controllers\Api\DirektoratDivisionsController;
use App\Http\Controllers\Api\CompetenceLeadershipController;
use App\Http\Controllers\Api\UserServiceHistoriesController;
use App\Http\Controllers\Api\DivisionDepartementsController;
use App\Http\Controllers\Api\CompetenceFanctionalController;
use App\Http\Controllers\Api\EducationalBackgroundController;
use App\Http\Controllers\Api\UserTrainingHistoriesController;
use App\Http\Controllers\Api\UserContractHistoriesController;
use App\Http\Controllers\Api\UserAssignmentHistoriesController;
use App\Http\Controllers\Api\UserAllOfficeFacilitiesController;
use App\Http\Controllers\Api\UserInsuranceFacilitiesController;
use App\Http\Controllers\Api\JobTitleServiceHistoriesController;
use App\Http\Controllers\Api\WorkLocationAlamatKerjasController;
use App\Http\Controllers\Api\UserAchievementHistoriesController;
use App\Http\Controllers\Api\UserSkillsAndProfessionsController;
use App\Http\Controllers\Api\EduEducationalBackgroundsController;
use App\Http\Controllers\Api\UserEducationalBackgroundsController;
use App\Http\Controllers\Api\CompanyHostServiceHistoriesController;
use App\Http\Controllers\Api\JobTitleAssignmentHistoriesController;
use App\Http\Controllers\Api\CompanyHomeServiceHistoriesController;
use App\Http\Controllers\Api\PerformanceAppraisalHistoryController;
use App\Http\Controllers\Api\BandPositionServiceHistoriesController;
use App\Http\Controllers\Api\CompanyHomeAssignmentHistoriesController;
use App\Http\Controllers\Api\UserPerformanceAppraisalHistoriesController;
use App\Http\Controllers\Api\OtherCompetenciesTrainingHistoriesController;
use App\Http\Controllers\Api\CompetenceCoreValueTrainingHistoriesController;
use App\Http\Controllers\Api\CompetenceLeadershipTrainingHistoriesController;
use App\Http\Controllers\Api\OtherCompetenciesSkillsAndProfessionsController;
use App\Http\Controllers\Api\CompetenceFanctionalTrainingHistoriesController;
use App\Http\Controllers\Api\CompetenceCoreValueSkillsAndProfessionsController;
use App\Http\Controllers\Api\CompetenceLeadershipSkillsAndProfessionsController;
use App\Http\Controllers\Api\CompetenceFanctionalSkillsAndProfessionsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::get('my-teams', [MyTeamsController::class, 'get_team'])->name('my-teams.get_team');

        
        Route::apiResource('city-recuites', CityRecuiteController::class);

        // CityRecuite Users
        Route::get('/city-recuites/{cityRecuite}/users', [
            CityRecuiteUsersController::class,
            'index',
        ])->name('city-recuites.users.index');
        Route::post('/city-recuites/{cityRecuite}/users', [
            CityRecuiteUsersController::class,
            'store',
        ])->name('city-recuites.users.store');

        Route::apiResource('company-hosts', CompanyHostController::class);

        // CompanyHost Users
        Route::get('/company-hosts/{companyHost}/users', [
            CompanyHostUsersController::class,
            'index',
        ])->name('company-hosts.users.index');
        Route::post('/company-hosts/{companyHost}/users', [
            CompanyHostUsersController::class,
            'store',
        ])->name('company-hosts.users.store');

        // CompanyHost Service Histories
        Route::get('/company-hosts/{companyHost}/service-histories', [
            CompanyHostServiceHistoriesController::class,
            'index',
        ])->name('company-hosts.service-histories.index');
        Route::post('/company-hosts/{companyHost}/service-histories', [
            CompanyHostServiceHistoriesController::class,
            'store',
        ])->name('company-hosts.service-histories.store');

        Route::apiResource('job-titles', JobTitleController::class);

        // JobTitle Users
        Route::get('/job-titles/{jobTitle}/users', [
            JobTitleUsersController::class,
            'index',
        ])->name('job-titles.users.index');
        Route::post('/job-titles/{jobTitle}/users', [
            JobTitleUsersController::class,
            'store',
        ])->name('job-titles.users.store');

        // JobTitle Service Histories
        Route::get('/job-titles/{jobTitle}/service-histories', [
            JobTitleServiceHistoriesController::class,
            'index',
        ])->name('job-titles.service-histories.index');
        Route::post('/job-titles/{jobTitle}/service-histories', [
            JobTitleServiceHistoriesController::class,
            'store',
        ])->name('job-titles.service-histories.store');

        // JobTitle Assignment Histories
        Route::get('/job-titles/{jobTitle}/assignment-histories', [
            JobTitleAssignmentHistoriesController::class,
            'index',
        ])->name('job-titles.assignment-histories.index');
        Route::post('/job-titles/{jobTitle}/assignment-histories', [
            JobTitleAssignmentHistoriesController::class,
            'store',
        ])->name('job-titles.assignment-histories.store');

        Route::apiResource('company-homes', CompanyHomeController::class);

        // CompanyHome Users
        Route::get('/company-homes/{companyHome}/users', [
            CompanyHomeUsersController::class,
            'index',
        ])->name('company-homes.users.index');
        Route::post('/company-homes/{companyHome}/users', [
            CompanyHomeUsersController::class,
            'store',
        ])->name('company-homes.users.store');

        // CompanyHome Service Histories
        Route::get('/company-homes/{companyHome}/service-histories', [
            CompanyHomeServiceHistoriesController::class,
            'index',
        ])->name('company-homes.service-histories.index');
        Route::post('/company-homes/{companyHome}/service-histories', [
            CompanyHomeServiceHistoriesController::class,
            'store',
        ])->name('company-homes.service-histories.store');

        // CompanyHome Assignment Histories
        Route::get('/company-homes/{companyHome}/assignment-histories', [
            CompanyHomeAssignmentHistoriesController::class,
            'index',
        ])->name('company-homes.assignment-histories.index');
        Route::post('/company-homes/{companyHome}/assignment-histories', [
            CompanyHomeAssignmentHistoriesController::class,
            'store',
        ])->name('company-homes.assignment-histories.store');

        Route::apiResource('job-grades', JobGradeController::class);

        // JobGrade Users
        Route::get('/job-grades/{jobGrade}/users', [
            JobGradeUsersController::class,
            'index',
        ])->name('job-grades.users.index');
        Route::post('/job-grades/{jobGrade}/users', [
            JobGradeUsersController::class,
            'store',
        ])->name('job-grades.users.store');

        Route::apiResource('job-families', JobFamilyController::class);

        // JobFamily Users
        Route::get('/job-families/{jobFamily}/users', [
            JobFamilyUsersController::class,
            'index',
        ])->name('job-families.users.index');
        Route::post('/job-families/{jobFamily}/users', [
            JobFamilyUsersController::class,
            'store',
        ])->name('job-families.users.store');

        Route::apiResource('job-functions', JobFunctionController::class);

        // JobFunction Users
        Route::get('/job-functions/{jobFunction}/users', [
            JobFunctionUsersController::class,
            'index',
        ])->name('job-functions.users.index');
        Route::post('/job-functions/{jobFunction}/users', [
            JobFunctionUsersController::class,
            'store',
        ])->name('job-functions.users.store');

        Route::apiResource('status-employees', StatusEmployeeController::class);

        // StatusEmployee Users
        Route::get('/status-employees/{statusEmployee}/users', [
            StatusEmployeeUsersController::class,
            'index',
        ])->name('status-employees.users.index');
        Route::post('/status-employees/{statusEmployee}/users', [
            StatusEmployeeUsersController::class,
            'store',
        ])->name('status-employees.users.store');

        Route::apiResource('edus', EduController::class);

        // Edu Users
        Route::get('/edus/{edu}/users', [
            EduUsersController::class,
            'index',
        ])->name('edus.users.index');
        Route::post('/edus/{edu}/users', [
            EduUsersController::class,
            'store',
        ])->name('edus.users.store');

        // Edu Families
        Route::get('/edus/{edu}/families', [
            EduFamiliesController::class,
            'index',
        ])->name('edus.families.index');
        Route::post('/edus/{edu}/families', [
            EduFamiliesController::class,
            'store',
        ])->name('edus.families.store');

        // Edu Educational Backgrounds
        Route::get('/edus/{edu}/educational-backgrounds', [
            EduEducationalBackgroundsController::class,
            'index',
        ])->name('edus.educational-backgrounds.index');
        Route::post('/edus/{edu}/educational-backgrounds', [
            EduEducationalBackgroundsController::class,
            'store',
        ])->name('edus.educational-backgrounds.store');

        Route::apiResource('sub-statuses', SubStatusController::class);

        // SubStatus Users
        Route::get('/sub-statuses/{subStatus}/users', [
            SubStatusUsersController::class,
            'index',
        ])->name('sub-statuses.users.index');
        Route::post('/sub-statuses/{subStatus}/users', [
            SubStatusUsersController::class,
            'store',
        ])->name('sub-statuses.users.store');

        Route::apiResource(
            'competence-core-values',
            CompetenceCoreValueController::class
        );

        // CompetenceCoreValue Training Histories
        Route::get(
            '/competence-core-values/{competenceCoreValue}/training-histories',
            [CompetenceCoreValueTrainingHistoriesController::class, 'index']
        )->name('competence-core-values.training-histories.index');
        Route::post(
            '/competence-core-values/{competenceCoreValue}/training-histories',
            [CompetenceCoreValueTrainingHistoriesController::class, 'store']
        )->name('competence-core-values.training-histories.store');

        // CompetenceCoreValue Skills And Professions
        Route::get(
            '/competence-core-values/{competenceCoreValue}/skills-and-professions',
            [CompetenceCoreValueSkillsAndProfessionsController::class, 'index']
        )->name('competence-core-values.skills-and-professions.index');
        Route::post(
            '/competence-core-values/{competenceCoreValue}/skills-and-professions',
            [CompetenceCoreValueSkillsAndProfessionsController::class, 'store']
        )->name('competence-core-values.skills-and-professions.store');

        Route::apiResource(
            'competence-leaderships',
            CompetenceLeadershipController::class
        );

        // CompetenceLeadership Training Histories
        Route::get(
            '/competence-leaderships/{competenceLeadership}/training-histories',
            [CompetenceLeadershipTrainingHistoriesController::class, 'index']
        )->name('competence-leaderships.training-histories.index');
        Route::post(
            '/competence-leaderships/{competenceLeadership}/training-histories',
            [CompetenceLeadershipTrainingHistoriesController::class, 'store']
        )->name('competence-leaderships.training-histories.store');

        // CompetenceLeadership Skills And Professions
        Route::get(
            '/competence-leaderships/{competenceLeadership}/skills-and-professions',
            [CompetenceLeadershipSkillsAndProfessionsController::class, 'index']
        )->name('competence-leaderships.skills-and-professions.index');
        Route::post(
            '/competence-leaderships/{competenceLeadership}/skills-and-professions',
            [CompetenceLeadershipSkillsAndProfessionsController::class, 'store']
        )->name('competence-leaderships.skills-and-professions.store');

        Route::apiResource(
            'service-histories',
            ServiceHistoryController::class
        );

        Route::apiResource(
            'assignment-histories',
            AssignmentHistoryController::class
        );

        Route::apiResource(
            'performance-appraisal-histories',
            PerformanceAppraisalHistoryController::class
        );

        Route::apiResource(
            'achievement-histories',
            AchievementHistoryController::class
        );

        Route::apiResource(
            'training-histories',
            TrainingHistoryController::class
        );

        Route::apiResource(
            'skills-and-professions',
            SkillsAndProfessionController::class
        );

        Route::apiResource('data-thps', DataThpController::class);

        Route::apiResource(
            'all-office-facilities',
            OfficeFacilitiesController::class
        );

        Route::apiResource(
            'insurance-facilities',
            InsuranceFacilityController::class
        );

        Route::apiResource('cash-benefits', CashBenefitController::class);

        Route::apiResource(
            'educational-backgrounds',
            EducationalBackgroundController::class
        );

        Route::apiResource('band-positions', BandPositionController::class);

        // BandPosition Users
        Route::get('/band-positions/{bandPosition}/users', [
            BandPositionUsersController::class,
            'index',
        ])->name('band-positions.users.index');
        Route::post('/band-positions/{bandPosition}/users', [
            BandPositionUsersController::class,
            'store',
        ])->name('band-positions.users.store');

        // BandPosition Service Histories
        Route::get('/band-positions/{bandPosition}/service-histories', [
            BandPositionServiceHistoriesController::class,
            'index',
        ])->name('band-positions.service-histories.index');
        Route::post('/band-positions/{bandPosition}/service-histories', [
            BandPositionServiceHistoriesController::class,
            'store',
        ])->name('band-positions.service-histories.store');

        Route::apiResource(
            'all-other-competencies',
            OtherCompetenciesController::class
        );

        // OtherCompetencies Training Histories
        Route::get(
            '/all-other-competencies/{otherCompetencies}/training-histories',
            [OtherCompetenciesTrainingHistoriesController::class, 'index']
        )->name('all-other-competencies.training-histories.index');
        Route::post(
            '/all-other-competencies/{otherCompetencies}/training-histories',
            [OtherCompetenciesTrainingHistoriesController::class, 'store']
        )->name('all-other-competencies.training-histories.store');

        // OtherCompetencies Skills And Professions
        Route::get(
            '/all-other-competencies/{otherCompetencies}/skills-and-professions',
            [OtherCompetenciesSkillsAndProfessionsController::class, 'index']
        )->name('all-other-competencies.skills-and-professions.index');
        Route::post(
            '/all-other-competencies/{otherCompetencies}/skills-and-professions',
            [OtherCompetenciesSkillsAndProfessionsController::class, 'store']
        )->name('all-other-competencies.skills-and-professions.store');

        Route::apiResource('work-locations', WorkLocationController::class);

        // WorkLocation Users
        Route::get('/work-locations/{workLocation}/users', [
            WorkLocationUsersController::class,
            'index',
        ])->name('work-locations.users.index');
        Route::post('/work-locations/{workLocation}/users', [
            WorkLocationUsersController::class,
            'store',
        ])->name('work-locations.users.store');

        // WorkLocation Alamat Kerjas
        Route::get('/work-locations/{workLocation}/alamat-kerjas', [
            WorkLocationAlamatKerjasController::class,
            'index',
        ])->name('work-locations.alamat-kerjas.index');
        Route::post('/work-locations/{workLocation}/alamat-kerjas', [
            WorkLocationAlamatKerjasController::class,
            'store',
        ])->name('work-locations.alamat-kerjas.store');

        Route::apiResource('families', FamilyController::class);

        Route::apiResource('users', UserController::class);

        // User Families
        Route::get('/users/{user}/families', [
            UserFamiliesController::class,
            'index',
        ])->name('users.families.index');
        Route::post('/users/{user}/families', [
            UserFamiliesController::class,
            'store',
        ])->name('users.families.store');

        // User Service Histories
        Route::get('/users/{user}/service-histories', [
            UserServiceHistoriesController::class,
            'index',
        ])->name('users.service-histories.index');
        Route::post('/users/{user}/service-histories', [
            UserServiceHistoriesController::class,
            'store',
        ])->name('users.service-histories.store');

        // User Educational Backgrounds
        Route::get('/users/{user}/educational-backgrounds', [
            UserEducationalBackgroundsController::class,
            'index',
        ])->name('users.educational-backgrounds.index');
        Route::post('/users/{user}/educational-backgrounds', [
            UserEducationalBackgroundsController::class,
            'store',
        ])->name('users.educational-backgrounds.store');

        // User Assignment Histories
        Route::get('/users/{user}/assignment-histories', [
            UserAssignmentHistoriesController::class,
            'index',
        ])->name('users.assignment-histories.index');
        Route::post('/users/{user}/assignment-histories', [
            UserAssignmentHistoriesController::class,
            'store',
        ])->name('users.assignment-histories.store');

        // User Performance Appraisal Histories
        Route::get('/users/{user}/performance-appraisal-histories', [
            UserPerformanceAppraisalHistoriesController::class,
            'index',
        ])->name('users.performance-appraisal-histories.index');
        Route::post('/users/{user}/performance-appraisal-histories', [
            UserPerformanceAppraisalHistoriesController::class,
            'store',
        ])->name('users.performance-appraisal-histories.store');

        // User Achievement Histories
        Route::get('/users/{user}/achievement-histories', [
            UserAchievementHistoriesController::class,
            'index',
        ])->name('users.achievement-histories.index');
        Route::post('/users/{user}/achievement-histories', [
            UserAchievementHistoriesController::class,
            'store',
        ])->name('users.achievement-histories.store');

        // User Training Histories
        Route::get('/users/{user}/training-histories', [
            UserTrainingHistoriesController::class,
            'index',
        ])->name('users.training-histories.index');
        Route::post('/users/{user}/training-histories', [
            UserTrainingHistoriesController::class,
            'store',
        ])->name('users.training-histories.store');

        // User Skills And Professions
        Route::get('/users/{user}/skills-and-professions', [
            UserSkillsAndProfessionsController::class,
            'index',
        ])->name('users.skills-and-professions.index');
        Route::post('/users/{user}/skills-and-professions', [
            UserSkillsAndProfessionsController::class,
            'store',
        ])->name('users.skills-and-professions.store');

        // User All Office Facilities
        Route::get('/users/{user}/all-office-facilities', [
            UserAllOfficeFacilitiesController::class,
            'index',
        ])->name('users.all-office-facilities.index');
        Route::post('/users/{user}/all-office-facilities', [
            UserAllOfficeFacilitiesController::class,
            'store',
        ])->name('users.all-office-facilities.store');

        // User Insurance Facilities
        Route::get('/users/{user}/insurance-facilities', [
            UserInsuranceFacilitiesController::class,
            'index',
        ])->name('users.insurance-facilities.index');
        Route::post('/users/{user}/insurance-facilities', [
            UserInsuranceFacilitiesController::class,
            'store',
        ])->name('users.insurance-facilities.store');

        // User Cash Benefits
        Route::get('/users/{user}/cash-benefits', [
            UserCashBenefitsController::class,
            'index',
        ])->name('users.cash-benefits.index');
        Route::post('/users/{user}/cash-benefits', [
            UserCashBenefitsController::class,
            'store',
        ])->name('users.cash-benefits.store');

        // User Contract Histories
        Route::get('/users/{user}/contract-histories', [
            UserContractHistoriesController::class,
            'index',
        ])->name('users.contract-histories.index');
        Route::post('/users/{user}/contract-histories', [
            UserContractHistoriesController::class,
            'store',
        ])->name('users.contract-histories.store');

        Route::apiResource('profiles', ProfileController::class);

        Route::apiResource('units', UnitController::class);

        // Unit Users
        Route::get('/units/{unit}/users', [
            UnitUsersController::class,
            'index',
        ])->name('units.users.index');
        Route::post('/units/{unit}/users', [
            UnitUsersController::class,
            'store',
        ])->name('units.users.store');

        Route::apiResource('departements', DepartementController::class);

        // Departement Users
        Route::get('/departements/{departement}/users', [
            DepartementUsersController::class,
            'index',
        ])->name('departements.users.index');
        Route::post('/departements/{departement}/users', [
            DepartementUsersController::class,
            'store',
        ])->name('departements.users.store');

        // Departement Units
        Route::get('/departements/{departement}/units', [
            DepartementUnitsController::class,
            'index',
        ])->name('departements.units.index');
        Route::post('/departements/{departement}/units', [
            DepartementUnitsController::class,
            'store',
        ])->name('departements.units.store');

        Route::apiResource('divisions', DivisionController::class);

        // Division Users
        Route::get('/divisions/{division}/users', [
            DivisionUsersController::class,
            'index',
        ])->name('divisions.users.index');
        Route::post('/divisions/{division}/users', [
            DivisionUsersController::class,
            'store',
        ])->name('divisions.users.store');

        // Division Departements
        Route::get('/divisions/{division}/departements', [
            DivisionDepartementsController::class,
            'index',
        ])->name('divisions.departements.index');
        Route::post('/divisions/{division}/departements', [
            DivisionDepartementsController::class,
            'store',
        ])->name('divisions.departements.store');

        Route::apiResource('provinces', ProvinceController::class);

        // Province Regencies
        Route::get('/provinces/{province}/regencies', [
            ProvinceRegenciesController::class,
            'index',
        ])->name('provinces.regencies.index');
        Route::post('/provinces/{province}/regencies', [
            ProvinceRegenciesController::class,
            'store',
        ])->name('provinces.regencies.store');

        Route::apiResource('regencies', RegencieController::class);

        // Regencie Districts
        Route::get('/regencies/{regencie}/districts', [
            RegencieDistrictsController::class,
            'index',
        ])->name('regencies.districts.index');
        Route::post('/regencies/{regencie}/districts', [
            RegencieDistrictsController::class,
            'store',
        ])->name('regencies.districts.store');

        Route::apiResource('districts', DistrictController::class);

        // District Villages
        Route::get('/districts/{district}/villages', [
            DistrictVillagesController::class,
            'index',
        ])->name('districts.villages.index');
        Route::post('/districts/{district}/villages', [
            DistrictVillagesController::class,
            'store',
        ])->name('districts.villages.store');

        Route::apiResource('villages', VillageController::class);

        Route::apiResource(
            'emergency-contacts',
            EmergencyContactController::class
        );

        Route::apiResource('religions', ReligionController::class);

        // Religion Profiles
        Route::get('/religions/{religion}/profiles', [
            ReligionProfilesController::class,
            'index',
        ])->name('religions.profiles.index');
        Route::post('/religions/{religion}/profiles', [
            ReligionProfilesController::class,
            'store',
        ])->name('religions.profiles.store');

        Route::apiResource(
            'contract-histories',
            ContractHistoryController::class
        );

        Route::apiResource('alamat-kerjas', AlamatKerjaController::class);

        Route::apiResource('jabatans', JabatanController::class);

        // Jabatan Users
        Route::get('/jabatans/{jabatan}/users', [
            JabatanUsersController::class,
            'index',
        ])->name('jabatans.users.index');
        Route::post('/jabatans/{jabatan}/users', [
            JabatanUsersController::class,
            'store',
        ])->name('jabatans.users.store');

        Route::apiResource(
            'competence-fanctionals',
            CompetenceFanctionalController::class
        );

        // CompetenceFanctional Training Histories
        Route::get(
            '/competence-fanctionals/{competenceFanctional}/training-histories',
            [CompetenceFanctionalTrainingHistoriesController::class, 'index']
        )->name('competence-fanctionals.training-histories.index');
        Route::post(
            '/competence-fanctionals/{competenceFanctional}/training-histories',
            [CompetenceFanctionalTrainingHistoriesController::class, 'store']
        )->name('competence-fanctionals.training-histories.store');

        // CompetenceFanctional Skills And Professions
        Route::get(
            '/competence-fanctionals/{competenceFanctional}/skills-and-professions',
            [CompetenceFanctionalSkillsAndProfessionsController::class, 'index']
        )->name('competence-fanctionals.skills-and-professions.index');
        Route::post(
            '/competence-fanctionals/{competenceFanctional}/skills-and-professions',
            [CompetenceFanctionalSkillsAndProfessionsController::class, 'store']
        )->name('competence-fanctionals.skills-and-professions.store');

        Route::apiResource('direktorats', DirektoratController::class);

        // Direktorat Users
        Route::get('/direktorats/{direktorat}/users', [
            DirektoratUsersController::class,
            'index',
        ])->name('direktorats.users.index');
        Route::post('/direktorats/{direktorat}/users', [
            DirektoratUsersController::class,
            'store',
        ])->name('direktorats.users.store');

        // Direktorat Divisions
        Route::get('/direktorats/{direktorat}/divisions', [
            DirektoratDivisionsController::class,
            'index',
        ])->name('direktorats.divisions.index');
        Route::post('/direktorats/{direktorat}/divisions', [
            DirektoratDivisionsController::class,
            'store',
        ])->name('direktorats.divisions.store');
    });
