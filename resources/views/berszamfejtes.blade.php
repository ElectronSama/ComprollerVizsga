<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/berszamfejtes.css') }}">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <div class="berszamfejtes_tarolo">
        <div class="diagram">
            <div class="diagram_fejlec">
                <div class="diagram_cim">Bérszámfejtés</div>
            </div>

            <!-- Keresési forma -->
            <form action="{{ route('dolgozo.kereso') }}" method="get">
                <div class="kereses_resz col">
                    <input type="text" name="query" placeholder="Keresés dolgozó ID, név vagy munkakör alapján">
                    <button class="btn btn-success" type="submit">Keresés</button>
                </div>
            </form>

            <!-- Találatok -->
            @if($dolgozok->isEmpty() && request('query'))
                <div id="talalati_stat" class="bg-light p-3">Nincs találat...</div>
            @else
                <div id="talalati_stat" class="talalati_stat elrejtett"></div>
                <div class="table-responsive">
                    <table class="tablazat">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Vezetéknév</th>
                                <th>Keresztnév</th>
                                <th>Munkakör</th>
                                <th>Órabér</th>
                                <th>Művelet</th>
                            </tr>
                        </thead>
                        <tbody id="tablazat_tbody">
                            @foreach ($dolgozok as $dolgozo)
                                <tr class="table-row">
                                    <td>{{ $dolgozo->DolgozoID }}</td>
                                    <td>{{ $dolgozo->Vezeteknev }}</td>
                                    <td>{{ $dolgozo->Keresztnev }}</td>
                                    <td>{{ $dolgozo->Munkakor }}</td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{ $dolgozo->Alapber }}" disabled>
                                            <span class="input-group-text">HUF</span>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#elozmenyekModal">Előzmények</button>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ujSzamfejtesModal">Új számfejtés</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Előzmények Modal -->
<div class="modal fade" id="elozmenyekModal" tabindex="-1" aria-labelledby="elozmenyekModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- A modal-lg osztály használata -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="elozmenyekModalLabel">Előzmények</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>DolgozoID</th>
                            <th>Vezetéknév</th>
                            <th>Keresztnév</th>
                            <th>Hónap</th>
                            <th>Bér</th>
                            <th>Létrehozva</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($szamfejtesek as $szamfejtes)
                            <tr>
                                <td>{{ $szamfejtes->DolgozoID }}</td>
                                <td>{{ $szamfejtes->vezeteknev }}</td>
                                <td>{{ $szamfejtes->keresztnev }}</td>
                                <td>{{ $szamfejtes->honap }}</td>
                                <td>{{ $szamfejtes->ber }} Ft</td>
                                <td>{{ $szamfejtes->created_at }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Nincs elérhető adat.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Bezárás</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Új számfejtés -->
<div class="modal fade" id="ujSzamfejtesModal" tabindex="-1" aria-labelledby="ujSzamfejtesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ujSzamfejtesModalLabel">Új számfejtés</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="table-responsive overflow-auto" style="max-height: 70vh;">
                        <table class="table table-striped table-bordered align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Vezetéknév</th>
                                    <th>Keresztnév</th>
                                    <th>Dátum (Be)</th>
                                    <th>Dátum (Ki)</th>
                                    <th>Kezdés</th>
                                    <th>Vége</th>
                                    <th>Óra</th>
                                    <th>Bér</th>
                                    <th>Bónusz</th>
                                    <th>Végösszeg</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($osszescsekkolasok as $Csekkolas)
                                    <tr>
                                        <td>{{ $Csekkolas->az_id }}</td>
                                        <td>{{ $Csekkolas->Vezeteknev }}</td>
                                        <td>{{ $Csekkolas->Keresztnev }}</td>
                                        <td>{{ $Csekkolas->Datum_Be }}</td>
                                        <td>{{ $Csekkolas->Datum_Ki }}</td>
                                        <td>{{ $Csekkolas->Kezdido }}</td>
                                        <td>{{ $Csekkolas->Vegido }}</td>
                                        <td>{{ $Csekkolas->Ora }}</td>
                                        <td>{{ $Csekkolas->Ber }}</td>
                                        <td>{{ $Csekkolas->Bonusz }}</td>
                                        <td>{{ $Csekkolas->Vegosszeg }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="12" class="text-center">Nincs nem számfejtett csekkolás.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="form-group">
                            <input type="text" id="vegosszeg_osszeg" value="{{ $csekkolasokosszeg }}" class="form-control" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Bezárás</button>
                <form action="{{ route('payroll-calculation.create') }}" method="POST">
                    @csrf
                    <input type="text" name="ber" value="{{ $csekkolasokosszeg }}" hidden>
                    <button type="submit" class="btn btn-success">Számfejtés létrehozása</button>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
