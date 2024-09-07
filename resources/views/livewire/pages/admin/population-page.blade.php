<?php

use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Services\Notifications\NotificationService;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\HeadingRowImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PopulationsImport;
use Livewire\Attributes\Layout;

new #[Layout('layouts.admin')] class extends Component {
    use WithFileUploads;

    public $file;

    public $populationModalState;

    public $excelColumns = [];

    public $dbColumns = [];

    public $columnMappings = [];

    public function mount()
    {
        // Get columns for the 'products' table
        $this->dbColumns = config('pokemon.populationTableColumns');
    }

    public function rules()
    {
        $rules = [
            'file' => 'required|file|mimes:xlsx,csv',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'file.required' => 'Please select a file.',
            'file.mimes' => 'The file must be a file of type: xlsx, csv.',
        ];
    }

    public function updatedFile()
    {
        if ($this->file) {
            $headers = (new HeadingRowImport())->toArray($this->file)[0][0];
            // Map the headers to the desired format
            foreach ($headers as $key => $header) {
                $this->excelColumns[] = [
                    'name' => $this->reverseSlug($header),
                    'value' => $header,
                ];
            }
        }
    }

    public function reverseSlug($slug)
    {
        // Replace hyphens with spaces
        $string = str_replace('_', ' ', $slug);

        // Optionally capitalize the first letter of each word
        $string = ucwords($string);

        return $string;
    }

    public function submit()
    {
        $this->validate();

        try {
            // Check if 'card_id' column is present
            if (!isset($this->columnMappings['card_id']) || empty($this->columnMappings['card_id']) || !isset($this->columnMappings['set_id']) || empty($this->columnMappings['set_id'])) {
                app(NotificationService::class)->sendExeptionNotification("The 'Card Id' and 'Set Id' column is required.");
                return;
            }

            Log::info('Importing cards...');

            Excel::import(new PopulationsImport($this->columnMappings), $this->file);
            app(NotificationService::class)->sendSuccessNotification('Importing Cards process start in the background. Please wait...');

            $this->redirectRoute('population-page');
        } catch (\Throwable $e) {
            Log::error("Failed to import products: {$e->getMessage()}");
            app(NotificationService::class)->sendExeptionNotification();
            $this->redirectRoute('population-page');
        }
    }
}; ?>

<div class="py-4">
    <div class="max-w-7xl mx-auto flex gap-4 justify-end sm:px-6 lg:px-8 mb-2">
        <x-wui-mini-button info icon="document-arrow-down" x-on:click="$openModal('populationModal')"
            x-tooltip.placement.bottom.raw="Import Populations" />
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg min-h-[70vh]">
            <div class="p-6 text-gray-900 dark:text-gray-100">
               <livewire:tables.population-table/>
            </div>
        </div>
        <div>
            <x-wui-modal-card title="Import Populations" name="populationModal" wire:model.live="populationModalState" width="5xl"
                align="center">
                <form wire:submit="submit" class="px-6">
                    <div class="space-y-6 mb-8">
                        <x-file-pond wire:model="file"
                            accept="text/csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" />

                        @error('file')
                            <div class="w-full text-sm text-red-600 flex justify-center items-center mt-1">
                                <span>{{ $message }}</span>
                            </div>
                        @enderror

                        @if ($this->file && count($this->excelColumns) > 0)
                            <div class="grid grid-cols-2 gap-4">
                                @foreach ($this->dbColumns as $dbColumn)
                                    <div class="grid grid-cols-[1fr_2fr] items-center gap-4 py-4">
                                        <p class="font-semibold text-gray-500">{{ $dbColumn['name'] }}</p>
                                        <x-wui-select placeholder="Select Column"
                                            wire:model.live="columnMappings.{{ $dbColumn['value'] }}"
                                            wire:loading.attr="disabled" wire:target="submit">
                                            @foreach ($excelColumns as $excelColumn)
                                                <x-wui-select.option :disabled="in_array($excelColumn['value'], $columnMappings)
                                                    ? true
                                                    : false"
                                                    value="{{ $excelColumn['value'] }}">{{ $excelColumn['name'] }}</x-wui-select.option>
                                            @endforeach
                                        </x-wui-select>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <x-wui-button class="w-full my-2" type="submit" spinner="submit" primary label="Import" />
                </form>
            </x-wui-modal-card>
        </div>
    </div>
</div>

