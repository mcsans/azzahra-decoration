<x-admin.app title="Azzahra Decoration - Users">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data User</h1>
        <a href="{{ route('admin.master-data.users.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-{{ config('app.bg_color') }} shadow-sm">
            <i class="fas fa-fw fa-arrow-left fa-sm text-white-50"></i> Kembali ke Tabel
        </a>
    </div>

    {{-- Form --}}
    <x-admin.form action="{{ route('admin.master-data.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <x-admin.input label="Nama" type="text" name="name" value="{{ old('name', $user->name) }}" />
        <x-admin.input label="Email" type="email" name="email" value="{{ old('email', $user->email) }}" />
        <x-admin.select label="Role" name="role_id" value="{{ old('role_id', $user->role_id) }}">
            @foreach ($roles as $role)
                <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                    {{ Str::title($role->name) }}
                </option>
            @endforeach
        </x-admin.select>
        <button type="submit" class="btn btn-primary btn-block">Ubah</button>
    </x-admin.form>

</x-admin.app>
