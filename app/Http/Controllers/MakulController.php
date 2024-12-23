<? php

namespace App\Http\Controllers;

use App\Models\Makul;
use Illuminate\Http\Request;

class MakulController extends Controller
{
    public function destroy($id)
    {
        Makul::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Mata kuliah berhasil dihapus.');
    }
}
