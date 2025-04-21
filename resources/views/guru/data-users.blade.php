@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Daftar Pengguna</h3>

    <div class="card shadow-sm p-4">
        <div class="table-responsive">
            <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-user-plus"></i> Tambah Pengguna
            </a>
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Pengguna</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @forelse ($users as $index => $user)
                      <tr>
                          <td>{{ $index + 1 }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>
                              <span class="badge bg-info text-white">{{ ucfirst($user->role) }}</span>
                          </td>
                          <td>
                              <!-- Tombol Edit -->
                              <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Pengguna">
                                  <i class="fas fa-pencil-alt"></i> Edit
                              </a>
              
                              <!-- Tombol Hapus -->
                              <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                  @csrf
                                  @method('DELETE')
                                  <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $user->id }})" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Pengguna">
                                      <i class="fas fa-trash-alt"></i> Hapus
                                  </button>
                              </form>
                          </td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="5">Belum ada pengguna yang terdaftar.</td>
                      </tr>
                  @endforelse
              </tbody>
              
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Konfirmasi penghapusan dengan SweetAlert2
    function confirmDelete(userId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Pengguna ini akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Menghitung form berdasarkan userId dan submit
                const form = document.querySelector(`form[action*="${userId}"]`);
                form.submit();
            }
        });
    }

    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2500
        });
    @endif
</script>
@endsection
