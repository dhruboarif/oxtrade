<?php

use App\Http\Controllers\Backend\AppController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CustomCssController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DepositController;
use App\Http\Controllers\Backend\EmailTemplateController;
use App\Http\Controllers\Backend\GatewayController;
use App\Http\Controllers\Backend\InvestmentController;
use App\Http\Controllers\Backend\KycController;
use App\Http\Controllers\Backend\LanguageController;
use App\Http\Controllers\Backend\LevelReferralController;
use App\Http\Controllers\Backend\NavigationController;
use App\Http\Controllers\Backend\NotificationController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\PluginController;
use App\Http\Controllers\Backend\ProfitController;
use App\Http\Controllers\Backend\RankingController;
use App\Http\Controllers\Backend\ReferralController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\ScheduleController;
use App\Http\Controllers\Backend\SchemaController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SmsController;
use App\Http\Controllers\Backend\SocialController;
use App\Http\Controllers\Backend\StaffController;
use App\Http\Controllers\Backend\ThemeController;
use App\Http\Controllers\Backend\TicketController;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\WithdrawController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Admin Dashboard
Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

//===============================  Customer Management ==================================
Route::resource('user', UserController::class)->only('index', 'edit', 'update');
Route::group(['prefix' => 'user', 'as' => 'user.', 'controller' => UserController::class], function () {
    Route::get('active', 'activeUser')->name('active');
    Route::get('disabled', 'disabled')->name('disabled');
    Route::get('login/{id}', 'userLogin')->name('login');
    Route::post('status-update/{id}', 'statusUpdate')->name('status-update');
    Route::post('password-update/{id}', 'passwordUpdate')->name('password-update');
    Route::post('balance-update/{id}', 'balanceUpdate')->name('balance-update');
    Route::get('mail-send/all', 'mailSendAll')->name('mail-send.all');
    Route::post('mail-send', 'mailSend')->name('mail-send');
    Route::get('transaction/{id}', 'transaction')->name('transaction');
});

Route::resource('kyc-form', KycController::class);
Route::group(['prefix' => 'kyc', 'as' => 'kyc.', 'controller' => KycController::class], function () {
    Route::get('pending', 'KycPending')->name('pending');
    Route::get('rejected', 'KycRejected')->name('rejected');
    Route::get('action/{id}', 'depositAction')->name('action');
    Route::post('action-now', 'actionNow')->name('action.now');
    Route::get('all', 'kycAll')->name('all');

});

//===============================  Role Management ==================================
Route::resource('roles', RoleController::class)->except('show', 'destroy');
Route::resource('staff', StaffController::class)->except('show', 'destroy', 'create');

//===============================  Plans Management ==================================
Route::resource('schedule', ScheduleController::class)->except('show', 'destroy', 'create');
Route::resource('schema', SchemaController::class)->except('show', 'destroy');

//===============================  Transactions ==================================
Route::get('transactions/{id?}', [TransactionController::class, 'transactions'])->name('transactions');
Route::get('investments/{id?}', [InvestmentController::class, 'investments'])->name('investments');
Route::get('all-profits/{id?}', [ProfitController::class, 'allProfits'])->name('all-profits');

//===============================  Essentials ==================================

Route::group(['prefix' => 'gateway', 'as' => 'gateway.', 'controller' => GatewayController::class], function () {
    Route::get('/automatic', 'automatic')->name('automatic');
    Route::post('update/{id}', 'update')->name('update')->withoutMiddleware('XSS');
    Route::get('currency/{gateway_id}', 'gatewayCurrency')->name('supported.currency');
});
Route::group(['prefix' => 'deposit', 'as' => 'deposit.', 'controller' => DepositController::class], function () {
    //=============================== deposit Method ================================
    Route::group(['prefix' => 'method', 'as' => 'method.'], function () {
        Route::get('list/{type}', 'methodList')->name('list');
        Route::get('create/{type}', 'createMethod')->name('create');
        Route::post('store', 'methodStore')->name('store')->withoutMiddleware('XSS');
        Route::get('edit/{type}', 'methodEdit')->name('edit');
        Route::post('update/{id}', 'methodUpdate')->name('update')->withoutMiddleware('XSS');
    });
    //=============================== end deposit Method ================================

    Route::get('manual-pending', 'pending')->name('manual.pending');
    Route::get('history', 'history')->name('history');
    Route::get('action/{id}', 'depositAction')->name('action');
    Route::post('action-now', 'actionNow')->name('action.now');
});
Route::group(['prefix' => 'withdraw', 'as' => 'withdraw.', 'controller' => WithdrawController::class], function () {
    //=============================== withdraw Method ================================

    Route::group(['prefix' => 'method', 'as' => 'method.'], function () {
        Route::get('list/{type}', 'methods')->name('list');
        Route::get('create/{type}', 'methodCreate')->name('create');
        Route::post('store', 'methodStore')->name('store')->withoutMiddleware('XSS');
        Route::get('edit/{type}', 'methodEdit')->name('edit');
        Route::post('update/{id}', 'methodUpdate')->name('update')->withoutMiddleware('XSS');
    });

    //Schedule
    Route::get('schedule', 'schedule')->name('schedule');
    Route::post('schedule-update', 'scheduleUpdate')->name('schedule.update');

    Route::get('history', 'history')->name('history');
    Route::get('pending', 'pending')->name('pending');

    Route::get('action/{id}', 'withdrawAction')->name('action');
    Route::post('action-now', 'actionNow')->name('action.now');

});
Route::group(['prefix' => 'referral', 'as' => 'referral.', 'controller' => ReferralController::class], function () {
    Route::get('index', 'index')->name('index');
    Route::post('store', 'store')->name('store');
    Route::post('update', 'update')->name('update');
    Route::post('delete', 'delete')->name('delete');

    Route::get('target', 'target')->name('target');
    Route::post('target-store', 'targetStore')->name('target-store');
    Route::post('target-update', 'targetUpdate')->name('target-update');

    //level referral
    Route::resource('level', LevelReferralController::class)->except('create', 'show', 'edit');
    Route::post('level-status', [LevelReferralController::class, 'statusUpdate'])->name('level-status');
});
Route::resource('ranking', RankingController::class)->only('index', 'store', 'update');

//===============================  Site Essentials ==================================

Route::group(['prefix' => 'theme', 'as' => 'theme.', 'controller' => ThemeController::class], function () {

    Route::get('site', 'siteTheme')->name('site');
    Route::get('dynamic-landing', 'dynamicLanding')->name('dynamic-landing');

    Route::get('status-update', 'statusUpdate')->name('status-update');

    Route::post('dynamic-landing-update', 'dynamicLandingUpdate')->name('dynamic-landing-update');
    Route::get('dynamic-landing-status-update', 'dynamicLandingStatusUpdate')->name('dynamic-landing-status-update');
    Route::post('dynamic-landing-delete/{id}', 'dynamicLandingDelete')->name('dynamic-landing-delete');
});

Route::group(['prefix' => 'navigation', 'as' => 'navigation.', 'controller' => NavigationController::class], function () {
    Route::get('menu', 'index')->name('menu');
    Route::post('menu-add', 'store')->name('menu.add');
    Route::get('menu-edit/{id}', 'edit')->name('menu.edit');
    Route::post('menu-update', 'update')->name('menu.update');
    Route::post('menu-delete', 'delete')->name('menu.delete');
    Route::get('menu-delete/{id}/{type}', 'typeDelete')->name('menu.type.delete');
    Route::post('menu-position-update', 'positionUpdate')->name('position.update');

    Route::get('header', 'header')->name('header');
    Route::get('footer', 'footer')->name('footer');

    Route::get('translate/{id}', 'translate')->name('translate');
    Route::post('translate', 'translateNow')->name('translate.now');
});
Route::group(['prefix' => 'page', 'as' => 'page.', 'controller' => PageController::class], function () {
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store')->withoutMiddleware('XSS');
    Route::get('edit/{name}', 'edit')->name('edit');
    Route::post('update', 'update')->name('update')->withoutMiddleware('XSS');
    Route::post('delete/now', 'deleteNow')->name('delete.now');

    Route::get('section/{section}', 'landingSection')->name('section.section');
    Route::post('section/update', 'landingSectionUpdate')->name('section.section.update');
    Route::post('content-store', 'contentStore')->name('content-store');
    Route::get('content-edit/{id}', 'contentEdit')->name('content-edit');
    Route::post('content-update', 'contentUpdate')->name('content-update');
    Route::post('content-delete', 'contentDelete')->name('content-delete');

    Route::resource('blog', BlogController::class)->except('show')->withoutMiddleware('XSS');

    Route::get('settings', 'pageSetting')->name('setting');
    Route::post('setting-update', 'pageSettingUpdate')->name('setting.update');
});
Route::get('footer-content', [PageController::class, 'footerContent'])->name('footer-content');

Route::group(['prefix' => 'social', 'as' => 'social.', 'controller' => SocialController::class], function () {
    Route::post('store', 'store')->name('store');
    Route::post('update', 'update')->name('update');
    Route::post('delete', 'delete')->name('delete');
    Route::post('position-update', 'positionUpdate')->name('position.update');
});

//===============================  site Settings ==================================
Route::group(['prefix' => 'settings', 'as' => 'settings.', 'controller' => SettingController::class], function () {
    Route::get('site', 'siteSetting')->name('site');
    Route::get('mail', 'mailSetting')->name('mail');
    Route::post('mail-connection-test', 'mailConnectionTest')->name('mail.connection.test');
    Route::post('update', 'update')->name('update');

    Route::get('plugin/{name}', [PluginController::class, 'plugin'])->name('plugin');
    Route::get('plugin-data/{id}', [PluginController::class, 'pluginData'])->name('plugin.data');
    Route::post('plugin-update/{id}', [PluginController::class, 'update'])->name('plugin.update');

    //notification tune
    Route::group(['prefix' => 'notification', 'as' => 'notification.', 'controller' => NotificationController::class], function () {
        Route::get('tune', 'setTune')->name('tune');
        Route::get('tune/status/{id}', 'status')->name('tune.status');
    });

});

// show all notifications
Route::get('notification/all', [NotificationController::class, 'all'])->name('notification.all');
Route::get('latest-notification', [NotificationController::class, 'latestNotification'])->name('latest-notification');
Route::get('notification-read/{id}', [NotificationController::class, 'readNotification'])->name('read-notification');

Route::resource('language', LanguageController::class);
Route::get('language-keyword/{language}', [LanguageController::class, 'languageKeyword'])->name('language-keyword');
Route::post('language-keyword-update', [LanguageController::class, 'keywordUpdate'])->name('language-keyword-update');
Route::get('language-sync-missing', [LanguageController::class, 'syncMissing'])->name('language-sync-missing');

Route::get('email-template', [EmailTemplateController::class, 'index'])->name('email-template');
Route::get('email-template-edit/{id}', [EmailTemplateController::class, 'edit'])->name('email-template-edit');
Route::post('email-template-update', [EmailTemplateController::class, 'update'])->name('email-template-update');

Route::group(['prefix' => 'template', 'as' => 'template.'], function () {
    Route::group(['prefix' => 'sms', 'as' => 'sms.', 'controller' => SmsController::class], function () {
        Route::get('/', 'template')->name('index');
        Route::get('template-edit/{id}', 'edit_template')->name('template-edit');
        Route::post('template-update', 'update_template')->name('template-update');

    });

    Route::group(['prefix' => 'notification', 'as' => 'notification.', 'controller' => NotificationController::class], function () {
        Route::get('/', 'template')->name('index');
        Route::get('template-edit/{id}', 'editTemplate')->name('template-edit');
        Route::post('template-update', 'updateTemplate')->name('template-update');
    });
});

//===============================  Others ==================================
Route::group(['controller' => AppController::class], function () {
    Route::get('subscribers', 'subscribers')->name('subscriber');
    Route::get('mail-send-subscriber', 'mailSendSubscriber')->name('mail.send.subscriber');
    Route::post('mail-send-subscriber-now', 'mailSendSubscriberNow')->name('mail.send.subscriber.now');
});
Route::group(['prefix' => 'support-ticket', 'as' => 'ticket.', 'controller' => TicketController::class], function () {
    Route::get('index/{id?}', 'index')->name('index');
    Route::post('reply', 'reply')->name('reply');
    Route::get('show/{uuid}', 'show')->name('show');
    Route::get('close-now/{uuid}', 'closeNow')->name('close.now');
});
Route::get('custom-css', [CustomCssController::class, 'customCss'])->name('custom-css');
Route::post('custom-css-update', [CustomCssController::class, 'customCssUpdate'])->name('custom-css.update');

//admin self manage
Route::get('profile', [AppController::class, 'profile'])->name('profile');
Route::post('profile-update', [AppController::class, 'profileUpdate'])->name('profile-update');

Route::get('password-change', [AppController::class, 'passwordChange'])->name('password-change');
Route::post('password-update', [AppController::class, 'passwordUpdate'])->name('password-update');

Route::get('application-info', [AppController::class, 'applicationInfo'])->name('application-info');
Route::get('clear-cache', [AppController::class, 'clearCache'])->name('clear-cache');

Route::post('logout', [AuthController::class, 'logout'])->name('logout')->withoutMiddleware('isDemo');
