@extends('layouts.app')
@section('title', 'TN | Team')
@section('mainn')

    <!--Content tại đây -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row gy-6">
            <div class="col-lg-12">



                <div class="card">
                    <div class="card-header border-bottom">
                        <h5 class="card-title">Team</h5>
                        <div class="d-flex justify-content-between align-items-center row pt-4 gap-6 gap-md-0 g-md-6">
                          <div class="col-md-4 product_status"></div>
                          <div class="col-md-4 product_category"></div>
                          <div class="col-md-4 product_stock"></div>
                        </div>
                      </div>
                      <table class="datatables-products table">
                        <thead class="border-top">
                          <tr>
                            {{-- <th></th>--}}
                            <th>ID</th> 
                            <th>Name</th>
                            <th>Admin</th>
                            <th>Description</th>
                            <th>actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->admin->username}}</td>
                                <td>{{$item->description}}</td>
                                <td><div class="d-inline-block text-nowrap">
                                    <button class="btn btn-icon"><i class="icon-base bx bx-edit icon-md"></i></button>
                                    <button class="btn btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                      <i class="icon-base bx bx-dots-vertical-rounded icon-md"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end m-0">
                                      <a href="{{ route('teams.show', $item->id) }}" class="dropdown-item">View</a>
                                      <a href="javascript:void(0);" class="dropdown-item">Suspend</a>
                                    </div>
                                  </div></td>
                            </tr>
                            @endforeach
                            
                            
                        </tbody>
                      </table>
                      <tbody>

                       
                    </tbody>
                </div>
            </div>
        </div>
    </div>

@endsection
