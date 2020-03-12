@extends('layouts.app')
@section('content')
<div class="container-fluid app-body app-home">
    <div class="row home-block">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Recent Post Sent To Buffer</h3>
                    <div class="activities">
                      <div class="col-md-6">
                        <form class="form-inline" action="" method="get">
                          <div class="form-group">
                            <input type="search" class="form-control" name="search" placeholder="Search" value="{{$search_key?$search_key:null}}">

                          </div>
                          <div class="form-group"> 
                               
                                <input type="text"  name="date"  placeholder="Select Date" class="form-control float-right" id="datepicker" value="{{$date_key?$date_key:null}}">
                             
                                
                        </div>
                          <div class="form-group">
                            
                            <select class="form-control custom-select" name="group_type">
                              <option selected disabled>All CAtegory</option>
                                  @foreach($group_type as $data)
                                    @if($data['type'] == 'upload')
                                    <option @if($type_key == $data['type']) selected @endif value="{{$data['type']}}">Content Upload</option>
                                    @elseif($data['type'] == 'curation')
                                     <option @if($type_key == $data['type']) selected @endif value="{{$data['type']}}">Content Curation</option>
                                    @elseif($data['type'] == 'rss-automation')
                                     <option @if($type_key == $data['type']) selected @endif value="{{$data['type']}}"> RSS Automation</option>
                                     @endif
                                   @endforeach
                            </select>
                          </div>
                          <button type="submit" class="btn btn-primary">
                            <i class="fa fa-search"></i>
                          </button>
                         
                        </form>
                      </div>
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th>Group Name</th> <th>Group Type</th> <th>Account Name</th> <th>Post Text</th> <th>Time</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($groups as $data)
                                  <tr>
                                    <td>{{$data->groupInfo->name}}</td>
                                    <td>
                                      @if($data->groupInfo['type'] == 'upload')
                                      Content Upload
                                      @elseif($data->groupInfo['type'] == 'curation')
                                      Content Curation
                                      @elseif($data->groupInfo['type'] == 'rss-automation')
                                      RSS Automation
                                      @else
                                      <td></td>
                                      @endif
                                    </td>
                                    @if($data->accountInfo['type'] != 'google')
                                    <td width="350">
                                      <div class="media">
                                          <div class="media-left">
                                          <span class="fa fa-{{$data->accountInfo['type']}}"></span>
                                          <img width="50" class="media-object img-circle" src="{{$data->accountInfo['avatar']}}" alt="">
                                          </div>
                                      </div>
                                    </td>
                                      @else
                                      <td></td>
                                      @endif
                                   
                                    <td>{{$data->post_text}}</td>
                                    <td> {{ date("j F, Y h:i a", strtotime($data->sent_at)) }}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                              {{$groups->appends($_GET)->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection