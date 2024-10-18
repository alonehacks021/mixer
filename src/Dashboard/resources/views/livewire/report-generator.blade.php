<div class="container-fluid px-0">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header" data-toggle="collapse" data-target="#reports">
                    <i class="fas fa-search"></i>
                    الگوها
                </div>
                <div class="card-body collapse show" id="reports">
                    <div class="form-group">
                        <label>الگو</label>
                        <select class="custom-select" wire:model="selectedReportId">
                            <option value="">انتخاب</option>
                            @foreach ($reports as $report)
                            <option value="{{$report->id}}">
                                {{$report->title}}
                                ({{$report->created_at_j}})
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="button" class="btn btn-primary" wire:click="apply">
                        <i class="fas fa-eye"></i>
                        نمایش الگو
                    </button>
                    <button type="button" class="btn btn-success" id="save-report">
                        <i class="fas fa-save"></i>
                        ذخیره الگوی فعلی
                    </button>
                    <button type="button" class="btn btn-success" wire:click="download">
                        <i class="fas fa-download"></i>
                        دانلود گزارش
                    </button>

                    @if($selectedReportId)
                    <button type="button" class="btn btn-danger" id="delete-report">
                        <i class="fas fa-trash-alt"></i>
                        حذف الگو
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card bg-light">
                <div class="card-header" data-toggle="collapse" data-target="#result">
                    <i class="fas fa-table"></i>
                    نتایج
                </div>
                <div class="card-body collapse" id="result" wire:ignore.self>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover bg-white">
                            <thead class="thead-light">
                                <tr>
                                    <th colspan="{{$this->report::resultColumnsCount()}}">
                                        تعداد:
                                        {{$entities->total()}}
                                    </th>
                                </tr>
                                <tr>
                                    @foreach ($this->result() as $column)
                                    <th class="{{($column['fit'] ?? null) ? 'fit' : null}}">{{$column['label'] ?? null}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($entities ?? [] as $entity)
                                <tr>
                                    @foreach ($this->result() as $column)
                                    <td class="{{($column['fit'] ?? null) ? 'fit' : null}}">
                                        @if($column['html'] ?? false)
                                        {!! $column['value']($entity) !!}</td>
                                        @else
                                        {{$column['value']($entity)}}</td>
                                        @endif
                                    @endforeach
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="{{$this->report::resultColumnsCount()}}">
                                        نتیجه ای یافت نشد
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {!! $entities->render() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            @foreach ($this->sections() as $section)
            <div class="card">
                <div class="card-header" data-toggle="collapse" data-target="#section-{{$loop->index}}">{{$section['title']}}</div>
                <div class="card-body collapse " id="section-{{$loop->index}}" wire:ignore.self>
                    @include('dashboard::components.livewire-filter', [
                        'filters' => $section['filters'],
                    ])

                    <div class="row mt-3">
                        <div class="col">
                            <button type="button" class="btn btn-primary" wire:click="apply">
                                <span wire:loading wire:target="apply">
                                    <i class="fas fa-spinner fa-spin mr-1"></i>
                                    لطفا صبر کنید
                                </span>
                                <span wire:loading.remove wire:target="apply">
                                    <i class="fas fa-search mr-1"></i>
                                    اعمال فیلتر ها
                                </span>
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <hr/>
                            @include('dashboard::components.livewire-report', [
                                'section' => $loop->iteration,
                                'filters' => $section['filters'] ?? [],
                                'columns' => $section['columns'] ?? [],
                            ])
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    $(document).on('click', '#save-report', function() {
        Swal.fire({
            icon: 'question',
            title: 'نام الگو را وارد نمایید',
            input: 'text',
            inputAttributes: {
                required: true,
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'ذخیره',
            cancelButtonText: 'لغو',
            showLoaderOnConfirm: true,
            preConfirm: (name) => {
                @this.save(name);
            },
        });
    });

    $(document).on('click', '#delete-report', function() {
        Swal.fire({
            icon: 'question',
            title: 'آیا از حذف گزارش مطمئن هستید؟',
            showCancelButton: true,
            confirmButtonText: 'بله',
            cancelButtonText: 'خیر',
        }).then(function(event) {
            if(event.isConfirmed) {
                @this.delete();
            }
        });
    });

    $(window).on('report-added', function() {
        Swal.fire({
            icon: 'success',
            text: 'الگو با موفقیت ذخیره شد',
            confirmButtonText: 'باشه!',
        });
    });

    $(window).on('report-deleted', function() {
        Swal.fire({
            icon: 'success',
            text: 'الگو با موفقیت حذف شد',
            confirmButtonText: 'باشه!',
        });
    });

    $('.check-all').on('change', handleCheckboxes);

    function handleCheckboxes() {
        var section = $(this).attr('data-section');
        var checked = $(this).is(':checked');
        var checkboxes = $('#report-section-' + section + ' .filter');

        var checkboxesIds = [];
        checkboxes.each(function(index, item) {
            checkboxesIds.push($(item).val());
        });

        if(checked) {
            @this.addToColumns(checkboxesIds);
        }
        else {
            @this.removeFromColumns(checkboxesIds);
        }
    }
});
</script>
@endpush
