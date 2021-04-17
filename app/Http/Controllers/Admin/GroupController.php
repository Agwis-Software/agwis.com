<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class GroupController extends Controller
{
    public function __construct()
    {
		if ( php_sapi_name() !== 'cli' ) {
			if ( version_compare(phpversion(), '5.4.0', '>=') )
				if (session_status() !== PHP_SESSION_ACTIVE) {
					session_start();
				}
			else {
				if (session_id() === '') {
					session_start();
				}
			}
		}
		else {
			if (session_id() === '' || session_status() !== PHP_SESSION_ACTIVE) {
				session_start();
			}
		}
		$_SESSION['admin'] = 1;

        \View::share('currentRoute', Route::currentRouteName());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        $title = 'Group';
        //echo '<pre>';print_r($groups[0]->users->toArray());exit;
        return view('admin.group.index', compact('groups', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::find($id);

        $members = User::whereIn('id', function ($query) use ($group) {
            $query->select('user_id')
                ->from('group_members')
                ->where('group_id', $group->id);
        })
        ->get();
        //echo "<pre>";print_r($members);exit();

        return view('admin.group.show', compact('group','members'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
