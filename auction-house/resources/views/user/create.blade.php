{{--This for making the title of page dynamic--}}
@section('pageName', 'Add Auction')
{{--This for using common layout--}}
<x-app-layout>
    {{--Available as app.blade.php--}}
    {{--    Form element inside card --}}
    <div class="card bg-white p-3 mx-auto">
        {{--      Header starts here  --}}
        <div class="card-header">
            {{--            The title of the card--}}
            {{--            or the header--}}
            <h1 class="text-center display-6 ">Add User</h1>
        </div>

        {{--        card body have the form elements--}}
        <div class="card-body">
            {{--            this is the tag for the form--}}
            {{--            The form is used with method POST--}}
            {{--            Here ectype is multipart so that image can be uploaded--}}
            <form class="form-control" method="POST" action="{{route('users.store')}}">
                @csrf
                {{--                Main row in the grid layout--}}
                <div class="row">
                    {{--                    for Item name--}}
                    <div class="col-md-12 mt-2">
                        {{--                        label--}}
                        <label>Address<span class="text-bg-danger">*</span> </label>
                        {{--                        input type text--}}
                        <input type="text" class="form-control" name="address" value="{{old('address')}}" required>
                        {{--                        This for showing error message--}}
                        @error('address')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-2">
                        {{--                        label--}}
                        <label>Email<span class="text-bg-danger">*</span> </label>
                        {{--                        input type text--}}
                        <input type="email" class="form-control" name="email" value="{{old('email')}}" required>
                        {{--                        This for showing error message--}}
                        @error('email')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-2">
                        {{--                        label--}}
                        <label>Phone Number<span class="text-bg-danger">*</span> </label>
                        {{--                        input type text--}}
                        <input type="text" class="form-control" name="phone_number" value="{{old('phone_number')}}" required>
                        {{--                        This for showing error message--}}
                        @error('phone_number')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mt-2">
                        {{--                        label--}}
                        <label>First Name<span class="text-bg-danger">*</span> </label>
                        {{--                        input type text--}}
                        <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}" required>
                        {{--                        This for showing error message--}}
                        @error('first_name')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mt-2">
                        {{--                        label--}}
                        <label>Middle Name </label>
                        {{--                        input type text--}}
                        <input type="text" class="form-control" name="middle_name" value="{{old('middle_name')}}" required>
                        {{--                        This for showing error message--}}
                        @error('middle_name')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mt-2">
                        {{--                        label--}}
                        <label>Last Name<span class="text-bg-danger">*</span> </label>
                        {{--                        input type text--}}
                        <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}" required>
                        {{--                        This for showing error message--}}
                        @error('last_name')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mt-2">
                        {{--                        label--}}
                        <label>Password<span class="text-bg-danger">*</span> </label>
                        {{--                        input type text--}}
                        <input type="text" class="form-control" name="password" value="{{old('password')}}" required>
                        {{--                        This for showing error message--}}
                        @error('password')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 mt-2">
                        <label>Role<span class="text-bg-danger">*</span> </label>
                        <select name='role' class="form-control" required>
                            <option value="">-- Select role --</option>
                            <option value="admin">Admin</option>
                            <option value="buyer">Buyer</option>
                            <option value="seller">Seller</option>
                            <option value="both">Both</option>
                        </select>

                        @error('role')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{--                    Submit button to submit the form--}}
                    <div class="col-md-12  my-3">
                        {{--                        button--}}
                        <button type="submit" class="btn btn-outline-dark ">
                            Submit
                        </button>
                    </div>

                </div>
            </form>
        </div>

    </div>
</x-app-layout>

{{--page ends here--}}
