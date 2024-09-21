<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use Exception;
use Illuminate\Http\Request;

class EkstrakulikulerController extends Controller
{
    public function index()
    {
            $ekstrakulikulers = Ekstrakulikuler::all();
            return view('admin.ekstrakulikuler.index', compact('ekstrakulikulers'));
    }

    public function create()
    {
        return view('admin.ekstrakulikuler.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_ekstrakulikuler' => 'required|string',
            'tahun_mulai' => 'required|integer|digits:4',
        ]);
        Ekstrakulikuler::create($validatedData);

        $notification = array(
            'message' => 'Ekstrakulikuler Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.ekstrakulikuler')->with($notification);
    }

    public function edit($id)
    {
        $ekstrakulikuler = Ekstrakulikuler::find($id);
        return view('admin.ekstrakulikuler.edit', compact('ekstrakulikuler'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'nama_ekstrakulikuler' => 'required|string',
            'tahun_mulai' => 'required|integer|digits:4',
        ]);

        $id = $request->id;
        $ekstrakulikuler = Ekstrakulikuler::find($id);
        $ekstrakulikuler->update($validatedData);

        $notification = array(
            'message' => 'Ekstrakulikuler Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.ekstrakulikuler')->with($notification);

        }

        public function delete($id)
        {
            $ekstrakulikuler = Ekstrakulikuler::find($id);
            $ekstrakulikuler->delete();

            $notification = array(
                'message' => 'Ekstrakulikuler Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back();
        }
    }
