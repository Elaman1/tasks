<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Invoices;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('home');
    }


    public function index()
    {
        $invoices = Invoices::all();
        return view('index', compact('invoices'));
    }

    public function form() {
        $counts = count(Invoices::all()) + 1;
        $count = str_pad($counts, 5, 0, STR_PAD_LEFT);

        return view('invoice', compact('count'));
    }

    public function formDel(Invoices $element) {
        return view('invoice', compact('element'));
    }

    public function add(Request $request) {
        $count = 'INV-';
        $counts = count(Invoices::all()) + 1;
        $count .= str_pad($counts, 5, 0, STR_PAD_LEFT);


        $addons = new Invoices;
        $addons->create = $request->invoice;
        $addons->number = $count;
        $addons->supply = $request->supply;
        $addons->comment = $request->comment;

        $addons->save();

        session()->flash('success', 'Отправлено');
        return redirect()->route('index');
    }

    public function edit($id) {
        $element = Invoices::find($id);
        return view('invoice', compact('element'));
        return redirect()->route('form-edit', compact('element'));
    }

    public function confirmEdit(Request $request, $id) {

        $edit = Invoices::find($id);
    	$edit->create = $request->create;
    	$edit->supply = $request->supply;
    	$edit->comment = $request->comment;

    	$edit->save();

        session()->flash('success', 'Изменено');
        return redirect()->route('index');
    }

    public function delete($id) {
        Invoices::find($id)->delete();

        session()->flash('success', 'Удалено');
        return redirect()->route('index');
    }
}
