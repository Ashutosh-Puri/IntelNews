<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\LiveTvsController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\NewsPostController;
use App\Http\Controllers\Frontend\ReviewsController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\SeoSettingController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\PhotoGalleryController;
use App\Http\Controllers\Backend\VideoGalleriesController;
use App\Http\Controllers\Backend\RoleInPermissionController;

// FRONTEND PAGE ROUTE

Route::controller(IndexController::class)->group(function () {

    Route::get('/', 'Index')->name('home.index');
    Route::get('/news/details/{id}/{slug}', 'NewsDetails')->name('news.details');
    Route::get('/news/category/{id}/{slug}', 'CatWiseNews')->name('catwise.news');
    Route::get('/news/subcategory/{id}/{slug}', 'SubCatWiseNews')->name('sub.catwise.news');
    Route::get('/lang/change', 'ChangeLang')->name('changeLang');
    Route::post('/search', 'SearchByDate')->name('search-by-date');
    Route::post('/search/news', 'SearchNews')->name('news.search');
    
    Route::get('/reporter/all/news/{id}', 'RepporterAllNews')->name('reporter.all.news');

});

Route::controller(ReviewsController::class)->group(function () {

    Route::post('/reviews', 'StoreReview')->name('store.review');

});



// ============================================
// ============================================
// ============================================
// ============================================
// ============================================
// BACKEND ADMIN ROUTE
// ============================================
// ============================================
// ============================================
// ============================================
// ============================================
// ============================================

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/login', 'AdminLogin')->middleware(RedirectIfAuthenticated::class)->name('admin.login');
    Route::get('/admin/dashboard', 'AdminDashboard')->name('admin.dashboard');
    Route::get('/admin/logout', 'AdminLogout')->name('admin.logout');
    Route::get('/admin/logout/page', 'AdminLogoutPage')->name('admin.logout.page');
});

Route::middleware('auth')->group(function () {

    Route::controller(UserController::class)->group(function () {
        Route::get('/dashboard', 'UserDashboard')->name('user.dashboard');
        Route::post('/user/profile/store', 'UserProfileStore')->name('user.store.profile');
        Route::get('/user/change/password', 'UserChangePassword')->name('user.change.password');
        Route::post('/user/change/password/store', 'UserChangePasswordStore')->name('user.change.password.store');
        Route::get('/user/logout', 'UserLogout')->name('user.logout');
        Route::get('/user/delete/profile/photo/{id}', 'UserDeleteProfilePhoto')->name('user.delete.profile.photo');
    });

});


Route::middleware('auth','role:admin')->group(function () {

        // Backend Admin User Controller

        Route::controller(AdminController::class)->group(function () {
            
            Route::get('/admin/profile', 'AdminProfile')->name('admin.profile');
            Route::get('/admin/change/password', 'AdminChangePassword')->name('admin.change.password');
            Route::post('/admin/update/password', 'AdminUpdatePassword')->name('admin.update.password');
            Route::post('/admin/profile/store', 'AdminProfileStore')->name('admin.store.profile');
            Route::get('/admin/delete/profile/photo/{id}', 'AdminDeleteProfilePhoto')->name('admin.delete.profile.photo');

            Route::get('/all/admin', 'AllAdmin')->name('all.admin');
            Route::get('/add/admin', 'AddAdmin')->name('add.admin');
            Route::post('/store/admin', 'StoreAdmin')->name('store.admin');
            Route::get('/edit/admin/{id}', 'EditAdmin')->name('edit.admin');
            Route::put('/upadte/admin/{id}','UpdateAdmin')->name('update.admin');
            Route::get('/delete/admin/{id}', 'DeleteAdmin')->name('delete.admin');
            Route::get('/active/admin/{id}', 'ActiveAdminUser')->name('active.admin.user');
            Route::get('/inactive/admin/{id}', 'InactiveAdminUser')->name('inactive.admin.user');
            
    
        });
    
        // Backend User Controller
    
        Route::controller(UserController::class)->group(function () {
    
            Route::get('/all/user', 'AllUser')->name('all.user');
            Route::get('/add/user', 'AddUser')->name('add.user');
            Route::post('/store/user', 'StoreUser')->name('store.user');
            Route::get('/edit/user/{id}', 'EditUser')->name('edit.user');
            Route::put('/upadte/user/{id}','UpdateUser')->name('update.user');
            Route::get('/delete/user/{id}', 'DeleteUser')->name('delete.user');
            Route::get('/active/user/{id}', 'ActiveUser')->name('active.user');
            Route::get('/inactive/user/{id}', 'InactiveUser')->name('inactive.user');

        });
    // Category Controller

    Route::controller(CategoryController::class)->group(function () {

        Route::get('/all/category', 'AllCategory')->name('all.category');
        Route::get('/add/category', 'AddCategory')->name('add.category');
        Route::post('/category/store', 'StoreCategory')->name('category.store');
        Route::get('/edit/category/{id}', 'EditCategory')->name('edit.category');
        Route::post('/category/updat/{id}', 'UpdateCategory')->name('category.update');
        Route::get('/delete/category/{id}', 'DeleteCategory')->name('delete.category');
        Route::get('/subcategory/ajax/{category_id}','GetSubCategory');

    });

    // Sub Category Controller

    Route::controller(SubcategoryController::class)->group(function () {

        Route::get('/all/sub/category', 'AllSubCategory')->name('all.sub.category');
        Route::get('/add/sub/category', 'AddSubCategory')->name('add.sub.category');
        Route::post('/sub/category/store', 'StoreSubCategory')->name('sub.category.store');
        Route::get('/edit/sub/category/{id}', 'EditSubCategory')->name('edit.sub.category');
        Route::post('/sub/category/update/{id}', 'UpdateSubCategory')->name('sub.category.update');
        Route::get('/delete/sub/category/{id}', 'DeleteSubCategory')->name('delete.sub.category');

    });



    // News Post Controller

    Route::controller(NewsPostController::class)->group(function () {

        Route::get('/all/news/post', 'AllNewsPost')->name('all.news.post');
        Route::get('/add/news/post', 'AddNewsPost')->name('add.news.post');
        Route::post('/store/news/post', 'StoreNewsPost')->name('news.post.store');
        Route::get('/edit/news/post/{id}', 'EditNewsPost')->name('edit.news.post');
        Route::post('/update/news/post/{id}', 'UpdateNewsPost')->name('news.post.update');
        Route::get('/delete/news/post/{id}', 'DeleteNewsPost')->name('delete.news.post'); 
        Route::get('/active/news/post/{id}', 'ActiveNewsPost')->name('active.news.post');    
        Route::get('/inactive/news/post/{id}', 'InactiveNewsPost')->name('inactive.news.post');
        
    });

    // Banner Controller

    Route::controller(BannerController::class)->group(function () {

        Route::get('/all/banner', 'AllBanner')->name('all.banner');
        Route::get('/add/banner', 'AddBanner')->name('add.banner');
        Route::post('/store/banner', 'StoreBanner')->name('store.banner');
        Route::get('/edit/banner/{id}', 'EditBanner')->name('edit.banner');
        Route::post('/update/banner/{id}', 'UpdateBanner')->name('update.banner');
        Route::get('/delete/banner/{id}', 'DeleteBanner')->name('delete.banner');
        Route::get('/delete/banner/image/{bid}/{id}', 'DeleteBannerImage')->name('delete.banner.image');
        
    });

    // Photo Gallery Controller

    Route::controller(PhotoGalleryController::class)->group(function () {

        Route::get('/all/photo/gallery', 'AllPhotoGallery')->name('all.photo.gallery');
        Route::get('/add/photo/gallery', 'AddPhotoGallery')->name('add.photo.gallery');
        Route::post('/store/photo/gallery', 'StorePhotoGallery')->name('store.photo.gallery');
        Route::get('/edit/photo/gallery/{id}', 'EditPhotoGallery')->name('edit.photo.gallery');
        Route::post('/update/photo/gallery/{id}', 'UpdatePhotoGallery')->name('update.photo.gallery');
        Route::get('/delete/photo/gallery/{id}', 'DeletePhotoGallery')->name('delete.photo.gallery');
        
    });

    // Video Gallery Controller

    Route::controller(VideoGalleriesController::class)->group(function () {

        Route::get('/all/video/gallery', 'AllVideoGallery')->name('all.video.gallery');
        Route::get('/add/video/gallery', 'AddVideoGallery')->name('add.video.gallery');
        Route::post('/store/video/gallery', 'StoreVideoGallery')->name('store.video.gallery');
        Route::get('/edit/video/gallery/{id}', 'EditVideoGallery')->name('edit.video.gallery');
        Route::post('/update/video/gallery/{id}', 'UpdateVideoGallery')->name('update.video.gallery');
        Route::get('/delete/video/gallery/{id}', 'DeleteVideoGallery')->name('delete.video.gallery');

    });

    // Livetvs Controller

    Route::controller(LiveTvsController::class)->group(function () {

        Route::get('/all/live/tv', 'AllLiveTv')->name('all.live.tv');
        Route::get('/add/live/tv', 'AddLiveTv')->name('add.live.tv');
        Route::post('/store/live/tv', 'StoreLiveTv')->name('store.live.tv');
        Route::get('/edit/live/tv/{id}', 'EditLiveTv')->name('edit.live.tv');
        Route::post('/update/live/tv/{id}', 'UpdateLiveTv')->name('update.live.tv');
        Route::get('/delete/live/tv/{id}', 'DeleteLiveTv')->name('delete.live.tv');

    });

    // Review Controller

    Route::controller(ReviewsController::class)->group(function () {

        Route::get('/pending/review', 'PendingReview')->name('pending.review');
        Route::get('/approve/review', 'ApproveReview')->name('approve.review');
        Route::get('/approve/review/update/{id}', 'ApproveReviewUpdate')->name('approve.review.update');
        Route::get('/approve/review/delete/{id}', 'ApproveReviewDelete')->name('approve.review.delete');

    });

    // SEO Controller

    Route::controller(SeoSettingController::class)->group(function () {

        Route::get('/all/seo', 'AllSeo')->name('all.seo');
        Route::get('/add/seo', 'AddSeo')->name('add.seo');
        Route::post('/store/seo/', 'StoreSeo')->name('store.seo');
        Route::get('/edit/seo/{id}', 'EditSeo')->name('edit.seo');
        Route::post('/update/seo/{id}', 'UpdateSeo')->name('update.seo');
        Route::get('/delete/seo/{id}', 'DeleteSeo')->name('delete.seo');

    });

    // Permission Controller

    Route::controller(PermissionController::class)->group(function () {

        Route::get('/all/permission', 'AllPermission')->name('all.permission');
        Route::get('/add/permission', 'AddPermission')->name('add.permission');
        Route::post('/store/permission', 'StorePermission')->name('store.permission');
        Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
        Route::post('/update/permission/{id}', 'UpdatePermission')->name('update.permission');
        Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');

    });

    // Roles Controller

    Route::controller(RoleController::class)->group(function () {

        Route::get('/all/roles', 'AllRoles')->name('all.roles');
        Route::get('/add/roles', 'AddRoles')->name('add.roles');
        Route::post('/store/roles', 'StoreRoles')->name('store.roles');
        Route::get('/edit/roles/{id}', 'EditRoles')->name('edit.roles');
        Route::post('/update/roles/{id}', 'UpdateRoles')->name('update.roles');
        Route::get('/delete/roles/{id}', 'DeleteRoles')->name('delete.roles');

        Route::get('/all/roles/permission', 'AllRolesPermission')->name('all.roles.permission');
        Route::get('/add/roles/permission', 'AddRolesPermission')->name('add.roles.permission');
        Route::get('/edit/roles/permission/{id}', 'EditRolesPermission')->name('edit.roles.permission');
        Route::get('/delete/roles/permission/{id}', 'DeleteRolesPermission')->name('delete.roles.permission'); 
        Route::post('/store/roles/permission', 'StoreRolesPermission')->name('store.roles.permission');
        Route::post('/update/roles/permission/{id}', 'UpdateRolesPermission')->name('update.roles.permission');

    });

    // Roles In Permission Controller

    Route::controller(RoleInPermissionController::class)->group(function () {

        Route::get('/all/roles/permission', 'AllRolesPermission')->name('all.roles.permission');
        Route::get('/add/roles/permission', 'AddRolesPermission')->name('add.roles.permission');
        Route::get('/edit/roles/permission/{id}', 'EditRolesPermission')->name('edit.roles.permission');
        Route::get('/delete/roles/permission/{id}', 'DeleteRolesPermission')->name('delete.roles.permission'); 
        Route::post('/store/roles/permission', 'StoreRolesPermission')->name('store.roles.permission');
        Route::post('/update/roles/permission/{id}', 'UpdateRolesPermission')->name('update.roles.permission');

    });


     // Site Setting Controller

     Route::controller(SiteSettingController::class)->group(function () {

        Route::get('/all/site/setting', 'AllSiteSetting')->name('all.site.setting');
        Route::get('/add/site/setting', 'AddSiteSetting')->name('add.site.setting');
        Route::post('/store/site/setting', 'StoreSiteSetting')->name('store.site.setting');
        Route::get('/edit/site/setting/{id}', 'EditSiteSetting')->name('edit.site.setting');
        Route::post('/update/site/setting/{id}', 'UpdateSiteSetting')->name('update.site.setting');
        Route::get('/delete/site/setting/{id}', 'DeleteSiteSetting')->name('delete.site.setting');

    });


});

require __DIR__.'/auth.php';
