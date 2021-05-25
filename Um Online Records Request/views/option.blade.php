@extends('layouts.myLayout')

@section('myContent')
<div class="container-fluid px-0 mx-3 mt-5">
    <form class="container-fluid row" method="POST">
        <div class="container-fluid col-md text-center">
            <div class="container-fluid bg-um-inverted my-5 mx-auto py-3 rounded-lg shadow-lg p-4">
                <h1 class="h1 text-bold text-white mt-5">Admin</h1>
                <br>
                <p class="p text-white">Register as School Administrator, Executives, Staffs and more...</p>
                    <button type="submit" class="btn-primary-um-inverted float-center w-75 my-5" name="admin">
                        <span class="d-block py-2 font-weight-bold">Register Admin &rarr;</span>
                    </button>
            </div>
        </div>  

        <div class="container-fluid col-md text-center">
            <div class="container-fluid bg-um-inverted my-5 mx-auto py-3 rounded-lg shadow-lg p-4">
                <h1 class="h1 text-bold text-light mt-5">Student</h1>
                <br>
                <p class="p text-light">Register as Student</p>
                <br>
                <button type="submit" class="btn-primary-um-inverted float-center w-75 my-5" name="student">
                    <span class="d-block py-2 font-weight-bold">Register Student &rarr;</span>
                </button>
            </div>
        </div>    

        <div class="container-fluid col-md text-center">
            <div class="container-fluid bg-um-inverted my-5 mx-auto py-3 rounded-lg shadow-lg p-4">
                <h1 class="h1 text-bold text-light mt-5">Alumni</h1>
                <br>
                <p class="p text-light">Register as Alumni</p>
                <br>
                <a href="./Register.php">
                    <button type="submit" class="btn-primary-um-inverted float-center w-75 my-5" name="alumni">
                        <span class="d-block py-2 font-weight-bold">Register Alumni&rarr;</span>
                    </button>
                </a>
            </div>
        </div>
    </form>
</div>
@endsection