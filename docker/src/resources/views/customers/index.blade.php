@extends('layouts.master',['title' => 'Danh sách thông tin khách hàng'])
@section('content')
    <div class="row" id="table-inverse">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @if (\Session::has('message'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('message') !!}</li>
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="card-content">
                    <form action="">
                        <div class="card-body">
                            <a href="{{route('get.Customer')}}" class="btn btn-outline-success">+ Tạo Khách Hàng Mới</a>
                                <label for="">Tìm kiếm:</label>
                                <input type="search" name="search" placeholder="Tìm kiếm" value="{{$searches}}">
                        </div>
                    </form>

                    <!-- table with light -->
                    <div class="table-responsive">
                        <table class="table table-light mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>TÊN</th>
                                <th>Hình ảnh</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Ngày sinh</th>
                                <th>Tuổi</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody id="ListCategory">
                            @foreach($customers as $customer)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$customer->name}}</td>
                                <td><img src="{{$customer->image}}" alt="" height="100px" width="120px"></td>
                                <td>{{$customer->address}}</td>
                                <td>{{$customer->phone}}</td>
                                <td>{{\Carbon\Carbon::parse($customer->birthday)->format('d-m-Y')}}</td>
                                <td>{{$customer->age()}}</td>
                                <td>
                                    <a href="{{route('get.updateCustomer',['id' =>$customer->id])}}">
                                        <button type="submit" title="update" style="border: none; background-color:transparent;">
                                            <i class="fas fa-trash fa-lg text-danger">Sửa</i>
                                        </button>
                                    </a>
                                    <a href="{{route('get.deleteCustomer',['id' => $customer->id])}}">
                                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                            <i class="fas fa-trash fa-lg text-danger">Xóa</i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{$customers ->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
