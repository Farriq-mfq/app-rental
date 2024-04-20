<div>
    <form onsubmit="return confirm('yakin ingin menghapus data ini ?')" method="POST" action="{{ route('users.destroy', ['user' => $id]) }}">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">
            <i class="bi bi-trash"></i>
        </button>
    </form>
</div>
