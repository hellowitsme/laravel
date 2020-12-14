@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header font-weight-bold">{{ __('Job Update') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('jobs.update', $job->id) }}" autocomplete="off">
                            @csrf

                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                                <div class="col-md-6">
                              
                                  <select name="type" id="type" class="form-control     @error('type') is-invalid @enderror" value="{{ old('type') }}" autofocus>
                                    <option value="">未選択</option>
                                    <option value="ナニー">ナニー</option>
                                    <option value="ハウスキーパー">ハウスキーパー</option>
                                  </select>

                                  @error('type')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

                                <div class="col-md-6">
                                    <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ $job->location }}" autofocus>

                                    @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="experience" class="col-md-4 col-form-label text-md-right">{{ __('Experience') }}</label>

                                <div class="col-md-6">
                                    <input id="experience" type="text" class="form-control @error('experience') is-invalid @enderror" name="experience" value="{{ $job->experience }}" autofocus>

                                    @error('experience')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="salary" class="col-md-4 col-form-label text-md-right">{{ __('Salary') }}</label>

                                <div class="col-md-6">
                                    <input id="salary" type="text" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ $job->salary }}" autofocus>

                                    @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                              <label for="detail" class="col-md-4 col-form-label text-md-right">{{ __('Detail') }}</label>

                              <div class="col-md-6">
                                <textarea name="detail" id="detail" cols="35" rows="5" value="" class="form-control @error('detail') is-invalid @enderror">{{ old('detail', $job->detail)}}</textarea>

                                @error('detail')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection