<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/berszamfejtes.css') }}">

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
                                <th>Összeg</th>
                                <th>Művelet</th>
                                <th>Státusz</th>
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
                                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" disabled>
                                            <span class="input-group-text">HUF</span>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#vizsgalatModal">
                                            Vizsgálat
                                        </button>
                                    </td>
                                    <td>
                                        <span class="statusz lezarva">Lezárva</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
    <div class="modal fade" id="vizsgalatModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">  <!-- Nagy méretű modál -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Vizsgálati adatok</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Reszponzív táblázat -->
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Keresztnév</th>
                                <th>Vezetéknév</th>
                                <th>Érkezés</th>
                                <th>Távozás</th>
                                <th>Munkaidő</th>
                                <th>Bónusz</th>
                                <th>Összeg</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Péter</td>
                                <td>Kiss</td>
                                <td>08:00</td>
                                <td>16:00</td>
                                <td>8 óra</td>
                                <td>10%</td>
                                <td>200 000 Ft</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bezárás</button>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
