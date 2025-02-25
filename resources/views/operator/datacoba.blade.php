@extends('layouts.operator-main')

@section('content')

<table id="search-table">
    <thead>
        <tr>
            <th>
                <span class="flex items-center">
                    Company Name
                </span>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item )
        <tr>
            <td class="px-4 py-3 text-sm font-semibold">
                {{ $item->kode }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    
if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
    const dataTable = new simpleDatatables.DataTable("#search-table", {
        searchable: true,
        sortable: false
    });
}

</script>
@endsection