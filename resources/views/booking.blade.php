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
                                    <h5 class="">Booking</h5>
                                </div>
                                <div class="col-6 text-end">
                                    <button type="button" class="btn btn-dark btn-primary" data-bs-toggle="modal" data-bs-target="#addBookingModal">
                                        <i class="fas fa-user-plus me-2"></i> Add Booking
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
                                            Nama Pemesan</th>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            No Hp</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Lokasi Pemesan</th>
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
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Tanggal Pemesanan</th>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Tanggal Penggunaan</th>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Tanggal Pengembalian</th>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Driver</th>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Approval 1</th>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Status Approval 1</th>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Approval 2</th>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Status Approval 2</th>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Keterangan</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($bookings))
                                        @foreach ($bookings as $booking)
                                            <tr>
                                                <td class="text-left">{{ $loop->iteration }}</td>
                                                <td class="text-left">{{ $booking->nama_pemesan }}</td>
                                                <td class="text-left">{{ $booking->no_hp }}</td>
                                                <td class="text-center">{{ $booking->lokasi_pemesan }}</td>
                                                <td class="text-left">{{ $booking->no_polisi }}</td>
                                                <td class="text-left">{{ $booking->kepemilikan_kendaraan }}</td>
                                                <td class="text-left">{{ $booking->jenis_kendaraan }}</td>
                                                <td class="text-left">{{ $booking->tanggal_pemesanan }}</td>
                                                <td class="text-left">{{ $booking->tanggal_penggunaan }}</td>
                                                <td class="text-left">{{ $booking->tanggal_pengembalian }}</td>
                                                <td class="text-left">{{ $booking->nama_driver }}</td>
                                                <td class="text-left">{{ $booking->approval1 }}</td>
                                                <td class="text-left">{{ $booking->status_approval1 }}</td>
                                                <td class="text-left">{{ $booking->approval2 }}</td>
                                                <td class="text-left">{{ $booking->status_approval2 }}</td>
                                                <td class="text-left">{{ $booking->keterangan }}</td>
                                                <td class="text-center align-middle bg-transparent border-bottom">
                                                    <a href="#" 
                                                        class="edit-booking-btn"
                                                        data-id="{{ $booking->id_booking }}"
                                                        data-nama-pemesan="{{ $booking->nama_pemesan }}"
                                                        data-no-hp="{{ $booking->no_hp }}"
                                                        data-lokasi-pemesan="{{ $booking->lokasi_pemesan }}"
                                                        data-no-polisi="{{ $booking->no_polisi }}"
                                                        data-kepemilikan-kendaraan="{{ $booking->kepemilikan_kendaraan }}"
                                                        data-jenis-kendaraan="{{ $booking->jenis_kendaraan }}"
                                                        data-tanggal-pemesanan="{{ $booking->tanggal_pemesanan }}"
                                                        data-tanggal-penggunaan="{{ $booking->tanggal_penggunaan }}"
                                                        data-tanggal-pengembalian="{{ $booking->tanggal_pengembalian }}"
                                                        data-driver="{{ $booking->nama_driver }}"
                                                        data-approval1="{{ $booking->approval1 }}"
                                                        data-status-approval1="{{ $booking->status_approval1 }}"
                                                        data-approval2="{{ $booking->approval2 }}"
                                                        data-status-approval2="{{ $booking->status_approval2 }}"
                                                        data-keterangan="{{ $booking->keterangan }}"
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#editBookingModal"> 
                                                        <i class="fas fa-user-edit" aria-hidden="true"></i>
                                                    </a>
                                                    <form action="/bookings/{{ $booking->id_booking }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fas fa-trash" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                </td>

                                                <!-- Edit Modal -->
                                                <div class="modal fade" id="editBookingModal" tabindex="-1" aria-labelledby="editBookingModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="editBookingModalLabel">Edit Vehicle</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/bookings/{{ $booking->id_booking }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="container-fluid">
                                                                        <div class="mb-3">
                                                                            <label for="edit_nama_pemesan" class="form-label">Nama Pemesan</label>
                                                                            <input type="text" class="form-control" id="edit_nama_pemesan" name="edit_nama_pemesan" required>
                                                                            @error('edit_nama_pemesan')
                                                                                <div class="alert alert-danger mt-1" role="alert">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="edit_no_hp" class="form-label">No Hp</label>
                                                                            <input type="text" class="form-control" id="edit_no_hp" name="edit_no_hp" required>
                                                                            @error('edit_no_hp')
                                                                                <div class="alert alert-danger mt-1" role="alert">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="edit_lokasi_pemesan" class="form-label">Lokasi Pemesan</label>
                                                                            <select class="form-select" id="edit_lokasi_pemesan" name="edit_lokasi_pemesan" required>
                                                                                <option selected>Pilih Lokasi Pemesan</option>
                                                                                <option value="Kantor Pusat">Kantor Pusat</option>
                                                                                <option value="Kantor Cabang">Kantor Cabang</option>
                                                                                <option value="Tambang 1">Tambang 1</option>
                                                                                <option value="Tambang 2">Tambang 2</option>
                                                                                <option value="Tambang 3">Tambang 3</option>
                                                                                <option value="Tambang 4">Tambang 4</option>
                                                                                <option value="Tambang 5">Tambang 5</option>
                                                                                <option value="Tambang 6">Tambang 6</option>
                                                                            </select>
                                                                            @error('edit_lokasi_pemesan')
                                                                                <div class="alert alert-danger mt-1" role="alert">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="edit_no_polisi" class="form-label">No Polisi</label>
                                                                            <select class="form-select" id="edit_no_polisi" name="edit_no_polisi" required>
                                                                                <option selected>Pilih No Polisi</option>
                                                                                @foreach ($vehicles as $vehicle)
                                                                                    <option value="{{ $vehicle->no_polisi }}">{{ $vehicle->no_polisi }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('edit_no_polisi')
                                                                                <div class="alert alert-danger mt-1" role="alert">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="edit_kepemilikan_kendaraan" class="form-label">Kepemilikan Kendaraan</label>
                                                                            <input type="text" class="form-control" id="edit_kepemilikan_kendaraan" name="edit_kepemilikan_kendaraan" required>
                                                                            @error('edit_kepemilikan_kendaraan')
                                                                                <div class="alert alert-danger mt-1" role="alert">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="edit_jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                                                                            <input type="text" class="form-control" id="edit_jenis_kendaraan" name="edit_jenis_kendaraan" required>
                                                                            @error('edit_jenis_kendaraan')
                                                                                <div class="alert alert-danger mt-1" role="alert">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="edit_tanggal_pemesanan" class="form-label">Tanggal Pemesanan</label>
                                                                            <input type="date" class="form-control" id="edit_tanggal_pemesanan" name="edit_tanggal_pemesanan" required>
                                                                            @error('edit_tanggal_pemesanan')
                                                                                <div class="alert alert-danger mt-1" role="alert">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="edit_tanggal_penggunaan" class="form-label">Tanggal Penggunaan</label>
                                                                            <input type="date" class="form-control" id="edit_tanggal_penggunaan" name="edit_tanggal_penggunaan" required>
                                                                            @error('edit_tanggal_penggunaan')
                                                                                <div class="alert alert-danger mt-1" role="alert">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="edit_tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                                                                            <input type="date" class="form-control" id="edit_tanggal_pengembalian" name="edit_tanggal_pengembalian" required>
                                                                            @error('edit_tanggal_pengembalian')
                                                                                <div class="alert alert-danger mt-1" role="alert">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="edit_driver" class="form-label">Driver</label>
                                                                            <select class="form-select" id="edit_driver" name="edit_driver" required>
                                                                                <option selected>Pilih Driver</option>
                                                                                @foreach ($driver as $driver)
                                                                                    <option value="{{ $driver->id_driver }}">{{ $driver->nama_driver }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('edit_driver')
                                                                                <div class="alert alert-danger mt-1" role="alert">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="edit_approval1" class="form-label">Approval 1</label>
                                                                            <select class="form-select" id="edit_approval1" name="edit_approval1" required>
                                                                                <option selected>Pilih Approval 1</option>
                                                                                @foreach ($manager as $manager)
                                                                                    <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('edit_approval1')
                                                                                <div class="alert alert-danger mt-1" role="alert">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="edit_status_approval1" class="form-label">Status Approval 1</label>
                                                                            <select class="form-select" id="edit_status_approval1" name="edit_status_approval1" required>
                                                                                <option selected>Pilih Status Approval 1</option>
                                                                                <option value="Belum Disetujui">Belum Disetujui</option>
                                                                                <option value="Disetujui">Disetujui</option>
                                                                                <option value="Tidak Disetujui">Tidak Disetujui</option>
                                                                            </select>
                                                                            @error('edit_status_approval1')
                                                                                <div class="alert alert-danger mt-1" role="alert">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="edit_approval2" class="form-label">Approval 2</label>
                                                                            <select class="form-select" id="edit_approval2" name="edit_approval2" required>
                                                                                <option selected>Pilih Approval 2</option>
                                                                                @foreach ($director as $director)
                                                                                    <option value="{{ $director->id }}">{{ $director->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('edit_approval2')
                                                                                <div class="alert alert-danger mt-1" role="alert">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="edit_status_approval2" class="form-label">Status Approval 2</label>
                                                                            <select class="form-select" id="edit_status_approval2" name="edit_status_approval2" required>
                                                                                <option selected>Pilih Status Approval 2</option>
                                                                                <option value="Belum Disetujui">Belum Disetujui</option>
                                                                                <option value="Disetujui">Disetujui</option>
                                                                                <option value="Tidak Disetujui">Tidak Disetujui</option>
                                                                            </select>
                                                                            @error('edit_status_approval2')
                                                                                <div class="alert alert-danger mt-1" role="alert">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="edit_keterangan" class="form-label">Keterangan</label>
                                                                            <input type="text" class="form-control" id="edit_keterangan" name="edit_keterangan" required>
                                                                            @error('edit_keterangan')
                                                                                <div class="alert alert-danger mt-1" role="alert">
                                                                                    {{ $message }}
                                                                                </div>
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
                    <div class="modal fade" id="addBookingModal" tabindex="-1" aria-labelledby="addBookingModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="addBookingModalLabel">Add Vehicle</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                            <form action="/bookings" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="container-fluid">
                                        <div class="mb-3">
                                            <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                                            <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" required>
                                            @error('nama_pemesan')
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
                                            <label for="lokasi_pemesan" class="form-label">Lokasi Pemesan</label>
                                            <select class="form-select" id="lokasi_pemesan" name="lokasi_pemesan" required>
                                                <option selected>Pilih Lokasi Pemesan</option>
                                                <option value="Kantor Pusat">Kantor Pusat</option>
                                                <option value="Kantor Cabang">Kantor Cabang</option>
                                                <option value="Tambang 1">Tambang 1</option>
                                                <option value="Tambang 2">Tambang 2</option>
                                                <option value="Tambang 3">Tambang 3</option>
                                                <option value="Tambang 4">Tambang 4</option>
                                                <option value="Tambang 5">Tambang 5</option>
                                                <option value="Tambang 6">Tambang 6</option>
                                            </select>
                                            @error('lokasi_pemesan')
                                                <div class="alert alert-danger mt-1" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="no_polisi" class="form-label">No Polisi</label>
                                            <select class="form-select" id="no_polisi" name="no_polisi" required>
                                                <option selected>Pilih No Polisi</option>
                                                @foreach ($vehicles as $vehicle)
                                                    <option value="{{ $vehicle->no_polisi }}">{{ $vehicle->no_polisi }}</option>
                                                @endforeach
                                            </select>
                                            @error('no_polisi')
                                                <div class="alert alert-danger mt-1" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="kepemilikan_kendaraan" class="form-label">Kepemilikan Kendaraan</label>
                                            <input type="text" class="form-control" id="kepemilikan_kendaraan" name="kepemilikan_kendaraan" required>
                                            @error('kepemilikan_kendaraan')
                                                <div class="alert alert-danger mt-1" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                                            <input type="text" class="form-control" id="jenis_kendaraan" name="jenis_kendaraan" required>
                                            @error('jenis_kendaraan')
                                                <div class="alert alert-danger mt-1" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="tanggal_pemesanan" class="form-label">Tanggal Pemesanan</label>
                                            <input type="date" class="form-control" id="tanggal_pemesanan" name="tanggal_pemesanan" required>
                                            @error('tanggal_pemesanan')
                                                <div class="alert alert-danger mt-1" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="tanggal_penggunaan" class="form-label">Tanggal Penggunaan</label>
                                            <input type="date" class="form-control" id="tanggal_penggunaan" name="tanggal_penggunaan" required>
                                            @error('tanggal_penggunaan')
                                                <div class="alert alert-danger mt-1" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                                            <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" required>
                                            @error('tanggal_pengembalian')
                                                <div class="alert alert-danger mt-1" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="driver" class="form-label">Driver</label>
                                            <select class="form-select" id="driver" name="driver" required>
                                                <option selected>Pilih Driver</option>
                                                @foreach ($driver as $driver)
                                                    <option value="{{ $driver->id_driver }}">{{ $driver->nama_driver }}</option>
                                                @endforeach
                                            </select>
                                            @error('driver')
                                                <div class="alert alert-danger mt-1" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="approval1" class="form-label">Approval 1</label>
                                            <select class="form-select" id="approval1" name="approval1" required>
                                                <option selected>Pilih Approval 1</option>
                                                @foreach ($manager as $manager)
                                                    <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('approval1')
                                                <div class="alert alert-danger mt-1" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="status_approval1" class="form-label">Status Approval 1</label>
                                            <select class="form-select" id="status_approval1" name="status_approval1" required>
                                                <option selected>Pilih Status Approval 1</option>
                                                <option value="Belum Disetujui">Belum Disetujui</option>
                                                <option value="Disetujui">Disetujui</option>
                                                <option value="Tidak Disetujui">Tidak Disetujui</option>
                                            </select>
                                            @error('status_approval1')
                                                <div class="alert alert-danger mt-1" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="approval2" class="form-label">Approval 2</label>
                                            <select class="form-select" id="approval2" name="approval2" required>
                                                <option selected>Pilih Approval 2</option>
                                                @foreach ($director as $director)
                                                    <option value="{{ $director->id }}">{{ $director->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('approval2')
                                                <div class="alert alert-danger mt-1" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="status_approval2" class="form-label">Status Approval 2</label>
                                            <select class="form-select" id="status_approval2" name="status_approval2" required>
                                                <option selected>Pilih Status Approval 2</option>
                                                <option value="Belum Disetujui">Belum Disetujui</option>
                                                <option value="Disetujui">Disetujui</option>
                                                <option value="Tidak Disetujui">Tidak Disetujui</option>
                                            </select>
                                            @error('status_approval2')
                                                <div class="alert alert-danger mt-1" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="keterangan" class="form-label">Keterangan</label>
                                            <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                                            @error('keterangan')
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
    $(document).ready(function () {
        $('#no_polisi').on('change', function() {
            var no_polisi = $(this).val();

            $.ajax ({
                url: '{{ route("getDetailVehicle") }}',
                type: 'GET',
                data: {
                    no_polisi: no_polisi
                },
                success: function(response) {
                    $('#kepemilikan_kendaraan').val(response.kepemilikan_kendaraan);
                    $('#jenis_kendaraan').val(response.jenis_kendaraan);
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });
    });

    $(document).ready(function () {
        $('#edit_no_polisi').on('change', function() {
            var edit_no_polisi = $(this).val();

            $.ajax ({
                url: '{{ route("getDetailVehicle") }}',
                type: 'GET',
                data: {
                    edit_no_polisi: edit_no_polisi
                },
                success: function(response) {
                    $('#edit_kepemilikan_kendaraan').val(response.edit_kepemilikan_kendaraan);
                    $('#edit_jenis_kendaraan').val(response.edit_jenis_kendaraan);
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var editButtons = document.querySelectorAll('.edit-booking-btn');

        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var id = button.getAttribute('data-id');
                var nama_pemesan = button.getAttribute('data-nama-pemesan');
                var no_hp = button.getAttribute('data-no-hp');
                var lokasi_pemesan = button.getAttribute('data-lokasi-pemesan');
                var jenis_kendaraan = button.getAttribute('data-jenis-kendaraan');
                var no_polisi = button.getAttribute('data-no-polisi');
                var tanggal_pemesanan = button.getAttribute('data-tanggal-pemesanan');
                var tanggal_penggunaan = button.getAttribute('data-tanggal-penggunaan');
                var tanggal_pengembalian = button.getAttribute('data-tanggal-pengembalian');
                var nama_driver = button.getAttribute('data-driver');
                var approval1 = button.getAttribute('data-approval1');
                var status_approval1 = button.getAttribute('data-status-approval1');
                var approval2 = button.getAttribute('data-approval2');
                var status_approval2 = button.getAttribute('data-status-approval2');
                var keterangan = button.getAttribute('data-keterangan');

                var editNamaPemesan = document.getElementById('edit_nama_pemesan');
                var editNoHp = document.getElementById('edit_no_hp');
                var editLokasiPemesan = document.getElementById('edit_lokasi_pemesan');
                var editJenisKendaraan = document.getElementById('edit_jenis_kendaraan');
                var editNoPolisi = document.getElementById('edit_no_polisi');
                var editTanggalPemesanan = document.getElementById('edit_tanggal_pemesanan');
                var editTanggalPenggunaan = document.getElementById('edit_tanggal_penggunaan');
                var editTanggalPengembalian = document.getElementById('edit_tanggal_pengembalian');
                var editDriver = document.getElementById('edit_driver');
                var editApproval1 = document.getElementById('edit_approval1');
                var editStatusApproval1 = document.getElementById('edit_status_approval1');
                var editApproval2 = document.getElementById('edit_approval2');
                var editStatusApproval2 = document.getElementById('edit_status_approval2');
                var editKeterangan = document.getElementById('edit_keterangan');

                editNamaPemesan.value = nama_pemesan;
                editNoHp.value = no_hp;
                editLokasiPemesan.value = lokasi_pemesan;
                editJenisKendaraan.value = jenis_kendaraan;
                editNoPolisi.value = no_polisi;
                editTanggalPemesanan.value = tanggal_pemesanan;
                editTanggalPenggunaan.value = tanggal_penggunaan;
                editTanggalPengembalian.value = tanggal_pengembalian;
                editApproval1.value = approval1;
                editStatusApproval1.value = status_approval1;
                editApproval2.value = approval2;
                editStatusApproval2.value = status_approval2;
                editKeterangan.value = keterangan;
            });
        });
    });
</script>
