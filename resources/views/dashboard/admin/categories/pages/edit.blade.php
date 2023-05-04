@extends('dashboard')
@section('title')
    modifier categorie
@endsection

@section('title_page')
    modifier categorie
@endsection
@section('contenu')
    <form class="mt-3" action="{{ route('admin.categories.update', $categorie->id) }}" method="post">
        @method('put')
        @csrf
        <div>
            <label class="form-label" for="title">titre</label>
            <input value="{{ $categorie->title }}" name="title" id="title"
                class="form-control @error('title') is-invalid @enderror" type="text">
            @error('title')
                <span class="text-danger mt-1">{{ $message }}</span>
            @enderror
        </div>
        <label class="form-label" for="id_parent">parent</label>
    

        <select name="id_parent" class="form-control w-50 @error('id_parent') is-invalid @enderror" id="id_parent">

             <option @if($categorie->id_parent==null) selected @endif value="">pas de parent</option>

             @foreach ($categories as $c)
                <option @if($c->id==$categorie->id_parent) selected @endif value="{{$c->id}}">{{$c->title}}</option>

             @endforeach

        </select>
        @error('id_parent')
            <span class="text-danger mt-1">{{ $message }}</span>
        @enderror
        <button class="btn btn-primary mt-2">modifier</button>
    </form>
@endsection
