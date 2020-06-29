<?php
	use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use App\Notifications\InvoicePaid;

use App\EDocument;
use App\Etypdoc;
use App\Workflow;
use App\Wftype;
use App\Models\User;


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
 if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
// Ignores notices and reports all other kinds... and warnings
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}

Auth::routes();

Route::get('/', 'HomeController@home');

Route::get('admin', 'HomeController@admin')->middleware('admin');
Route::get('documentation', 'HomeController@documentation');
Route::get('categories', 'HomeController@categories');

 
/*Route::get('/upload','DocumentController@viewaDocuments');
Route::post('/insert','DocumentController@upload');*/

/******************** Document part ********************/

Route::get('/document', 'DocumentController@listDocuments');
Route::get('/listdocuments', 'DocumentController@AllDocuments');

Route::get('upload','DocumentController@create');
//Route::post('upload','DocumentController@store');
Route::post('upload','DocumentController@uploadFilePost');

Route::get('delete/{id}','DocumentController@deletefile');

Route::get('detail/{id}','DocumentController@detailsfile');

Route::get('update/{id}','DocumentController@update');
Route::post('edit/{id}','DocumentController@edit');

Route::get('visualize/{id}','DocumentController@previewdoc');


/****************** Workflow part ********************/
Route::get('Typeworkflow/{id}','WorkflowController@TypesWF');
Route::post('typewf','WorkflowController@typeWF');

Route::get('workflow/{id}','WorkflowController@WFSingle');
Route::post('workflowS/{id}','WorkflowController@Add_Single_WF');

Route::get('workflowGroup/{id}','WorkflowController@WFgroup');
Route::post('workflowG/{id}','WorkflowController@Add_Group_WF');

Route::get('workflowParallel/{id}','WorkflowController@WFparallel');
Route::post('workflowParallel/{id}','WorkflowController@Add_users_WF');

Route::get('workflowPooled/{id}','WorkflowController@WFpooled');
Route::post('workflowPooled/{id}','WorkflowController@Add_user_WF');

Route::get('viewworkflow/{id}','WorkflowController@View_Workflow_detail');

 

/******************* Task Part ***********************/
Route::get('/task','TaskController@Home');

Route::get('/task/{id}','TaskController@ShowTaskSingle');
Route::post('/task/{id}','TaskController@SaveSingleAssign');

Route::get('/taskGroup/{id}','TaskController@ShowTaskGroup');
Route::post('/taskGroup/{id}','TaskController@SaveGroup');

Route::get('/taskParallel/{id}','TaskController@ShowTaskParallel');
Route::post('/taskParallel/{id}','TaskController@SaveUsersParallel');

Route::get('/CompletedTask/{id}','TaskController@CompletedTask');
Route::post('/CompletedTask/{id}','TaskController@DisableTask');

Route::get('/taskPooled/{id}','TaskController@ShowTaskPooled');
Route::post('/taskPooled/{id}','TaskController@SaveUserPooled');
 


Route::get('/admin', 'AdminController@index');
Route::get('/departments', 'AdminController@ShowDepartments');

Route::get('/alldocuments', 'AdminController@ShowDocuments');
Route::get('/doctypes', 'AdminController@ShowDocType');
Route::get('/SingleWF', 'AdminController@ShowSingleWF');
Route::get('/GroupWF', 'AdminController@ShowGroupWF');
Route::get('/ParallelWF', 'AdminController@ShowParallelWF');

/*******Crud Operation: User ********/
Route::get('/users', 'AdminController@ShowUsers');
Route::get('/updateuser/{id}', 'AdminController@UpdateUser');
Route::post('/edituser/{id}', 'AdminController@EditUser');
Route::get('AddUser','AdminController@AddUser');
Route::post('/saveuser','AdminController@SaveUser');
Route::get('/deleteuser/{id}', 'AdminController@DeleteUser');

/*******Crud Operation : Departement *******/
Route::post('/savedepartment','AdminController@SaveDepartment');
Route::get('/updatedepartment/{id}', 'AdminController@UpdateDepartment');
Route::post('/editdepartment/{id}', 'AdminController@EditDepartment');
Route::get('/deletedepartment/{id}', 'AdminController@DeleteDepartment');

/*******Crud Operation: Group ********/
Route::get('/groups', 'AdminController@ShowGroups');
Route::post('/savegroup','AdminController@SaveGroup');
Route::get('/updategroup/{id}', 'AdminController@UpdateGroup');
Route::post('/editgroup/{id}', 'AdminController@EditGroup');
Route::get('/deletegroup/{id}', 'AdminController@DeleteGroup');


/*******Crud Operation: Document ********/
Route::get('/viewdoc/{id}', 'AdminController@ViewDetail');

/*******Crud Operation: Type ********/
Route::post('/savetype','AdminController@SaveType');
Route::get('/updatetype/{id}', 'AdminController@UpdateType');
Route::post('/edittype/{id}', 'AdminController@EditType');
Route::get('/deletetype/{id}', 'AdminController@DeleteType');

/*******View Workflow ********/
Route::get('/ViewWF/{id}', 'AdminController@View_WF_Detail');

/*******Favorite Feature ********/

Route::get('favorite/{id}', 'DocumentController@FavoriteDoc');
Route::get('unfavorite/{id}', 'DocumentController@UnFavoriteDoc');
Route::get('my_favorites', 'DocumentController@ListFavorites');

/*******Settings ********/
Route::get('settings', 'UserController@index');
Route::post('editUserProfile/{id}','UserController@EditUserProfile');