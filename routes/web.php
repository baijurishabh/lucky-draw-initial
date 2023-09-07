<?php

use App\Events\ResetPasswordEvent;
use App\Http\Controllers\admin\AdminController;
use Questocat\Referral\Http\Middleware\CheckReferral;
use App\Http\Controllers\admin\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\admin\AuthenticationController;
use App\Http\Controllers\auth\user\AuthenticationController as UserAuthenticationController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\admin\TestimonialsController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\EnquiriesController;
use App\Http\Controllers\admin\FAQsController;
use App\Http\Controllers\admin\GrandLuckyDrawController;
use App\Http\Controllers\admin\LeadsController;
use App\Http\Controllers\admin\LuckydrawController;
use App\Http\Controllers\admin\Marketing\EmailController;
use App\Http\Controllers\Admin\Marketing\MarketingController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\PayandKYCController;
use App\Http\Controllers\admin\PaymentController;
use App\Http\Controllers\admin\PolicyController;
use App\Http\Controllers\admin\PoolController;
use App\Http\Controllers\admin\PoolDetailsController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProfileController as AdminProfileController;
use App\Http\Controllers\admin\ReferralController as AdminReferralController;
use App\Http\Controllers\admin\RefundController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\WinnerController;
use App\Http\Controllers\auth\user\GoogleController;
use App\Http\Controllers\home\HomeController as HomeHomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\payment\PaymentController as PaymentPaymentController;
use App\Http\Controllers\user\CheckoutController;
use App\Http\Controllers\user\DashboardController as UserDashboardController;
use App\Http\Controllers\user\EnquiryController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\OrderController as UserOrderController;
use App\Http\Controllers\user\PaymentController as UserPaymentController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\ReferralController;
use App\Http\Controllers\user\WinandEnquiriesController;
use App\Http\Controllers\user\WishlistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeHomeController::class, 'index'])->name('home');
Route::get('/', [HomeHomeController::class, 'index'])->middleware(CheckReferral::class);

Route::get('/lang/{locale}', function ($locale) {
    App::setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});
Route::get('/order-invoice-generate/{order_id}', [InvoiceController::class, 'orderInvoiceGenerate'])->name('orderInvoiceGenerate');
Route::get('/plan-invoice-generate/{payment_id}', [InvoiceController::class, 'planInvoiceGenerate'])->name('planInvoiceGenerate');
Route::get('/product-details/{slug}/{pool_product_id}', [HomeHomeController::class, 'productView'])->name('productView');

// user Enquiry form

Route::post('/enquiry/form', [HomeHomeController::class, 'enquiryForm'])->name('enquiryForm');

//FAQ

Route::get('/FAQs', [HomeHomeController::class, 'FAQ'])->name('faqs');

//about Us

Route::get('/aboutus', [HomeHomeController::class, 'aboutUs'])->name('aboutUs');

//policy

Route::get('/refund-policy', [PolicyController::class, 'registration_policy'])->name('refund_policy');
Route::get('/privacy-policy', [PolicyController::class, 'product_policy'])->name('privacy_policy');

// Admin Route

Route::get('admin/login', [AuthenticationController::class, 'login'])->name('adminLogin');
Route::post('admin/login', [AuthenticationController::class, 'auth'])->name('authLoginPost');

Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('admins', AdminController::class);
    //Marketing

    Route::controller(MarketingController::class)->prefix('marketing')->name('marketing.')->group(function () {
        Route::get('/users-referral-list', 'usersReferralList')->name('userReferralList');
        Route::get('/marketing-mail', 'marketingMail');
        Route::get('/users-not-purchased-plan', 'usersNotPurchasedPlan')->name('userNotPurchasedPlan');
        Route::get('/users-with-no-referral', 'usersWithNoReferral');
        Route::get('/top-selling-products', 'topSellingProducts')->name('topSellingProduct');
        Route::get('/top-selling-products-view/{uuid}', 'marketingProductView')->name('topSellingMarketingProductView');
        Route::get('/least-selling-products', 'leastSellingProducts');
        Route::get('/users-purchase-list', 'usersPurchaseList');
        Route::get('/users-joined-list', 'usersJoinedList')->name('joinedList');
        Route::get('/users-joined-date-list', 'joinedDateList')->name('joinedDateList');
        Route::get('/users-joined-date-list-view/{uuid}', 'joinedDateListView')->name('joinedDateListView');
        Route::get('/users-referral-list-view/{uuid}', 'referralListView')->name('referralListView');
    });

    //profile

    Route::get('profile/view', [AdminProfileController::class, 'adminProfile'])->name('profileView');
    Route::get('profile/update', [AdminProfileController::class, 'adminProfileUpdate'])->name('profileUpdate');
    Route::post('profile/update', [AdminProfileController::class, 'adminProfileUpdatePost'])->name('profileUpdatePost');

    // settings

    Route::get('settings/create', [SettingsController::class, 'create'])->name('settingsCreate');
    Route::post('settings/create', [SettingsController::class, 'store'])->name('settingsCreatePost');
    Route::get('settings/list', [SettingsController::class, 'list'])->name('settingsList');
    Route::get('settings/view/', [SettingsController::class, 'view'])->name('settingsView');
    Route::get('settings/edit/{uuid}', [SettingsController::class, 'edit'])->name('settingsEdit');
    Route::post('settings/edit/{uuid}', [SettingsController::class, 'update'])->name('settingsUpdate');
    Route::get('settings/delete{uuid}', [SettingsController::class, 'delete'])->name('settingsDelete');

    Route::get('/down', function () {
        Artisan::call('down');

        return "Site is now under maintanence mode";
    });
    Route::get('/up', function () {
        Artisan::call('up');

        return "Site is now live";
    });

    //  blog

    Route::get('blog/create', [BlogController::class, 'create'])->name('blogCreate');
    Route::post('blog/create', [BlogController::class, 'store'])->name('blogCreatePost');
    Route::get('blog/list', [BlogController::class, 'list'])->name('blogList');
    Route::get('blog/view/', [BlogController::class, 'view'])->name('blogView');
    Route::get('blog/edit/{uuid}', [BlogController::class, 'edit'])->name('blogEdit');
    Route::post('blog/edit/{uuid}', [BlogController::class, 'update'])->name('blogUpdate');
    Route::get('blog/delete{uuid}', [BlogController::class, 'delete'])->name('blogDelete');

    // Testimonial

    Route::get('testimony/create', [TestimonialsController::class, 'create'])->name('testimonyCreate');
    Route::post('testimony/create', [TestimonialsController::class, 'store'])->name('testimonyCreatePost');
    Route::get('testimony/list', [TestimonialsController::class, 'list'])->name('testimonyList');
    Route::get('testimony/view/', [TestimonialsController::class, 'view'])->name('testimonyView');
    Route::get('testimony/edit/{uuid}', [TestimonialsController::class, 'edit'])->name('testimonyEdit');
    Route::post('testimony/edit/{uuid}', [TestimonialsController::class, 'update'])->name('testimonyUpdate');
    Route::get('testimony/delete{uuid}', [TestimonialsController::class, 'delete'])->name('testimonyDelete');

    // category

    Route::get('category/create', [CategoryController::class, 'create'])->name('categoryCreate');
    Route::post('category/create', [CategoryController::class, 'store'])->name('categoryCreatePost');
    Route::get('category/list', [CategoryController::class, 'list'])->name('categoryList');
    Route::get('category/view/', [CategoryController::class, 'view'])->name('categoryView');
    Route::get('category/edit/{uuid}', [CategoryController::class, 'edit'])->name('categoryEdit');
    Route::post('category/edit/{uuid}', [CategoryController::class, 'update'])->name('categoryUpdate');
    Route::get('category/delete{uuid}', [CategoryController::class, 'delete'])->name('categoryDelete');

    // product

    Route::get('product/create', [ProductController::class, 'create'])->name('productCreate');
    Route::post('product/create', [ProductController::class, 'store'])->name('productCreatePost');
    Route::get('product/list', [ProductController::class, 'list'])->name('productList');
    Route::get('product/view/', [ProductController::class, 'view'])->name('productView');
    Route::get('product/edit/{uuid}', [ProductController::class, 'edit'])->name('productEdit');
    Route::post('product/edit/{uuid}', [ProductController::class, 'update'])->name('productUpdate');
    Route::get('product/delete{uuid}', [ProductController::class, 'delete'])->name('productDelete');

    //pool

    Route::get('pool/create', [PoolController::class, 'create'])->name('poolCreate');
    Route::post('pool/create', [PoolController::class, 'store'])->name('poolCreatePost');
    Route::get('pool/list', [PoolController::class, 'list'])->name('poolList');
    Route::get('pool/view/', [PoolController::class, 'view'])->name('poolView');
    Route::get('pool/edit/{uuid}', [PoolController::class, 'edit'])->name('poolEdit');
    Route::get('pool/active/list/{uuid}', [PoolController::class, 'active'])->name('poolActiveList');
    Route::post('pool/edit/{uuid}', [PoolController::class, 'update'])->name('poolUpdate');
    Route::get('pool/delete{uuid}', [PoolController::class, 'delete'])->name('poolDelete');

    //grand pool

    Route::get('grand/pool/create', [GrandLuckyDrawController::class, 'create'])->name('grandpoolCreate');
    Route::post('grand/pool/create', [GrandLuckyDrawController::class, 'store'])->name('grandpoolCreatePost');
    Route::get('grand/pool/list', [GrandLuckyDrawController::class, 'grand_pool_list'])->name('grandpoolList');
    Route::get('grand/luckydraw/enquiries/list/{uuid}', [GrandLuckyDrawController::class, 'enyuiryList'])->name('grandluckyDrawSpinList');
    Route::get('grand/pool/winner/delete/{uuid}', [GrandLuckyDrawController::class, 'delete'])->name('grandpoolWinnerDelete');

    // pooldetails

    Route::get('pool/details/create/{uuid}', [PoolDetailsController::class, 'create'])->name('poolDetailsCreate');
    Route::post('pool/details/create/store', [PoolDetailsController::class, 'store'])->name('poolDetailsCreatePost');
    Route::get('pool/details/list', [PoolDetailsController::class, 'list'])->name('poolDetailsList');
    Route::get('pool/details/product/list/{id}', [PoolDetailsController::class, 'pool_products_list'])->name('poolDetailsProductsList');
    Route::get('pool/details/view/', [PoolDetailsController::class, 'view'])->name('poolDetailsView');
    Route::get('pool/details/edit/{uuid}', [PoolDetailsController::class, 'edit'])->name('poolDetailsEdit');
    Route::post('pool/details/edit/{uuid}', [PoolDetailsController::class, 'update'])->name('poolDetailsUpdate');
    Route::get('pool/details/delete/{uuid}', [PoolDetailsController::class, 'delete'])->name('poolDetailsstDelete');

    // enquiry

    Route::get('enquiries/create/{uuid}', [EnquiriesController::class, 'create'])->name('enquiriesCreate');
    Route::post('enquiries/create/{uuid}', [EnquiriesController::class, 'store'])->name('enquiriesCreatePost');
    Route::get('enquiries/list', [EnquiriesController::class, 'list'])->name('enquiriesList');
    Route::get('enquiries/view/', [EnquiriesController::class, 'view'])->name('enquiriesView');
    Route::get('enquiries/edit/{uuid}', [EnquiriesController::class, 'edit'])->name('enquiriesEdit');
    Route::post('enquiries/edit/{uuid}', [EnquiriesController::class, 'update'])->name('enquiriesUpdate');
    Route::get('enquiries/delete/{uuid}', [EnquiriesController::class, 'delete'])->name('enquiriesDelete');

    Route::get('luckydraw/list', [LuckydrawController::class, 'list'])->name('luckyDrawList');
    Route::get('luckydraw/enquiries/list/{uuid}', [LuckydrawController::class, 'enyuiryList'])->name('luckyDrawSpinList');
    Route::get('luckydraw/winners/list/{uuid}', [LuckydrawController::class, 'winner_list'])->name('luckyDrawWinnerList');
    Route::get('luckydraw/winner/{uuid}', [LuckydrawController::class, 'winner'])->name('luckyDrawWinner');
    Route::get('grand/luckydraw/winner/{uuid}', [GrandLuckyDrawController::class, 'grand_lucky_draw'])->name('grandluckyDrawWinner');
    Route::get('luckydraw/canidates/list/{uuid}', [LuckydrawController::class, 'canidates_list'])->name('luckyDrawCanidatesList');

    //winner

    Route::get('winner/Redeeed/list', [WinnerController::class, 'list_redeemed'])->name('winnerRedeeedList');
    Route::get('winner/Pending/list', [WinnerController::class, 'list_pending'])->name('winnerPendingList');
    Route::get('winner/Expired/list', [WinnerController::class, 'list_expired'])->name('winnerExpiredList');
    Route::get('winner/delete/{uuid}', [WinnerController::class, 'delete'])->name('winnerDelete');
    Route::get('winner', [LuckydrawController::class, 'testwinner'])->name('winnerTest');

    //grand winner

    Route::get('grand/winner/Redeeed/list', [GrandLuckyDrawController::class, 'grand_list_redeemed'])->name('grandwinnerRedeeedList');
    Route::get('grand/winner/Pending/list', [GrandLuckyDrawController::class, 'grand_list_pending'])->name('grandwinnerPendingList');
    Route::get('grand/winner/Expired/list', [GrandLuckyDrawController::class, 'grand_list_expired'])->name('grandwinnerExpiredList');
    Route::get('grand/luckydraw/winners/single-product/list/{uuid}', [LuckydrawController::class, 'winner_list'])->name('grandluckyDrawSingleProductWinnerList');

    //user and kyc

    Route::get('user/list', [PayandKYCController::class, 'list'])->name('userList');
    Route::get('user/activate/{uuid}', [PayandKYCController::class, 'acc_activate'])->name('userAccactivate');
    Route::get('user/disable/{uuid}', [PayandKYCController::class, 'acc_disable'])->name('userAccdisable');
    Route::get('user/kyc/{uuid}', [PayandKYCController::class, 'kyc_status'])->name('userKycactivate');
    Route::get('user/kyc/view/{uuid}', [PayandKYCController::class, 'view'])->name('userKycView');
    Route::get('user/kyc/details/edit/{uuid}', [PayandKYCController::class, 'edit'])->name('userKycEdit');
    Route::post('user/kyc/details/edit/{uuid}', [PayandKYCController::class, 'update'])->name('userKycUpdate');
    Route::get('user/kyc/details/delete/{uuid}', [PayandKYCController::class, 'delete'])->name('userKycDelete');

    //order controller

    Route::get('order/list', [OrderController::class, 'list'])->name('orderList');
    Route::get('order/completed/list', [OrderController::class, 'list_Completed'])->name('orderCompletedList');
    Route::get('order/view/{id}', [OrderController::class, 'view'])->name('orderView');
    Route::get('order/edit/{id}', [OrderController::class, 'edit'])->name('orderEdit');
    Route::post('order/edit/{id}', [OrderController::class, 'update'])->name('orderEditUpdate');
    Route::get('order/delete/{id}', [OrderController::class, 'delete'])->name('orderDelete');
    Route::get('order/shipping/status/{uuid}/{id}', [OrderController::class, 'shipping_status'])->name('orderShippingStatus');

    Route::controller(RefundController::class)->prefix('refund')->name('refund.')->group(function () {
        Route::get('/list/pending', 'refund')->name('pendingList');
        Route::get('/list/completed', 'payed_refund')->name('completedList');
        Route::get('/list/status/{uuid}', 'payment_refunded_status')->name('refundStatus');

    });

    //payment Controller

    Route::get('payment/plan/list', [PaymentController::class, 'list'])->name('paymentPlanList');
    Route::get('payment/product/list', [PaymentController::class, 'list_product'])->name('paymentProductList');
    Route::get('payment/delete/{id}', [PaymentController::class, 'delete'])->name('paymentDelete');

    //referral

    Route::get('referral/user/list/{uuid}', [AdminReferralController::class, 'list'])->name('referralUserList');

    //policy

    Route::get('/policy/registration/list', [PolicyController::class, 'registration_policy_list'])->name('registration_policylist');
    Route::get('/policy/registration', [PolicyController::class, 'registration_policy_form'])->name('registration_policyCreate');
    Route::post('/policy/registration', [PolicyController::class, 'registration_policy_create'])->name('registration_policyPost');
    Route::get('/policy/registration/edit/{id}', [PolicyController::class, 'registration_policy_edit'])->name('registration_policyEdit');
    Route::post('/policy/registration/edit/{id}', [PolicyController::class, 'registration_policy_update'])->name('registration_policyUpdate');
    Route::get('/policy/registration/delete/{id}', [PolicyController::class, 'delete'])->name('policyDelete');

    //FAQs

    Route::get('/faqs/list', [FAQsController::class, 'list'])->name('faqlist');
    Route::get('/faqs/create', [FAQsController::class, 'create'])->name('faqCreate');
    Route::post('/faqs/create', [FAQsController::class, 'store'])->name('faqCreatePost');
    Route::get('/faqs/edit/{id}', [FAQsController::class, 'reply'])->name('faqEdit');
    Route::post('/faqs/edit/{id}', [FAQsController::class, 'reply_update'])->name('faqEditPost');
    Route::get('/faqs/delete/{id}', [FAQsController::class, 'delete'])->name('faqDelete');

    //leads

    Route::get('/leads/list', [LeadsController::class, 'list'])->name('leadslist');

    //Marketing Email templates

    Route::get('/marketing-template/list', [EmailController::class, 'list'])->name('marketingTemplatelist');
    Route::get('/marketing-template/create', [EmailController::class, 'create'])->name('marketingTemplateCreate');
    Route::post('/marketing-template/create', [EmailController::class, 'store'])->name('marketingTemplateCreatePost');
    Route::get('/marketing-template/edit/{uuid}', [EmailController::class, 'edit'])->name('marketingTemplateEdit');
    Route::post('/marketing-template/edit/{uuid}', [EmailController::class, 'update'])->name('marketingTemplateEditPost');
    Route::get('/marketing-template/delete/{uuid}', [EmailController::class, 'delete'])->name('marketingTemplateDelete');
    Route::get('/marketing-template/send-campaign/{uuid}', [EmailController::class, 'sendCampaign'])->name('marketingTemplateSendCampaign');

    Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
});

// User Routes

Route::get('login', [UserAuthenticationController::class, 'login'])->name('userLogin');
Route::post('login', [UserAuthenticationController::class, 'auth'])->name('authuserLogin');

Route::get('register', [UserAuthenticationController::class, 'register'])->name('userRegister');
Route::post('register', [UserAuthenticationController::class, 'registerPost'])->name('authuserRegister');

Route::controller(GoogleController::class)->group(function () {
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('login/google/callback', 'handleGoogleCallback');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'user', 'as' => 'user.'], function () {

    Route::get('dashboard', [UserDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('usertest', [HomeController::class, 'user'])->name('usertest');
    Route::get('user-enquiry/{uuid}', [EnquiryController::class, 'store'])->name('userEnquiry');
    Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('profile/update', [ProfileController::class, 'update'])->name('profileUpdate');
    Route::post('profile/update', [ProfileController::class, 'store'])->name('profileStore');

    //products

    Route::get('enquiry-list', [UserDashboardController::class, 'enquiry_list'])->name('enquiryList');
    Route::get('enquiry/delete/{uuid}', [UserDashboardController::class, 'enquiry_delete'])->name('enquiryDelete');

    // Enquiry and Details

    Route::get('wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');
    Route::get('referral-list', [ReferralController::class, 'list'])->name('referralList');

    //pool wins

    Route::get('pool/win', [WinandEnquiriesController::class, 'wins'])->name('poolWins');
    Route::get('grand/pool/win', [WinandEnquiriesController::class, 'grand_wins'])->name('grandpoolWins');

    Route::get('rewards/win', [WinandEnquiriesController::class, 'rewards_wins'])->name('rewardspoolWins');


    Route::get('payments', [UserPaymentController::class, 'list'])->name('paymentList');

    // checkout

    Route::get('checkout/{uuid}', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('checkout/{uuid}', [CheckoutController::class, 'store'])->name('checkoutStore');

    Route::get('checkout/grand/{uuid}', [CheckoutController::class, 'grand_checkout'])->name('grand_checkout');
    Route::post('checkout/grand/{uuid}', [CheckoutController::class, 'grand_store'])->name('grand_checkoutStore');

    Route::get('order/list', [UserOrderController::class, 'list'])->name('orderList');
    Route::get('logout', [UserAuthenticationController::class, 'logout'])->name('logout');
});

// payment

Route::get('payment', [PaymentPaymentController::class, 'payment'])->name('payment');
Route::post('payment-initiate', [PaymentPaymentController::class, 'paymentInitiate'])->name('paymentInitiate');
Route::post('payment-response', [PaymentPaymentController::class, 'paymentResponse'])->name('paymentResponse');


// notification

Route::get('/send', [App\Http\Controllers\notification\AlertController::class, 'send'])->name('home.send');


Route::get('/forgot-password', function () {
    return view('user.auth.forgot-password');
})->name('forgotPassword');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
    $status = Password::sendResetLink(
        $request->only('email')
    );
    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
});

Route::get('/reset-password/{token}', function ($token) {
    return view('user.auth.reset-password', ['token' => $token]);
})->name('password.reset');

Route::post('/reset-password/{token}', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
    ]);
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
            $user->save();
            event(new ResetPasswordEvent($user));
        }
    );
    return $status === Password::PASSWORD_RESET
        ? redirect()->route('userLogin')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->name('password.update');


// Clear application cache:
Route::get('/1', function () {
    Artisan::call('cache:clear');
    return 'Application cache has been cleared';
});

//Clear route cache:
Route::get('/2', function () {
    Artisan::call('route:cache');
    return 'Routes cache has been cleared';
});

//Clear config cache:
Route::get('/3', function () {
    Artisan::call('config:cache');
    return 'Config cache has been cleared';
});
Route::get('/optimize', function () {
    Artisan::call('optimize');
    return 'Optimize done';
});
// Clear view cache:
Route::get('/4', function () {
    Artisan::call('view:clear');
    return 'View cache has been cleared';
});
Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'Storage Linked';
});
