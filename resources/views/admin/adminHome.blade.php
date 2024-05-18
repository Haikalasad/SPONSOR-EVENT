<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="/CSS/services_style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fadd57a8f9.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Pengajuan Sponsor</title>

</head>

<body>
    @php

    $userFormSponsors = \App\Models\formSponsor::all();

    $statusApprovals = \App\Models\Status_approval::all();

    $statusTransfers = \App\Models\Status_transfer::all();

    $perusahaan = \App\Models\Perusahaan::all();

    $user = \App\Models\User::all();
    @endphp



    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <img src="../ASSETS/logo.png" style="width: 180px;height: 40px;" />
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('adminHome')}}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/uploadCompany">Company</a>
                    </li>

                </ul>

                @auth
                <!-- Jika pengguna telah terotentikasi, tampilkan foto profil -->
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="{{ auth()->user()->name }}" style="width: 40px; height: 40px; border-radius: 50%;object-fit:cover">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item" style="color:red">Logout<i class="fa-solid fa-arrow-right-from-bracket" style="color:red;margin-left:10px"></i></button>
                            </form>
                        </li>
                    </ul>
                </div>
                @else
                <!-- Jika pengguna belum terotentikasi, tampilkan tombol login -->
                <a class="btn btn-primary" href="{{ route('login') }}" style="width: 100px; background-color: #053CC9;">Login</a>
                @endauth
            </div>
        </div>
    </nav>
    <section class="pengajuan-saya">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <h1 style="text-align: center;font-weight: 600; font-size: 28px;margin-top:90px">Semua pengajuan</h1>
                    <hr style="border-top: 2px solid #737373;margin-bottom:10px">
                </div>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nama pengaju</th>
                                    <th scope="col">Perusahaan</th>
                                    <th scope="col">Nama Acara</th>
                                    <th scope="col">Nominal</th>
                                    <th scope="col">No rekening</th>
                                    <th scope="col">Penerima</th>
                                    <th scope="col">Proposal Sponsor</th>
                                    <th scope="col">Proposal Acara</th>
                                    <th scope="col">Surat Pengantar</th>

                                    <th scope="col">Status Approval</th>
                                    <th scope="col">Status Transfer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($userFormSponsors as $formSponsor)
                                <tr>
                                    <td>{{ $formSponsor->user->name }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($formSponsor->perusahaan->nama_perusahaan,
                                        20) }}</td>
                                    <td>{{ $formSponsor->nama_acara }}</td>
                                    <td>{{ $formSponsor->nominal }}</td>
                                    <td>{{ $formSponsor->rekening }}</td>
                                    <td>{{ $formSponsor->nama_penerima }}</td>
                                    <td>
                                    <a href="{{ route('download.proposal-sponsor', ['file_name' => basename($formSponsor->proposal_sponsor)]) }}" target="_blank">Proposal Sponsor</a>


                                    </td>
                                    <td>
                                    <a href="{{ route('download.proposal-kegiatan', ['file_name' => basename($formSponsor->proposal_kegiatan)]) }}" target="_blank">Proposal Kegiatan</a>

                                    </td>
                                    <td>
                                    <a href="{{ route('download.surat-pengantar', ['file_name' => basename($formSponsor->surat_pengantar)]) }}" target="_blank">Surat Pengantar</a>

                                    </td>


                                    <td class="@if($formSponsor->status_approval == 1) pending @elseif($formSponsor->status_approval == 2) in-progress @elseif($formSponsor->status_approval == 3) under-review @elseif($formSponsor->status_approval == 4) approved @elseif($formSponsor->status_approval == 5) rejected @endif">
                                        <select class="form-select status-approval" data-form-sponsor-id="{{ $formSponsor->id }}">
                                            @foreach($statusApprovals as $statusApproval)
                                            <option value="{{ $statusApproval->id }}" {{ $formSponsor->status_approval == $statusApproval->id ? 'selected' : '' }}>
                                                {{ $statusApproval->status_approve }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="@if($formSponsor->status_transfer == 1) pending-transfer @elseif($formSponsor->status_transfer == 2) completed @elseif($formSponsor->status_transfer == 3) failed @endif">
                                        <select class="form-select status-transfer" data-form-sponsor-id="{{ $formSponsor->id }}">
                                            @foreach($statusTransfers as $statusTransfer)
                                            <option value="{{ $statusTransfer->id }}" {{ $formSponsor->status_transfer == $statusTransfer->id ? 'selected' : '' }}>
                                                {{ $statusTransfer->status_transfer }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada pengajuan sponsor.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>



</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        // Update status approval
        $('.status-approval').change(function() {
            var formSponsorId = $(this).data('form-sponsor-id');
            var statusApprovalId = $(this).val();

            // Kirim data ke backend untuk update
            $.ajax({
                type: 'POST',
                url: '/update-status-approval',
                data: {
                    _token: '{{ csrf_token() }}',
                    formSponsorId: formSponsorId,
                    statusApprovalId: statusApprovalId
                },
                success: function(response) {
                    console.log(response);
                    // Handle response dari backend jika perlu
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    // Handle error jika perlu
                }
            });
        });

        // Update status transfer
        $('.status-transfer').change(function() {
            var formSponsorId = $(this).data('form-sponsor-id');
            var statusTransferId = $(this).val();

            // Kirim data ke backend untuk update
            $.ajax({
                type: 'POST',
                url: '/update-status-transfer',
                data: {
                    _token: '{{ csrf_token() }}',
                    formSponsorId: formSponsorId,
                    statusTransferId: statusTransferId
                },
                success: function(response) {
                    console.log(response);

                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });


    
</script>


</html>