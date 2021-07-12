<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ავტორიზაცია</title>
        <link href="{{ asset('assets/admin/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-body">
                                    <form method="post" action="{{ route('AdminLogin') }}">
    
                                        @if($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        @if(Session::has('login_failed'))
                                            <div class="alert alert-danger">
                                                არასწორი მონაცემები
                                            </div>
                                        @endif
                                        
                                    
                                        @csrf
                                    
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="email" name="email" value="{{ old('email') }}" />
                                            <label>ელ_ფოსტა</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="password" name="password" />
                                            <label>პაროლი</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary">ავტორიზაცია</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>