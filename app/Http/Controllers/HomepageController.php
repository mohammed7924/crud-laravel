<?php

namespace App\Http\Controllers;

use App\Mail\UserCreatedMail;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Mail;
use Rap2hpoutre\FastExcel\Facades\FastExcel;
use Barryvdh\DomPDF\Facade\Pdf;

class HomepageController
{
    public function homepage()
    {


        $customers = Customer::withCount('orders')->withTrashed()->paginate(7);

        return view('home',compact('customers'));
    }


//create
    public function create()
    {
        return view ('users.create');
    }
    public function saveuser(Request $request)
    {
        $request->validate([
            'first' => 'required|max:15',
            'last'  => 'required',
            'email' => 'required|email',
            'number' => 'required|numeric',
            'dob' => 'required|date',
            'status' => 'required',
            'place' => 'required'
        ]);

        $filename = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $filename, 'public');
        }

        $user = Customer::create([
            'first_name' => $request->input('first'),
            'last_name' => $request->input('last'),
            'email' => $request->input('email'),
            'phonenumber' => $request->input('number'),
            'dob' => $request->input('dob'),
            'status' => $request->input('status'),
            'place' => $request->input('place'),
            'image' => $filename
        ]);

        return redirect()->route('home')->with('message', 'Customer created successfully');
    }



//edit
    public function edit($id){
        $user=Customer::find(decrypt($id));
        return view('users.edit',compact('user'));
    }
    //view user
    public function viewuser($id){
$address=UserAddress::find($id);
$user=Customer::find(decrypt($id));

        return view('users.view',compact('user', 'address'));
    }





//update
    public function update(Request $request){
        $id = decrypt($request->input('id'));
        $user = Customer::find($id);

        $data = [
            'first_name' => $request->input('first'),
            'last_name' => $request->input('last'),
            'email' => $request->input('email'),
            'phonenumber' => $request->input('number'),
            'dob' => $request->input('dob'),
            'status' => $request->input('status'),
            'place' => $request->input('place')
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $filename, 'public');
            $data['image'] = $filename;
        }

        $user->update($data);

        return redirect()->route('home')->with('message','updated successfully');
    }
//delete

public function delete($id){

    $user=Customer::find(decrypt($id));

    $user->delete();

    return redirect()->route('home')->with('message','deleted successfully');

}
//activate the trashed customer

public function activate($id){

    $user=Customer:: withTrashed()-> find(decrypt($id));

    $user->restore();

    return redirect()->route('home')->with('message','user activated successfully');
}

//force delete
public function forcedelete($id){
    $user=Customer:: withTrashed()-> find(decrypt($id));
    $user->forceDelete();
    return redirect()->route('home')->with('message','User forceDeleted  successfully');
}


public function export(){
    $users = Customer::all();
    // Export all users
    return FastExcel::data($users)->download('customers.xlsx',function($users){
        return
        [
           'Name'=>$users->first_name,
           'Email'=>$users->email,
           'Phone number'=>$users->phonenumber,
           'Place'=>$users->place

        ];
    });
}



public function pdf(){
    $users = Customer::all();
    $pdf = Pdf::loadView('pdf.invoice', ['users' => $users]);
    return $pdf->stream('invoice.pdf');
}

}
