@extends('layouts.master',['title' => 'Tạo thông tin khách hàng'])
@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('post.Customer')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12 mr-1">
                                            <div class="form-group">
                                                <label for="first-name-column">Tên khách hàng:</label>
                                                <input type="text" id="first-name-column" class="form-control" placeholder="Tên khách hàng"
                                                       name="name">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 mr-1">
                                            <div class="form-group">
                                                <label for="first-name-column">Địa chỉ:</label>
                                                <input type="text" id="first-name-column" class="form-control" placeholder="Địa chỉ"
                                                       name="address">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 mr-1">
                                            <div class="form-group">
                                                <label for="first-name-column">Số điện thoại:</label>
                                                <input type="number" id="first-name-column" class="form-control" placeholder="Số điện thoại"
                                                       name="phone">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 mr-1">
                                            <div class="form-group">
                                                <label for="first-name-column">Ngày sinh:</label>
                                                <input type="date" id="first-name-column" class="form-control" placeholder="Ngày sinh"
                                                       name="birthday">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-12">
                                            <p>Upload Image</p>
                                            <div class="form-file">
                                                <input type="file" class="form-file-input" id="customFile" name="image">
                                                <label class="form-file-label" for="customFile">
                                                    <span class="form-file-text">Choose file...</span>
                                                    <span class="form-file-button">Browse</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Lưu </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
