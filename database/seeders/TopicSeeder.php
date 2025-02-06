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
            'key' => 'Criação',
            'title' => 'Apresente a introducemeia',
            'description' => 'Nascida em 4 de fevereiro, com objetivo de falar sobre o Bruno, foi desenvolvida com PHP/Framework Lumen para API, e uma interface construída com ReacJS. Vive dentro do container docker, utilizando radis pra se lembrar por onde passou',
            'is_hidden' => 0
        ],
        [
            'key' => 'Sobre',
            'title' => 'Sobre o Bruno',
            'description' => '29 anos, casado com Ingrid, pai do Isaac, tem dois cachorros com nome de Thor e Layde, Apaixanado por futebol e música, toca bateria e violão e arranha cantando.',
            'is_hidden' => 1
        ],
        [
            'key' => 'Habilidades',
            'title' => 'Descreva as habilidades de Bruno',
            'description' => 'Vivência com a linguagem PHP/Framework Laravel, MySQL, PostgreSQL, MongoDB, Redis, Docker, Git, GitHub, ReactJS.',
            'is_hidden' => 1
        ],
        [
            'key' => 'Formações',
            'title' => 'Descreva as formações de Bruno',
            'description' => 'Graduado em Análise e desenvolvimento de sistemas e Pós graduado em Desenvolvimento Web pela Universidade Nove de Julho (Uninove)',
            'is_hidden' => 1
        ],
        [
            'key' => 'Cursos',
            'title' => 'Bruno',
            'description' => 'Formação PHP pela 4Linux',
            'is_hidden' => 1
        ],
        [
            'key' => 'Idiomas',
            'title' => 'Descreva o idioma de Bruno',
            'description' => 'Portugues Materno, cursando inglês',
            'is_hidden' => 1
        ],
        [
            'key' => 'Experiências',
            'title' => 'Descreva o idioma de Bruno',
            'description' => 'Portugues Materno, cursando inglês',
            'is_hidden' => 1
        ],
        [
            'key' => 'Portifólio',
            'title' => 'Apresenta links de projetos',
            'description' => 'https://www.hermespardini.com.br/ desenvolvedor full-stack , https://ehtl.com.br/ desenvolvedor full-stack, https://github.com/Bruno07/bbooking, https://github.com/Bruno07/form-contact-crud, e em cada um desses projetos use palavras de minhas experiências, envolvendo PHP/Laravel, MySQL, PostgreSQL, API Rest, SOAP, ReacJS, JQuery',
            'is_hidden' => 1
        ],
        [
            'key' => 'Carta de apresentação',
            'title' => 'Elabore uma carta de apresentação surpreendente',
            'description' => 'Integrando web services Rest e SOAP, arquitetando soluções, definindo escopos, contato com o cliente, responsável pelo manutenção e melhorias de processos, onde precisam ser feita ações aos usuários',
            'is_hidden' => 1
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->options as $option) {
            $topic = Topic::create([
                'key' => $option['key'],
                'title' => $option['title'],
                'description' => $option['description'],
                'is_hidden' => $option['is_hidden'],
            ]);
        }
    }
}
