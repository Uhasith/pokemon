<?php

use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Services\Notifications\NotificationService;

new 
#[Layout('layouts.admin')]
class extends Component {

    use WithFileUploads;

    public $allCardsModalState, $tcg_all_card, $tcg_all_set, $price_time_series, $transaction_time_series;

    #[Validate('required|file|mimes:json')]
    public function submitTcgAllCard()
    {
        try {
            if ($this->tcg_all_card->getClientOriginalName() !== 'tcg_all_card.json') {
                throw new \Exception("The uploaded file must be named 'tcg_all_card.json'");
            }
            $this->tcg_all_card->storeAs('json-files', 'tcg_all_card.json');

            Artisan::call('app:poke-all-card-import');

            $this->redirectRoute('json-uploads');
        } catch (\Throwable $e) {
            Log::error("Failed to import cards: {$e->getMessage()}");
            app(NotificationService::class)->sendExeptionNotification();
            $this->redirectRoute('json-uploads');
        }
    }

    #[Validate('required|file|mimes:json')]
    public function submitTcgAllSet()
    {
        try {
            if ($this->tcg_all_set->getClientOriginalName() !== 'tcg_all_set.json') {
                throw new \Exception("The uploaded file must be named 'tcg_all_set.json'");
            }
            $this->tcg_all_set->storeAs('json-files', 'tcg_all_set.json');

            Artisan::call('app:poke-all-sets-import');

            $this->redirectRoute('json-uploads');
        } catch (\Throwable $e) {
            Log::error("Failed to import sets: {$e->getMessage()}");
            app(NotificationService::class)->sendExeptionNotification();
            $this->redirectRoute('json-uploads');
        }
    }

    #[Validate('required|file|mimes:json')]
    function submitTransactionTimeSeries() {
        try {
            if ($this->transaction_time_series->getClientOriginalName() !== 'transaction_timeseries_data.json') {
                throw new \Exception("The uploaded file must be named 'transaction_timeseries_data.json'");
            }
            $this->transaction_time_series->storeAs('json-files', 'transaction_timeseries_data.json');

            Artisan::call('app:poke-card-transaction-time-series-import');

            $this->redirectRoute('json-uploads');
        } catch (\Throwable $e) {
            Log::error("Failed to import transaction_timeseries_data: {$e->getMessage()}");
            app(NotificationService::class)->sendExeptionNotification();
            $this->redirectRoute('json-uploads');
        }
    }

    #[Validate('required|file|mimes:json')]
    function submitPriceTimeSeries() {
        try {
            // Check if the uploaded file's name is exactly 'timeseries.json'
            if ($this->price_time_series->getClientOriginalName() !== 'price_timeseries_data.json') {
                throw new \Exception("The uploaded file must be named 'price_timeseries_data.json'");
            }

            $this->price_time_series->storeAs('json-files', 'price_timeseries_data.json');

            Artisan::call('app:poke-card-price-time-series-import');

            $this->redirectRoute('json-uploads');
        } catch (\Throwable $e) {
            Log::error("Failed to import price_timeseries_data: {$e->getMessage()}");
            app(NotificationService::class)->sendExeptionNotification();
            $this->redirectRoute('json-uploads');
        }
    }

}; ?>

<div>
    <div class="grid grid-cols-2 gap-10 mx-auto justify-center my-12 max-w-[1100px]">
        <form wire:submit="submitTcgAllCard" class="px-6 max-w-96">
            <div class="space-y-6 mb-8">
                <h2>Upload TCG All Cards JSON file</h2>
                <x-file-pond wire:model="tcg_all_card" accept="application/json" />
    
                @error('tcg_all_card')
                    <div class="w-full text-sm text-red-600 flex justify-center items-center mt-1">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>
    
            <x-wui-button class="w-full my-2" type="submit" spinner="submitTcgAllCard" primary label="Import" />
        </form>

        <form wire:submit="submitTcgAllSet" class="px-6 max-w-96">
            <div class="space-y-6 mb-8">
                <h2>Upload TCG All Sets JSON file</h2>
                <x-file-pond wire:model="tcg_all_set" accept="application/json" />
    
                @error('tcg_all_set')
                    <div class="w-full text-sm text-red-600 flex justify-center items-center mt-1">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>
    
            <x-wui-button class="w-full my-2" type="submit" spinner="submitTcgAllSet" primary label="Import" />
        </form>

        <form wire:submit="submitTransactionTimeSeries" class="px-6 max-w-96">
            <div class="space-y-6 mb-8">
                <h2>Upload Transaction Time Series JSON file</h2>
                <x-file-pond wire:model="transaction_time_series" accept="application/json" />
    
                @error('transaction_time_series')
                    <div class="w-full text-sm text-red-600 flex justify-center items-center mt-1">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>
    
            <x-wui-button class="w-full my-2" type="submit" spinner="submitTransactionTimeSeries" primary label="Import" />
        </form>

        <form wire:submit="submitPriceTimeSeries" class="px-6 max-w-96">
            <div class="space-y-6 mb-8">
                <h2>Upload Price Time Series JSON file</h2>
                <x-file-pond wire:model="price_time_series" accept="application/json" />
    
                @error('price_time_series')
                    <div class="w-full text-sm text-red-600 flex justify-center items-center mt-1">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>
    
            <x-wui-button class="w-full my-2" type="submit" spinner="submitPriceTimeSeries" primary label="Import" />
        </form>
    </div>
    
</div>
