<?php

namespace Modules\Content\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Content\Entities\content;
use Illuminate\Support\Facades\Session;
use Modules\Content\Entities\contentType;
use Nwidart\Modules\Module;
use test\Mockery\ReturnTypeObjectTypeHint;
use Illuminate\Support\Facades\App;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    protected $content_type ;
    public function __construct()
    {
//        $content_type = DB::table('content_type_translate')
//            ->select('content_type_id','type')
//            ->where('locale','=',App()->getLocale())->get();
//        dd($content_type);
//        $this->content_type = $content_type;
    }

    public function index()
    {
        $content = content::where('created_by',Auth::id())->get();
        return view('content::index')->with('content',$content);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $content_type = DB::table('content_type_translate')
            ->select('content_type_id','type')
            ->where('locale','=',App()->getLocale())->get();
        return view('content::pages.create')
            ->with('content_type',$content_type);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|max:255',
            'text_content' => 'required',
        ]);

        DB::table('content')->insertGetId([
            'created_by' => Auth::id(),
            'content_type_id' => $request->input('content_type_id'),
            'subject' => $request->input('subject'),
            'text_content' => $request->input('text_content'),
            'created_date' => date('Y-m-d '),
            'created_time' => date('H:i:s')
        ]);
        Session::flash('success', 'New Content Added !');
        return redirect(url('/content'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $content_type = DB::table('content_type_translate')
            ->select('content_type_id','type')
            ->where('locale','=',App()->getLocale())->get();
        $auth_id =Auth::user()->id ;
        $content = content::where(['created_by'=>$auth_id,'id'=> $id])->get();
        return view('content::pages.show',['content'=>$content,'content_type'=>$content_type]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('content::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $content = content::findOrFail($id);
        $content->subject = $request->input('subject');
        $content->created_by = Auth::id();
        $content->text_content = $request->input('text_content');
        $content->content_type_id = $request->input('content_type_id');
        $content->created_date = date('Y-m-d ');
        $content->created_time = date('H:i:s');
        $content->save();
        Session::flash('success', 'Content edited !');
        return redirect(url('/content'));
        //dd($content);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        if (\request()->has('delete')) {
            $id = content::findOrFail($id);
            $id ->forceDelete();
        }else{
            $id = content::findOrFail($id);
            $id ->delete();
        }
        return redirect(url('/content'));
    }

    public function get_del_content(){
        $content = content::onlyTrashed()->get();
        if (!auth()->user()->can('content.create')){
            return view('content::pages.deleted_content')->with('softDel',$content);
        }else{
            return redirect(route('content.index'));
        }

    }
    public function restore($id){
        content::withTrashed()->where('id',$id)->restore();
        return redirect(route('content.index'));
    }

}
