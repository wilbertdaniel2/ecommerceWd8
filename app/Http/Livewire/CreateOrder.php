<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Department;
use App\Models\Neighborhood;
use App\Models\Municipality;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;

class CreateOrder extends Component
{

    public $envio_type = 1;

    public $contact, $phone, $address, $references, $shipping_cost = 0;

    public $departments, $municipalities = [], $neighborhoods = [];

    public $department_id = "", $municipality_id = "", $neighborhood_id = "";

    public $rules = [
        'contact' => 'required',
        'phone' => 'required',
        'envio_type' => 'required'
    ];

    public function mount(){
        $this->departments = Department::all();
    }

    public function updatedEnvioType($value){
        if ($value == 1) {
            $this->resetValidation([
                'department_id', 'municipality_id', 'neighborhood_id', 'address', 'references'
            ]);
        }
    }  


    public function updatedDepartmentId($value){
        $this->municipalities = Municipality::where('department_id', $value)->get();

        $this->reset(['municipality_id', 'neighborhood_id']);
    }


    public function updatedMunicipalityId($value){

        $municipality = Municipality::find($value);

        $this->shipping_cost = $municipality->cost;

        $this->neighborhoods = Neighborhood::where('municipality_id', $value)->get();

        $this->reset('neighborhood_id');
    }


    public function create_order(){

        $rules = $this->rules;

        if($this->envio_type == 2){
            $rules ['department_id'] = 'required';
            $rules ['municipality_id'] = 'required';
            $rules ['neighborhood_id'] = 'required';
            $rules ['address'] = 'required';
            $rules ['references'] = 'required';
        }

        $this->validate($rules);

        $order = new Order();

        $order->user_id = auth()->user()->id;
        $order->contact = $this->contact;
        $order->phone = $this->phone;
        $order->envio_type = $this->envio_type;
        $order->shipping_cost = 0;
        $order->total = str_replace(',', '', Cart::subtotal()) + $this->shipping_cost;

        $order->content = Cart::content();

        if ($this->envio_type == 2) {
            $order->shipping_cost = $this->shipping_cost;
            $order->department_id = $this->department_id;
            $order->municipality_id = $this->municipality_id;
            $order->neighborhood_id = $this->neighborhood_id;
            $order->address = $this->address;
            $order->references = $this->references;
        }

        $order->save();

        foreach (Cart::content() as $item) {
            discount($item);
        }

        Cart::destroy();

        return redirect()->route('orders.payment', $order);
    }

    public function render()
    {
        return view('livewire.create-order');
    }
}
