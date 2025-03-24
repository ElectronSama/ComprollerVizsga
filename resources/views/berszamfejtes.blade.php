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
</x-app-layout>
