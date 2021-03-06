@extends('layouts.myLayout')    

@section('myContent')
<div class="container-fluid w-75 my-5 pt-5">
    <div class="container-fluid w-75 text-center">
        <h1 class="h1 text-um">Registration</h1>
    </div>
    <div class="container-fluid w-75 mt-4 py-3 bg-white shadow-um-1 rounded">
        <form action="Register.php" method="POST">
            <div class="container-fluid p-3 form-group">
                <h3 class="h3 text-um mb-3">{{$blade->getCurrentRole()}} Fill-up Form</h3>
                <div class="container-fluid row p-0 mx-0 mb-3">
                    <label class="input w-100 col p-0">
                        <input class="input__field" type="text" name="FIRSTNAME" placeholder=" " required/>
                        <span class="input__label">First Name</span>
                    </label>
                    <label class="input w-100 col p-0">
                        <input class="input__field" type="text" name="MIDDLENAME" placeholder=" " required/>
                        <span class="input__label">Middle Name</span>
                    </label>
                    <label class="input w-100 col p-0">
                        <input class="input__field" type="text" name="LASTNAME" placeholder=" " required/>
                        <span class="input__label">Last Name</span>
                    </label>
                </div>
                <label class="input w-100 mb-3">
                    <input class="input__field" type="text" name="ADDRESS"placeholder=" " required/>
                    <span class="input__label">Address</span>
                </label>
                <label class="input w-100 mb-3">
                    <input class="input__field" type="number" name="PHONE" placeholder=" " minLength="11" maxlength="11" id="phone"
                        oninput="javascript: if (this.value.length == this.maxLength) this.value = this.value.slice(0, this.maxLength);" required></input>
                    <span class="input__label">Phone Number</span>
                </label>
            @role('Admin')
                <label class="input w-100 mb-3">
                    <select class="input__field" name="POSITION" placeholder=" " required>
                        <option>Registrar</option>
                    </select>
                    <span class="input__label">Position</span>
                </label>
            @elserole('Alumni')
                <label class="input w-100 mb-3">
                    <input class="input__field" type="text" name="YEAR" placeholder=" " required/>
                    <span class="input__label">Year of Graduation</span>
                </label>
            @endrole    
                <label class="input w-100 mb-3">
                    <input class="input__field" type="text" name="EMAIL" placeholder=" " required/>
                    <span class="input__label">Email</span>
                </label>
                <label class="input w-100 mb-3">
                    <input class="input__field" type="text" name="_ID" placeholder=" " required/>
                    <span class="input__label">{{$blade->getCurrentRole()}} ID Number</span>
                </label>
                <label class="input w-100 mb-3">
                    <input class="input__field" type="password" name="PASSWORD" placeholder=" " required/>
                    <span class="input__label">Password</span>
                </label>
            @role('Student')
                <h3 class="h3 text-um mb-3">School Information</h3>
                <label class="input w-100 mb-3">
                    <select class="input__field" name="SYEAR" placeholder=" " required>
                        <option>1st</option>
                        <option>2nd</option>
                        <option>3rd</option>
                        <option>4th</option>
                    </select>
                    <span class="input__label">College Year</span>
                </label>
                <label class="input w-100 mb-3">
                    <select class="input__field" name="COURSE" placeholder=" " required>
                        <option>BSIT</option>
                    </select>
                    <span class="input__label">Course</span>
                </label>
            @endrole
            </div>
            <div class="container-fluid text-center mb-3">
                <button type="submit" class="btn-primary-um w-50" name="Register">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection