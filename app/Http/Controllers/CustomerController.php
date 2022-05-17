<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{

    public function create(){
        $url = url('/customer');
        $title = "Customer Registartion";
        $data = compact('url','title');
        return view('customer')->with($data);
    }

    public function store(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email',
                'password'=>'required|confirmed',
                'password_confirmation'=>'required',
                'country'=>'required',
                'state'=>'required'                
            ]
        );

        // echo "<pre>";
        // print_r($request->all());

        //Insert Query
        $customer = new Customer;
        $customer->user_name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->address = $request['address'];
        $customer->state = $request['state'];
        $customer->country = $request['country'];
        $customer->dob = $request['dob'];
        $customer->password = md5($request['password']);
        $customer->save();

        return redirect('/customer');
    }

    public function view(){
        $customers = Customer::all();
        
        //prx($customers->toArray());
        //prx(json_encode($customers->toArray()));

        // echo "<pre>";
        // print_r($customers->toArray());
        // die();
        $data = compact('customers');
        return view('customer-view')->with($data);
    }
    public function trash(){
        $customers = Customer::onlyTrashed()->get();
        
        $data = compact('customers');
        return view('customer-trash')->with($data);
    }

    public function delete($id){
        $customer = Customer::find($id);
        if(!is_null($customer)){
            $customer->delete();
        }
        return redirect('/customer');
    }

    public function restore($id){
        $customer = Customer::withTrashed()->find($id);
        if(!is_null($customer)){
            $customer->restore();
        }
        return redirect('/customer');
    }

    public function forceDelete($id){
        $customer = Customer::withTrashed()->find($id);
        if(!is_null($customer)){
            $customer->forceDelete();
        }
        return redirect('/customer');
    }

    public function edit($id){
        $customer = Customer::find($id);
        if(is_null($customer)){
           // not found 
           return redirect('/customer');
        }else{
            // found
            $url = url('/customer/update') ."/". $id;
            $title = "Update Customer";
            $data = compact('customer','url','title');
            return view('customer')->with($data);
        }
    }

    public function update($id,Request $request){
        //Update Query
        // prx($request->all());
        $customer = Customer::find($id);
        if(!is_null($customer)){
            $customer->user_name = $request['name'];
            $customer->email = $request['email'];
            $customer->gender = $request['gender'];
            $customer->address = $request['address'];
            $customer->state = $request['state'];
            $customer->country = $request['country'];
            $customer->dob = $request['dob'];
            $customer->password = md5($request['password']);
            $customer->save();          
        }
        return redirect('/customer');
    }
}
