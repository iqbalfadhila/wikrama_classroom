<?php

namespace App\Http\Controllers;

use App\Majors;
use App\Rombel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\PaginatedResourceResponse;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rombels = Rombel::orderBy('rombel', 'ASC')->paginate(5);

        return view('admin.rombel.index', compact('rombels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Majors $major)
    {
        $major = Majors::orderBy('majors', 'ASC')->get();
        return view('admin.rombel.create', compact('major'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'rombel' => 'required',
            'majors_id' => 'required'
        ]);

        Rombel::create([
            'rombel' => $request->rombel,
            'majors_id' => $request->majors_id
        ]);

        return redirect(route('admin.rombel.index'))->withSuccess('Rombel Create Successfully!');
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
    public function edit(Rombel $rombel, Majors $major)
    {
        $major = Majors::orderBy('majors', 'ASC')->get();
        return view('admin.rombel.edit', compact('rombel', 'major'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rombel $rombel)
    {
        $this->validate($request, [
            'rombel' => 'required',
            'majors_id' => 'required'
        ]);

        $rombel->update($request->all());

        return redirect(route('admin.rombel.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rombel $rombel)
    {
        $rombel->delete();

        return redirect()->route('admin.rombel.index')
                        ->with('success', 'Rombel delete Successfully!');
    }
}
