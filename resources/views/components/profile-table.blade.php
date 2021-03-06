<div class="row">
    <div class="col">
        <div class="card">
{{--            @php--}}
{{--                foreach ($listOfUser as $user){--}}
{{--                    dd($user["id"]);--}}
{{--                }--}}
{{--            @endphp--}}
            <!-- Card header -->
            <div class="card-header border-0">
                <h3 class="mb-0">User</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col" class="sort" data-sort="name">ID</th>
                        <th scope="col" class="sort" data-sort="name">Name</th>
                        <th scope="col" class="sort" data-sort="budget">Email</th>
                        <th scope="col" class="sort" data-sort="status">Role</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    @foreach($listOfUser as $user)
                        <tr>
                            <td class="budget">
                                {{strval($user['id'])}}
                            </td>
                            <th scope="row">
                                <div class="media align-items-center">
                                    {{--                                    <a href="#" class="flex-row w mr-3">--}}
                                    {{--                                        @if($product['pictureURL'] != null)--}}
                                    {{--                                            <img alt="Image placeholder" class="thumbnail-img fit-image" src="{{\Illuminate\Support\Facades\URL::asset($product['pictureURL'])}}">--}}
                                    {{--                                        @else--}}
                                    {{--                                            <img alt="Image placeholder" src="../assets/img/theme/bootstrap.jpg">--}}
                                    {{--                                        @endif--}}
                                    {{--                                    </a>--}}
                                    <div class="media-body">
                                        @if($user->profile != null)
                                            <span class="name mb-0 text-sm" data-toggle="popover-hover" data-img="{{$user->profile->pictureURL}}">{{$user['name']}}</span>
                                        @else
                                            <span class="name mb-0 text-sm" data-toggle="popover-hover" data-img="{{asset('assets/img/default-avatar.png')}}">{{$user['name']}}</span>
                                        @endif
                                    </div>
                                </div>
                            </th>
                            <td class="budget">
                                {{$user['email']}}
{{--                                {{strval($user.email)}}--}}
                            </td>
                            <td>
                                {{ucfirst($user->role->name)}}
                            </td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{route('users.edit',['user'=>$user['id']])}}">Edit</a>
                                        <a class="dropdown-item" href="{{route('profiles.check',['user'=>$user['id']])}}">View Profile</a>
                                        @if(auth()->user()->id == $user['id'])

                                        @else
                                            <form method="POST" action="{{route("users.destroy",["user"=>$user['id']])}}">
                                                @csrf
                                                @method('delete')
                                                <button class="dropdown-item" type="submit">Delete</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
                <nav aria-label="...">
                    <ul class="pagination justify-content-end mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">
                                <i class="fas fa-angle-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="fas fa-angle-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
