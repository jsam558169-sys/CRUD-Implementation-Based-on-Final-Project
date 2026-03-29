@extends('layouts.app')

@section('content')
<div class="container" style="max-width:600px; margin:50px auto;">
    <h2>Submit Scholarship Application</h2>

    @if(session('success'))
    <p class="success" style="color:green;">{{ session('success') }}</p>
    @endif

    @if($errors->any())
    <div class="error" style="color:red; margin-bottom: 15px;">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('student.application.store') }}" style="display: flex; flex-direction: column;">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="student_name">Full Name *</label>
            <input type="text" id="student_name" name="student_name" value="{{ old('student_name') }}" required style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="student_email">Email</label>
            <input type="email" id="student_email" name="student_email" value="{{ old('student_email') }}" style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="course">Course / Program *</label>
            <input type="text" id="course" name="course" value="{{ old('course') }}" required style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="year_level">Year Level *</label>
            <select id="year_level" name="year_level" required style="width: 100%; padding: 8px; box-sizing: border-box;">
                <option value="">--Select Year--</option>
                @for($i = 1; $i <= 4; $i++)
                    <option value="{{ $i }}" {{ old('year_level') == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
            </select>
        </div>

        <button type="submit" style="padding: 10px 20px; width: 150px; align-self: flex-start;">Submit Application</button>
    </form>
</div>
@endsection