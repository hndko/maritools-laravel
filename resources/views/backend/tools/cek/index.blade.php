@extends('layouts.app-backend')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-md-12">
                    <!-- Tampilkan pesan error atau success -->
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Form untuk cek game -->
                    <form class="card" method="POST" action="{{ route('cek.store') }}">
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">{{ $pages }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label class="col-3 col-form-label required">ID</label>
                                <div class="col">
                                    <input type="text" name="id" class="form-control" placeholder="Enter ID">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-3 col-form-label">Server</label>
                                <div class="col">
                                    <input type="text" name="server" class="form-control" placeholder="Enter Server">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-3 col-form-label required">Kode</label>
                                <div class="col">
                                    <select name="kode" class="form-select" required>
                                        <option value="MOBILE_LEGENDS">Mobile Legends: Bang Bang</option>
                                        <option value="EIGHT_BALL_POOL">8 Ball Pool</option>
                                        <option value="Ace-Racer">Ace Racer</option>
                                        <!-- Tambahkan opsi lainnya sesuai dengan daftar yang diberikan -->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                    <!-- Tampilkan response jika ada -->
                    @if (session('response'))
                        <div class="card mt-4">
                            <div class="card-header">
                                <h3 class="card-title">Response</h3>
                            </div>
                            <div class="card-body">
                                <p><strong>Status:</strong> {{ session('response')['status'] ? 'Success' : 'Failed' }}</p>

                                <!-- Cek apakah key 'nickname' ada -->
                                @if (isset(session('response')['nickname']))
                                    <p><strong>Nickname:</strong> {{ session('response')['nickname'] }}</p>
                                @else
                                    <p><strong>Nickname:</strong> Tidak tersedia</p>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
