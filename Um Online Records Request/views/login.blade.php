@extends('layouts.myLayout')

@section('myContent')
<div class="container-fluid w-75 my-5 pt-5">
    <div class="container-fluid w-75 text-center">
        <h1 class="h1 text-um">Login</h1>
    </div>
    <div class="container-fluid w-50 mt-4 py-3 bg-white shadow-um-1 rounded">
        <form action="Login.php" method="POST">
            <div class="container-fluid p-3 form-group">
                <label class="input w-100 mb-3">
                    <input class="input__field @myerror is-invalid @endmyerror" type="text" value="{{$old_ID}}" name="_ID"placeholder=" " required/>
                    <span class="input__label">ID</span>
                    @myerror
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @endmyerror
                </label>
                <label class="input w-100 mb-5">
                    <input class="input__field" type="password" name="PASSWORD"placeholder=" " required/>
                    <span class="input__label">Password</span>
                </label>
                <div class="container-fluid text-center">
                    <button type="submit" class="btn-primary-um w-50" name="login">Login</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection