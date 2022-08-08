@extends('backend.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4>My Team Members ({{\Illuminate\Support\Facades\Auth::user()->team_name}})</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Account Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
            @if(count($members)> 0)
                <?php $i=1;?>
                @foreach($members as $member)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$member->name}} @if(\Illuminate\Support\Facades\Auth::user()->name == $member->name) <span class="text-info">(Me)</span> @endif</td>
                    <td>{{$member->email}}</td>
                    <td>{{$member->phone}}</td>
                    <td>@if($member->status == 1) <strong class="text-success">Active</strong> @else <strong class="text-danger">Inactive</strong> @endif</td>
                    <td>
                    @if(\Illuminate\Support\Facades\Auth::user()->id == $member->id)
{{--                            date('Y-m-d',strtotime(now())) == $expiryDate--}}
                        @if($accessToken != null && $expiryDate != null && date('Y-m-d',strtotime(now())) != $expiryDate)
                                <a href="{{$accessToken->token}}" class="btn btn-primary">Start Now</a>
                        @else
                            <form action="{{route('registering')}}" method="post" class="d-inline-block">
                                {!! csrf_field() !!}
                                <input type="hidden" name="my_id" value="{{$member->id}}">
                                <button class="btn btn-info" type="submit">Get started</button>
                            </form>
                        @endif
                    @endif
                        <a href="{{route('view.progress',["ID"=>$member->id])}}"><button class="btn btn-success" type="button">view progress</button></a>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">Not Found!</td>
                </tr>
            @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
