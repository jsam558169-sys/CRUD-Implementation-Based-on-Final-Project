@extends('layouts.app')

@section('title', 'Edit Application')

@section('content')
<div class="container" style="max-width:600px; margin:50px auto;">

    <h2>Edit Scholarship Application</h2>

    {{-- Success message --}}
    @if(session('success'))
    <p class="success" style="color:green;">{{ session('success') }}</p>
    @endif

    {{-- Validation errors --}}
    @if($errors->any())
    <div class="error" style="color:red;">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('applications.update', $application->studentID) }}">
        @csrf
        @method('PUT')

        <label for="student_name">Full Name *</label>
        <input type="text" id="student_name" name="student_name" value="{{ old('student_name', $application->student_name) }}" required style="width:100%; padding:8px; margin-top:5px; margin-bottom:10px;">

        <label for="student_email">Email</label>
        <input type="email" id="student_email" name="student_email" value="{{ old('student_email', $application->student_email) }}" style="width:100%; padding:8px; margin-top:5px; margin-bottom:10px;">

        <label for="course">Course *</label>
        <input type="text" id="course" name="course" value="{{ old('course', $application->course) }}" required style="width:100%; padding:8px; margin-top:5px; margin-bottom:10px;">

        <label for="year_level">Year Level *</label>
        <select id="year_level" name="year_level" required style="width:100%; padding:8px; margin-top:5px; margin-bottom:10px;">
            @for($i = 1; $i <= 4; $i++)
                <option value="{{ $i }}" {{ old('year_level', $application->year_level) == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
        </select>

        <label for="status">Status *</label>
        <select id="status" name="status" required style="width:100%; padding:8px; margin-top:5px; margin-bottom:10px;">
            <option value="Pending" {{ old('status', $application->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Approved" {{ old('status', $application->status) == 'Approved' ? 'selected' : '' }}>Approved</option>
            <option value="Rejected" {{ old('status', $application->status) == 'Rejected' ? 'selected' : '' }}>Rejected</option>
        </select>

        <label for="remarks">Remarks</label>
        <textarea id="remarks" name="remarks" style="width:100%; padding:8px; margin-top:5px; margin-bottom:10px;">{{ old('remarks', $application->remarks) }}</textarea>

        <button type="submit" style="margin-top:15px; padding:10px 20px;">Update Application</button>
    </form>
</div>
@endsection