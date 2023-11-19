@extends('app')

@section('content')
    <div class="container w-25 border p-4 mt-4">
        <form action="{{route('tomakes')}}" method="POST">
            @csrf

            @if (session('success'))
                <h6 class="alert alert-success">{{session('success')}}</h6>
            @endif

            @error('title')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror
            <div class="mb-3">
                <label for="title" class="form-label">Tarea a crear </label>
                <input type="text" name="title" class="form-control" >
            </div>
            <button type="submit" class="btn btn-primary">Crear tarea</button>
        </form>
        <div>
            @foreach ($tomakes as $tomake)
                <div class="row py-1">
                    <div class="col-md-9 d-flex align-items-center">
                        <a href="{{ route('tomakes-edit', ['id' => $tomake->id]) }}">{{$tomake->title}}</a>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <form action="{{ route('tomakes-destroy', [$tomake->id])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btm-sm">Eliminar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
