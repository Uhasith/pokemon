 <div class="flex gap-4">
     <x-wui-icon name="pencil-square" class="w-5 h-5 text-green-600 cursor-pointer" solid wire:click="edit({{ $row->id }})"
         x-tooltip.placement.bottom.raw="Edit" />
     <x-wui-icon name="trash" class="w-5 h-5 text-red-600 cursor-pointer" solid wire:click="delete({{ $row->id }})"
         x-tooltip.placement.bottom.raw="Delete" />
 </div>
