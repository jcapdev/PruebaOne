<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Log;

class CustomersController extends Controller{

        public function index(){
            $datosCustomer = Customers::all();

            return response()->json($datosCustomer);
        }

        public function guardar(Request $request){            
            $datosCustomer= new Customers;
            
            //validar errores sql 

            $datosCustomer->id_reg=$request->id_reg;
            $datosCustomer->id_com=$request->id_com;
            $datosCustomer->email=$request->email;
            $datosCustomer->name=$request->name;
            $datosCustomer->last_name=$request->last_name;
            $datosCustomer->address=$request->address;
            $datosCustomer->date_reg=$request->date_reg;
            $datosCustomer->status=$request->status;

            $datosCustomer->save();

            //return response()->json('estamos guardando');
             return response()->json($request);

        }

       public function eliminar($id){
            Log::alert("esta entrando a eliminar datos");
            
            $datosCustomer = new Customers;
            
            if ($datosEncontradosCustomer=$datosCustomer->where('dni', $id)->where(function ($query) {$query->where('status', 'A')->orWhere('status', 'I');})->first()) {
                
                Log::alert("Se elimino un registro con id : " .$id);
                 $datosEncontradosCustomer=$datosCustomer->where('dni', $id)->where(function ($query) {$query->where('status', 'A')->orWhere('status', 'I');})->delete();

                return response()->json(['serverstatus'=>'ELIMINADO']);
            }
            else{
                Log::alert("No se encontro  un registro con id : " .$id);
                return response()->json(['serverstatus'=>'no existe']);    
            }
            
       }


       public function consultar($dni){
            //  Log::alert("esta entrando a la consulta de datos");
            //$ip = request()->ip();  
            
            
            
  

            Log::alert('esta entrando a la consulta de datos');
            
            
            $datosCustomer = new Customers;
            
           
           if ($datosEncontradosCustomer=$datosCustomer->join('regions', 'customers.id_reg', '=', 'regions.id_reg')->join('communes', 'customers.id_com', '=', 'communes.id_com')->select('customers.name', 'customers.last_name','customers.address','regions.description','communes.description as descriptioncom')->where('customers.status','=','A' )->where(function ($query) use ($dni) {$query->where('dni', $dni)->orWhere('email', $dni);})->first())
            {   
                Log::alert("Se consulto inforacion del usuario :");                
    
                return response()->json($datosEncontradosCustomer);
                
                
            }
            else{                
                Log::alert('Se quiso consultar la  informacion del  usuario :' .$dni. ' pero no hay registros');    
                return response()->json(['serverstatus'=>'false']);
            }
        //     //si hay datos mostrarlos
            //de lo contrario mndr un false

            // if($datosEncontradosCustomer > 0)
            //     {
                    

            //     }
            //     else
                    

       }
}