@extends('user.master')
@section('title', 'welcome homepage')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12"><br>
              <div align="center"><h1>Test CRUD Laravel Framework</h1></div>
                <br>
                <div align="right">
                    <a href="{{route('user.create')}}" class="btn btn-success">Create</a>
                </div>
                <br>
                @if(\Session::has('success'))
                  <div class="alert alert-success">
                    <p>{{\Session::get('success')}}</p>
                  </div>
                @endif
                <table class="table table-bordered table-striped">
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th width="40%">Firstname</th>
                        <th width="35%">Lastname</th>
                        <th width="10%">Edit</th>
                        <th width="10%">Delete</th>
                    </tr>
                    @php ($i = 1)
                    @foreach ($users as $row)
                        <tr>
                            <td class="text-center">{{$i}}</td>
                            <td>{{$row['fname']}}</td>
                            <td>{{$row['lname']}}</td>
                            <td>
                              <a href="{{action('UsersController@edit', $row['id'])}}" class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                                <form method="POST" class="delete_form" action="{{action('UsersController@destroy', $row['id'])}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @php ($i++)
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function() {
      $('.delete_form').on('submit', function(){
          if (confirm("คุณต้องการลบหรือไม่ ?")) {
              return true;
          } else {
              return false;
          }
      })
    })
    </script>
@endsection
