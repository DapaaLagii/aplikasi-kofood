@extends('layouts.sbadmin2')
@section('content')

    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-md-12"> 
                <div class="card">
                    <div class="card-header">

                        {{ $judul }}
                    </div>
                    <div class="card-body">

                        {{ $deskripsi }}

                        <div>
                            <br>
                            TOTAL MENU: {{ $menu->count() }}
                        </div>
                        <br>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="table-secondary ">
                                    <td>No</td>
                                    <td>Menu</td>
                                    <td>Jenis</td>
                                    <td>Harga</td>
                                    @if (auth()->user()->role == 'admin')
                                    <td>Aksi</td>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                
                                @foreach ($menu as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->jenis }}</td>
                                        <td>RP {{ $item->harga }}.000</td>
                                        @if (auth()->user()->role == 'admin')
                                        <td>
                                            <a href="{{ route('menu.edit', $item->id) }}" class="btn btn-primary">
                                                Edit
                                            </a>
                                            {!! Form::open([
                                                'route' => ['menu.destroy', $item->id],
                                                'method' => 'delete',
                                                'style' => 'display:inline',
                                            ]) !!}
                                            {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div> --}}

    <div class="container-fluid">
        <div class="row">
            @foreach ($menu as $item)
            <div class="col-md-4 mb-3">
                <div class="card text-center mt-5" style="width: 20rem;">
                    @if ($item->gambar != '')
                        <div class="col-md-15 mb-15 px-2 py-2">
                        <a href="{{ Storage::url($item->gambar) }}" target="blank">
                        <img src="{{ Storage::url($item->gambar) }}" alt="Foto"
                                    class="card-img-top">
                        </a>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title"> <b>{{ $item->nama }}</b></h5>
                        <p class="card-text">{{ $item->jenis }}</p>
                        <p class="card-text">RP {{ $item->harga }}.000</p>
                        @if (auth()->user()->role != 'admin')
                        <a href="{{ route('order.create') }}" class="btn btn-warning btn-outline-dark">Order</a>
                        @endif
                        @if (auth()->user()->role == 'admin')
                        <a href="{{ route('menu.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                        {!! Form::open([
                            'route' => ['menu.destroy', $item->id],
                            'method' => 'delete',
                            'style' => 'display:inline',
                        ]) !!}
                        {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection