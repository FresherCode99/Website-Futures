@extends('layouts.app')

@section('title', 'TN | Show Team')
@section('mainn')
    <div class="container">
        <h1>Thông tin về Team: {{ $team->name ?? 'Không có tên' }}</h1>

        <p>Admin: {{ $team->admin->username }}</p>

        <h3>Danh sách thành viên</h3>
        <ul class="list-group">
            @if ($team->users->isEmpty())
                <li class="list-group-item">Không có thành viên nào.</li>
            @else
                @foreach ($team->users as $user)
                    <li class="list-group-item">{{ $user->username ?? 'Không có tên' }}</li>
                @endforeach
            @endif
        </ul>

        @if (auth()->id() == $team->admin_id)
            <form action="{{ route('teams.addUser', $team->id) }}" method="POST" class="mt-3">
                @csrf
                <div class="form-group">
                    <label for="user_id">Mời người dùng vào team</label>
                    <select name="user_id" id="user_id" class="form-control">
                        @foreach ($allUsers->filter(function($us) use ($team, $user) {
                            return !$team->users->contains($us->id) && $us->id != $user->id;
                        }) as $us)
                            <option value="{{ $us->id }}">{{ $us->username }}</option>
                        @endforeach
                    </select>
                    
                </div>
                
                <button type="submit" class="btn btn-success mt-3">Mời người dùng</button>
            </form>
        @endif
    </div>
@endsection
