<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\PostsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\ForumController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PlansController;
use App\Http\Controllers\User\DepositController;
use App\Http\Controllers\User\PricingController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\User\MessagesController;
use App\Http\Controllers\Admin\GatewaysController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\BuyPointsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Frontend\WebsiteController;
use App\Http\Controllers\User\UserSettingsController;
use App\Http\Controllers\Auth\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('language/{locale}', [LanguageController::class, 'changeLanguage'])->name('language.change');

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/about', [WebsiteController::class, 'about'])->name('about');
Route::get('/community-rules', [WebsiteController::class, 'rules'])->name('rules');
Route::get('/privacy-policy', [WebsiteController::class, 'privacy'])->name('privacy');
Route::get('/terms-and-conditions', [WebsiteController::class, 'terms'])->name('terms');
Route::get('/cookie-policy', [WebsiteController::class, 'cookie'])->name('cookie');
Route::get('/faqs', [WebsiteController::class, 'faqs'])->name('faqs');
Route::get('/badges', [WebsiteController::class, 'badges'])->name('badges');

//Auth
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('auth.register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'create'])->middleware('guest')->name('auth.login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('/forgot-password' ,[ForgotPasswordController::class, 'forgot'])->middleware('guest')->name('auth.forgot');
Route::post('/forgot-password' ,[ForgotPasswordController::class, 'forgotPassword']);
Route::get('/reset-password/{email}/{token}' ,[ForgotPasswordController::class, 'resetPassword'])->middleware('guest')->name('reset');
Route::post('/reset-password' ,[ForgotPasswordController::class, 'updatePassword'])->name('update.password');

//Posts, Comments & Relplies
Route::get('/posts', [HomeController::class, 'posts'])->name('home.posts');
Route::post('/posts', [HomeController::class, 'posts']);
Route::get('/posts/sort', [HomeController::class, 'sortPosts'])->name('home.posts.sort');
Route::get('/posts/pagination', [HomeController::class, 'sortPosts']);
Route::get('/post/{post_id}/{slug}', [HomeController::class, 'post'])->name('home.post');
Route::post('/comments/add', [HomeController::class, 'addComment'])->name('comments.add');
Route::post('/replies/add', [HomeController::class, 'addReply'])->name('replies.add');

//Report
Route::post('report/post', [HomeController::class, 'report_post'])->name('report.post');
Route::post('report/comment', [HomeController::class, 'report_comment'])->name('report.comment');
Route::post('report/reply', [HomeController::class, 'report_reply'])->name('report.reply');

//Share
Route::post('share', [HomeController::class, 'share'])->name('share');

//React
Route::post('react', [HomeController::class, 'react'])->name('react');

//Users
Route::get('/users', [WebsiteController::class, 'users'])->name('users');
Route::get('/users/sort', [WebsiteController::class, 'sortUsers'])->name('users.sort');
Route::get('/users/pagination', [WebsiteController::class, 'sortUsers']);
Route::get('/profile/{username}', [WebsiteController::class, 'user'])->name('user');
Route::get('/profile/{username}/posts', [WebsiteController::class, 'user'])->name('user.posts');
Route::get('/profile/{username}/posts/pagination', [WebsiteController::class, 'paginateUserPosts']);
Route::get('/profile/{username}/comments', [WebsiteController::class, 'user'])->name('user.comments');
Route::get('/profile/{username}/comments/pagination', [WebsiteController::class, 'paginateUserComments']);
Route::get('/profile/{username}/replies', [WebsiteController::class, 'user'])->name('user.replies');
Route::get('/profile/{username}/replies/pagination', [WebsiteController::class, 'paginateUserReplies']);
Route::get('/profile/{username}/followers', [WebsiteController::class, 'user'])->name('user.followers');
Route::get('/profile/{username}/following', [WebsiteController::class, 'user'])->name('user.following');

//Feed
Route::get('/feed', [WebsiteController::class, 'feed'])->name('feed');
Route::get('/feed/posts/sort', [WebsiteController::class, 'sortPostsFeed'])->name('feed.posts.sort');
Route::get('/feed/posts/pagination', [WebsiteController::class, 'sortPostsFeed']);

//Leaderboard
Route::get('/leaderboard', [WebsiteController::class, 'leaderboard'])->name('leaderboard');
Route::get('/leaderboard/sort', [WebsiteController::class, 'sortLeaderboard'])->name('leaderboard.sort');
Route::get('/leaderboard/pagination', [WebsiteController::class, 'sortLeaderboard']);

//Categories
Route::get('/categories', [WebsiteController::class, 'categories'])->name('categories');
Route::get('/categories/pagination', [WebsiteController::class, 'paginateCategories']);
Route::get('/category/{slug}', [WebsiteController::class, 'category'])->name('category');
Route::get('/category/posts/sort', [WebsiteController::class, 'sortPostsCategory'])->name('category.posts.sort');
Route::get('/category/posts/pagination', [WebsiteController::class, 'sortPostsCategory']);

//Tags
Route::get('/tags', [WebsiteController::class, 'tags'])->name('tags');
Route::get('/tags/sort', [WebsiteController::class, 'sortTags'])->name('tags.sort');
Route::get('/tags/pagination', [WebsiteController::class, 'sortTags']);
Route::get('tag/{slug}', [WebsiteController::class, 'tag'])->name('tag');
Route::get('/tag/posts/sort', [WebsiteController::class, 'sortPostsTag'])->name('tag.posts.sort');
Route::get('/tag/posts/pagination', [WebsiteController::class, 'sortPostsTag']);

//Search
Route::get('/search', [WebsiteController::class, 'search'])->name('search');

//Stats
Route::get('/stats', [WebsiteController::class, 'stats'])->name('stats');

//Plans
Route::get('/plans', [WebsiteController::class, 'plans'])->name('plans');

//Points
Route::get('/points', [WebsiteController::class, 'points'])->name('points');
Route::post('/points/buy', [WebsiteController::class, 'buy_points'])->name('points.buy');

//Report User
Route::post('/reportuser', [WebsiteController::class, 'reportuser'])->name('reportuser');

/*------------------------------------------
--------------------------------------------
User Routes List
--------------------------------------------
--------------------------------------------*/
Route::group(['prefix' =>'user', 'middleware' => ['auth', 'user', 'check-subscription']], function(){

	//Overview
    Route::get('/overview', [UserSettingsController::class, 'overview'])->name('user.overview');

	//Profile Settings
    Route::get('/profile', [UserSettingsController::class, 'profile'])->name('user.profile');
    Route::post('/profile', [UserSettingsController::class, 'update']);
    Route::get('/password', [UserSettingsController::class, 'password'])->name('user.password');
    Route::post('/password', [UserSettingsController::class, 'password_update']);
    Route::get('/email-notifications', [UserSettingsController::class, 'email_notifications'])->name('user.email-notifications');

	//Posts
    Route::get('/posts/add', [PostsController::class, 'add'])->name('user.posts.add');
    Route::post('/posts/add', [PostsController::class, 'store']);
    Route::get('/posts/list', [PostsController::class, 'list'])->name('user.posts.list');
    Route::get('/posts/pagination', [PostsController::class, 'paginatePosts']);
    Route::get('/posts/edit/{id}', [PostsController::class, 'edit'])->name('user.posts.edit');
    Route::post('/posts/edit/{id}', [PostsController::class, 'update']);
	Route::post('/posts/destroy', [PostsController::class, 'destroy'])->name('user.posts.destroy');
    Route::post('/posts/pin', [PostsController::class, 'pin'])->name('user.posts.pin');
    Route::post('/posts/unpin', [PostsController::class, 'unpin'])->name('user.posts.unpin');
    Route::post('/posts/close', [PostsController::class, 'close'])->name('close');
    Route::post('/posts/open', [PostsController::class, 'open'])->name('open');

	//Comments
    Route::get('/comments/list', [HomeController::class, 'comments'])->name('user.comments.list');
    Route::get('/comments/pagination', [HomeController::class, 'paginateComments']);
    Route::get('/comments/edit/{id}', [HomeController::class, 'editComment'])->name('user.comments.edit');
    Route::post('/comments/edit/{id}', [HomeController::class, 'updateComment']);
	Route::post('/comments/destroy', [HomeController::class, 'destroyComment'])->name('user.comments.destroy');
    Route::post('/comments/mark', [HomeController::class, 'markComment'])->name('user.comments.mark');
    Route::post('/comments/unmark', [HomeController::class, 'unmarkComment'])->name('user.comments.unmark');

	//Replies
    Route::get('/replies/list', [HomeController::class, 'replies'])->name('user.replies.list');
    Route::get('/replies/pagination', [HomeController::class, 'paginateReplies']);
    Route::get('/replies/edit/{id}', [HomeController::class, 'editReply'])->name('user.replies.edit');
    Route::post('/replies/edit/{id}', [HomeController::class, 'updateReply']);
	Route::post('/replies/destroy', [HomeController::class, 'destroyReply'])->name('user.replies.destroy');
    Route::post('/replies/mark', [HomeController::class, 'markReply'])->name('user.replies.mark');
    Route::post('/replies/unmark', [HomeController::class, 'unmarkReply'])->name('user.replies.unmark');

    //Like
    Route::post('like', [HomeController::class, 'like'])->name('like');
    Route::post('like-comment', [HomeController::class, 'likeComment'])->name('like.comment');
    Route::post('like-reply', [HomeController::class, 'likeReply'])->name('like.reply');

    //Follow
    Route::post('follow', [WebsiteController::class, 'follow'])->name('follow');
    Route::get('/followers', [UserSettingsController::class, 'followers'])->name('followers');
    Route::get('/following', [UserSettingsController::class, 'following'])->name('following');

    //Favorite
    Route::post('save_favorite', [HomeController::class, 'save_favorite'])->name('save_favorite');
    Route::get('/bookmarks', [UserSettingsController::class, 'bookmarks'])->name('user.bookmarks');
    Route::get('/bookmarks/pagination', [UserSettingsController::class, 'paginateBookmarks']);
	Route::post('/bookmarks/destroy', [UserSettingsController::class, 'bookmarks_destroy'])->name('user.bookmarks.destroy');

    //Notfications
    Route::get('/notifications', [UserSettingsController::class, 'notifications'])->name('user.notifications');
    Route::post('/mark-as-read', [UserSettingsController::class, 'mark_as_read']);
	Route::post('/notifications/destroy', [UserSettingsController::class, 'notifications_destroy'])->name('user.notifications.destroy');

    //Messages
    Route::get('/chats', [MessagesController::class, 'chats'])->name('user.chats');
    Route::post('/chats/create', [MessagesController::class, 'create'])->name('user.chats.create');
    Route::get('/chats/{chat_id}/messages', [MessagesController::class, 'messages'])->name('user.chats.messages');
    Route::post('/chats/messages/send', [MessagesController::class, 'messages_send'])->name('user.messages.send');
    Route::post('/chats/messages/upload', [MessagesController::class, 'messages_upload'])->name('user.messages.upload');
    Route::post('/chats/messages/zip', [MessagesController::class, 'messages_zip'])->name('user.messages.zip');
    Route::post('/chats/messages/delete', [MessagesController::class, 'messages_delete'])->name('user.messages.delete');
    Route::get('/chats/get', [MessagesController::class, 'get'])->name('user.chats.get');
    Route::get('/chats/user', [MessagesController::class, 'user'])->name('user.chats.user');
    Route::get('/chats/new', [MessagesController::class, 'new'])->name('user.chats.new');
    Route::get('/chats/mute', [MessagesController::class, 'mute'])->name('user.chats.mute');
    Route::post('/chats/delete', [MessagesController::class, 'delete'])->name('user.chats.delete');

    //Wallet
    Route::get('/wallet', [DepositController::class, 'index'])->name('user.wallet');
	Route::get('/wallet/invoice/{id}',[DepositController::class, 'invoice'] )->name('user.wallet.invoice');
    Route::post('/funds/add', [DepositController::class, 'add_funds'])->name('user.funds.add');
    Route::get('/paypal/success', [DepositController::class, 'paypal_success'])->name('paypal.success');
    Route::get('/stripe/success', [DepositController::class, 'stripe_success'])->name('stripe.success');
    Route::get('/stripe/cancel', [DepositController::class, 'stripe_cancel'])->name('stripe.cancel');

    //Pricing
    Route::get('/pricing', [PricingController::class, 'index'])->name('user.pricing');
    Route::post('/pricing/pay', [PricingController::class, 'pay'])->name('user.pricing.pay');

    //Subscriptions
    Route::get('/subscriptions', [PricingController::class, 'subscriptions'])->name('user.subscriptions');
	Route::get('/subscriptions/invoice/{id}',[PricingController::class, 'invoice'] )->name('user.subscriptions.invoice');
	Route::post('/subscriptions/cancel',[PricingController::class, 'cancel'] )->name('user.subscriptions.cancel');

    //Tips & Earnings
    Route::post('/tip', [PricingController::class, 'tip'])->name('user.tip');
    Route::get('/earnings', [PricingController::class, 'earnings'])->name('user.earnings');

    //Withdrawals
    Route::get('/withdrawals', [PricingController::class, 'withdrawals'])->name('user.withdrawals');
    Route::post('/withdrawals/set', [PricingController::class, 'set'])->name('user.withdrawals.set');
    Route::post('/withdraw', [PricingController::class, 'withdraw'])->name('user.withdraw');

    //Block
    Route::post('block', [WebsiteController::class, 'block'])->name('block');
    Route::get('/user/blocks', [WebsiteController::class, 'user_blocks'])->name('user.blocks');
    Route::post('unblock', [WebsiteController::class, 'unblock'])->name('unblock');

    //Profile Viewers
    Route::get('/profile/viewers', [WebsiteController::class, 'profile_viewers'])->name('profile.viewers');

    //User Points
    Route::get('/points', [WebsiteController::class, 'user_points'])->name('user.points');

});

/*------------------------------------------
--------------------------------------------
Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::group(['prefix' =>'admin', 'middleware' => ['auth', 'admin']], function(){

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

	//Site Settings
    Route::get('/settings/site', [SettingsController::class, 'index'])->name('admin.settings.site');
    Route::post('/settings/site', [SettingsController::class, 'update']);
    Route::get('/settings/home', [SettingsController::class, 'home'])->name('admin.settings.home');
    Route::post('/settings/home', [SettingsController::class, 'home_post']);
    Route::get('/settings/forum', [SettingsController::class, 'forum'])->name('admin.settings.forum');
    Route::post('/settings/forum', [SettingsController::class, 'forum_post']);
    Route::get('/settings/points', [SettingsController::class, 'points'])->name('admin.settings.points');
    Route::post('/settings/points', [SettingsController::class, 'points_post']);
    Route::get('/settings/currency', [SettingsController::class, 'currency'])->name('admin.settings.currency');
    Route::post('/settings/currency', [SettingsController::class, 'currency_post']);
    Route::get('/settings/payments', [SettingsController::class, 'payments'])->name('admin.settings.payments');
    Route::post('/settings/payments', [SettingsController::class, 'payments_post']);
    Route::get('/settings/ads', [SettingsController::class, 'ads'])->name('admin.settings.ads');
    Route::post('/settings/ads', [SettingsController::class, 'ads_post']);
    Route::get('/settings/analytics', [SettingsController::class, 'analytics'])->name('admin.settings.analytics');
    Route::post('/settings/analytics', [SettingsController::class, 'analytics_post']);
    Route::get('/settings/adsense', [SettingsController::class, 'adsense'])->name('admin.settings.adsense');
    Route::post('/settings/adsense', [SettingsController::class, 'adsense_post']);

    //Payment Gateways Settings
    Route::get('/gateways/paypal', [GatewaysController::class, 'paypal'])->name('admin.gateways.paypal');
    Route::post('/gateways/paypal', [GatewaysController::class, 'paypal_post']);
    Route::get('/gateways/stripe', [GatewaysController::class, 'stripe'])->name('admin.gateways.stripe');
    Route::post('/gateways/stripe', [GatewaysController::class, 'stripe_post']);

    //Email Settings
    Route::get('/settings/mail', [EmailController::class, 'index'])->name('admin.settings.mail');
	Route::post('/settings/mail', [EmailController::class, 'update']);

	//Languages Settings
    Route::get('/languages/list', [LanguageController::class, 'index'])->name('admin.languages.index');
    Route::post('/languages/add', [LanguageController::class, 'postAdd'])->name('admin.languages.add');
    Route::get('/languages/{language}/phrases', [LanguageController::class, 'edit'])->name('admin.languages.edit');
    Route::post('/languages/update-phrase', [LanguageController::class, 'update'])->name('admin.languages.update');
    Route::get('/languages/default', [LanguageController::class, 'default'])->name('admin.languages.default');
    Route::post('/languages/default', [LanguageController::class, 'postDefault']);
    Route::post('/languages/delete', [LanguageController::class,'delete'])->name('admin.languages.delete');

	//Categories Settings
    Route::get('/categories/list', [CategoriesController::class, 'index'])->name('admin.categories.list');
    Route::post('/categories/add', [CategoriesController::class, 'store'])->name('admin.categories.add');
    Route::get('/categories/edit', [CategoriesController::class, 'edit'])->name('admin.categories.edit');
    Route::post('/categories/update', [CategoriesController::class, 'update'])->name('admin.categories.update');
	Route::post('/categories/destroy', [CategoriesController::class, 'destroy'])->name('admin.categories.destroy');

	//Pages Settings
    Route::get('/pages/list', [PagesController::class, 'index'])->name('admin.pages.list');
    Route::get('/pages/add', [PagesController::class, 'index'])->name('admin.pages.add');
    Route::post('/pages/add', [PagesController::class, 'store']);
    Route::get('/pages/edit/{id}', [PagesController::class, 'edit'])->name('admin.pages.edit');
    Route::post('/pages/update', [PagesController::class, 'update'])->name('admin.pages.update');
    Route::get('/pages/view', [PagesController::class, 'view'])->name('admin.pages.view');
	Route::post('/pages/destroy', [PagesController::class, 'destroy'])->name('admin.pages.destroy');

	//FAQs Settings
    Route::get('/faqs/list', [FaqsController::class, 'index'])->name('admin.faqs.list');
    Route::post('/faqs/add', [FaqsController::class, 'store'])->name('admin.faqs.add');
    Route::get('/faqs/edit', [FaqsController::class, 'edit'])->name('admin.faqs.edit');
    Route::post('/faqs/update', [FaqsController::class, 'update'])->name('admin.faqs.update');
	Route::post('/faqs/destroy', [FaqsController::class, 'destroy'])->name('admin.faqs.destroy');

	//Users Settings
    Route::get('/users/list', [UserController::class, 'index'])->name('admin.users.list');
    Route::get('/user/{username}', [UserController::class, 'user'])->name('admin.user');
    Route::post('/users/add', [UserController::class, 'store'])->name('admin.users.add');
    Route::get('/users/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::post('/users/update', [UserController::class, 'update'])->name('admin.users.update');
	Route::post('/users/destroy', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/users/funds/{id}', [UserController::class, 'funds'])->name('admin.users.funds');
    Route::post('/users/update_funds', [UserController::class, 'update_funds'])->name('admin.users.update_funds');

	//Admin Profile
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/profile', [AdminController::class, 'update']);

	//Badges Settings
    Route::get('/badges/list', [ForumController::class, 'badges'])->name('admin.badges.list');
    Route::post('/badges/add', [ForumController::class, 'store_badges'])->name('admin.badges.add');
    Route::get('/badges/edit', [ForumController::class, 'edit_badges'])->name('admin.badges.edit');
    Route::post('/badges/update', [ForumController::class, 'update_badges'])->name('admin.badges.update');
	Route::post('/badges/destroy', [ForumController::class, 'destroy_badges'])->name('admin.badges.destroy');

	//Plans Settings
    Route::get('/plans/list', [PlansController::class, 'index'])->name('admin.plans.list');
    Route::get('/plans/add', [PlansController::class, 'add'])->name('admin.plans.add');
    Route::post('/plans/add', [PlansController::class, 'store']);
    Route::get('/plans/edit/{id}', [PlansController::class, 'edit'])->name('admin.plans.edit');
    Route::post('/plans/update', [PlansController::class, 'update'])->name('admin.plans.update');
	Route::post('/plans/destroy', [PlansController::class, 'destroy'])->name('admin.plans.destroy');

	//Buy Points Settings
    Route::get('/buypoints/list', [BuyPointsController::class, 'index'])->name('admin.buypoints.list');
    Route::post('/buypoints/add', [BuyPointsController::class, 'store'])->name('admin.buypoints.add');
    Route::get('/buypoints/edit', [BuyPointsController::class, 'edit'])->name('admin.buypoints.edit');
    Route::post('/buypoints/update', [BuyPointsController::class, 'update'])->name('admin.buypoints.update');
	Route::post('/buypoints/destroy', [BuyPointsController::class, 'destroy'])->name('admin.buypoints.destroy');

	//Payments
    Route::get('/withdrawals', [ForumController::class, 'withdrawals'])->name('admin.withdrawals');
    Route::post('/withdrawals/paid', [ForumController::class, 'paid'])->name('admin.withdrawals.paid');
    Route::post('/withdrawals/unpaid', [ForumController::class, 'unpaid'])->name('admin.withdrawals.unpaid');
    Route::get('/deposits', [ForumController::class, 'deposits'])->name('admin.deposits');
    Route::get('/subscriptions', [ForumController::class, 'subscriptions'])->name('admin.subscriptions');
    Route::get('/tips', [ForumController::class, 'tips'])->name('admin.tips');
    Route::get('/transactions', [ForumController::class, 'transactions'])->name('admin.transactions');

	//Ban Durations
    Route::get('/bandurations/list', [ForumController::class, 'bandurations'])->name('admin.bandurations.list');
    Route::post('/bandurations/add', [ForumController::class, 'store_bandurations'])->name('admin.bandurations.add');
    Route::get('/bandurations/edit', [ForumController::class, 'edit_bandurations'])->name('admin.bandurations.edit');
    Route::post('/bandurations/update', [ForumController::class, 'update_bandurations'])->name('admin.bandurations.update');
	Route::post('/bandurations/destroy', [ForumController::class, 'destroy_bandurations'])->name('admin.bandurations.destroy');

	//Reports
    Route::get('/reports/users', [ForumController::class, 'users_reports'])->name('admin.reports.users');
    Route::get('/user/get', [ForumController::class, 'get_user'])->name('get.user');
    Route::post('/user/ban', [ForumController::class, 'ban_user'])->name('ban.user');
    Route::post('/user/ban/remove', [ForumController::class, 'remove_ban'])->name('remove.ban');
    Route::get('/banned/users', [ForumController::class, 'banned_users'])->name('admin.banned.users');

    Route::get('/reports/posts', [ForumController::class, 'posts_reports'])->name('admin.reports.posts');
    Route::get('/reports/comments', [ForumController::class, 'comments_reports'])->name('admin.reports.comments');
    Route::get('/reports/replies', [ForumController::class, 'replies_reports'])->name('admin.reports.replies');

    //Posts
    Route::get('/posts/list', [ForumController::class, 'list_posts'])->name('admin.posts.list');
    Route::get('/posts/edit/{id}', [ForumController::class, 'edit_posts'])->name('admin.posts.edit');
    Route::post('/posts/edit/{id}', [ForumController::class, 'update_posts']);
	Route::post('/posts/destroy', [ForumController::class, 'destroy_posts'])->name('admin.posts.destroy');

    //Tags
    Route::get('/tags/list', [ForumController::class, 'tags'])->name('admin.tags.list');
    Route::get('/tags/edit/{id}', [ForumController::class, 'edit_tags'])->name('admin.tags.edit');
    Route::post('/tags/edit/{id}', [ForumController::class, 'update_tags']);
	Route::post('/tags/destroy', [ForumController::class, 'destroy_tags'])->name('admin.tags.destroy');

	//Comments
    Route::get('/comments/list', [ForumController::class, 'comments'])->name('admin.comments.list');
    Route::get('/comments/edit/{id}', [ForumController::class, 'editComment'])->name('admin.comments.edit');
    Route::post('/comments/edit/{id}', [ForumController::class, 'updateComment']);
	Route::post('/comments/destroy', [ForumController::class, 'destroyComment'])->name('admin.comments.destroy');

	//Replies
    Route::get('/replies/list', [ForumController::class, 'replies'])->name('admin.replies.list');
    Route::get('/replies/edit/{id}', [ForumController::class, 'editReply'])->name('admin.replies.edit');
    Route::post('/replies/edit/{id}', [ForumController::class, 'updateReply']);
	Route::post('/replies/destroy', [ForumController::class, 'destroyReply'])->name('admin.replies.destroy');

    //Chats
    Route::get('/chats', [ForumController::class, 'chats'])->name('admin.chats');
    Route::get('/chats/{chat_id}/messages', [ForumController::class, 'messages'])->name('admin.chats.messages');
    Route::post('/chats/delete', [ForumController::class, 'delete_chats'])->name('admin.chats.delete');

    //Roles
    Route::get('/roles/list', [RolesController::class, 'index'])->name('admin.roles.list');
    Route::get('/roles/add', [RolesController::class, 'index'])->name('admin.roles.add');
    Route::post('/roles/add', [RolesController::class, 'store']);
    Route::get('/roles/edit/{id}', [RolesController::class, 'edit'])->name('admin.roles.edit');
    Route::post('/roles/update', [RolesController::class, 'update'])->name('admin.roles.update');
	Route::post('/roles/destroy', [RolesController::class, 'destroy'])->name('admin.roles.destroy');
});
