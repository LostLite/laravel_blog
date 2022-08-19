@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Profile Page </h4>

            <form method="post" action="{{ route('admin.store_profile') }}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input name="name" class="form-control" type="text" value="{{ $editData->name }}"  id="example-text-input">
                    </div>
                </div>
                <!-- end row -->

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">User Email</label>
                    <div class="col-sm-10">
                        <input name="email" class="form-control" type="text" value="{{ $editData->email }}"  id="example-text-input">
                    </div>
                </div>
                <!-- end row -->


                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image </label>
                    <div class="col-sm-10">
                    <input name="profile_image" class="form-control" type="file" id="image">
                    </div>
                </div>
                <!-- end row -->

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                    <div class="col-sm-10">
                        @if (!empty($editData->profile_image) && $editData->profile_image != "")
                            <img id="showImage" class="rounded avatar-lg" src="{{ asset('upload/admin_images/'.$editData->profile_image) }}" alt="Card image cap">
                        @else
                            <img id="showImage" class="rounded avatar-lg" src="{{ asset('backend/assets/images/small/img-5.jpg') }}" alt="Card image cap">
                        @endif
                    </div>
                </div>
                <!-- end row -->
                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile">
            </form>
        </div>
    </div>
</div> <!-- end col -->


<script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection 