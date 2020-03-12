<?php

namespace Bulkly\Http\Controllers;

use Bulkly\BufferPosting;
use Bulkly\SocialPostGroups;
use Illuminate\Http\Request;
use Auth;
class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $group_type = SocialPostGroups::select('type')->groupBy('type')->get()->toArray();
        $sql = BufferPosting::with('groupInfo', 'accountInfo')->where('user_id', Auth::user()->id);
        $search_key = $request->search;
        $type_key = $request->group_type;
        $date_key = $request->date;
        if($request->search){
            $sql->whereHas('groupInfo', function($q) use($request){
                $q->where('name', 'LIKE', '%'.$request->search. '%');

            });
        }
            if($request->group_type) {
                $sql->whereHas('groupInfo', function($q) use($request) {
                    $q->where('type', '=', $request->group_type);
                });
            }
            if($request->date){
                $sql->whereDate('sent_at', '=',$request->date);
            }
        $groups = $sql->paginate(20);
         return view('history.index')->with(['groups' => $groups, 'group_type' => $group_type, 'search_key' => $search_key, 'type_key' => $type_key, 'date_key' => $date_key]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
