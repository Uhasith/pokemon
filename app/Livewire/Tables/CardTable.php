<?php

namespace App\Livewire\Tables;

use App\Models\Card;
use Illuminate\View\View;
use Illuminate\Support\Carbon;
use WireUi\Traits\WireUiActions;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Responsive;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class CardTable extends PowerGridComponent
{
    use WireUiActions;
    use WithExport;

    public function setUp(): array
    {
        // $this->showCheckBox();

        $this->persist(['columns'], prefix: auth()->id ?? '');

        return [
            Responsive::make(),
            Header::make()->showToggleColumns()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Card::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('card_id')
            ->add('set_id')
            ->add('name')
            ->add('psa_name')
            ->add('card_number')
            ->add('variant')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Card Name', 'name')->sortable()->searchable()->fixedOnResponsive(),
            Column::make('PSA Name', 'psa_name')->sortable()->searchable(),
            Column::make('Card Id', 'card_id')->sortable()->searchable(),
            Column::make('Set Id', 'set_id')->sortable()->searchable(),
            Column::make('Card Number', 'card_number')->sortable()->searchable()->fixedOnResponsive(),
            Column::make('Variant', 'variant'),
            // Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [];
    }
    public function edit($rowId): void
    {
        $this->dispatch('open-product-modal', params: ['id' => $rowId, 'modalId' => 'product-create-modal']);
    }

    public function delete($rowId): void
    {
        $this->dialog()->confirm([
            'title' => 'Are you Sure ?',
            'description' => 'You want to delete this Product ?',
            'icon' => 'error',
            'accept' => [
                'label' => 'Yes, delete it',
                'method' => 'deleteProduct',
                'params' => '' . $rowId . '',
            ],
        ]);
    }

    public function deleteProduct($id)
    {
        $product = Card::find($id);
        $product->orders()->detach();
        $product->delete();
    }

    public function actionsFromView($row): View
    {
        return view('actions.table-actions', ['row' => $row]);
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
