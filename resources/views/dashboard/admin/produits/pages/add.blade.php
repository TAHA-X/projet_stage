@extends('dashboard')

@section('title')
    ajouter produit
@endsection

@section('title_page')
    ajouter produit
@endsection

@section('contenu')
    <form class="mt-3" action="{{ route('admin.produits.store') }}" method="post">
        @csrf
        <div class="d-flex gap-2">
            <div class="w-100">
                <label class="form-label" for="title">title</label>
                <input name="title" class="form-control" value="{{ old('title') }}" @error('title') is-invalid @enderror type="text">
                @error('title')
                    <span class="mt-2 text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-100">
                  <label class="form-label" for="prix">prix</label>
                  <input name="prix" value="{{ old('prix') }}" class="form-control" @error('prix') is-invalid @enderror type="number">
                  @error('prix')
                      <span class="mt-2 text-danger">{{ $message }}</span>
                  @enderror
              </div>
            <div class="w-100">
                <label class="form-label" for="id_partenaire">partenaire</label>
                <select class="form-control" name="id_partenaire" id="id_partenaire">
                    <option disabled selected>choisir le partenaire</option>
                    @foreach ($partenaires as $partenaire)
                        <option value="{{$partenaire->id}}">{{$partenaire->fname}} {{$partenaire->lname}}</option>                        
                    @endforeach
                </select>
                @error('id_partenaire')
                    <span class="mt-2 text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
     
        <button class="btn btn-primary mt-2">ajouter</button>
    </form>
@endsection
