<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\EditCustomerRequest;
use App\Models\Customer;
use App\Services\ImageService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request){
        $searches = $request['search'] ?? "";
        if ($searches != ""){
            $customers = Customer::where('name','Like','%'.$searches.'%')
                ->orWhere('phone','=', $searches)
                ->orderBy('id', 'desc')
                ->paginate(10);
        }else {
            $customers = Customer::orderBy('id', 'desc')->paginate(10);
        }
        return view('customers.index')->with([
            'customers' => $customers,
            'searches' => $searches
        ]);
    }


    public function getCustomer(){
        return view('customers.add');
    }

    public function postCustomer(CreateCustomerRequest $request){
        $data = $request->validated();
        $image = !empty($data['image']) ? $data['image'] : "";
        unset($data['image']);
        $createCustomer = Customer::create($data +[
                'image' =>!empty($image) ? ImageService::save($image, 'images/customers/', false) : ""
            ]);
        return redirect('index')->with('message','Tạo thông tin khách hàng thành công');
    }

    public function getDeleteCustomer($id){
        $deleteCustomer = Customer::find($id);
        if (empty($deleteCustomer)){
            return back()->with('message','Không thể xóa. Mời nhập lại thao tác');
        }
        $deleteCustomer->delete();
        return back()->with('message','Xóa thông tin khách hàng thành công');
    }

    public function getUpdateCustomer($id){
        $getCustomer = Customer::find($id);
        if (empty($getCustomer)){
            return back()->with('message','Không thể sửa. Mời nhập lại thao tác');
        }
        return view('customers.edit')->with([
            'getCustomer' => $getCustomer
        ]);
    }
    public function postUpdateCustomer(EditCustomerRequest $request, $id){
        $data = $request->validated();
        $postCustomer = Customer::find($id);
        $image = !empty($data['image']) ? $data['image'] : "";
        unset($data['image']);
        $postCustomer->update($data +[
                'image' => !empty($image) ? ImageService::save($image, 'images/customers/', false) : ""
            ]);
        if (empty($postCustomer)){
            return back()->with('message','Không thể sửa. Mời nhập lại thao tác');
        }
        return redirect('index')->with('message','Sửa thông tin khách hàng thành công');
    }
}
