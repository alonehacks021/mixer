<?php

namespace Nahad\Foundation\Auth\Console\Commands;

use Illuminate\Console\Command;
use Nahad\Foundation\Auth\Events\NahadGroupCreated;
use Nahad\Foundation\Auth\Models\NahadGroup;
use Nahad\Foundation\Auth\Services\SpecialService;

class FetchNahadGroups extends Command
{
    protected $signature = 'fetch:nahad-groups';

    protected $description = 'Command description';

    public function handle()
    {
        $this->info('Start Fetching...');

        $groups = SpecialService::groups('moavenat');

        foreach($groups->data ?? [] as $group) {
            $nahadVice = NahadGroup::updateOrCreate([
                'nahad_id' => $group->id,
                'nahad_parent_id' => null,
                'type' => NahadGroup::TYPE_VICE,
            ], [
                'title' => convert_characters($group->title),
            ]);

            NahadGroupCreated::dispatch($nahadVice);

            $managements = SpecialService::groups('modiriat', $group->id);
            foreach($managements->data ?? [] as $management) {
                $nahadManagement = NahadGroup::updateOrCreate([
                    'nahad_id' => $management->id,
                    'nahad_parent_id' => $group->id,
                    'type' => NahadGroup::TYPE_MANAGEMENT,
                ], [
                    'title' => convert_characters($management->title),
                ]);

                NahadGroupCreated::dispatch($nahadVice, $nahadManagement);

                $offices = SpecialService::groups('edareh', $management->id);
                foreach($offices->data ?? [] as $office) {
                    $nahadOffice = NahadGroup::updateOrCreate([
                        'nahad_id' => $office->id,
                        'nahad_parent_id' => $management->id,
                        'type' => NahadGroup::TYPE_OFFICE,
                    ], [
                        'title' => convert_characters($office->title),
                    ]);

                    NahadGroupCreated::dispatch($nahadVice, $nahadManagement, $nahadOffice);
                }
            }
        }

        $this->info('Finish Fetching');

        return 0;
    }
}
