<?php

namespace App\Livewire\Tables;

use App\Models\Set;
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
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Responsive;

final class SetTable extends PowerGridComponent
{
    use WireUiActions;
    use WithExport;

    public function setUp(): array
    {
        // $this->showCheckBox();

        return [
            Responsive::make(),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Set::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('set_id')
            ->add('set_name')
            ->add('psa_set_name')
            ->add('year')
            ->add('pop_url')
            ->add('release_date')
            ->add('set_image')
            ->add('language')
            ->add('is_promo')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Set Name', 'set_name')->sortable()->searchable()->fixedOnResponsive(),
            Column::make('PSA Set Name', 'psa_set_name')->sortable()->searchable(),
            Column::make('Set Id', 'set_id')->sortable()->searchable(),
            Column::make('Year', 'year')->sortable()->searchable()->fixedOnResponsive(),
            Column::make('Pop Url', 'pop_url'),
            Column::make('Release Date', 'release_date')->sortable()->searchable(),
            Column::make('Set Image', 'set_image'),
            Column::make('Language', 'language')->sortable()->searchable()->fixedOnResponsive(),
            Column::make('Is Promo', 'is_promo'),
            // Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
        ];
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
        $product = Set::find($id);
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
