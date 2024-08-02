<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.profile');
    }

    //  Handle profile update request
    public function updateProfile(Request $request)
    {
        
    }

    public function upload(Request $request)
    {
        // Validar la imagen
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Almacenar la imagen
        if ($request->hasFile('profile_picture')) {
            // Eliminar la imagen anterior si existe
            if ($user->profile_picture) {
                $oldImage = public_path($user->profile_picture);
                if (File::exists($oldImage)) {
                    File::delete($oldImage);
                }
            }

            // Guardar la nueva imagen
            $file = $request->file('profile_picture');
            $filename = time() . '_' . $user->id . '.' . $file->getClientOriginalExtension();
            $filePath = 'images/profile/' . $filename;

            $file->move(public_path('images/profile'), $filename);

            // Actualizar el campo profile_picture del usuario
            $user->profile_picture = $filePath;
            $user->save();
        }

        return redirect()->back()->with('success', 'Foto de perfil actualizada con éxito.');
    }
}
