<?php

namespace App\Http\Controllers;

use App\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Empleados';
        $menuActive = 'staff';
        $submenuActive = 'staff-list';
        $user = explode(" ", Auth::user()->name);
        $staff = Staff::where('delete', '0')->orderBy('id', 'asc')->get();

        $dataView = compact('title', 'menuActive', 'submenuActive', 'user', 'staff');

        return view('staff.index')->with($dataView);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Nuevo Empleado';
        $menuActive = 'staff';
        $submenuActive = 'staff-new';
        $user = explode(" ", Auth::user()->name);

        $dataView = compact('title', 'menuActive', 'submenuActive', 'user');

        return view('staff.create')->with($dataView);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $rules = [
                'code' => 'required|unique:staff|max:10',
                'name' => 'required|regex:"^[a-zA-Z\u00F1\u00D1]+$"|alpha|max:100',
                'dollarSalary' => 'required|numeric|between:0.01,999999999999.99',
                'pesosSalary' => 'required|numeric|between:0.01,999999999999.99',
                'address' => 'required|max:100',
                'state' => 'required|max:50',
                'city' => 'required|max:50',
                'telephone' => 'required|digits:10',
                'email' => 'required|email',
                'active' => 'required'
            ];

            $attributes = [
                'code' => 'Código',
                'name' => 'Nombre',
                'dollarSalary' => 'Salario Dólares',
                'pesosSalary' => 'Salario Pesos',
                'address' => 'Dirección',
                'state' => 'Estado',
                'city' => 'Ciudad',
                'telephone' => 'Teléfono',
                'email' => 'Correo',
                'active' => 'Activo'
            ];

            $validation = Validator::make($request->all(), $rules, array(), $attributes);

            if ($validation->fails()) {
                return response()->json(['success' => false, 'errors' => $validation->getMessageBag()->toArray()]);
            }

            Staff::create([
                'code' => $request->code,
                'name' => $request->name,
                'dollarSalary' => $request->dollarSalary,
                'pesosSalary' => $request->pesosSalary,
                'address' => $request->address,
                'state' => $request->state,
                'city' => $request->city,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'active' => $request->active,
                'created_at' => Carbon::now()
            ]);

            return response()->json(['success' => true]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Detalles Empleado';
        $menuActive = 'staff';
        $submenuActive = 'staff-list';
        $user = explode(" ", Auth::user()->name);
        $staff = Staff::find($id);

        $dataView = compact('title', 'menuActive', 'submenuActive', 'user', 'staff');

        return view('staff.show')->with($dataView);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Editar Empleado';
        $menuActive = 'staff';
        $submenuActive = 'staff-list';
        $user = explode(" ", Auth::user()->name);
        $staff = Staff::find($id);

        $dataView = compact('title', 'menuActive', 'submenuActive', 'user', 'staff');

        return view('staff.edit')->with($dataView);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->ajax()) {
            $rules = [
                'code' => 'required|unique:staff,code,' . $request->id . '|max:10',
                'name' => 'required|regex:"^[a-zA-Z\u00F1\u00D1]+$"|alpha|max:100',
                'dollarSalary' => 'required|numeric|between:0.01,999999999999.99',
                'pesosSalary' => 'required|numeric|between:0.01,999999999999.99',
                'address' => 'required|max:100',
                'state' => 'required|max:50',
                'city' => 'required|max:50',
                'telephone' => 'required|digits:10',
                'email' => 'required|email',
                'active' => 'required'
            ];

            $attributes = [
                'code' => 'Código',
                'name' => 'Nombre',
                'dollarSalary' => 'Salario Dólares',
                'pesosSalary' => 'Salario Pesos',
                'address' => 'Dirección',
                'state' => 'Estado',
                'city' => 'Ciudad',
                'telephone' => 'Teléfono',
                'email' => 'Correo',
                'active' => 'Activo'
            ];

            $validation = Validator::make($request->all(), $rules, array(), $attributes);

            if ($validation->fails()) {
                return response()->json(['success' => false, 'errors' => $validation->getMessageBag()->toArray()]);
            }

            Staff::where('id', $request->id)->update([
                'code' => $request->code,
                'name' => $request->name,
                'dollarSalary' => $request->dollarSalary,
                'pesosSalary' => $request->pesosSalary,
                'address' => $request->address,
                'state' => $request->state,
                'city' => $request->city,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'active' => $request->active,
                'updated_at' => Carbon::now()
            ]);

            return response()->json(['success' => true]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            Staff::where('id', $request->id)->update([
                'delete' => '1',
                'updated_at' => Carbon::now()
            ]);

            return response()->json(['success' => true]);
        }
    }

    public function status(Request $request)
    {
        if ($request->ajax()) {
            Staff::where('id', $request->id)->update([
                'active' => $request->status,
                'updated_at' => Carbon::now()
            ]);

            return response()->json(['success' => true]);
        }
    }

    public function ws() {
        try {
            $client = new \SoapClient(null, array('location' => 'https://www.banxico.org.mx/DgieWSWeb/DgieWS?WSDL',
                'uri' => 'http://DgieWSWeb/DgieWS?WSDL',
                'encoding' => 'ISO-8859-1',
                'trace' => 1
            ));
            $response = $client->tiposDeCambioBanxico();
            $tc = 0;

            if (!empty($response)) {
                $dom = new \DOMDocument();
                $dom->loadXML($response);
                $xmlData = $dom->getElementsByTagName( "Obs" );

                if ($xmlData->length>2) {
                    $item = $xmlData->item(5);
                    $tc = $item->getAttribute('OBS_VALUE');
                }
            }

            return response()->json($tc);
        }
        catch(\SoapFault $fault) {
            return response()->json($fault);
        }
    }
}
