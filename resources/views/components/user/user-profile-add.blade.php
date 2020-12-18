<form method="POST" action="{{route('profiles.store',["user_id"=>$userDetail['id']])}}" enctype='multipart/form-data'>
    @csrf
<div class="container-fluid mt--6">

    <div class="row">
        <div class="col-xl-4 order-xl-2">
            <div class="card card-profile">
                <img src="{{asset("assets/img/theme/img-1-1000x600.jpg")}}" alt="Image placeholder" class="card-img-top">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                @if($userDetail->pictureURL != null)
                                    <img src="{{$userDetail->pictureURL}}" class="rounded-circle">
                                @else
                                    <img src="{{asset('assets/img/default-avatar.png')}}" class="rounded-circle">
                                @endif

                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                        <a href="#" class="btn btn-sm btn-info mr-4" data-toggle="modal" data-target="#uploadPictureModal">Change Avatar</a>
                        <div class="modal fade" id="uploadPictureModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Upload picture</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input name="user_id" type="text" hidden value="{{$userDetail->id}}">

                                        <input name="profile-upload-image" type="file" class="custom-file">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center">
                                <div>
                                    <span class="heading">22</span>
                                    <span class="description">Friends</span>
                                </div>
                                <div>
                                    <span class="heading">10</span>
                                    <span class="description">Photos</span>
                                </div>
                                <div>
                                    <span class="heading">89</span>
                                    <span class="description">Comments</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h5 class="h3">{{$userDetail->name}}<span class="font-weight-light">, 27</span>
                        </h5>
                        <div class="h5 font-weight-300">
                            <i class="ni location_pin mr-2"></i>Bucharest, Romania
                        </div>
                        <div class="h5 mt-4">
                            <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                        </div>
                        <div>
                            <i class="ni education_hat mr-2"></i>University of Computer Science
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h3 class="mb-0">User Profile</h3>
                            </div>
                            <div class="col-3 text-right">
                                {{--                         <button type="button" class="btn btn-danger">Delete</button>--}}
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">User information</h6>

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">User Name</label>
                                        <input disabled type="text" name="name" id="name" class="form-control" placeholder="Username" value="{{$userDetail->name}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Email address</label>
                                        <input disabled type="email" name="email"  id="email" class="form-control" placeholder="jesse@example.com" value="{{$userDetail->email}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">First name</label>
                                        <input disabled type="text" id="input-first-name" class="form-control" placeholder="First name" value="Lucky">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">Last name</label>
                                        <input disabled type="text" id="input-last-name" class="form-control" placeholder="Last name" value="Jesse">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Role</label>
                                        <select disabled class="form-control d-block w-50" id="role" name="role">
                                            <option>Admin</option>
                                            <option>Editor</option>
                                            <option>Customer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />

                        <!-- Description -->
                        <h6 class="heading-small text-muted mb-4">Additional Information</h6>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">About Me</label>
                                <textarea name="bio" rows="4" class="form-control" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                            </div>
                        </div>

                        <hr class="my-4" />

                        <!-- Description -->
                        <h6 class="heading-small text-muted mb-4">About me</h6>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">About Me</label>
                                <textarea rows="4" class="form-control" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
</form>



