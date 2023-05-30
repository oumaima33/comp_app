<x-app-layout>
    @extends('layouts.app')

        <h1>Judges</h1>
        <a href="{{ route('judges.create') }}" class="btn btn-primary">Create Judge</a>
    
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Company ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($judges as $judge)
                    <tr>
                        <td>{{ $judge->user->name }}</td>
                        <td>{{ $judge->user->email }}</td>
                        <td>{{ $judge->company_id }}</td>
                        <td>
                            <a href="{{ route('judges.show', $judge->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('judges.edit', $judge->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('judges.destroy', $judge->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
  
               </x-app-layout>