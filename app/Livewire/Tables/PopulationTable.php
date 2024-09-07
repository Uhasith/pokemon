<?php

namespace App\Livewire\Tables;

use Illuminate\View\View;
use App\Models\Population;
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

final class PopulationTable extends PowerGridComponent
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
        return Population::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('population_id')
            ->add('card_id')
            ->add('pop1')
            ->add('pop2')
            ->add('pop3')
            ->add('pop4')
            ->add('pop5')
            ->add('pop6')
            ->add('pop7')
            ->add('pop8')
            ->add('pop9')
            ->add('pop10')
            ->add('date_checked')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Population Id', 'population_id')->sortable()->searchable(),
            Column::make('Card Id', 'card_id')->sortable()->searchable(),
            Column::make('Date Checked', 'date_checked')->sortable()->searchable(),
            Column::make('POP 1', 'pop1'),
            Column::make('POP 2', 'pop2'),
            Column::make('POP 3', 'pop3'),
            Column::make('POP 4', 'pop4'),
            Column::make('POP 5', 'pop5'),
            Column::make('POP 6', 'pop6'),
            Column::make('POP 7', 'pop7'),
            Column::make('POP 8', 'pop8'),
            Column::make('POP 9', 'pop9'),
            Column::make('POP 10', 'pop10'),
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
        $product = Population::find($id);
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
