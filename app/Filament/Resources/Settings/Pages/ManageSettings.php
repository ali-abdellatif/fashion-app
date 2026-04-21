<?php

namespace App\Filament\Resources\Settings\Pages;

use App\Filament\Resources\Settings\SettingsResource;
use App\Models\SiteSetting;
use Filament\Actions\Action;
use Filament\Resources\Pages\Page;
use Filament\Schemas\Schema;
use Illuminate\Contracts\Support\Htmlable;

class ManageSettings extends Page
{
    protected static string $resource = SettingsResource::class;

    protected string $view = 'filament.resources.settings.pages.manage-settings';

    public ?array $data = [];

    public function getTitle(): string|Htmlable
    {
        return __('Site Settings');
    }

    public function mount(): void
    {
        $settings = SiteSetting::instance();
        $data = $settings->toArray();
        $data['address'] = $settings->getTranslations('address');
        $this->form->fill($data);
    }

    public function form(Schema $schema): Schema
    {
        return \App\Filament\Resources\Settings\Schemas\SettingsForm::configure($schema)
            ->statePath('data');
    }

    public function save(): void
    {
        $settings = SiteSetting::instance();
        $settings->update($this->form->getState());

        \Filament\Notifications\Notification::make()
            ->title(__('Settings saved successfully'))
            ->success()
            ->send();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('save')
                ->label(__('Save Settings'))
                ->action('save')
                ->icon('heroicon-o-check')
                ->color('primary'),
        ];
    }
}
