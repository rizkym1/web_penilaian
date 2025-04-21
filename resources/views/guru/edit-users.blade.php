@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Edit Pengguna</h3>

    <div class="card shadow-sm p-4">
      <form action="{{ route('users.update', $user->id) }}" method="POST">
          @csrf
          @method('PUT')
  
          <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" name="name" class="form-control" required value="{{ old('name', $user->name) }}">
          </div>
  
          <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" required value="{{ old('email', $user->email) }}">
          </div>
  
          <div class="mb-3">
              <label for="password" class="form-label">Password Baru (opsional)</label>
              <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah">
          </div>
  
          <div class="mb-3">
              <label for="role" class="form-label">Role</label>
              <select name="role" class="form-select" required>
                  @foreach ($roles as $role)
                      <option value="{{ $role }}" {{ $user->role === $role ? 'selected' : '' }}>
                          {{ ucfirst($role) }}
                      </option>
                  @endforeach
              </select>
          </div>
  
          <div class="mb-3">
            <a href="{{ route('users.index') }}" class="btn btn-secondary">
              Kembali
          </a>
              <button type="submit" class="btn btn-primary">
                  <i class="fas fa-save"></i> Update Pengguna
              </button>
  
              
          </div>
      </form>
  </div>
  
</div>
@endsection
