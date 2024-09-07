<?php

namespace App\Livewire\Tables;

use Illuminate\View\View;
use App\Models\SubmittedData;
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

final class SubmittedDataTable extends PowerGridComponent
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
        return SubmittedData::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('submitted_data_id')
            ->add('url')
            ->add('reason')
            ->add('action')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Submitted Data Id', 'submitted_data_id')->sortable()->searchable()->fixedOnResponsive(),
            Column::make('Reason', 'reason')->sortable()->searchable(),
            Column::make('Action', 'action')->sortable()->searchable(),
            Column::make('Url', 'url')->sortable()->searchable(),
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
        $product = SubmittedData::find($id);
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
