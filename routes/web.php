<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\EduController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\DataThpController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VillageController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\JobGradeController;
use App\Http\Controllers\JobTitleController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RegencieController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\JobFamilyController;
use App\Http\Controllers\SubStatusController;
use App\Http\Controllers\DirektoratController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AlamatKerjaController;
use App\Http\Controllers\CashBenefitController;
use App\Http\Controllers\CityRecuiteController;
use App\Http\Controllers\CompanyHomeController;
use App\Http\Controllers\CompanyHostController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\JobFunctionController;
use App\Http\Controllers\BandPositionController;
use App\Http\Controllers\WorkLocationController;
use App\Http\Controllers\ServiceHistoryController;
use App\Http\Controllers\StatusEmployeeController;
use App\Http\Controllers\ContractHistoryController;
use App\Http\Controllers\TrainingHistoryController;
use App\Http\Livewire\Hris\Employee\CreateEmployee;
use App\Http\Livewire\Hris\Employee\UpdateEmployee;
use App\Http\Controllers\EmergencyContactController;
use App\Http\Controllers\OfficeFacilitiesController;
use App\Http\Controllers\AssignmentHistoryController;
use App\Http\Controllers\InsuranceFacilityController;
use App\Http\Controllers\OtherCompetenciesController;
use App\Http\Controllers\profile\MyProfileController;
use App\Http\Controllers\AchievementHistoryController;
use App\Http\Controllers\AsignedUserController;
use App\Http\Controllers\CompetenceCoreValueController;
use App\Http\Controllers\SkillsAndProfessionController;
use App\Http\Controllers\CompetenceFanctionalController;
use App\Http\Controllers\CompetenceLeadershipController;
use App\Http\Controllers\EducationalBackgroundController;
use App\Http\Controllers\Import\EmployeeImportController;
use App\Http\Controllers\Import\ImportProfileUserController;
use App\Http\Controllers\Import\FamilyImportController;
use App\Http\Controllers\LeaderController;
use App\Http\Livewire\Hris\DataKedinasan\CreateDataKedinasan;
use App\Http\Livewire\Hris\DataKedinasan\UpdateDataKedinasan;
use App\Http\Livewire\Hris\DataPenugasan\CreateDataPenugasan;
use App\Http\Livewire\Hris\DataPenugasan\UpdateDataPenugasan;
use App\Http\Livewire\Hris\DataKeluarga\CreateDataKeluarga;
use App\Http\Livewire\Hris\DataKeluarga\UpdateDataKeluarga;
use App\Http\Controllers\PerformanceAppraisalHistoryController;
use App\Http\Controllers\TelegramEmployeeExpired;
use App\Http\Controllers\userResignController;
use App\Http\Livewire\Dashboard\DashboardEmployee;
use App\Http\Livewire\Dashboard\DashboardProfile;
use App\Http\Livewire\Dashboard\DashboardUsers;
use App\Http\Livewire\Eproc\PurchaseRequest\PrIndex;
use App\Http\Livewire\Hris\Employee\EmployeeExpired;
use App\Http\Livewire\Hris\Employee\Resign;
use App\Http\Livewire\Hris\Leader\ViewUser;
use App\Http\Livewire\Hris\RiwayatPrestasi\CreateRiwayatPrestasi;
use App\Http\Livewire\Hris\RiwayatPrestasi\UpdateRiwayatPrestasi;
use App\Http\Livewire\Hris\RiwayatTraining\CreateRiwayatTraining;
use App\Http\Livewire\Hris\RiwayatTraining\UpdateRiwayatTraining;
use App\Http\Livewire\Hris\PenilaianKinerja\CreatePenilaianKinerja;
use App\Http\Livewire\Hris\PenilaianKinerja\UpdatePenilaianKinerja;
use App\Models\Leader;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/telegram', function () {
    return view('welcome');
});

Route::get('crown-telegram', [TelegramEmployeeExpired::class, 'index']);

Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);

Auth::routes();

Route::get('dashboard/employee', DashboardEmployee::class)->middleware('permission:master data')->name('dashboard.employee');
Route::get('dashboard/users', DashboardUsers::class)->middleware('permission:master data')->name('dashboard.users');
Route::get('/home', DashboardProfile::class)->middleware('auth')->name('home');


Route::prefix('import_data')->middleware('permission:master data')->group(function () {
    Route::prefix('employee')->group(function () {
        Route::post('import', [EmployeeImportController::class, 'store'])->name('import.employee');
        Route::post('import_profile', [ImportProfileUserController::class, 'store'])->name('import.profile');
        Route::post('import_family', [FamilyImportController::class, 'store'])->name('import.family');
        Route::get('import_leader', [LeaderController::class, 'index'])->name('leader.index');
        Route::post('import_leader', [LeaderController::class, 'store'])->name('leader.store');
    });
    // Route::prefix('profile')->group(function () {
    //     Route::post('import', [ImportProfileUserController::class, 'store'])->name('import.profile');
    //     // Route::post('import', [ImportProfileUserController::class, 'store'])->name('import.profile');
    // });
});

Route::prefix('Myprofile')->middleware('auth')->group(function () {
    // main profile
    Route::get('', [MyProfileController::class, 'index'])->name('Myprofile');
    Route::get('leader/view/{id}', ViewUser::class)->name('leader.view');

    Route::get('/edut_lists', [MyProfileController::class, 'edu_list'])->name('edu_lists');
    Route::post('', [MyProfileController::class, 'update'])->name('Myprofile.update');
    Route::post('/change_password', [MyProfileController::class, 'change_password'])->name('Myprofile.change_password');
    // edu list
    Route::get('/edu_background_list', [MyProfileController::class, 'educational_background_lists'])->name('edu_background_list');
    Route::post('/insert_edu_backgrounds', [MyProfileController::class, 'insert_edu_background'])->name('insert_edu_background');
    Route::post('/update_edu_backgrounds', [MyProfileController::class, 'update_edu_background'])->name('update_edu_background');
    Route::post('/destroy_edu_backgrounds', [MyProfileController::class, 'destroy_edu_background'])->name('destroy_edu_background');
    // family
    Route::get('family_lists', [MyProfileController::class, 'family_list'])->name('family_lists');
    Route::post('/insert_famlies', [MyProfileController::class, 'insert_family'])->name('insert_famlies');
    Route::post('/update_families', [MyProfileController::class, 'update_family'])->name('update_families');
    Route::post('/destroy_families', [MyProfileController::class, 'destroy_family'])->name('destroy_families');
});

Route::prefix('master_data')
    ->middleware('permission:master data')
    ->group(
        function () {
            Route::prefix('hris')->middleware('auth')->group(function () {
                Route::resource('band-positions', BandPositionController::class);
                Route::resource('city-recuites', CityRecuiteController::class);
                Route::resource('company-hosts', CompanyHostController::class);
                Route::resource('job-titles', JobTitleController::class);
                Route::resource('company-homes', CompanyHomeController::class);
                Route::resource('job-grades', JobGradeController::class);
                Route::resource('job-families', JobFamilyController::class);
                Route::resource('job-functions', JobFunctionController::class);
                Route::resource('status-employees', StatusEmployeeController::class);
                Route::resource('edus', EduController::class);
                Route::resource('sub-statuses', SubStatusController::class);
                Route::resource(
                    'competence-fanctionals',
                    CompetenceFanctionalController::class
                );
                Route::resource(
                    'competence-core-values',
                    CompetenceCoreValueController::class
                );
                Route::resource(
                    'competence-leaderships',
                    CompetenceLeadershipController::class
                );
                // Route::resource('jabatans', JabatanController::class);
                Route::resource('work-locations', WorkLocationController::class);
                Route::resource('alamat-kerjas', AlamatKerjaController::class);
                Route::resource('religions', ReligionController::class);
                Route::resource('villages', VillageController::class);
                Route::resource('districts', DistrictController::class);
                Route::resource('regencies', RegencieController::class);
                Route::resource('provinces', ProvinceController::class);
                Route::resource('direktorats', DirektoratController::class);
                Route::resource('departements', DepartementController::class);
                Route::resource('divisions', DivisionController::class);
                Route::resource('units', UnitController::class);
                Route::get('all-other-competencies', [
                    OtherCompetenciesController::class,
                    'index',
                ])->name('all-other-competencies.index');
                Route::post('all-other-competencies', [
                    OtherCompetenciesController::class,
                    'store',
                ])->name('all-other-competencies.store');
                Route::get('all-other-competencies/create', [
                    OtherCompetenciesController::class,
                    'create',
                ])->name('all-other-competencies.create');
                Route::get('all-other-competencies/{otherCompetencies}', [
                    OtherCompetenciesController::class,
                    'show',
                ])->name('all-other-competencies.show');
                Route::get('all-other-competencies/{otherCompetencies}/edit', [
                    OtherCompetenciesController::class,
                    'edit',
                ])->name('all-other-competencies.edit');
                Route::put('all-other-competencies/{otherCompetencies}', [
                    OtherCompetenciesController::class,
                    'update',
                ])->name('all-other-competencies.update');
                Route::delete('all-other-competencies/{otherCompetencies}', [
                    OtherCompetenciesController::class,
                    'destroy',
                ])->name('all-other-competencies.destroy');
            });
        }
    );



Route::prefix('erp')
    ->middleware('auth')
    ->group(
        function () {
            Route::prefix('hris')
                ->middleware('permission:hris')
                ->group(function () {
                    Route::resource('roles', RoleController::class)->middleware('permission:roles and permissions');
                    Route::resource('permissions', PermissionController::class)->middleware('permission:roles and permissions');
                    route::get('assign-user', [AsignedUserController::class, 'list'])->middleware('permission:roles and permissions')->name('assign.list');
                    route::get('assign-user/{user:id}', [AsignedUserController::class, 'sync'])->middleware('permission:roles and permissions')->name('assign.sync');

                    Route::resource('service-histories', ServiceHistoryController::class);
                    Route::prefix('riwayat_kedinasan')->group(function () {
                        Route::get('create', CreateDataKedinasan::class)->name('hrm.riwayat_kedinasan.create');
                        Route::get('{serviceHistory}/edit', UpdateDataKedinasan::class)->name('hrm.riwayat_kedinasan.edit');
                    });
                    Route::resource(
                        'assignment-histories',
                        AssignmentHistoryController::class
                    );
                    Route::prefix('riwayat-prestasi')->group(function () {
                        Route::get('create', CreateRiwayatPrestasi::class)->name('hrm.riwayat_prestasi.create');
                        Route::get('{achievementHistory}/edit', UpdateRiwayatPrestasi::class)->name('hrm.riwayat_prestasi.edit');
                    });
                    Route::prefix('riwayat_penugasan')->group(function () {
                        Route::get('create', CreateDataPenugasan::class)->name('hrm.riwayat_penugasan.create');
                        Route::get('{assignmentHistory}/edit', UpdateDataPenugasan::class)->name('hrm.riwayat_penugasan.edit');
                    });
                    Route::resource('training-histories', TrainingHistoryController::class);
                    Route::prefix('riwayat_training')->group(function () {
                        Route::get('create', CreateRiwayatTraining::class)->name('hrm.riwayat_training.create');
                        Route::get('{trainingHistory}/edit', UpdateRiwayatTraining::class)->name('hrm.riwayat_training.edit');
                    });

                    Route::resource('families', FamilyController::class);
                    Route::prefix('data_keluarga')->group(function () {
                        Route::get('create', CreateDataKeluarga::class)->name('hrm.data_keluarga.create');
                        Route::get('{family}/edit', UpdateDataKeluarga::class)->name('hrm.data_keluarga.edit');
                    });
                    Route::resource(
                        'skills-and-professions',
                        SkillsAndProfessionController::class
                    );
                    Route::resource('data-thps', DataThpController::class);
                    Route::get('all-office-facilities', [
                        OfficeFacilitiesController::class,
                        'index',
                    ])->name('all-office-facilities.index');
                    Route::post('all-office-facilities', [
                        OfficeFacilitiesController::class,
                        'store',
                    ])->name('all-office-facilities.store');
                    Route::get('all-office-facilities/create', [
                        OfficeFacilitiesController::class,
                        'create',
                    ])->name('all-office-facilities.create');
                    Route::get('all-office-facilities/{officeFacilities}', [
                        OfficeFacilitiesController::class,
                        'show',
                    ])->name('all-office-facilities.show');
                    Route::get('all-office-facilities/{officeFacilities}/edit', [
                        OfficeFacilitiesController::class,
                        'edit',
                    ])->name('all-office-facilities.edit');
                    Route::put('all-office-facilities/{officeFacilities}', [
                        OfficeFacilitiesController::class,
                        'update',
                    ])->name('all-office-facilities.update');
                    Route::delete('all-office-facilities/{officeFacilities}', [
                        OfficeFacilitiesController::class,
                        'destroy',
                    ])->name('all-office-facilities.destroy');

                    Route::resource(
                        'insurance-facilities',
                        InsuranceFacilityController::class
                    );
                    Route::resource('cash-benefits', CashBenefitController::class);
                    Route::resource(
                        'educational-backgrounds',
                        EducationalBackgroundController::class
                    );

                    Route::resource('contract-histories', ContractHistoryController::class);
                    // Route::resource('families', FamilyController::class);

                    Route::resource('users', UserController::class);
                    Route::post('users/{user}', [
                        userResignController::class,
                        'store',
                    ])->name('users.exit');
                    Route::get('employee-expired', EmployeeExpired::class)->name('employeeExpired.index');
                    Route::get('resign', Resign::class)->name('resign.index');
                    Route::prefix('employee')->group(function () {
                        Route::get('create', CreateEmployee::class)->name('hrm.employee.create');
                        Route::get('{user}/edit', UpdateEmployee::class)->name('hrm.employee.edit');
                    });
                    Route::resource(
                        'emergency-contacts',
                        EmergencyContactController::class
                    );
                    // Route::resource('profiles', ProfileController::class);

                    Route::resource(
                        'performance-appraisal-histories',
                        PerformanceAppraisalHistoryController::class
                    );
                    Route::prefix('penilaian-kinerja')->group(function () {
                        Route::get('create', CreatePenilaianKinerja::class)->name('hrm.penilaian_kinerja.create');
                        Route::get('{performanceAppraisalHistory}/edit', UpdatePenilaianKinerja::class)->name('hrm.penilaian_kinerja.edit');
                    });
                    Route::resource(
                        'achievement-histories',
                        AchievementHistoryController::class
                    );
                });

            Route::prefix('hris')
                ->middleware('role:super-admin')
                ->group(function () {
                    Route::resource('roles', RoleController::class);
                    Route::resource('permissions', PermissionController::class);
                });

            Route::prefix('procurement')
                ->middleware('role:super-admin')
                ->group(function () {
                    Route::prefix('purchase-request')->group(function () {
                        Route::get('', PrIndex::class)->name('pr.index');
                    });
                });
        }
    );
