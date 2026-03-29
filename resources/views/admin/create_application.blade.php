@extends('layouts.admin')

@section('title', 'Submit Application')

@section('content')

<h2>Submit Scholarship Application</h2>

<form method="POST" action="{{ route('admin.application.store') }}">
    @csrf

    <label for="student_name">Full Name *</label>
    <input type="text" id="student_name" name="student_name" value="{{ old('student_name') }}" required>

    <label for="student_email">Email</label>
    <input type="email" id="student_email" name="student_email" value="{{ old('student_email') }}">

    <label for="course">Course / Program *</label>
    <input type="text" id="course" name="course" value="{{ old('course') }}" required>

    <label for="year_level">Year Level *</label>
    <select id="year_level" name="year_level" required>
        <option value="">--Select Year--</option>
        @for($i = 1; $i <= 4; $i++)
            <option value="{{ $i }}" {{ old('year_level') == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
    </select>

    <label for="status">Status *</label>
    <select id="status" name="status" required>
        <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
        <option value="Approved" {{ old('status') == 'Approved' ? 'selected' : '' }}>Approved</option>
        <option value="Rejected" {{ old('status') == 'Rejected' ? 'selected' : '' }}>Rejected</option>
    </select>

    <label for="remarks">Remarks</label>
    <textarea id="remarks" name="remarks">{{ old('remarks') }}</textarea>

    <button type="submit">Add Application</button>
</form>

</body>

</html>
@endsection