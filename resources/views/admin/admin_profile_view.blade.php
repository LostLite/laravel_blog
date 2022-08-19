@extends('admin.admin_master')
@section('admin')

<div class="col-lg-6">
    <div class="card"><br><br>
        <center>
            @if (!empty($admin->profile_image) && $admin->profile_image != "")
                <img class="rounded-circle avatar-xl" src="{{ asset('upload/admin_images/'.$admin->profile_image) }}" alt="Card image cap">
            @else
                <img class="rounded-circle avatar-xl" src="{{ asset('backend/assets/images/small/img-5.jpg') }}" alt="Card image cap">
            @endif
        
        </center>
        <div class="card-body">
            <h4 class="card-title">Name : {{ $admin->name }} </h4>
            <hr>
            <h4 class="card-title">User Email : {{ $admin->email }} </h4>
            <hr>
            <h4 class="card-title">User Name : {{ $admin->username }} </h4>
            <hr>
            <a href="{{ route('admin.edit_profile')}}" class="btn btn-info btn-rounded waves-effect waves-light" > Edit Profile</a>
            
        </div>
    </div>
</div> 

@endsection 