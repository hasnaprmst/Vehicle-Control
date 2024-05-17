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
                                    <h5 class="">Driver Management</h5>
                                </div>
                                <div class="col-6 text-end">
                                    <button type="button" class="btn btn-dark btn-primary" data-bs-toggle="modal" data-bs-target="#addDriverModal">
                                        <i class="fas fa-user-plus me-2"></i> Add Driver
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
                                            Nama Driver</th>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            No Hp</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Status Driver</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($drivers))
                                        @foreach ($drivers as $driver)
                                            <tr>
                                                <td class="text-left">{{ $loop->iteration }}</td>
                                                <td class="text-left">{{ $driver->nama_driver }}</td>
                                                <td class="text-left">{{ $driver->no_hp }}</td>
                                                <td class="text-center">{{ $driver->status_driver }}</td>
                                                <td class="text-center">
                                                    <a href="#" 
                                                        class="edit-driver-btn" 
                                                        data-id="{{ $driver->id_driver }}"
                                                        data-nama="{{ $driver->nama_driver }}"
                                                        data-nohp="{{ $driver->no_hp }}"
                                                        data-status="{{ $driver->status_driver }}"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editDriverModal">
                                                        <i class="fas fa-user-edit" aria-hidden="true"></i>
                                                    </a>
                                                    <form action="{{ route('drivers.destroy', $driver->id_driver) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fas fa-trash" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                <!-- Edit Modal -->
                                                <div class="modal fade" id="editDriverModal" tabindex="-1" aria-labelledby="editDriverModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="editDriverModalLabel">Edit Vehicle</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/drivers/{{ $driver->id_driver }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="container-fluid">
                                                                        <div class="mb-3">
                                                                            <label for="edit_nama_driver" class="form-label">Nama Driver</label>
                                                                            <input type="text" class="form-control" id="edit_nama_driver" name="nama_driver" required>
                                                                            @error('nama_driver')
                                                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="edit_no_hp" class="form-label">No Hp</label>
                                                                            <input type="text" class="form-control" id="edit_no_hp" name="no_hp" required>
                                                                            @error('no_hp')
                                                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="edit_status_driver" class="form-label">Status Driver</label>
                                                                            <select class="form-select" id="edit_status_driver" name="status_driver" required>
                                                                                <option selected>Pilih Status Driver</option>
                                                                                <option value="Tersedia">Tersedia</option>
                                                                                <option value="Tidak Tersedia">Tidak Tersedia</option>
                                                                            </select>
                                                                            @error('status_driver')
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
                    <div class="modal fade" id="addDriverModal" tabindex="-1" aria-labelledby="addDriverModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="addDriverModalLabel">Add Vehicle</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                            <form action="/drivers" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="container-fluid">
                                        <div class="mb-3">
                                            <label for="nama_driver" class="form-label">Nama Driver</label>
                                            <input type="text" class="form-control" id="nama_driver" name="nama_driver" required>
                                            @error('nama_driver')
                                                <div class="alert alert-danger mt-1" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="no_hp" class="form-label">No Hp</label>
                                            <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                                            @error('no_hp')
                                                <div class="alert alert-danger mt-1" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="status_driver" class="form-label">Status Driver</label>
                                            <select class="form-select" id="status_driver" name="status_driver" required>
                                                <option selected>Pilih Status Driver</option>
                                                <option value="Tersedia">Tersedia</option>
                                                <option value="Tidak Tersedia">Tidak Tersedia</option>
                                            </select>
                                            @error('status_driver')
                                                <div class="alert alert-danger mt-1" role="alert">
                                                    {{ $message }}
                                                </div>
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
        var editButtons = document.querySelectorAll('.edit-driver-btn');

        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var id = button.getAttribute('data-id');
                var nama = button.getAttribute('data-nama');
                var nohp = button.getAttribute('data-nohp');
                var status = button.getAttribute('data-status');

                var editNama = document.getElementById('edit_nama_driver');
                var editNohp = document.getElementById('edit_no_hp');
                var editStatus = document.getElementById('edit_status_driver');

                editNama.value = nama;
                editNohp.value = nohp;
                editStatus.value = status;
            });
        });
    });
</script>
