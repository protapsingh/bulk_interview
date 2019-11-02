@extends('layouts.app')
@section('content')
<div class="container-fluid app-body">
	<h3>Recent post sent to buffer
    </h3>

    <div class="search-container">
        <ul style="float:left;  display:inline;">
            <li  style="float:left;  display:inline;">
            <form action="history" method='get'>
              <input type="search" placeholder="Search.." name="search">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </li>
        <li  style="float:left;  display:inline;">
            <form action="history" method='get'>
                    &nbsp;
                    &nbsp;
                    <input type="date"  name="date">
                    <button type="submit"><i class="fa fa-search"></i></button>
                  </form>
                  &nbsp;
                  &nbsp;

                </li>
                <li  style="float:left;  display:inline;">
            <form action="history" method='get'>
                    &nbsp;
                    &nbsp;
                      <select name="filter" style="width:300px; height:30px;">
                          <option> all groups</option>
                          @foreach($groups as $group)
                          <option value="{{$group->id}}">{{$group->name}}</option>
                          @endforeach
                      </select>
                      <button type="submit"><i class="fa fa-search"></i> (filter)</button>
                    </form>
                </li>
                </ul>
          </div>
	<div class="row">
		<div class="col-md-12">
			<table class="table "> 
				<thead> 
					<tr><th>Group Name</th> <th>Group Type</th> <th>Account Name</th> <th>Post Text</th> <th>Time</th> </tr> 
				</thead> 
				<tbody>
                    @foreach($datas as $data)
                    <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->type}}</td>
                    <td><img style="height:60px; border-radius:30px;" src="{{$data->avatar}}"></td>
                    {{-- <td><img src="{{asset('/avatar/$data->avatar')}}"></td> --}}
                    <td>{{$data->post_text}}</td>
                    <td>{{$data->time}}</td>
                    </tr>
                    @endforeach 
				<tbody>
            </table>
            {{ $datas->links() }}
		</div>
	</div>
</div>
@endsection