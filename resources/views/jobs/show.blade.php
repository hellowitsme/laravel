@extends('layouts.app')

@section('content')
  <div class="container bg-light pt-3">
    <h2 class="mb-3 text-">{{ __('Jobs Detail')}}</h2>
    <div class="row  justify-content-center">
      <div class="col-md-6 p-5">
            <p class="font-weight-bold">
              <span class="text-success">種類：</span>
              {{$job->type}}
            </p>
            <p style="word-wrap:break-word;overflow-y:scroll;min-height:25px;">
              <span class="text-success font-weight-bold">勤務地：</span>
              {{$job->location}}
            </p>
            <p>
              <span class="text-success font-weight-bold">経験年数：</span>
              {{$job->experience}}
            </p>
            <p>
              <span class="text-success font-weight-bold">給与：</span>
              {{$job->salary}}
            </p>
            <span class="text-success font-weight-bold">詳細：</span>
            <p style="word-wrap:break-word;overflow-y:scroll;height:100px;background-color:#f6f6f6;" class="bg-white">{{$job->detail}}</p>
      </div>
    </div>
  </div>
@endsection