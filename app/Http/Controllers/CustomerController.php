<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Inertia\Inertia;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$customers=Customer::get(['id','name','email','phoneno']);
        //dd("Entering store method");
        $customers=Customer::paginate(5)
                        ->through(function($customer){
                            return[
                                'id'=>$customer->id,
                                'name'=>$customer->name,
                                'email'=>$customer->email,
                                'phoneno'=>$customer->phoneno 
                            ];
                        });
        return Inertia::render('Customers',['customers'=>$customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return Inertia::render('CreateCustomer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        //dd("Entering store method");
        $validatedData = $request->validated();
        //echo "This is a custom message.\n";
        //$imagePath = $request->file('image')->store('images', 'public');
        $customer = new Customer;
        $customer->name=$validatedData['name'];
        $customer->email=$validatedData['email'];
        $customer->phoneno=$validatedData['phoneno'];
        $customer->image_path= "C:\fakepath\Bha.jpeg"; 
        //echo($customer);
        $customer->save();
        return redirect('/customers')->with('success',"customers Created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $id)
    {
        $custom = Customer::find($id);
        return Inertia::render('EditCustomer',['cust'=>$custom]);
        //return $customer;
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, int $id)
    {
        $customer = Customer::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,

        ]);
        $customer->update($validatedData);
        return redirect('/customers')->with('success',"customers Updated Successfully");    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $customer = Customer::findOrFail($id);
        //$customer->forceDelete();
        if ($customer) {
            $customer->Login()->update(['customer_id' => null]);
            $customer->forceDelete();
        }
        return redirect('/');
    }

    public function trash(int $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect('/');
    }

    public function deleted()
    {
        $records = Customer::onlyTrashed()->get();
        return Inertia::render('CustomersTrash',['customs'=>$records]);        
    }
    public function restorep(int $id)
    {
        $record = Customer::withTrashed()->find($id);
        $record->restore();
        return redirect('/customers');
    }
}
