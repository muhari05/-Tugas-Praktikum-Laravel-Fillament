<? php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function destroy($id)
    {
        Dosen::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Dosen berhasil dihapus.');
    }
}
