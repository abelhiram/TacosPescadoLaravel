<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use App\EmpresMDL;
use DB;
use Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\NombreA;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index(Request $request){

        $BUSCAR = $request->input('BUSCAR');

        if ($BUSCAR == NULL) {
            $Resultado = DB::table('users')
            ->select(
            'id','name','email','password'    
            )
            ->get();
            return view('users.index', compact('Resultado'));
        } else {
            $Resultado = DB::table('users')
            ->select(
            'id','name','email','password'    
            )
            ->Where('name', 'like', '%' . $BUSCAR . '%')
            ->get();
            return view('users.index', compact('Resultado'));
        }

    }

     public function show(){


     }
        

    public function create(){

        return view('users.create');
    }


     public function store(Request $request){


        $PASWORD1 = $request->input('password');
        $PASWORD2 = $request->input('confirm-password');

        //Variables que se insertaran
        $name = $request->input("name");
        $email = $request->input("email");

        $Resultado = User::select('email')
            ->where('email', '=', $email)
            ->pluck('email');

        if ($Resultado != '[]') {
            return redirect()->route('users.create')
                ->with('MensajeNo', 'EL EMAIL YA ESTA EN USO');
        } else {

            if ($PASWORD1 == $PASWORD2) {

            User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($PASWORD1),
        ]);

            return back()->with('Creado', 'El usuario fue creado con exito');

        } else {
            return back()->with('Creado', 'Las contraseñas no coinciden');
            } 
            
        }
    }

    public function edit($id)
    {

        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }


     public function update(Request $request, $id) {

        $PASWORD1 = $request->input('password');
        $PASWORD2 = $request->input('confirm-password');

        $name = $request->input('name');
        $email = $request->input('email');

        if ($PASWORD1 == null and $PASWORD2 == null) {

             DB::table('users')
                ->where('id', '=', $id)
                ->update(
                    [
                        'name' => $name,
                        'email' => $email,
                    ]
                );

            return redirect()->route('users.index')
                ->with('success', 'Usuario Editado Exitosamente');

        } else {

            if ($PASWORD1 == $PASWORD2) {

                $IdUsuarioLogueado = auth()->user()->id;

                $input = $request->all();
                if (!empty($input['password'])) {
                    $input['password'] = Hash::make($input['password']);
                } else {
                    $input = array_except($input, array('password'));
                }

                $user = User::find($id);
                $user->update($input);

                return redirect()->route('users.index')
                    ->with('success', 'Usuario Editado Exitosamente');
            } else {
                return back()->with('MensajeNo', 'LAS CONTRASEÑAS NO COINCIDEN');
            }
        }
    }
    public function destroy($id) {

        DB::table('users')
          ->where('id', $id)
            ->delete();
        return back();
   }

}