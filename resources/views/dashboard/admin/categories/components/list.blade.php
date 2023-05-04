@foreach ($categories as $categorie)
    <tr>
        <td>{{ $categorie->title }}</td>
        <td>
            @if ($categorie->id_parent == null)
                <div class="badge badge-info">pas de parent</div>
            @else
                <div class="badge badge-success">{{ $categorie->parent->title }}</div>
            @endif
        </td>
        <td>
            <a class="btn btn-danger" onclick="return confirm('voulez vous vraiment supprimer cet categorie ?')"
                href="{{ route('admin.categories.delete', $categorie->id) }}"><i class="bi bi-trash3-fill"></i></a>
            <a class="btn btn-primary" href="{{ route('admin.categories.edit', $categorie->id) }}"><i
                    class="bi bi-pen"></i></a>
        </td>
    </tr>
@endforeach
