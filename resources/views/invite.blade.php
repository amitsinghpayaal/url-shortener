<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Invite User
        </h2>
    </x-slot>

    <div class="py-12 container">
        <form method="POST" action="/invite" style="margin: 20px;">
            @csrf
            <label class="form-label me-2">Name: <input class="form-control" type="text" name="name" required></label>
            <label class="form-label me-2">Email: <input class="form-control" type="email" name="email" required></label>
            <label class="form-label me-2">Role:
                <select class="form-select" name="role" required>
                    <option value="Admin">Admin</option>
                    <option value="Member">Member</option>
                </select>
            </label>
            <label class="form-label me-2">Company:
                <select class="form-select" name="company_id" required>
                    @foreach(App\Models\Company::all() as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </label><br>
            <button class="btn btn-info m-2" type="submit">Send Invitation</button>
        </form>
    </div>
</x-app-layout> 