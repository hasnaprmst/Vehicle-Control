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
                                    <h5 class="">Vehicle Management</h5>
                                </div>
                                <div class="col-6 text-end">
                                    <button type="button" class="btn btn-dark btn-primary" data-bs-toggle="modal" data-bs-target="#addVehicleModal">
                                        <i class="fas fa-user-plus me-2"></i> Add Vehicle
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
                                            No Polisi</th>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Kepemilikan Kendaraan</th>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Jenis Kendaraan</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Status Kendaraan</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Tanggal Service Terakhir</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($vehicles))
                                        @foreach ($vehicles as $item)
                                            <tr>
                                                <td class="text-left">{{ $loop->iteration }}</td>
                                                <td class="text-left">{{ $item->no_polisi }}</td>
                                                <td class="text-left">{{ $item->kepemilikan_kendaraan }}</td>
                                                <td class="text-left">{{ $item->jenis_kendaraan }}</td>
                                                <td class="text-center">{{ $item->status_kendaraan }}</td>
                                                <td class="text-center">{{ $item->tanggal_service_terakhir }}</td>
                                                <td class="text-center align-middle bg-transparent border-bottom">
                                                    <a href="#" 
                                                        class="edit-vehicle-btn" 
                                                        data-id="{{ $item->id_vehicle }}"
                                                        data-no_polisi="{{ $item->no_polisi }}"
                                                        data-kepemilikan_kendaraan="{{ $item->kepemilikan_kendaraan }}"
                                                        data-jenis_kendaraan="{{ $item->jenis_kendaraan }}"
                                                        data-status_kendaraan="{{ $item->status_kendaraan }}"
                                                        data-tanggal_service_terakhir="{{ $item->tanggal_service_terakhir }}"
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#editVehicleModal">
                                                        <i class="fas fa-user-edit" aria-hidden="true"></i>
                                                    </a>
                                                    <form action="{{ route('vehicles.destroy', $item->id_vehicle) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fas fa-trash" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                    <!-- <a href="#"><i class="fas fa-trash" aria-hidden="true"></i></a> -->
                                                </td>

                                                <!-- Edit Modal -->
                                                <div class="modal fade" id="editVehicleModal" tabindex="-1" aria-labelledby="editVehicleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="editVehicleModalLabel">Edit Vehicle</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/vehicles/{{ $item->id_vehicle }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="container-fluid">
                                                                        <div class="mb-3">
                                                                            <label for="edit_no_polisi" class="form-label">No Polisi</label>
                                                                            <input type="text" class="form-control" id="edit_no_polisi" name="no_polisi" required>
                                                                            @error('no_polisi')
                                                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="edit_kepemilikan_kendaraan" class="form-label">Kepemilikan Kendaraan</label>
                                                                            <select class="form-select" id="edit_kepemilikan_kendaraan" name="kepemilikan_kendaraan" required>
                                                                                <option selected>Pilih Kepemilikan Kendaraan</option>
                                                                                <option value="Perusahaan">Perusahaan</option>
                                                                                <option value="Perusahaan Sewa">Perusahaan Sewa</option>
                                                                            </select>
                                                                            @error('kepemilikan_kendaraan')
                                                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="edit_jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                                                                            <select class="form-select" id="edit_jenis_kendaraan" name="jenis_kendaraan" required>
                                                                                <option selected>Pilih Jenis Kendaraan</option>
                                                                                <option value="Angkutan Orang">Angkutan Orang</option>
                                                                                <option value="Angkutan Barang">Angkutan Barang</option>
                                                                            </select>
                                                                            @error('jenis_kendaraan')
                                                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="edit_status_kendaraan" class="form-label">Status Kendaraan</label>
                                                                            <select class="form-select" id="edit_status_kendaraan" name="status_kendaraan" required>
                                                                                <option selected>Pilih Status Kendaraan</option>
                                                                                <option value="Tersedia">Tersedia</option>
                                                                                <option value="Tidak Tersedia">Tidak Tersedia</option>
                                                                            </select>
                                                                            @error('status_kendaraan')
                                                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="edit_tanggal_service_terakhir" class="form-label">Tanggal Service Terakhir</label>
                                                                            <input type="date" class="form-control" id="edit_tanggal_service_terakhir" name="tanggal_service_terakhir" required>
                                                                            @error('tanggal_service_terakhir')
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
                    <div class="modal fade" id="addVehicleModal" tabindex="-1" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="addVehicleModalLabel">Add Vehicle</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                            <form action="/vehicles" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="container-fluid">
                                        <div class="mb-3">
                                            <label for="no_polisi" class="form-label">No Polisi</label>
                                            <input type="text" class="form-control" id="no_polisi" name="no_polisi" required>
                                            @error('no_polisi')
                                                <div class="alert alert-danger mt-1" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="kepemilikan_kendaraan" class="form-label">Kepemilikan Kendaraan</label>
                                            <select class="form-select" id="kepemilikan_kendaraan" name="kepemilikan_kendaraan" required>
                                                <option selected>Pilih Kepemilikan Kendaraan</option>
                                                <option value="Perusahaan">Perusahaan</option>
                                                <option value="Perusahaan Sewa">Perusahaan Sewa</option>
                                            </select>
                                            @error('kepemilikan_kendaraan')
                                                <div class="alert alert-danger mt-1" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        <div class="mb-3">
                                            <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                                            <select class="form-select" id="jenis_kendaraan" name="jenis_kendaraan" required>
                                                <option selected>Pilih Jenis Kendaraan</option>
                                                <option value="Angkutan Orang">Angkutan Orang</option>
                                                <option value="Angkutan Barang">Angkutan Barang</option>
                                            </select>
                                            @error('jenis_kendaraan')
                                                <div class="alert alert-danger mt-1" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="status_kendaraan" class="form-label">Status Kendaraan</label>
                                            <select class="form-select" id="status_kendaraan" name="status_kendaraan" required>
                                                <option selected>Pilih Status Kendaraan</option>
                                                <option value="Tersedia">Tersedia</option>
                                                <option value="Tidak Tersedia">Tidak Tersedia</option>
                                            </select>
                                            @error('status_kendaraan')
                                                <div class="alert alert-danger mt-1" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="tanggal_service_terakhir" class="form-label">Tanggal Service Terakhir</label>
                                            <input type="date" class="form-control" id="tanggal_service_terakhir" name="tanggal_service_terakhir" required>
                                            @error('tanggal_service_terakhir')
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
        var editButtons = document.querySelectorAll('.edit-vehicle-btn');
        
        editButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                var id = button.getAttribute('data-id');
                var noPolisi = button.getAttribute('data-no_polisi');
                var kepemilikanKendaraan = button.getAttribute('data-kepemilikan_kendaraan');
                var jenisKendaraan = button.getAttribute('data-jenis_kendaraan');
                var statusKendaraan = button.getAttribute('data-status_kendaraan');
                var tanggalServiceTerakhir = button.getAttribute('data-tanggal_service_terakhir');
                
                document.getElementById('edit_no_polisi').value = noPolisi;
                document.getElementById('edit_kepemilikan_kendaraan').value = kepemilikanKendaraan;
                document.getElementById('edit_jenis_kendaraan').value = jenisKendaraan;
                document.getElementById('edit_status_kendaraan').value = statusKendaraan;
                document.getElementById('edit_tanggal_service_terakhir').value = tanggalServiceTerakhir;
                
                var form = document.querySelector('#editVehicleModal form');
                form.action = '/vehicles/' + id;
            });
        });
    });
</script>
