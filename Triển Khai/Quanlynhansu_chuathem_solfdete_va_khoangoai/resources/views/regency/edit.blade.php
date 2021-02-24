@extends('layout.main')

@section('tittle')
    <title>Regency</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @include('layout.content-header',['name' => 'Regency','sub' => 'Add'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('regency.update',['id'=>$regency->id])}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Tên Chức vụ</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       name='name'
                                       placeholder="Điền Tên Chức vụ"
                                       value="{{$regency->name}}" >
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Điền số tiền</label>
                                <input type="number" class="form-control @error('basic_money') is-invalid @enderror"
                                name='basic_money'
                                placeholder="Điền Số Tiền"
                                value="{{$regency->basic_money}}">
                              </div>
                              @error('basic_money')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror

                            <div class="form-group">
                                <label>Chọn Chức Vụ</label>
                                <select class="form-control @error('parent_id') is-invalid @enderror" name='parent_id'>
                                    <option value='0'>Chọn Chức Vụ</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            @error('parent_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
