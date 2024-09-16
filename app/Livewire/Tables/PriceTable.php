<?php

namespace App\Livewire\Tables;

use App\Models\PokeCardPrice;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Responsive;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use WireUi\Traits\WireUiActions;

final class PriceTable extends PowerGridComponent
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
        return PokeCardPrice::query();
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
            ->add('price_id')
            ->add('value')
            ->add('sale_date')
            ->add('grade')
            ->add('lot_id')
            ->add('auction_house')
            ->add('seller')
            ->add('cert_number')
            ->add('sale_type')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Price Id', 'price_id')->sortable()->searchable(),
            Column::make('Card Id', 'card_id')->sortable()->searchable(),
            Column::make('Value', 'value')->sortable()->searchable()->fixedOnResponsive(),
            Column::make('Sale Date', 'sale_date')->sortable()->searchable(),
            Column::make('Grade', 'grade')->sortable()->searchable()->fixedOnResponsive(),
            Column::make('Lot Id', 'lot_id')->sortable()->searchable()->fixedOnResponsive(),
            Column::make('Auction House', 'auction_house')->sortable()->searchable()->fixedOnResponsive(),
            Column::make('Seller', 'seller')->sortable()->searchable()->fixedOnResponsive(),
            Column::make('Cert Number', 'cert_number')->sortable()->searchable(),
            Column::make('Sale Type', 'sale_type')->sortable()->searchable()->fixedOnResponsive(),
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
                'params' => ''.$rowId.'',
            ],
        ]);
    }

    public function deleteProduct($id)
    {
        $product = PokeCardPrice::find($id);
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
