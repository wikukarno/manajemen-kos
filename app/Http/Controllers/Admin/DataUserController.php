<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataUserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = User::query();

            return datatables()->of($query)
                ->addIndexColumn()
                
                ->editColumn('name', function ($item) {
                    return $item->name ?? '-';
                })
                ->editColumn('email', function ($item) {
                    return $item->email ?? '-';
                })
                ->editColumn('role', function ($item) {
                    return $item->role ?? '-';
                })
                ->editColumn('status_akun', function ($item) {
                    return $item->status_akun ?? '-';
                })
                ->editColumn('hp', function ($item) {
                    return $item->hp ?? '-';
                })
                ->editColumn('alasan_penolakan', function ($item) {
                    return $item->alasan_penolakan ?? '-';
                })
                ->editColumn('action', function ($item) {
                    return '
                                <div class="d-flex">
                                    <a href="' . route('data-user.show', $item->id) . '" title="Tampil Detail" class="btn btn-outline-primary btn-sm mb-0 mx-1 ">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="' . route('data-user.edit', $item->id) . '" title="Edit Data" class="btn btn-outline-warning btn-sm mb-0 mx-1">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <button type="button" class="btn btn-outline-danger btn-sm mb-0 mx-1" title="Delete" onClick="btnDeleteDataUser(' . $item->id . ')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div> 
                            ';

                })
                // memenghilangkan tag html
                ->rawColumns(['action'])
                ->make(true);
        }

        $item=User::find(auth()->user()->id);
        return view('pages.admin.datauser.index', compact('item'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $item=User::find(auth()->user()->id);
        // untuk mengubah bagian create nya
        return view('pages.admin.datauser.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // untuk mengengisi data nya
        $item=new User();
        $item->name=$request->name;
        $item->email=$request->email;
        $item->role=$request->role;
        $item->status_akun=$request->status_akun;
        $item->hp=$request->hp;
        $item->password=$request->password;
        $item->alasan_penolakan=$request->alasan_penolakan;
        $item->save();

        return redirect('pemilik/data-user')->with('success', 'Data Hass Been Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item=User::find($id);
        return view('pages.admin.datauser.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = User::findOrFail($id);
        // untuk menampilkan ke halaman edit nya
        return view('pages.admin.datauser.edit', [
            'item' => $item
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $item = User::findOrFail($id);
        // $item->name=$request->name;
        // // $item->role=$request->role;
        // // $item->status_akun=$request->status_akun;
        // $item->hp=$request->hp;
        // $item->alasan_penolakan=$request->alasan_penolakan;
        // $item->save();

        // return redirect('pemilik/data-user')->with('success', 'Data Hass Been Updated');

        $data=$request->all();
        $item = User::findOrFail($id);

        $item->update($data);
        return redirect()->route('data-user.index')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $item = User::findOrFail($request->id);
        $item->delete();

        if ($item) {
            return Response()->json(['status' => true, 'message' => 'Data berhasil dihapus!']);
        } else {
            return Response()->json(['status' => false, 'message' => 'Data gagal dihapus!']);
        }
    }
}
