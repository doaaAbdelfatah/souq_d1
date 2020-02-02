@extends('master.main')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card" >
                    <div class="card-header">Add New Category</div>
                    <div class="card-body pt-5 pb-2">
                        @if (session()->has("cat"))
                            <div class="alert  alert-success">
                                {{-- {{session()->get("msg")}} --}}
                                Category {{session()->get("cat")->name}} Inserted Successfully
                            </div>
                        @endif
                        <form method="POST" action="/category/add">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                            <input type="text" name="name" @if (session()->has("cat"))   value='{{session()->get("cat")->name}}' @endif class="form-control form-control-sm"/>
                            </div>
                            <div class="form-group pt-4">
                                <input type="submit" value="Save" class="btn btn-sm btn-block btn-secondary"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" >
                    <div class="card-header">Add  Sub Category</div>
                    <div class="card-body pt-1 pb-1">
                        @if (session()->has("sub_cat"))
                            {{-- <div class="alert  alert-success">
                              
                                Sub  Category {{session()->get("sub_cat")->name}}  Successfully Done
                            </div> --}}
                        @endif
                        <form method="POST" action="/sub_category/add">
                            @if (session()->has("sub_cat"))  
                                <input type="hidden" name="id" value="{{session()->get("sub_cat")->id}}"/>
                            @endif
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name"  
                                @if (session()->has("sub_cat"))   value='{{session()->get("sub_cat")->name}}' @endif
                                                               
                                class="form-control form-control-sm"/>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control form-control-sm" name="category_id">
                                    @forelse(\App\Category::all() as $row)
                                    <option value="{{$row->id}}"   
                                        @if (session()->has("sub_cat") && session()->get("sub_cat")->category_id ==$row->id )
                                            selected
                                        @endif
                                     >{{$row->name}}</option>
                                    @empty 
                                        <option>No Categories Yet</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Save" class="btn btn-sm btn-block btn-secondary"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="row mt-4 ">
            <div class="col-md-12 accordion" id="accordionExample">
                <div class="card" >
                    <div class="card-header">All Categories</div>
                    <div class="card-body">
                       <div class="row">
                            @forelse (\App\Category::all() as $data)
                            <div  class="col border border-secondary m-1 p-2">                                
                                <h5 title="Create At: {{$data->created_at}}">{{ $data->name}}  <button data-toggle="modal" data-target="#exampleModal{{$data->id}}" class="float-right btn btn-sm btn-danger">Delete</button></h4>                                
                               
                                @forelse ($data->sub_categories as $sub_cat_item)
                                <div >{{$sub_cat_item->name}} 
                                    {{-- - {{$sub_cat_item->category->name}}  --}}
                                    
                                    <a class="float-right text-danger" title="Delete Sub Category {{$sub_cat_item->name}}" href="/sub_category/delete/{{$sub_cat_item->id}}">Delete</a>
                                    <a class="float-right text-success  mr-2" title="Edit Sub Category {{$sub_cat_item->name}}" href="/sub_category/edit/{{$sub_cat_item->id}}">Edit</a>
                                </div>
                                @empty
                                    No Sub Categories Yet
                                @endforelse                                   
                                
                            </div>
                            @component('my_components.modal' , ["row" =>$data])

                            @endcomponent
                            @empty
                            <div class="col">
                                No categories Yet
                            </div>
                            @endforelse
                        </div>


                      

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
