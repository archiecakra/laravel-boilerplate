<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('backoffice.users.index');
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
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function show(User $user)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function edit(User $user)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, User $user)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $user)
  {
      //
  }

  public function table(Request $request)
  {
    # code...
    $request->validate([
      'order.*.column' => 'integer|nullable|digits_between:1,2',
      'order.*.dir' => 'alpha|nullable|max:50',
      'columns.*.data' => 'alpha_dash|nullable|max:150',
      'search.value' => 'string|nullable|max:150',
    ]);

    $columnSortIndex = $request->order[0]['column'];
    $columnSortName = $request->columns[$columnSortIndex]['data'];
    $columnSortOrder = $request->order[0]['dir'];
    $searchValue = $request->search['value'];

    $query = DB::table('users')
      ->orderBy($columnSortName,$columnSortOrder)
      ->where(fn($q) =>
        $q->where('name', 'like', "%{$searchValue}%")
          ->orWhere('username', 'like', "%{$searchValue}%")
          ->orWhere('role', 'like', "%{$searchValue}%")
          ->orWhere('email', 'like', "%{$searchValue}%")
          ->orWhere('created_at', 'like', "%{$searchValue}%")
          ->orWhere('updated_at', 'like', "%{$searchValue}%")
      );

    $recordsFiltered = $query->count();
    $records = $query->skip($request->start)->take($request->length)->get()->toArray();

    return response()->json([
        'draw' => intval($request->draw),
        'recordsTotal' => DB::table('users')->count(),
        'recordsFiltered' => $recordsFiltered,
        'data' => $records,
    ]);
  }
}
