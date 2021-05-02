@extends('layouts.adminLayout')

@section('content')

<div class="container">

    <div class="row">
        <h3>Import Using excel</h3>
        <button class="create_btn">Manual Entry</button>
    </div>
    <div class="excel-importer">
        <form action="/excel-upload" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="custom-file excel-upload">    
                    <input type="file" class="custom-file-input @error('user_data') is-invalid @enderror" accept=".xls,.xlsx" id="user_data" name="user_data">
                    <label class="custom-file-label" for="user_data">Upload Excel</label>
                    @error('user_data')
                            <div class="invalid-feedback">
                                    {{ $message }}
                            </div>
                        @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Upload</button>
        </form>
    </div>

</div>

@endsection