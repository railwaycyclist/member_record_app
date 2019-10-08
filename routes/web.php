<?php
// laravel 5.5～5.8のディレクトリ構成
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
/*
Route::get('/', function () {
    return view('books');
});
*/

Route::get('/', function() {
	// 1行目でユーザー認証データを呼び出し
	$user = Auth::user();
	$members = Member::all();
	$columns = Schema::getColumnListing('table_name');
	return view('members', ['members' => $members, 'user' => $user]);
});

// Implicit Binding
Route::get('/detail/{member}', function(Member $member) {
	return view('detail', ['member' => $member]);
});

Route::get('/create', function() {
	$members = Member::all();
	return view('create', ['members' => $members]);
});

Route::get('/confirm-delete/{member}', function(Member $member) {
	return view('confirm-delete', ['member' => $member]);
});

Route::get('/edit/{member}', function(Member $member) {
	return view('edit', ['member' => $member]);
});



// 認証機能のルーティング
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');


// Implicit Binding
Route::post('/member-create', function(Request $request) {
	$validator = Validator::make($request->all(), [
		'name' => 'required|max:255',
		// 文字列の最大長さを定義
	]);

	if($validator->fails()) {
		return redirect('/create')
			/*->withInput()*/
			->withErrors($validator);
	}

	$member = new Member; // Eloquent ORM
	$member->membername = $request->name; 
	// $request->nameのnameはformのname属性と一致させる、また$member->membernameのmembernameはデータベースのカラムと一致させる
	$member->save();

	return redirect('/');

});

Route::post('/member-update/{updatingMember}', function(Member $updatingMember, Request $request) {
	$validator = Validator::make($request->all(), [
		'name' => 'required|max:255',
	]);

	if($validator->fails()) {
		return redirect('/edit/'.strval($updatingMember->id))
			->withErrors($validator);
	}

	$member = Member::find($updatingMember->id);
	$member->membername = $request->name;
	$member->save();

	return redirect('/');

});

// Route::post('/delete/{deletingMember}', function(Member $deletingMember, Request $request) {
// 	$validator = Validator::make($request->all(), [
// 		'name' => 'required|max:255',
// 		// 文字列の最大長さを定義
// 	]);

// 	if($validator->fails()) {
// 		return redirect('/edit')
// 			->withErrors($validator);
// 	}

// 	$member = Member::find($deletingMember->id); // Eloquent ORM
// 	$member->membername = $request->name;
// 	$member->save();

// 	return redirect('/');

// });

Route::delete('/delete/{member}', function(Member $member){
	$member->delete();

	return redirect('/');
});

?>

