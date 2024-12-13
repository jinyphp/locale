<div class="row mt-2">
    @foreach ($rows as $item)
        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <a href="/admin/locale/currency/log" class="text-decoration-none">
                                <h5 class="text-muted fw-normal mt-0 text-truncate" title="New Leads">
                                    {{ $item->name }}
                                </h5>
                            </a>

                            <x-link-void wire:click="edit({{ $item->id }})" class="text-decoration-none">
                                <h3 class="my-2 py-1">
                                    {{ $item->rate }} / {{ $item->unit }}
                                </h3>
                            </x-link-void>

                            <p class="mb-0 text-muted">
                                {{-- <span class="text-danger me-2">
                                    <i class="mdi mdi-arrow-down-bold"></i>
                                    5.38%
                                </span> --}}
                                {{ $item->created_at }}
                            </p>
                        </div>
                        <div class="col-6">
                            <div class="text-end">

                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div>
    @endforeach
</div>


