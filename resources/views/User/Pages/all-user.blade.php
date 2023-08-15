@extends('User.Include.main')
@section('title', 'All User')
@section('breadcumb', 'Home')
@section('breadcumb2', 'All User')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="" style="float: right;">
          <a href="{{route('getCreateUser')}}" class="btn btn-primary btn-sm btn-icon-text mr-3">
            Create User
            <i class="typcn typcn-user btn-icon-append"></i>
          </a>
        </div>
        <h4 class="card-title">User List</h4>
        <p class="card-description">
          All <code>User</code> List 
        </p>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @if(is_array($userAll) || is_object($userAll))
                        @foreach($userAll->chunk(10) as $collection)
                            @forelse ($collection as $count=>$user)
                                <tr>
                                    <td>{{$count+1}}</td>
                                    <td>
                                          @if(isset($user->profile_img))
                                          <img src="{{ asset('storage/profile_images/'. $user->profile_img) }}" alt="Current Profile Image" style="width:40px; height:40px;" class="mr-2">
                                          @else
                                          <img src="{{asset('user/images/faces/face5.jpg')}}" alt="profile" style="width:40px; height:40px;"/>
                                          @endif
                                        {{$user->name}}
                                    </td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->mobile}}</td>
                                    <td>{{ substr($user->address, 0, 25) }}..</td>
                                    <td>
                                      <div class="d-flex align-items-center">
                                          <a href="{{route('getEditUser', $user->id)}}" class="btn btn-success btn-sm btn-icon-text mr-3">
                                              Edit
                                              <i class="typcn typcn-edit btn-icon-append"></i>
                                          </a>
                                          <a href="{{route('getDeleteUser',['id'=> $user->id])}}" class="btn btn-danger btn-sm btn-icon-text">
                                              Delete
                                              <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                          </a>
                                      </div>
                                    </td>
                                </tr>
                            @empty
                                <tr><td>No Data Found!</td></tr>
                            @endforelse
                        @endforeach
                    @endif
            </tbody>
          </table>
        </div>
      </div>
      {{ $userAll->links() }}
    </div>
</div>
@endsection