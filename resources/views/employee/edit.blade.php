@extends('layouts.app')

@section('content')
    <div class="container-sm mt-5">
        {{-- Formulir untuk membuat pegawai baru --}}
        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            {{-- Token CSRF untuk keamanan --}}
            @csrf
            @method('PUT')
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">

                    {{-- @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show">
                               {{ $error }}
                               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif --}}

                    {{-- Judul dan ikon --}}
                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>Create Employee</h4>
                    </div>
                    <hr>
                    <div class="row">
                        {{-- Input untuk nama depan --}}
                        <div class="col-md-6 mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input class="form-control " type="text" name="firstName" id="firstName"
                                value="{{ $employee->firstname }}" placeholder="Enter First Name">
                            @error('firstName')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- Input untuk nama belakang --}}
                        <div class="col-md-6 mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input class="form-control " type="text" name="lastName" id="lastName"
                                value="{{ $employee->lastname }}" placeholder="Enter Last Name">
                            @error('lastName')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- Input untuk email --}}
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control " type="text" name="email" id="email"
                                value="{{ $employee->email }}" placeholder="Enter Email">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- Input untuk umur --}}
                        <div class="col-md-6 mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input class="form-control " type="text" name="age" id="age"
                                value="{{ $employee->age }}" placeholder="Enter Age">
                            @error('age')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="position" class="form-label">Position</label>
                        <select name="position" id="position" class="form-select">
                            @php
                                $selected = '';
                                if ($errors->any()) {
                                    $selected = old('position');
                                } else {
                                    $selected = $employee->position_id;
                                }
                            @endphp
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}" {{ $selected == $position->id ? 'selected' : '' }}>
                                    {{ $position->code . ' - ' . $position->name }}</option>
                            @endforeach
                        </select>
                        @error('position')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>

                    <hr>
                    <div class="row">
                        {{-- Tombol untuk batal --}}
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('employees.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i
                                    class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        {{-- Tombol untuk edit --}}
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i>
                                Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
