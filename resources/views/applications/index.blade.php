@extends('layouts.app')

@section('title', 'Applications')

@section('content')
<div class="container" style="max-width:900px; margin:50px auto;">
    <h2>Scholarship Applications</h2>

    @if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
    @endif

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        thead {
            background-color: #333333;
            color: white;
        }

        tbody tr:hover {
            background-color: #f2f2f2;
        }

        a.btn-edit {
            color: #007bff;
            text-decoration: none;
            margin-right: 5px;
        }

        button.btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        button.btn-delete:hover {
            background-color: #c82333;
        }
    </style>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Year</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($applications as $app)
            <tr>
                <td>{{ $app->studentID }}</td>
                <td>{{ $app->student_name }}</td>
                <td>{{ $app->student_email }}</td>
                <td>{{ $app->course }}</td>
                <td>{{ $app->year_level }}</td>
                <td>{{ $app->status }}</td>
                <td>{{ $app->remarks }}</td>
                <td>
                    <a href="{{ route('applications.edit', $app->studentID) }}" class="btn-edit">Edit</a>
                    <form action="{{ route('applications.destroy', $app->studentID) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this application?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" style="padding:10px; text-align:center;">No applications found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection