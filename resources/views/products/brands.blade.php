@extends('master.main')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card" >
                    <div class="card-header"><a href="/brand" >Add New Brand</a></div>
                    <div class="card-body pt-5 pb-2">
                       
                        <form method="POST" action="/brand/add" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name"  class="form-control form-control-sm"/>
                            </div>
                            <div class="form-group">
                                <label>Logo</label>
                                <input type="file" name="img"  class="form-control form-control-sm"/>
                            </div>
                            <div class="form-group pt-4">
                                <input type="submit" value="Save" class="btn btn-sm btn-block btn-secondary"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header"><a href="/brand" >All Brand</a></div>
                    <div class="card-body pt-5 pb-2">
                      <table class="table table-hover">
                          <thead>
                              <tr>
                                <th>No.</th>
                                <th>Logo</th>
                                <th>Name</th>
                                <th></th>
                              </tr>
                             
                          </thead>
                          @forelse (\App\Brand::all() as $brand)
                              <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img style="width:50px" src="{{asset('storage/'.$brand->img)}}"/></td>
                               <td>{{$brand->name }}</td>
                              <td><a href="/brand/delete/{{$brand->id}}">Delete</a></td>
                              </tr>
                          @empty
                          <tr>
                              <td colspan="3">No Brands</td>
                            </tr>
                          @endforelse
                      </table>
                    </div>
                </div>
            </div>
        </div>
@endsection