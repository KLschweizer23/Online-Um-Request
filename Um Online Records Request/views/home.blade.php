@extends('layouts.myLayout')

@section('myContent')
<div class="container-fluid my-5 py-3">
    <div class="container-fluid bg-um my-1 py-4 rounded opacity-um-2 shadow-lg text-center">
        <div class="container-fluid">
            <h1 class="display-1 text-um">UM Online Records Request</h1>
        </div>
        <div class="container-fluid mt-5">
            <p class="h4 text-um">Online page for requesting records for Students and Alumni</p>
        </div>
        @guest
            <a href="./Option.php">
                <button type="submit" class="btn-primary-um w-25 my-5 mx-auto" name="submitAlumni">
                    <span class="d-block py-2 font-weight-bold">Make Request &rarr;</span>
                </button>
            </a>
        @else
            <a href="./Dashboard.php">
                <button type="submit" class="btn-primary-um w-25 my-5 mx-auto" name="submitAlumni">
                    <span class="d-block py-2 font-weight-bold">Dashboard &rarr;</span>
                </button>
            </a>
        @endguest
    </div>
</div>
@endsection