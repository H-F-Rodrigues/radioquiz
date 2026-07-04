<?php

/**
 * Banco de perguntas do Radioquiz.
 * Cada item contém: pergunta, alternativas (A–D) e a chave correta.
 *
 * Uso:  $perguntas_quiz = require 'data/questions.php';
 */

return [

    [
        'pergunta'     => 'Em que período começou o uso de radioisótopos na indústria farmacêutica?',
        'alternativas' => [
            'A' => 'No início do século XX, após as descobertas de radioatividade por Marie e Pierre Curie',
            'B' => 'No século XVIII, durante a Revolução Industrial',
            'C' => 'Na década de 1800, com os primeiros laboratórios farmacêuticos',
            'D' => 'Na década de 1960, com o desenvolvimento da tecnologia nuclear',
        ],
        'correta' => 'A',
    ],

    [
        'pergunta'     => 'Qual evento histórico impulsionou a maior produção de radioisótopos para fins médicos na década de 1940?',
        'alternativas' => [
            'A' => 'A descoberta da penicilina por Alexander Fleming',
            'B' => 'A criação da ANVISA no Brasil',
            'C' => 'O desenvolvimento de reatores nucleares durante a Segunda Guerra Mundial',
            'D' => 'A fundação do Instituto Butantan em São Paulo',
        ],
        'correta' => 'C',
    ],

    [
        'pergunta'     => 'O Carbono-14 (14C) é um radioisótopo com meia-vida de 5.730 anos. Qual é sua principal aplicação na indústria farmacêutica?',
        'alternativas' => [
            'A' => 'Esterilização de medicamentos em pó e embalagens plásticas',
            'B' => 'Rastreamento em testes de farmacocinética para monitorar absorção e excreção de fármacos',
            'C' => 'Diagnóstico por imagem em exames de cintilografia',
            'D' => 'Tratamento de tumores malignos em pacientes com câncer',
        ],
        'correta' => 'B',
    ],

    [
        'pergunta'     => 'O Trítio ou Hidrogênio-3 (3H) possui uma meia-vida de 12,3 anos. Por que ele é particularmente útil na indústria farmacêutica?',
        'alternativas' => [
            'A' => 'Porque reage de forma idêntica ao hidrogênio comum, permitindo criar traçadores radioativos que se ligam a receptores celulares específicos',
            'B' => 'Porque emite radiação gama forte para esterilização de larga escala',
            'C' => 'Porque é facilmente produzido em laboratórios convencionais sem necessidade de reatores nucleares',
            'D' => 'Porque tem a menor meia-vida entre todos os radioisótopos conhecidos',
        ],
        'correta' => 'A',
    ],

    [
        'pergunta'     => 'O Cobalto-60 (60Co) é amplamente utilizado na indústria farmacêutica. Qual é sua principal aplicação?',
        'alternativas' => [
            'A' => 'Diagnóstico de doenças cardíacas através de imagem PET',
            'B' => 'Rastreamento de absorção de medicamentos no trato gastrointestinal',
            'C' => 'Esterilização de larga escala para insumos, antibióticos em pó e embalagens plásticas que não suportam altas temperaturas',
            'D' => 'Tratamento de inflamações articulares em pacientes com artrite',
        ],
        'correta' => 'C',
    ],

    [
        'pergunta'     => 'Qual radioisótopo é mais comumente utilizado em medicina nuclear diagnóstica devido à sua meia-vida ideal e energia gama apropriada?',
        'alternativas' => [
            'A' => 'Iodo-131 (I-131)',
            'B' => 'Tecnécio-99m (Tc-99m)',
            'C' => 'Flúor-18 (F-18)',
            'D' => 'Fósforo-32 (P-32)',
        ],
        'correta' => 'B',
    ],

    [
        'pergunta'     => 'Os radiofármacos são utilizados em diagnóstico por imagem funcionando como "rastreadores". Qual das seguintes doenças NÃO pode ser diagnosticada utilizando radioisótopos?',
        'alternativas' => [
            'A' => 'Câncer',
            'B' => 'Problemas cardíacos',
            'C' => 'Alterações na tireoide',
            'D' => 'Cor dos olhos naturais',
        ],
        'correta' => 'D',
    ],

    [
        'pergunta'     => 'De acordo com as informações históricas, qual instituto foi o primeiro instituto científico moderno voltado para a criação de vacinas e imunobiológicos no Brasil?',
        'alternativas' => [
            'A' => 'Instituto Vacinogênico, criado em 1894',
            'B' => 'Instituto Soroterápico Federal de Manguinhos, criado em 1900 e dirigido por Oswaldo Cruz',
            'C' => 'Instituto Butantan, criado em 1901 em São Paulo',
            'D' => 'Agência Nacional de Vigilância Sanitária (ANVISA), criada em 1999',
        ],
        'correta' => 'B',
    ],

    [
        'pergunta'     => 'Qual é o principal objetivo de combinar um radioisótopo com uma molécula carreadora na produção de um radiofármaco?',
        'alternativas' => [
            'A' => 'Aumentar a toxicidade do medicamento para maior eficácia',
            'B' => 'Permitir que a substância seja reconhecida pelo organismo e se concentre em órgãos ou tecidos específicos',
            'C' => 'Reduzir o custo de produção do medicamento',
            'D' => 'Facilitar a administração do medicamento por via oral',
        ],
        'correta' => 'B',
    ],

    [
        'pergunta'     => 'Qual é o papel essencial dos radioisótopos na indústria farmacêutica moderna?',
        'alternativas' => [
            'A' => 'Apenas no diagnóstico de doenças infecciosas',
            'B' => 'Exclusivamente no tratamento de câncer',
            'C' => 'No diagnóstico, tratamento de doenças, esterilização, desenvolvimento de medicamentos e controle de qualidade',
            'D' => 'Apenas na esterilização de equipamentos hospitalares',
        ],
        'correta' => 'C',
    ],

];
