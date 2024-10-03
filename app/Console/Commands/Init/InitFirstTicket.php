<?php

namespace App\Console\Commands\Init;

use App\Enums\TicketStepAction\ActionType;
use App\Models\Ticket;
use Illuminate\Console\Command;

class InitFirstTicket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init-first-ticket';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $ticket = Ticket::create(['name' => 'ГРПШ Билет 1 Остановка рабочей линии (НИЖНЯЯ)']);
        foreach ($this->getTicketSteps() as $step) {
            $createdStep = $ticket->steps()->create([
                'position'         => $step['position'],
                'name'             => $step['name'],
                'parent_positions' => $step['parent_positions'],
            ]);
            foreach ($step['statuses'] as $status) {
                $createdStep->statuses()->create([
                    'name'      => $status['name'],
                    'is_active' => $status['is_active'],
                ]);
            }
            foreach ($step['actions'] as $action) {
                $createdStep->actions()->create([
                    'name' => $action['name'],
                    'type' => $action['type'],
                ]);
            }

        }
    }

    public function getTicketSteps(): array
    {
        return [
            [
                'position'         => 1,
                'name'             => 'кран КН20',
                'parent_positions' => [],
                'statuses'         => [
                    ['name' => 'открыт', 'is_active' => false],
                    ['name' => 'закрыт', 'is_active' => true],
                ],
                'actions'          => [
                    ['name' => 'Открыть плавно', 'type' => ActionType::Right],
                    ['name' => 'Закрыть', 'type' => ActionType::Unimplementable],
                    ['name' => 'Оставить без изменения', 'type' => ActionType::Critical],
                    ['name' => 'Открыть резко', 'type' => ActionType::Error],
                ],
            ],
            [
                'position'         => 2,
                'name'             => 'клапан под манометр КМ4',
                'parent_positions' => [1],
                'statuses'         => [
                    ['name' => 'открыт', 'is_active' => false],
                    ['name' => 'закрыт', 'is_active' => true],
                ],
                'actions'          => [
                    ['name' => 'Открыть плавно', 'type' => ActionType::Right],
                    ['name' => 'Закрыть', 'type' => ActionType::Unimplementable],
                    ['name' => 'Оставить без изменения', 'type' => ActionType::Critical],
                    ['name' => 'Открыть резко', 'type' => ActionType::Error],
                ],
            ],
            [
                'position'         => 3,
                'name'             => 'манометр М4',
                'parent_positions' => [2],
                'statuses'         => [
                    ['name' => 'значение 0 кПа', 'is_active' => false],
                    ['name' => 'значение 3 кПа', 'is_active' => true],
                    ['name' => 'значение 6 кПа', 'is_active' => false],
                ],
                'actions'          => [
                    ['name' => 'осмотреть', 'type' => ActionType::Right],
                    ['name' => 'снять', 'type' => ActionType::Critical],
                    ['name' => 'поставить', 'type' => ActionType::Unimplementable],
                ],
            ],
            [
                'position'         => 4.1,
                'parent_positions' => [3],
                'name'             => 'кран шаровый Ду100',
                'statuses'         => [
                    ['name' => 'открыт', 'is_active' => true],
                    ['name' => 'закрыт', 'is_active' => false],
                    ['name' => 'установлен', 'is_active' => false],
                    ['name' => 'снят', 'is_active' => false],
                ],
                'actions'          => [
                    ['name' => 'Открыть плавно', 'type' => ActionType::Right],
                    ['name' => 'Закрыть', 'type' => ActionType::Unimplementable],
                    ['name' => 'Оставить без изменения', 'type' => ActionType::Critical],
                    ['name' => 'Открыть резко', 'type' => ActionType::Error],
                ],
            ],
            [
                'position'         => 4.2,
                'parent_positions' => [3],
                'name'             => 'кран шаровый Ду100',
                'statuses'         => [
                    ['name' => 'открыт', 'is_active' => true],
                    ['name' => 'закрыт', 'is_active' => false],
                    ['name' => 'установлен', 'is_active' => false],
                    ['name' => 'снят', 'is_active' => false],
                ],
                'actions'          => [
                    ['name' => 'закрыть', 'type' => ActionType::Unimplementable],
                    ['name' => 'открыть', 'type' => ActionType::Critical],
                    ['name' => 'снять', 'type' => ActionType::Error],
                    ['name' => 'поставить', 'type' => ActionType::Unimplementable],
                    ['name' => 'осмотреть', 'type' => ActionType::Right],
                ],
            ],
            [
                'position'         => 5,
                'name'             => 'индикатор перепада давления ИП1',
                'parent_positions' => [4],
                'statuses'         => [
                    ['name' => 'значение чистый (зелёный)', 'is_active' => true],
                    ['name' => 'значение загрязнённый (красный)', 'is_active' => false],
                ],
                'actions'          => [
                    ['name' => 'осмотреть', 'type' => ActionType::Right],
                    ['name' => 'снять', 'type' => ActionType::Critical],
                    ['name' => 'поставить', 'type' => ActionType::Unimplementable],
                ],
            ],
            [
                'position'         => 6,
                'name'             => 'кран КН5 на продувочной свече  на входе  резервной линии(ВЕРХНЯЯ)',
                'parent_positions' => [5],
                'statuses'         => [
                    ['name' => 'открыт', 'is_active' => false],
                    ['name' => 'закрыт', 'is_active' => true],
                    ['name' => 'установлен', 'is_active' => false],
                    ['name' => 'снят', 'is_active' => false],
                ],
                'actions'          => [
                    ['name' => 'закрыть', 'type' => ActionType::Error],
                    ['name' => 'открыть', 'type' => ActionType::Unimplementable],
                    ['name' => 'снять', 'type' => ActionType::Critical],
                    ['name' => 'поставить', 'type' => ActionType::Unimplementable],
                    ['name' => 'осмотреть', 'type' => ActionType::Right],
                ],
            ],
            [
                'position'         => 7,
                'name'             => 'кран КН7 на продувочной свече  на  выходе резервной линии(ВЕРХНЯЯ)',
                'parent_positions' => [5],
                'statuses'         => [
                    ['name' => 'открыт', 'is_active' => false],
                    ['name' => 'закрыт', 'is_active' => true],
                    ['name' => 'установлен', 'is_active' => false],
                    ['name' => 'снят', 'is_active' => false],
                ],
                'actions'          => [
                    ['name' => 'закрыть', 'type' => ActionType::Error],
                    ['name' => 'открыть', 'type' => ActionType::Unimplementable],
                    ['name' => 'снять', 'type' => ActionType::Critical],
                    ['name' => 'поставить', 'type' => ActionType::Unimplementable],
                    ['name' => 'осмотреть', 'type' => ActionType::Right],
                ],
            ],
            [
                'position'         => 8,
                'name'             => 'Кран КН 12 перед ПСК',
                'parent_positions' => [5],
                'statuses'         => [
                    ['name' => 'открыт', 'is_active' => true],
                    ['name' => 'закрыт', 'is_active' => false],
                    ['name' => 'установлен', 'is_active' => false],
                    ['name' => 'снят', 'is_active' => false],
                ],
                'actions'          => [
                    ['name' => 'закрыть', 'type' => ActionType::Error],
                    ['name' => 'открыть', 'type' => ActionType::Unimplementable],
                    ['name' => 'снять', 'type' => ActionType::Critical],
                    ['name' => 'поставить', 'type' => ActionType::Unimplementable],
                    ['name' => 'осмотреть', 'type' => ActionType::Right],
                ],
            ],
            [
                'position'         => 9,
                'name'             => 'регулировочный винт регулятора РД2  на НИЖНЕЙ линии',
                'parent_positions' => [7],
                'statuses'         => [
                    ['name' => 'закручен', 'is_active' => true],
                    ['name' => 'выкручен', 'is_active' => false],
                    ['name' => 'установлен', 'is_active' => false],
                    ['name' => 'снят', 'is_active' => false],
                ],
                'actions'          => [
                    ['name' => 'вкрутить', 'type' => ActionType::Error],
                    ['name' => 'выкрутить', 'type' => ActionType::Right],
                    ['name' => 'снять', 'type' => ActionType::Critical],
                    ['name' => 'установить', 'type' => ActionType::Unimplementable],
                ],
            ],
            [
                'position'         => 10,
                'name'             => 'манометр М3  на НИЖНЕЙ линии',
                'parent_positions' => [9],
                'statuses'         => [
                    ['name' => 'значение 0 кПа', 'is_active' => false],
                    ['name' => 'значение 3 кПа', 'is_active' => true],
                    ['name' => 'значение 1.5 кПа', 'is_active' => false],
                    ['name' => 'значение 6 кПа', 'is_active' => false],
                ],
                'actions'          => [
                    ['name' => 'осмотреть', 'type' => ActionType::Right],
                    ['name' => 'снять', 'type' => ActionType::Critical],
                    ['name' => 'поставить', 'type' => ActionType::Unimplementable],
                ],
            ],
            [
                'position'         => 11,
                'name'             => 'регулировочный винт регулятора РД1 на ВЕРХНЕЙ линии',
                'parent_positions' => [10],
                'statuses'         => [
                    ['name' => 'закручен', 'is_active' => false],
                    ['name' => 'выкручен', 'is_active' => true],
                    ['name' => 'установлен', 'is_active' => false],
                    ['name' => 'снят', 'is_active' => false],
                ],
                'actions'          => [
                    ['name' => 'вкрутить', 'type' => ActionType::Right],
                    ['name' => 'выкрутить', 'type' => ActionType::Error],
                    ['name' => 'снять', 'type' => ActionType::Critical],
                    ['name' => 'установить', 'type' => ActionType::Unimplementable],
                ],
            ],
            [
                'position'         => 12,
                'name'             => 'манометр М2  на ВЕРХНЕЙ линии',
                'parent_positions' => [11],
                'statuses'         => [
                    ['name' => 'значение 0 кПа', 'is_active' => false],
                    ['name' => 'значение 3 кПа', 'is_active' => true],
                    ['name' => 'значение 1.5 кПа', 'is_active' => false],
                    ['name' => 'значение 6 кПа', 'is_active' => false],
                ],
                'actions'          => [
                    ['name' => 'осмотреть', 'type' => ActionType::Right],
                    ['name' => 'снять', 'type' => ActionType::Critical],
                    ['name' => 'поставить', 'type' => ActionType::Unimplementable],
                ],
            ],
            [
                'position'         => 13,
                'name'             => 'кран КН10 на импульсе к регулятору рабочей линии(НИЖНЯЯ)',
                'parent_positions' => [12],
                'statuses'         => [
                    ['name' => 'открыт', 'is_active' => true],
                    ['name' => 'закрыт', 'is_active' => false],
                    ['name' => 'установлен', 'is_active' => false],
                    ['name' => 'снят', 'is_active' => false],
                ],
                'actions'          => [
                    ['name' => 'закрыть', 'type' => ActionType::Right],
                    ['name' => 'открыть', 'type' => ActionType::Unimplementable],
                    ['name' => 'снять', 'type' => ActionType::Critical],
                    ['name' => 'поставить', 'type' => ActionType::Unimplementable],
                ],
            ],
            [
                'position'         => 14,
                'name'             => 'кран КН19 на импульсе к ПЗК рабочей линии(НИЖНЯЯ)',
                'parent_positions' => [12],
                'statuses'         => [
                    ['name' => 'открыт', 'is_active' => true],
                    ['name' => 'закрыт', 'is_active' => false],
                    ['name' => 'установлен', 'is_active' => false],
                    ['name' => 'снят', 'is_active' => false],
                ],
                'actions'          => [
                    ['name' => 'закрыть', 'type' => ActionType::Right],
                    ['name' => 'открыть', 'type' => ActionType::Unimplementable],
                    ['name' => 'снять', 'type' => ActionType::Critical],
                    ['name' => 'поставить', 'type' => ActionType::Unimplementable],
                ],
            ],
            [
                'position'         => 15,
                'name'             => 'Кран КН 1  на входе  на НИЖНЕЙ линии',
                'parent_positions' => [11],
                'statuses'         => [
                    ['name' => 'открыт', 'is_active' => true],
                    ['name' => 'закрыт', 'is_active' => false],
                    ['name' => 'установлен', 'is_active' => false],
                    ['name' => 'снят', 'is_active' => false],
                ],
                'actions'          => [
                    ['name' => 'закрыть', 'type' => ActionType::Right],
                    ['name' => 'открыть', 'type' => ActionType::Unimplementable],
                    ['name' => 'снять', 'type' => ActionType::Critical],
                    ['name' => 'поставить', 'type' => ActionType::Unimplementable],
                ],
            ],
            [
                'position'         => 16,
                'name'             => 'Кран КН4 на  выходе на НИЖНЕЙ линии',
                'parent_positions' => [11],
                'statuses'         => [
                    ['name' => 'открыт', 'is_active' => true],
                    ['name' => 'закрыт', 'is_active' => false],
                    ['name' => 'установлен', 'is_active' => false],
                    ['name' => 'снят', 'is_active' => false],
                ],
                'actions'          => [
                    ['name' => 'закрыть', 'type' => ActionType::Right],
                    ['name' => 'открыть', 'type' => ActionType::Unimplementable],
                    ['name' => 'снять', 'type' => ActionType::Critical],
                    ['name' => 'поставить', 'type' => ActionType::Unimplementable],
                ],
            ],
            [
                'position'         => 17,
                'name'             => 'Краны КН6 на продувочной свече до регулятора на НИЖНЕЙ линии',
                'parent_positions' => [15, 16],
                'statuses'         => [
                    ['name' => 'открыт', 'is_active' => false],
                    ['name' => 'закрыт', 'is_active' => true],
                    ['name' => 'установлен', 'is_active' => false],
                    ['name' => 'снят', 'is_active' => false],
                ],
                'actions'          => [
                    ['name' => 'закрыть', 'type' => ActionType::Error],
                    ['name' => 'открыть', 'type' => ActionType::Right],
                    ['name' => 'снять', 'type' => ActionType::Critical],
                    ['name' => 'поставить', 'type' => ActionType::Unimplementable],
                ],
            ],
            [
                'position'         => 18,
                'name'             => 'Кран КН8 на продувочной свече  после регулятора на НИЖНЕЙ линии',
                'parent_positions' => [15, 16],
                'statuses'         => [
                    ['name' => 'открыт', 'is_active' => false],
                    ['name' => 'закрыт', 'is_active' => true],
                    ['name' => 'установлен', 'is_active' => false],
                    ['name' => 'снят', 'is_active' => false],
                ],
                'actions'          => [
                    ['name' => 'закрыть', 'type' => ActionType::Error],
                    ['name' => 'открыть', 'type' => ActionType::Right],
                    ['name' => 'снять', 'type' => ActionType::Critical],
                    ['name' => 'поставить', 'type' => ActionType::Unimplementable],
                ],
            ],
            [
                'position'         => 19,
                'name'             => 'манометр М3 на НИЖНЕЙ линии',
                'parent_positions' => [17, 18],
                'statuses'         => [
                    ['name' => 'значение 0 кПа', 'is_active' => true],
                    ['name' => 'значение 3 кПа', 'is_active' => false],
                    ['name' => 'значение 1.5 кПа', 'is_active' => false],
                    ['name' => 'значение 6 кПа', 'is_active' => false],
                ],
                'actions'          => [
                    ['name' => 'осмотреть', 'type' => ActionType::Right],
                    ['name' => 'снять', 'type' => ActionType::Critical],
                    ['name' => 'поставить', 'type' => ActionType::Unimplementable],
                ],
            ],
        ];
    }
}
