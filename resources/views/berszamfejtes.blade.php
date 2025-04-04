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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#elozmenyekModal">Előzmények</button>
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
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ujSzamfejtesModal" 
                                            data-dolgozo-id="{{ $dolgozo->DolgozoID }}" 
                                            data-vezeteknev="{{ $dolgozo->Vezeteknev }}" 
                                            data-keresztnev="{{ $dolgozo->Keresztnev }}">
                                            Új számfejtés
                                        </button>
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
                <h5 class="modal-title" id="ujSzamfejtesModalLabel">Új számfejtés - <span id="dolgozoNev"></span></h5>
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
                            <tbody id="csekkolasokTbody">
                            </tbody>
                        </table>
                        <div class="form-group">
                            <input type="text" id="vegosszeg_osszeg" class="form-control" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Bezárás</button>
                <form action="" method="">
                    @csrf
                    <input type="hidden" name="dolgozoID" id="selectedDolgozoID">
                    <input type="hidden" name="ber" id="selectedBer">
                    <button type="submit" class="btn btn-success">Számfejtés létrehozása</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const osszesCsekkolas = @json($osszescsekkolasok);
    
    const ujSzamfejtesModal = document.getElementById('ujSzamfejtesModal');
    ujSzamfejtesModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const dolgozoID = button.getAttribute('data-dolgozo-id');
        const vezeteknev = button.getAttribute('data-vezeteknev');
        const keresztnev = button.getAttribute('data-keresztnev');
        
        document.getElementById('dolgozoNev').textContent = vezeteknev + ' ' + keresztnev;
        
        document.getElementById('selectedDolgozoID').value = dolgozoID;
        const dolgozoCsekkolasok = osszesCsekkolas.filter(csekkolas => csekkolas.az_id == dolgozoID);
        const csekkolasokTbody = document.getElementById('csekkolasokTbody');
        csekkolasokTbody.innerHTML = '';
        
        let osszeg = 0;
        
        if (dolgozoCsekkolasok.length > 0) {
            dolgozoCsekkolasok.forEach(csekkolas => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${csekkolas.az_id}</td>
                    <td>${csekkolas.Vezeteknev}</td>
                    <td>${csekkolas.Keresztnev}</td>
                    <td>${csekkolas.Datum_Be}</td>
                    <td>${csekkolas.Datum_Ki}</td>
                    <td>${csekkolas.Kezdido}</td>
                    <td>${csekkolas.Vegido}</td>
                    <td>${csekkolas.Ora}</td>
                    <td>${csekkolas.Ber}</td>
                    <td>${csekkolas.Bonusz}</td>
                    <td>${csekkolas.Vegosszeg}</td>
                `;
                csekkolasokTbody.appendChild(row);
                
                osszeg += parseFloat(csekkolas.Vegosszeg || 0);
            });
        } else {
            const row = document.createElement('tr');
            row.innerHTML = `<td colspan="11" class="text-center">Nincs nem számfejtett csekkolás ehhez a dolgozóhoz.</td>`;
            csekkolasokTbody.appendChild(row);
        }

        // Végösszeg megjelenítése
        document.getElementById('vegosszeg_osszeg').value = osszeg.toFixed(2);
        document.getElementById('selectedBer').value = osszeg.toFixed(2);
    });
});
</script>
</x-app-layout>
