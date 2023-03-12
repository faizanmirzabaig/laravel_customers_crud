@extends('layouts.admin_master')
@section('title', 'Add Customer')
<style>
    #namespan {
        color: red;
        font-size: 15px;
        font-weight: 600;
        margin-top: 5px;
    }

    #namespan_mobile {
        color: red;
        font-size: 15px;
        font-weight: 600;
        margin-top: 5px;
    }

    #namespan_email {
        color: red;
        font-size: 15px;
        font-weight: 600;
        margin-top: 5px;
    }
</style>
@section('content')

    <section class="section">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-dark text-white-all">
                <li class="breadcrumb-item">
                    <a href="{{ route('customers.index') }}"><i class="fas fa-home"></i>
                        Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('customers.index') }}"> All Customers</a></li>
            </ol>
        </nav>

        <div class="card" ng-app="products">
            <div class="card-header bg-dark text-white-all">
                <h4>Add New Customer</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('customer.store') }}" role="form" class="needs-validation"
                    id="formAddCustomer" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name"
                                        class="form-control" placeholder="Enter Customer Name" required>
                                    <span id="namespan"></span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mobile">Mobile Number <span class="text-danger">*</span></label>
                                    <input type="number" name="mobile" id="mobile" class="form-control"
                                        placeholder="Enter Mobile Number" required>
                                    <span id="namespan_mobile"></span>

                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email Id <span class="text-danger">*</span></label>
                                    <input type="text" name="email" id="email" class="form-control"
                                        value="{{ old('email') }}" placeholder="Enter Email Id " required>
                                    <span id="namespan_email"></span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="gender">Gender <span class="text-danger">*</span></label>
                                    <select name="gender" id="gender" class="form-control select2" required>
                                        <option value="">--Select Gender--</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>
                                    </select>
                                    <label id="" class="error" for="material_id"></label>

                                </div>
                            </div>


                            <div class="col-md-4">
                                <label>Is Married</label> <br>
                                <div class="form-check form-check-inline">

                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="is_married"
                                            id="flexRadioDefault1" value="1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_married"
                                            id="flexRadioDefault2" value="0" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label>Status</label> <br>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" id="is_active_yes"
                                            name="status" value="1"
                                            checked>
                                        <label class="custom-control-label" for="is_active_yes">Active</label>
                                    </div>
                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" id="is_active_no" value="0"
                                            name="status">
                                        <label class="custom-control-label" for="is_active_no">Inactive</label>
                                    </div>

                                </div>
                            </div>


                            <div class="col-md-12 text-danger">
                                Note : All * Mark Fields are Compulsory !
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btnSubmit">
                                    <i class="fa fa-plus"></i> Add Customer
                                </button>

                            </div>
                        </div>
                </form>
            </div>
        </div>

    </section>

@endsection

@section('extracss')

    <style>
        #category_id+ul.category_div {
            height: 130px;
            overflow-x: auto;
        }

        #section_id {
            height: 155px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 42px !important;
        }
    </style>
@endsection

@section('extrajs')


    <script type="text/javascript">
        let name = document.getElementById("name");
        let mobile = document.getElementById("mobile");
        let email = document.getElementById("email");
        let namespan = document.getElementById("namespan");
        let namespan_mobile = document.getElementById("namespan_mobile");
        let namespan_email = document.getElementById("namespan_email");
        name_val = 0;
        email_val = 0;
        mobile_val = 0;
        console.log(name);
        console.log(mobile);
        console.log(email);
        console.log(namespan);
        console.log(namespan_mobile)




        name.addEventListener("blur", function() {

            let regex = /^[a-zA-Z ]{6,30}$/;
            let regexx = /^[a-zA-Z ]{1,6}$/;

            let str = name.value;
            if (regex.test(str)) {
                console.log(regex.test(str));
                namespan.style.display = "none";
                name.style.border = "2px solid green";
                name_val = 1;
            } else if (regexx.test(str)) {
                namespan.style.display = "block";
                name.style.border = "2px solid red";
                namespan.innerHTML =
                    "Please Enter Maximum 6 Character";
                name_val = 0;

            } else {
                console.log(regex);
                namespan.style.display = "block";
                name.style.border = "2px solid red";
                namespan.style.color = "red";
                namespan.innerHTML =
                    "Please Enter Valid Customer Name";
                name_val = 0;

            }


        });

        mobile.addEventListener("blur", function() {

            let regex_mobile = /^\d{10}$/;;
            let str = mobile.value;
            if (regex_mobile.test(str)) {
                namespan_mobile.style.display = "none";
                mobile.style.border = "2px solid green";
                mobile_val = 1;

            } else {
                namespan_mobile.style.display = "block";
                mobile.style.border = "2px solid red";
                namespan_mobile.style.color = "red";
                namespan_mobile.innerHTML =
                    "Please Enter 10 Digit Mobile Number";
                mobile_val = 0;

            }
        });


        email.addEventListener("blur", function() {

            let regex_email =
                /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            let str = email.value;
            if (regex_email.test(str)) {
                namespan_email.style.display = "none";
                email.style.border = "2px solid green";
                email_val = 1;

            } else {
                namespan_email.style.display = "block";
                email.style.border = "2px solid red";
                namespan_email.style.color = "red";
                namespan_email.innerHTML =
                    "Please Enter Valid Email Address";
                email_val = 0;

            }
        });
        console.log(email_val && mobile_val && name_val);
        $("#formAddCustomer").submit(function(e) {

            if (email_val == 1 && mobile_val == 1 && name_val == 1) {
                console.log('sended successfully');
                console.log(email_val && mobile_val && name_val);
                console.log(' i m at  sent');


            } else {
                e.preventDefault();
                alert('Please Enter All Fields Properly');
                console.log(email_val && mobile_val && name_val);
                console.log(' i m at not sent');

            }
        });
    </script>
@endsection
