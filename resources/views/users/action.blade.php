<div class="d-flex align-items-center gap-2">
    <a href="{{ route('users.edit', ['user' => $id]) }}" class="btn btn-primary">
        <i class="bi bi-pencil"></i>
    </a>
    <form onsubmit="return confirm('yakin ingin menghapus data ini ?')" method="POST"
        action="{{ route('users.destroy', ['user' => $id]) }}">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">
            <i class="bi bi-trash"></i>
        </button>
    </form>
</div>
