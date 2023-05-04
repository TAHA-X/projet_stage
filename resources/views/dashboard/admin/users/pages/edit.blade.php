@extends('dashboard')
{{-- "fname"=>"required",
"lname"=>"required",
"email"=>["email","required",Rule::unique(User::class)->ignore($id)],
"password"=>"required",
"phone"=>"required|numeric",
"level_id"=>"required|numeric", --}}
@section('title')
    modifier user
@endsection

@section('title_page')
    modifier user
@endsection

@section('contenu')
    <form class="mt-3" action="{{ route('admin.users.update',$user->id) }}" method="post">
        @method('put')
        @csrf
        <div class="d-flex gap-2">
            <div class="w-50">
                <label class="form-label" for="prenom">prénom</label>
                <input value="{{ $user->fname }}" name="fname" id="prenom" class="form-control @error('fname') is-invalid @enderror" type="text">
                @error("fname")
                <span class="text-danger mt-1">{{$message}}</span>                  
          @enderror
            </div>
            <div class="w-50">
                <label class="form-label" for="nom">nom</label>
                <input value="{{ $user->lname }}" name="lname" id="nom" class="form-control @error('lname') is-invalid @enderror" type="text">
                @error("lname")
                <span class="text-danger mt-1">{{$message}}</span>                  
           @enderror
            </div>
        </div>
        <div class="d-flex gap-2">
            <div class="w-50">
                <label class="form-label" for="email">email</label>
                <input value="{{ $user->email }}" name="email" id="email" class="form-control @error('email') is-invalid @enderror" type="email">
                @error("email")
                        <span class="text-danger mt-1">{{$message}}</span>                  
             @enderror
            </div>
            <div class="w-50">
                <label class="form-label" for="password">password</label>
                <input name="password" id="password" class="form-control @error('phone') is-invalid @enderror" type="password">
                @error("phone")
                <span class="text-danger mt-1">{{$message}}</span>                  
        @enderror
            </div>
            <div class="w-50">
                <label class="form-label" for="phone">phone</label>
                <input value="{{ $user->phone }}" name="phone" id="phone" class="form-control @error('level') is-invalid @enderror"" type="number">
            </div>
        </div>
        <div class="d-flex gap-2">
            <div class="w-100">
                <label class="form-label" for="level">level</label>
                <select name="level_id" class="form-control" id="level">
                    <option @if ($user->level_id == 2) selected @endif value="2">responsable</option>
                    <option @if ($user->level_id == 3) selected @endif value="3">partenaire</option>
                    <option @if ($user->level_id == 4) selected @endif value="4">client</option>
                </select>
                @error("level_id")
                  <span class="text-danger mt-1">{{$message}}</span>                  
                @enderror
            </div>
        </div>
        @if($user->level_id==3)
            <div class="w-100" id="type_div">
                    <label class="form-label" for="type_contrat">type de contrat</label>
                    <select @error("type") is-invalid @enderror class="form-control" name="type" id="type_contrat">
                    <option disabled selected>choisir le type</option>
                        <option @if ($user->contrat->type == "0") selected @endif value="0">abonnement</option>
                        <option @if ($user->contrat->type == "1") selected @endif value="1">commission</option>
                    </select>
                    @error("type")
                        <span class="mt-2 text-danger">{{$message}}</span>
                    @enderror
            </div>
            <div class="w-100" id="detaills_type_contrat">
                    <label class="form-label" for="id_contrat">contrat</label>
                    <select  class="form-control" name="id_contrat" id="id_contrat">
                            @foreach ($contrats as $contrat)
                                     @if($contrat->type==$user->contrat->type)
                                         @if($user->contrat->type=="0")
                                              <option @if($contrat->id==$user->contrat->id) selected @endif value="{{$contrat->id}}">{{$contrat->periode}} mois | {{$contrat->montant}} dh</option>
                                         @elseif($user->contrat->type=="1")
                                              <option value="{{$contrat->id}}">{{$contrat->commission}} %</option>
                                         @endif
                                     @endif                             
                            @endforeach
                    </select>
                    @error("type")
                        <span class="mt-2 text-danger">{{$message}}</span>
                    @enderror
            </div>  
       @endif
        {{-- </div> --}}
        <button class="btn btn-primary mt-2">modifier</button>
    </form>
@endsection


@section("script")
$(document).ready(function() {
      $('#level').on('change', function() {
            var type_div = document.getElementById("type_div");
            var id = $("#level").val();
            $.ajax({
                  url: "{{ url('admin/contrat_type_partenaire') }}" + '/'+id,
                  dataType: 'json',
                  {{-- data: {
                      var1: $(this).val()
                  }, --}}
                  success: function(data) {
                      if(data==3){
                         type_div.style.display = "block";
                      }
                      else{
                         type_div.style.display = "none";
                         detaills_type_contrat.style.display = "none";
                      }
                  },
                  type: 'GET'
            });
      });

      $('#type_div').on('change', function() {
          var type_div = document.getElementById("type_div");
          var id = $("#type_contrat").val();
          var detaills_type_contrat = document.getElementById("detaills_type_contrat");
          $.ajax({
                url: "{{ url('admin/contrat_type_partenaire2') }}" + '/'+id,
                dataType: 'json',
                {{-- data: {
                    var1: $(this).val()
                }, --}}
                success: function(data) {
                    if(data){
                         detaills_type_contrat.style.display = "block";
                         if(id==0){
                              $('#id_contrat').empty();
                              $('#id_contrat').append('<option disabled selected>choisir la contrat</option>')
                              for(var i=0; i < data.length;i++){
                              
                                   var periode = data[i].periode;
                                   var montant = data[i].montant;
                                   var contrat_id = data[i].id;
                              
                                   $('#id_contrat').append(`<option value=${data[i].id}>${periode} mois | ${montant} dh</option>`);
                              }
                         }
                         else if(id==1){
                              $('#id_contrat').empty();
                              $('#id_contrat').append('<option disabled selected>choisir la contrat</option>')
                            for(var i=0; i < data.length;i++){
                              var commission = data[i].commission;
                              $('#id_contrat').append(`<option value=${data[i].id}>${commission}</option>`);
                            }
                         }
                    } 
                    else{
                         alert("vous avez aucune contrat");
                    }
                },
                type: 'GET'
          });
    });
});
@endsection