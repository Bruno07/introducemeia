<?php

namespace Database\Seeders;

use App\Models\Topic;
use App\Models\TopicDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{

    /**
     * @property array $options
     */
    private array $options = [
        [
            'title' => 'Sobre',
            'description' => 'Descreva sobre',
            'details' => [
                'Bruno',
                'Nascido em Joinville',
                'Vive em São Paulo',
                '29 anos',
                'Casado com Ingrid',
                'Um filho chamado Isaac com um ano e sete meses',
                'Tem dois cachorros, chamado Thor e Layde',
                'Apaixonado por futebol',
                'Amante da música',
                'Toca violão, bateria e é minimamente afinado para cantar'
            ]
        ],
        [
            'title' => 'Habilidades',
            'description' => 'Descreva sobre habilidades',
            'details' => [
                'PHP',
                'Framework Laravel',
                'Mysql',
                'PostgreSQL',
                'MongoDB',
                'Redis',
                'Docker',
                'Kubernates',
            ]
        ]

    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->options as $option) {
            $topic = Topic::create([
                'title' => $option['title'],
                'description' => $option['description'],
            ]);

            foreach ($option['details'] as $detail) {
                TopicDetail::create([
                    'description' => $detail,
                    'topic_id' => $topic->id,
                ]);
            }
        }
    }
}
