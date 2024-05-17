<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="px-5 py-4 container-fluid">
            <div class="mt-4 row">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card">
                        <div class="pb-0 card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="">User Management</h5>
                                </div>
                                <div class="col-6 text-end">
                                    <button type="button" class="btn btn-dark btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                        <i class="fas fa-user-plus me-2"></i> Add User
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-secondary text-center">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            No</th>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Name</th>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Email</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Role</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($users))
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="text-left">{{ $loop->iteration }}</td>
                                                <td class="text-left">{{ $user->name }}</td>
                                                <td class="text-left">{{ $user->email }}</td>
                                                <td class="text-center">
                                                    <!-- upercase the first word -->
                                                    {{ ucfirst($user->role) }}
                                                </td>
                                                <td class="text-center align-middle bg-transparent border-bottom">
                                                    <a href="#"
                                                        class="edit-user-btn"
                                                        data-id="{{ $user->id }}"
                                                        data-name="{{ $user->name }}"
                                                        data-email="{{ $user->email }}"
                                                        data-role="{{ $user->role }}"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editUserModal">
                                                        <i class="fas fa-user-edit" aria-hidden="true"></i>
                                                    </a>
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fas fa-trash" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                </td>

                                                <!-- Edit Modal -->
                                                <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="editUserModalLabel">Edit Vehicle</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="container-fluid">
                                                                        <div class="mb-3">
                                                                            <label for="edit_name" class="form-label">Name</label>
                                                                            <input type="text" class="form-control" id="edit_name" name="name" required>
                                                                            @error('name')
                                                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="edit_email" class="form-label">Email</label>
                                                                            <input type="email" class="form-control" id="edit_email" name="email" required>
                                                                            @error('email')
                                                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="edit_role" class="form-label">Role</label>
                                                                            <select class="form-select" id="edit_role" name="role" required>
                                                                                <option selected>Pilih Role</option>
                                                                                <option value="admin">Admin</option>
                                                                                <option value="manager">Manager</option>
                                                                                <option value="director">Director</option>
                                                                            </select>
                                                                            @error('role')
                                                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-dark btn-primary">Save</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Add Modal -->
                    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="addUserModalLabel">Add Vehicle</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                            <form action="/users" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="container-fluid">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name">
                                            @error('name')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email">
                                            @error('email')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Role</label>
                                            <select class="form-select" id="role" name="role">
                                                <option selected>Pilih Role</option>
                                                <option value="admin">Admin</option>
                                                <option value="manager">Manager</option>
                                                <option value="director">Director</option>
                                            </select>
                                            @error('role')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-dark btn-primary">Submit</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-app.footer />
    </main>

</x-app-layout>

<script src="/assets/js/plugins/datatables.js"></script>
<script>
    const dataTableBasic = new simpleDatatables.DataTable("#datatable-search", {
        searchable: true,
        fixedHeight: true,
        columns: [{
            select: [2, 6],
            sortable: false
        }]
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var editButtons = document.querySelectorAll('.edit-user-btn');

        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var id = button.getAttribute('data-id');
                var name = button.getAttribute('data-name');
                var email = button.getAttribute('data-email');
                var role = button.getAttribute('data-role');

                var editName = document.getElementById('edit_name');
                var editEmail = document.getElementById('edit_email');
                var editRole = document.getElementById('edit_role');

                editName.value = name;
                editEmail.value = email;
                editRole.value = role;
            });
        });
    });
</script>