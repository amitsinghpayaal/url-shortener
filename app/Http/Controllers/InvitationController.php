<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function invite(Request $request)
    {
        $user = $request->user();
        $role = $request->input('role');
        $companyId = $request->input('company_id');

        if ($user->role === 'SuperAdmin') {
            if ($role !== 'Admin') {
                return response()->json(['error' => 'SuperAdmin can only invite Admins.'], 403);
            }
            // SuperAdmin can invite Admin to any company
        } elseif ($user->role === 'Admin') {
            if (!in_array($role, ['Admin', 'Member'])) {
                return response()->json(['error' => 'Admin can only invite Admin or Member.'], 403);
            }
            if ($user->company_id != $companyId) {
                return response()->json(['error' => 'Admin can only invite to their own company.'], 403);
            }
        } else {
            return response()->json(['error' => 'Unauthorized.'], 403);
        }

        // Invitation logic (e.g., create user, send email, etc.)
        // For now, just return success
        return redirect('/dashboard')->with('success', 'Invitation sent!');
    }

    public function showForm()
    {
        return view('invite');
    }
}
