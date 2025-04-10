<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\UserAddress;
use Rap2hpoutre\FastExcel\Facades\FastExcel;
use Barryvdh\DomPDF\Facade\Pdf;


class HomepageController
{
    public function homepage()
    {
        $customers = Customer::withCount('orders')->withTrashed()->paginate(7);

        return view('home', compact('customers'));
    }

//create
public function create()
{
    return view('users.create');
}

public function saveUser(Request $request)
{
    $request->validate([
        'first'   => 'required|max:15',
        'last'    => 'required',
        'email'   => 'required|email',
        'number'  => 'required|numeric',
        'dob'     => 'required|date',
        'status'  => 'required',
        'place'   => 'required',
    ]);

    $filename = null;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('images', $filename, 'public');
    }

    Customer::create([
        'first_name' => $request->input('first'),
        'last_name'  => $request->input('last'),
        'email'      => $request->input('email'),
        'phonenumber'=> $request->input('number'),
        'dob'        => $request->input('dob'),
        'status'     => $request->input('status'),
        'place'      => $request->input('place'),
        'image'      => $filename,
    ]);

    return redirect()->route('home')->with('message', 'Customer created successfully');
}



//edit
public function edit($id)
{
    $user = Customer::find(decrypt($id));

    return view('users.edit', compact('user'));
}

public function viewUser($id)
{
    $address = UserAddress::find($id);
    $user = Customer::find(decrypt($id));

    return view('users.view', compact('user', 'address'));
}




//update
public function update()
{
    $id = decrypt(request('id'));

    $user = Customer::find($id);

    $user->update([
        'first_name'  => request('first'),
        'last_name'   => request('last'),
        'email'       => request('email'),
        'phonenumber' => request('number'),
        'dob'         => request('dob'),
        'status'      => request('status'),
        'place'       => request('place'),
    ]);

    return redirect()->route('home')->with('message', 'Updated successfully');
}


//delete

public function delete($id)
{
    $user = Customer::find(decrypt($id));

    $user->delete();

    return redirect()->route('home')->with('message', 'Deleted successfully');
}



//activate the trashed customer
public function activate($id)
{
    $user = Customer::withTrashed()->find(decrypt($id));

    $user->restore();

    return redirect()->route('home')->with('message', 'User activated successfully');
}



//force delete
public function forceDelete($id)
{
    $user = Customer::withTrashed()->find(decrypt($id));

    $user->forceDelete();

    return redirect()->route('home')->with('message', 'User permanently deleted successfully');
}



//excel export
public function export()
{
    $users = Customer::all();

    return FastExcel::data($users)->download('customers.xlsx', function ($user) {
        return [
            'Name'         => $user->first_name,
            'Email'        => $user->email,
            'Phone number' => $user->phonenumber,
            'Place'        => $user->place,
        ];
    });
}


//pdf generation
public function pdf(): \Illuminate\Http\Response
{
    $users = Customer::all();

    $pdf = Pdf::loadView('pdf.invoice', [
        'users' => $users,
    ]);

    return $pdf->stream('invoice.pdf');
}


}
