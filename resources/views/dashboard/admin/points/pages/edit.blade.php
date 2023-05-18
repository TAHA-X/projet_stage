@extends('dashboard')
@section('title')
    modifier point
@endsection

@section('title_page')
    modifier point
@endsection
@section('contenu')
    <form class="mt-3" action="{{ route('admin.points.update', $point->id) }}" method="post">
        @method('put')
        @csrf
        <div class="d-flex gap-2">
            <div class="w-100">
                  <label class="form-label" for="type">type</label>
                  <input value="{{$point->type}}" class="form-control" @error("type") is-invalid @endif id="type" name="type" type="text">
                  @error("type") 
                        <span class="mt-1">{{$message}}</span>                 
                  @enderror
            </div>
            <div class="w-100">
                   <label class="form-label" for="type">valueDH</label>
                   <input value="{{$point->valueDH}}" class="form-control" @error("valueDH") is-invalid @endif id="type" name="valueDH" type="number">
                   @error("valueDH") 
                         <span class="mt-1">{{$message}}</span>                 
                   @enderror
            </div>
            <div class="w-100">
                   <label class="form-label" for="type">valuePoint</label>
                   <input value="{{$point->valuePoint}}" class="form-control" @error("valuePoint") is-invalid @endif id="type" name="valuePoint" type="number">
                   @error("valuePoint") 
                         <span class="mt-1">{{$message}}</span>                 
                   @enderror
            </div>
        </div>
        <button class="btn btn-primary mt-2">modifier</button>
    </form>
@endsection
