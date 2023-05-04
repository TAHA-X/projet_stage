@extends("dashboard")
 
@section("title")
    ajouter user
@endsection

@section("title_page")
   ajouter user
@endsection

@section("contenu")
<form class="mt-3" action="{{route('admin.users.store')}}" method="post">
    @csrf
   <div class="d-flex gap-2">
        <div class="w-50">
              <label class="form-label" for="prenom">prénom</label>
              <input name="fname" id="prenom" class="form-control @error('fname') is-invalid @enderror" type="text">
              @error("fname")
                    <span class="text-danger mt-1">{{$message}}</span>                  
              @enderror
        </div>
        <div class="w-50">
              <label class="form-label" for="nom">nom</label>
              <input name="lname" id="nom" class="form-control @error('lname') is-invalid @enderror" type="text">
              @error("lname")
                   <span class="text-danger mt-1">{{$message}}</span>                  
              @enderror
        </div>
   </div>
   <div class="d-flex gap-2">
    <div class="w-50">
        <label class="form-label" for="email">email</label>
        <input name="email" id="email" class="form-control @error('email') is-invalid @enderror" type="email">
             @error("email")
                        <span class="text-danger mt-1">{{$message}}</span>                  
             @enderror
  </div>
  <div class="w-50">
        <label class="form-label" for="phone">phone</label>
        <input name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" type="number">
        @error("phone")
                <span class="text-danger mt-1">{{$message}}</span>                  
        @enderror
  </div>
   </div>
   <div class="d-flex gap-2">
     <div class="w-100">
        <label class="form-label" for="level">level</label>
        <select name="level_id" class="form-control  @error('level') is-invalid @enderror" id="level">
             <option value="2">responsable</option>
             <option value="3">partenaire</option>
             <option value="4">client</option>
        </select>
        @error("level_id")
                <span class="text-danger mt-1">{{$message}}</span>                  
        @enderror
     </div>
     <div class="w-100" id="categorie_div" style="display:none;">
          <label class="form-label" for="categorie_id">categorie</label>
          <select name="categorie_id" class="form-control  @error('categorie_id') is-invalid @enderror" id="categorie_id">
               @foreach($categories as $categorie)
                     <option value="{{$categorie->id}}">{{$categorie->title}}</option>
               @endforeach
          </select>
          @error("categorie_id")
                  <span class="text-danger mt-1">{{$message}}</span>                  
          @enderror
       </div>
     <div class="w-100" id="type_div" style="display:none;">
          <label class="form-label" for="type_contrat">type de contrat</label>
          <select @error("type") is-invalid @enderror class="form-control" name="type" id="type_contrat">
             <option disabled selected>choisir le type</option>
              <option value="0">abonnement</option>
              <option value="1">commission</option>
          </select>
          @error("type")
               <span class="mt-2 text-danger">{{$message}}</span>
          @enderror
     </div>
     <div class="w-100" id="detaills_type_contrat" style="display:none;">
          <label class="form-label" for="id_contrat">contrat</label>
          <select  class="form-control" name="id_contrat" id="id_contrat">
             <option disabled selected>choisir la contrat</option>
             
          </select>
          @error("type")
               <span class="mt-2 text-danger">{{$message}}</span>
          @enderror
     </div>
   </div>

   <button class="btn btn-primary mt-2">ajouter</button>
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
                         $("#categorie_div").css("display","block");
                      }
                      else{
                         $("#categorie_div").css("display","none");
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

