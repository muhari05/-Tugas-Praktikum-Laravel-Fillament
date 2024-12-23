
<? php

use App\Filament\Resources\DosenResource;

class Panel extends PanelProvider
{
    public function resources(): array
    {
        return [
            DosenResource::class, // Pastikan ini ada
        ];
    }
}
