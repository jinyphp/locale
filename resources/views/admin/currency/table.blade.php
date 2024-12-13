<div>

    {{-- <x-loading-indicator/> --}}
    <div class="d-flex justify-content-between">
        <div class="d-flex justify-content-end gap-2">
            <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFilter"
                aria-expanded="false" aria-controls="collapseFilter">
                조건필터
            </button>

            <div class="">
                <select class="form-select" wire:model.live="paging">
                    <option value='5'>5</option>
                    <option value='10'>10</option>
                    <option value='20'>20</option>
                    <option value='50'>50</option>
                    <option value='100'>100</option>
                </select>
            </div>
        </div>

        <div>
            <button class="btn btn-primary" wire:click="create">
                추가
            </button>
        </div>
    </div>

    <div class="collapse" id="collapseFilter">
        <div class="card mt-2 mb-0">
            {{-- 필터를 적용시 filter.blade.php 를 읽어 옵니다. --}}
            @if ($viewFilter)
                @includeIf($viewFilter)
            @endif

            <div class="d-flex justify-content-center gap-2 my-2">
                <button class="btn btn-primary" wire:click="filter_search">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block" width="16" height="16"
                        fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                    </svg>
                    검색
                </button>
                <button class="btn btn-secondary" wire:click="filter_reset">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block" width="16" height="16"
                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path
                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                        <path
                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                    </svg>
                    취소
                </button>
            </div>
        </div>


        {{-- 메시지를 출력합니다. --}}
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
    </div>


    {{-- 외부에서 지정한 목록 테이블을 출력합니다. --}}
    @if (isset($actions['view']['list']))
        @includeIf($actions['view']['list'])
    @endif

    @if (empty($rows))
        <div class="text-center">
            검색된 데이터 목록이 없습니다.
        </div>
    @endif

    {{-- 페이지네이션 --}}
    <div class="d-flex justify-content-between">
        <div class="">
            전체 {{ count($ids) }} 개가 검색되었습니다.
        </div>
        <div>
            @if (isset($rows) && is_object($rows))
                @if (method_exists($rows, 'links'))
                    <div>{{ $rows->links() }}</div>
                @else
                @endif
            @else
            @endif
        </div>
    </div>

    {{-- 선택삭제 기능 --}}
    {{-- <div class="mb-3">
        <div class="d-flex justify-content-between">
            <div>
                @if (isset($actions['delete']['check']) && $actions['delete']['check'])
                    @includeIf('jiny-table::table.table_delete.check_delete')
                @endif
            </div>
            <div>
            </div>
        </div>
    </div> --}}



</div>
