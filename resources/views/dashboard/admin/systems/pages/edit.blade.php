@extends('dashboard')

@section('title')
    modifier systeme
@endsection

@section('title_page')
    modifier systeme
@endsection


@section('contenu') 
    <form class="mt-3" action="{{ route('admin.systems.update',$system->id) }}" method="post">
        @csrf
        @method("put")
        <div class="d-flex gap-2">
            <div class="w-100">
                <label class="form-label" for="id_point">point</label>
                <select class="form-control" name="id_point" id="id_point">
                    <option disabled selected>choisir la point</option>
                    @foreach ($points as $point)
                        <option @if($point->id==$system->point->id) selected @endif value="{{$point->id}}">{{$point->type}}</option>                        
                    @endforeach
                </select>
                @error('id_point')
                    <span class="mt-2 text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div  id="div_partenaire" class="w-100">
                <label class="form-label" for="id_partenaire">partenaire</label>
                <select class="form-control" name="id_partenaire" id="id_partenaire">
                    <option disabled selected>choisir le partenaire</option>
                    @foreach ($partenaires as $partenaire)
                        <option @if($partenaire->id==$system->partenaire->id) selected @endif value="{{$partenaire->id}}">{{$partenaire->fname}} {{$partenaire->lname}}</option>                        
                    @endforeach
                </select>
                @error('id_partenaire')
                    <span class="mt-2 text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary mt-2">modifier</button>
    </form>
@endsection


@section("script")

@endsection