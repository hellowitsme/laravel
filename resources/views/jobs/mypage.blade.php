@extends('layouts.app')

@section('content')
  <div class="container">
    <h2 class="mb-3">{{ __('Your Opening Jobs')}}</h2>
    
    @foreach($jobs as $job)
      <div class="row mt-4 pt-4 border-top">
        <div class="col-sm-6 pt-4">
          <p class="font-weight-bold">
            <span class="text-success">種類：</span>
            {{$job->type}}
          </p>
          <p style="word-wrap:break-word;overflow-y:scroll;height:25px;">
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
        </div>

        <div class="col-sm-6 mb-4 pt-4" >
          詳細：<p style="word-wrap:break-word;overflow-y:scroll;height:100px;background-color:#f6f6f6;" class="">{{$job->detail}}</p>
          <a href="{{ route('jobs.show', $job->id) }}"><button class="btn btn-success">詳しく</button></a>
          <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-primary">{{__('Update')}}</a>
          <form action="{{route('jobs.delete', $job->id)}}" method="post" class="d-inline">
            @csrf
            <button class="btn btn-danger" onclick='return confirm("削除しますか？")' >
              {{ __('Delete') }}
            </button>
          </form>
        </div>
      </div>
      @endforeach

  </div>
@endsection