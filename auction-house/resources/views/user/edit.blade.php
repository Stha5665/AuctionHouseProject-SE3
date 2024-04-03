{{--This for making the title of page dynamic--}}
@section('pageName', 'Update Auction')
{{--This for using common layout--}}
<x-app-layout>
    {{--Available as app.blade.php--}}
    {{--    Form element inside card --}}
    <div class="card bg-white p-3 mx-auto">
        {{--      Header starts here  --}}
        <div class="card-header">
            {{--            The title of the card--}}
            {{--            or the header--}}
            <h1 class="text-center display-6 ">Update User</h1>
        </div>

        {{--        card body have the form elements--}}
        <div class="card-body">
            {{--            this is the tag for the form--}}
            {{--            The form is used with method POST--}}
            {{--            Here ectype is multipart so that image can be uploaded--}}
            <form class="form-control" method="POST" action="{{route('users.update', $userDetailData->id)}}">
                @method('PUT')
                @csrf
                {{--                Main row in the grid layout--}}
                <div class="row">
                    {{--                    for Item name--}}
                    <div class="col-md-12 mt-2">
                        {{--                        label--}}
                        <label>Address<span class="text-bg-danger">*</span> </label>
                        {{--                        input type text--}}
                        <input type="text" class="form-control" name="address" value="{{$userDetailData->address}}" required>
                        {{--                        This for showing error message--}}
                        @error('address')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-2">
                        {{--                        label--}}
                        <label>Email<span class="text-bg-danger">*</span> </label>
                        {{--                        input type text--}}
                        <input type="email" class="form-control" name="email" value="{{$userDetailData->email}}" required>
                        {{--                        This for showing error message--}}
                        @error('email')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-2">
                        {{--                        label--}}
                        <label>Phone Number<span class="text-bg-danger">*</span> </label>
                        {{--                        input type text--}}
                        <input type="text" class="form-control" name="phone_number" value="{{$userDetailData->phone_number}}" required>
                        {{--                        This for showing error message--}}
                        @error('phone_number')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mt-2">
                        {{--                        label--}}
                        <label>First Name<span class="text-bg-danger">*</span> </label>
                        {{--                        input type text--}}
                        <input type="text" class="form-control" name="first_name" value="{{$userDetailData->first_name}}" required>
                        {{--                        This for showing error message--}}
                        @error('first_name')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mt-2">
                        {{--                        label--}}
                        <label>Middle Name </label>
                        {{--                        input type text--}}
                        <input type="text" class="form-control" name="middle_name" value="{{$userDetailData->middle_name ?? ''}}" >
                        {{--                        This for showing error message--}}
                        @error('middle_name')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mt-2">
                        {{--                        label--}}
                        <label>Last Name<span class="text-bg-danger">*</span> </label>
                        {{--                        input type text--}}
                        <input type="text" class="form-control" name="last_name" value="{{$userDetailData->last_name}}" required>
                        {{--                        This for showing error message--}}
                        @error('last_name')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mt-2">
                        {{--                        label--}}
                        <label>Password<span class="text-bg-danger">*</span> </label>
                        {{--                        input type text--}}
                        <input type="text" class="form-control" name="password" value="" >
                        {{--                        This for showing error message--}}
                        @error('password')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 mt-2">
                        <label>Role<span class="text-bg-danger">*</span> </label>
                        <select name='role' class="form-control" required>
                            <option value="">-- Select role --</option>
                            <option value="admin" {{$userDetailData->role == 'admin' ? 'selected':''}}>Admin</option>
                            <option value="buyer" {{$userDetailData->role == 'buyer' ? 'selected':''}}>Buyer</option>
                            <option value="seller" {{$userDetailData->role == 'seller' ? 'selected':''}}>Seller</option>
                            <option value="both" {{$userDetailData->role == 'both' ? 'selected':''}}>Both</option>
                        </select>

                        @error('role')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 mt-2">
                        {{--                        This for the storing item status--}}
                        <label>Status </label>

                        <select class="form-control" name="status">
                            <option value="verified" {{$userDetailData->status == 'verified'?'selected':''}}>Verified</option>
                            <option value="unverified" {{$userDetailData->status == 'unverified'?'selected':''}}>Unverified</option>
                            <option value="closed"{{$userDetailData->status == 'closed' ? 'selected':''}}>Closed</option>
                        </select>
                        @error('status')
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
