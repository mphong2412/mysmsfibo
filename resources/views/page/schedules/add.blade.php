@extends('master')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Soạn/sửa tin nhắn cho lịch hẹn</h1>
    <div class="card shadow">
        <div class="card-body">
            <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                <!-- Accordion card -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="headingThree3">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree1" aria-expanded="false" aria-controls="collapseThree1">
                            <h5 class="mb-0">
                                1.Nhập từ Nhóm
                            </h5>
                        </a>
                    </div>
                    <!-- Card body -->
                    <div id="collapseThree1" class="collapse" role="tabpanel" aria-labelledby="headingThree3" data-parent="#accordionEx">
                        <div class="card-body">
                            <p style="color: red;">SĐT cách nhau bởi dấu "," hoặc ";" ví dụ: 84909999888 ; 0901861911 | 0901861912 , 0901861913</p>
                            <div class="textarea">
                                <textarea type="textarea" rows="2" autocomplete="off" validateevent="true" class="textarea" style="min-height: 54px; height: 100px"></textarea>
                            </div>
                            <button type="submit" name="btnPhone" id="btnPhone">Nhập vào danh sách</button>
                        </div>
                    </div>
                </div><!-- Accordion card -->

                <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="headingTwo2">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                            <h5 class="mb-0">
                                2.Nhập Từ File
                            </h5>
                        </a>
                    </div>
                    <!-- Card body -->
                    <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2" data-parent="#accordionEx">
                        <div class="card-body">
                            <input type="file" id="input-file-now" data-plugin="dropify" data-default-file="" />
                            <button class="box__button" type="submit">Upload</button>
                        </div>
                    </div>
                </div><!-- Accordion card -->

                <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="headingThree3">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3" aria-expanded="false" aria-controls="collapseThree3">
                            <h5 class="mb-0">
                                3.Nhập từ Nhóm
                            </h5>
                        </a>
                    </div>
                    <!-- Card body -->
                    <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3" data-parent="#accordionEx">
                        <div class="card-body">
                            @foreach ($contact_groups as $key => $value)
                            <select class="form-control" name="abc" id="abc" style="width:10%; margin:1%">
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            </select>
                            @endforeach
                            <button class="btn btn-success" type="submit" name="btnGroup" id="btnGroup">Nhập vào danh sách</button>
                        </div>
                    </div>
                </div><!-- Accordion card -->

            </div><!-- Accordion wrapper -->
        </div><!-- /.card-body -->
    </div><!-- /.card-shadow -->
</div><!-- /.container-fluid -->
@endsection
