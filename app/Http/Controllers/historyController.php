<?php

namespace Bulkly\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class historyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        $groups= DB::table('social_post_groups')->get();
        $search=$request->search;
        $date=$request->date;
        $filter=$request->filter;
        if($search!=''){
            $datas=DB::table('buffer_postings')->leftjoin('social_post_groups','social_post_groups.id','=','buffer_postings.group_id')
            ->leftjoin('social_accounts','buffer_postings.account_id','=','social_accounts.id')
            ->where('social_post_groups.name', 'LIKE', '%' . $search . '%')
            ->select('social_post_groups.*', 'buffer_postings.post_text as post_text','buffer_postings.sent_at as time','social_accounts.name as a_name','social_accounts.avatar as avatar')
            ->paginate(7);
            $datas->appends(['search' => $search]); 
        }
        elseif($filter!=''){
            $datas=DB::table('buffer_postings')->leftjoin('social_post_groups','social_post_groups.id','=','buffer_postings.group_id')
            ->leftjoin('social_accounts','buffer_postings.account_id','=','social_accounts.id')
            ->where('buffer_postings.group_id',$filter)
            ->select('social_post_groups.*', 'buffer_postings.post_text as post_text','buffer_postings.sent_at as time','social_accounts.name as a_name','social_accounts.avatar as avatar')
            ->paginate(7);
            $datas->appends(['filter' => $filter]);  
        }
        elseif( $date!=''){
            $datas=DB::table('buffer_postings')->leftjoin('social_post_groups','social_post_groups.id','=','buffer_postings.group_id')
            ->leftjoin('social_accounts','buffer_postings.account_id','=','social_accounts.id')
            ->where('buffer_postings.sent_at', 'LIKE', '%' . $date . '%')
            ->select('social_post_groups.*', 'buffer_postings.post_text as post_text','buffer_postings.sent_at as time','social_accounts.name as a_name','social_accounts.avatar as avatar')
            ->paginate(7);
            $datas->appends(['date' => $date]); 
        }
      else{
        $datas=DB::table('buffer_postings')->leftjoin('social_post_groups','social_post_groups.id','=','buffer_postings.group_id')
        ->leftjoin('social_accounts','buffer_postings.account_id','=','social_accounts.id')
        ->select('social_post_groups.*', 'buffer_postings.post_text as post_text','buffer_postings.sent_at as time','social_accounts.name as a_name','social_accounts.avatar as avatar')
        ->paginate(7);
        // dd( $datas);
      }
       
        return view('history',compact('datas','groups'));
      
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
