<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function create()
    {
        return view('visitors.create');
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'nama',
            'umur'
        ]);

        Visitor::create([   
            'nama' => $request->nama,
            'umur' => $request->umur
           
        ]);
        return redirect()->route('visitor.index');
    }

    public function index(){
        $visitor = Visitor::latest()->paginate(5);
        return view('visitors.index', compact('visitors'));
    }
}
