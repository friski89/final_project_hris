<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EduController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\DataThpController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VillageController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JobTitleController;
use App\Http\Controllers\JobGradeController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RegencieController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\JobFamilyController;
use App\Http\Controllers\SubStatusController;
use App\Http\Controllers\DirektoratController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\CityRecuiteController;
use App\Http\Controllers\CompanyHostController;
use App\Http\Controllers\CompanyHomeController;
use App\Http\Controllers\JobFunctionController;
use App\Http\Controllers\CashBenefitController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\AlamatKerjaController;
use App\Http\Controllers\BandPositionController;
use App\Http\Controllers\WorkLocationController;
use App\Http\Controllers\StatusEmployeeController;
use App\Http\Controllers\ServiceHistoryController;
use App\Http\Controllers\TrainingHistoryController;
use App\Http\Controllers\ContractHistoryController;
use App\Http\Controllers\OfficeFacilitiesController;
use App\Http\Controllers\EmergencyContactController;
use App\Http\Controllers\AssignmentHistoryController;
use App\Http\Controllers\InsuranceFacilityController;
use App\Http\Controllers\OtherCompetenciesController;
use App\Http\Controllers\AchievementHistoryController;
use App\Http\Controllers\CompetenceCoreValueController;
use App\Http\Controllers\SkillsAndProfessionController;
use App\Http\Controllers\CompetenceLeadershipController;
use App\Http\Controllers\CompetenceFanctionalController;
use App\Http\Controllers\EducationalBackgroundController;
use App\Http\Controllers\Import\EmployeeImportController;
use App\Http\Controllers\PerformanceAppraisalHistoryController;
use App\Http\Livewire\Dashboard\Home;
use App\Http\Livewire\Hris\DataKedinasan\CreateDataKedinasan;
use App\Http\Livewire\Hris\DataKedinasan\UpdateDataKedinasan;
use App\Http\Livewire\Hris\DataPenugasan\CreateDataPenugasan;
use App\Http\Livewire\Hris\DataPenugasan\UpdateDataPenugasan;
use App\Http\Livewire\Hris\PenilaianKinerja\CreatePenilaianKinerja;
use App\Http\Livewire\Hris\PenilaianKinerja\UpdatePenilaianKinerja;
use App\Http\Livewire\Hris\RiwayatPrestasi\CreateRiwayatPrestasi;
use App\Http\Livewire\Hris\RiwayatPrestasi\UpdateRiwayatPrestasi;
use App\Http\Livewire\Hris\RiwayatTraining\CreateRiwayatTraining;
use App\Http\Livewire\Hris\RiwayatTraining\UpdateRiwayatTraining;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('dashboard', Home::class)->middleware('auth')->name('dashboard.home');

Route::prefix('import_data')->middleware('auth')->group(function () {
    Route::prefix('employee')->group(function () {
        Route::post('import', [EmployeeImportController::class, 'store'])->name('import.employee');
    });
});

Route::prefix('master_data')
    ->middleware('auth')
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
                ->middleware('auth')
                ->group(function () {
                    Route::resource('roles', RoleController::class);
                    Route::resource('permissions', PermissionController::class);

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
                    Route::resource('families', FamilyController::class);
                    Route::resource('users', UserController::class);
                    Route::resource(
                        'emergency-contacts',
                        EmergencyContactController::class
                    );
                    Route::resource('profiles', ProfileController::class);
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
        }
    );
