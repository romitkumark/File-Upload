<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
 
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap core CSS -->
    <link href = "{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
 
</head>
<body>
 
    <div class="container mt-4">

        <h2 class="text-center">Welcome to File Upload</h2>

        <h6>
            <ul class="form-group">
                <li style="color:red;">Allowed extensions - pdf, csv, txt, xls, docx </li>
                <li style="color:red;">Maximum size of file will be 10MB.</li>

            </ul>
        </h6>

        <div class="form-group" style="border-style: dashed;">
            <form method="POST" enctype="multipart/form-data" id="upload-file" action="{{ url('store') }}" onSubmit="return submitFileUpload();">
                        
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group" style="padding: 10px;">
                            <input type="file" name="file" placeholder="Choose file" id="file">
                                @error('file')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                        
                    <div class="col-md-12">
                        <div class="form-group" style="padding: 10px;">
                            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="form-group">
        @if(session()->has('status'))
            <div class="alert alert-success">
                {{ session()->get('status') }}
            </div>
        @endif
        </div>
    </div>
    
    <!-- Javascript -->
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>