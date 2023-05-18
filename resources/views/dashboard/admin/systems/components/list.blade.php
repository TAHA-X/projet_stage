
@foreach ($systems as $system)
    <tr>
        <td>{{$system->partenaire->fname}} {{$system->partenaire->lname}}</td>
        <td>{{$system->point->type}}</td>
        <td>
            <a class="btn btn-danger" onclick="return confirm('voulez vous vraiment supprimer ce system ?')" href="{{route('admin.systems.delete',$system->id)}}"><i class="bi bi-trash3-fill"></i></a>
            <a class="btn btn-primary"  href="{{route('admin.systems.edit',$system->id)}}"><i class="bi bi-pen"></i></a>
        </td>
    </tr>
@endforeach
