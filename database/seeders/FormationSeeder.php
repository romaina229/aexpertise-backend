<?php

namespace Database\Seeders;

use App\Models\Formation;
use Illuminate\Database\Seeder;

class FormationSeeder extends Seeder
{
    public function run(): void
    {
        $formations = [
            [
                'title' => 'Gestion de projet agile',
                'description' => 'Maîtrisez les méthodologies agiles pour une gestion de projet efficace. Cette formation vous permettra d\'acquérir les compétences nécessaires pour piloter vos projets avec agilité.',
                'duration' => '3 jours',
                'price' => '250 000 FCFA',
                'category' => 'Gestion de projet',
                'level' => 'Intermédiaire',
                'image' => null,
                'is_active' => true,
                'start_date' => '2024-02-15',
                'end_date' => '2024-02-17',
                'max_participants' => 20,
                'current_participants' => 15,
                'objectives' => json_encode([
                    'Comprendre les principes de l\'agilité',
                    'Maîtriser les frameworks Scrum et Kanban',
                    'Savoir gérer un backlog produit',
                    'Conduire des cérémonies agiles',
                    'Mesurer la performance d\'une équipe agile'
                ]),
                'program' => json_encode([
                    'Jour 1: Introduction à l\'agilité et Scrum - Les fondements, rôles et cérémonies',
                    'Jour 2: Kanban et gestion du backlog - Priorisation, estimation et planning',
                    'Jour 3: Ateliers pratiques et mise en situation - Cas concrets et exercices'
                ]),
                'prerequisites' => 'Aucun prérequis nécessaire, une expérience en gestion de projet est un plus'
            ],
            [
                'title' => 'Digitalisation des données',
                'description' => 'Apprenez à collecter, analyser et visualiser des données avec des outils digitaux modernes. Cette formation vous préparera à la transformation digitale de vos processus.',
                'duration' => '2 jours',
                'price' => '200 000 FCFA',
                'category' => 'Digital',
                'level' => 'Débutant',
                'image' => null,
                'is_active' => true,
                'start_date' => '2024-02-22',
                'end_date' => '2024-02-23',
                'max_participants' => 15,
                'current_participants' => 12,
                'objectives' => json_encode([
                    'Maîtriser les outils de collecte de données',
                    'Savoir analyser et visualiser les données',
                    'Comprendre les enjeux de la digitalisation',
                    'Mettre en place une stratégie de digitalisation'
                ]),
                'program' => json_encode([
                    'Jour 1: Outils de collecte de données - Kobo Toolbox, ODK, SurveyCTO',
                    'Jour 2: Analyse et visualisation des données - Power BI, Tableau, Google Data Studio'
                ]),
                'prerequisites' => 'Connaissances de base en informatique'
            ],
            [
                'title' => 'Leadership et gestion d\'équipe',
                'description' => 'Développez vos compétences en leadership pour fédérer et motiver votre équipe vers l\'excellence. Une formation pratique avec des études de cas réels.',
                'duration' => '4 jours',
                'price' => '300 000 FCFA',
                'category' => 'Leadership',
                'level' => 'Avancé',
                'image' => null,
                'is_active' => true,
                'start_date' => '2024-03-05',
                'end_date' => '2024-03-08',
                'max_participants' => 25,
                'current_participants' => 18,
                'objectives' => json_encode([
                    'Développer son leadership personnel',
                    'Motiver et fédérer une équipe',
                    'Gérer les conflits efficacement',
                    'Communiquer avec impact',
                    'Déléguer et responsabiliser'
                ]),
                'program' => json_encode([
                    'Jour 1: Les fondements du leadership - Styles de leadership, intelligence émotionnelle',
                    'Jour 2: La communication efficace - Écoute active, feedback, communication non-violente',
                    'Jour 3: La gestion des conflits - Médiation, négociation, résolution de problèmes',
                    'Jour 4: Mise en pratique et cas réels - Jeux de rôle, études de cas'
                ]),
                'prerequisites' => 'Expérience en management souhaitée'
            ],
            [
                'title' => 'Analyse de données avec Excel',
                'description' => 'Maîtrisez les fonctionnalités avancées d\'Excel pour l\'analyse de données et la prise de décision. Devenez un expert en analyse de données.',
                'duration' => '2 jours',
                'price' => '150 000 FCFA',
                'category' => 'Technique',
                'level' => 'Débutant',
                'image' => null,
                'is_active' => true,
                'start_date' => '2024-03-12',
                'end_date' => '2024-03-13',
                'max_participants' => 20,
                'current_participants' => 10,
                'objectives' => json_encode([
                    'Maîtriser les fonctions avancées d\'Excel',
                    'Créer des tableaux de bord dynamiques',
                    'Analyser des données complexes',
                    'Automatiser les tâches répétitives',
                    'Visualiser les données avec des graphiques avancés'
                ]),
                'program' => json_encode([
                    'Jour 1: Fonctions avancées - Tableaux croisés dynamiques, formules complexes',
                    'Jour 2: Analyse et visualisation - Power Query, Power Pivot, Tableaux de bord'
                ]),
                'prerequisites' => 'Connaissances de base d\'Excel'
            ],
            [
                'title' => 'Management stratégique',
                'description' => 'Les fondamentaux du management stratégique pour piloter votre organisation vers la performance durable. Une approche pratique et opérationnelle.',
                'duration' => '5 jours',
                'price' => '350 000 FCFA',
                'category' => 'Management',
                'level' => 'Avancé',
                'image' => null,
                'is_active' => true,
                'start_date' => '2024-03-20',
                'end_date' => '2024-03-24',
                'max_participants' => 30,
                'current_participants' => 22,
                'objectives' => json_encode([
                    'Maîtriser les outils du management stratégique',
                    'Élaborer une stratégie d\'entreprise',
                    'Piloter la performance organisationnelle',
                    'Conduire le changement',
                    'Évaluer et gérer les risques'
                ]),
                'program' => json_encode([
                    'Jour 1: Diagnostic stratégique - Analyse PESTEL, SWOT, 5 forces de Porter',
                    'Jour 2: Élaboration de la stratégie - Vision, mission, objectifs stratégiques',
                    'Jour 3: Pilotage de la performance - Tableaux de bord, indicateurs',
                    'Jour 4: Conduite du changement - Stratégies de mise en œuvre',
                    'Jour 5: Gestion des risques - Identification, évaluation, mitigation'
                ]),
                'prerequisites' => 'Connaissances en management ou expérience en gestion'
            ],
            [
                'title' => 'Communication et prise de parole',
                'description' => 'Perfectionnez vos compétences en communication pour influencer, convaincre et inspirer votre auditoire. Une formation pour devenir un communicateur d\'exception.',
                'duration' => '3 jours',
                'price' => '220 000 FCFA',
                'category' => 'Communication',
                'level' => 'Intermédiaire',
                'image' => null,
                'is_active' => true,
                'start_date' => '2024-04-02',
                'end_date' => '2024-04-04',
                'max_participants' => 18,
                'current_participants' => 8,
                'objectives' => json_encode([
                    'Maîtriser les techniques de communication',
                    'Gérer son stress et ses émotions',
                    'Construire des messages percutants',
                    'Utiliser le langage corporel',
                    'Gérer les situations complexes'
                ]),
                'program' => json_encode([
                    'Jour 1: Les fondamentaux de la communication - Communication verbale et non-verbale',
                    'Jour 2: Construction de message - Storytelling, argumentation, persuasion',
                    'Jour 3: Mise en pratique - Exercices de prise de parole, jeux de rôle'
                ]),
                'prerequisites' => 'Aucun prérequis nécessaire'
            ]
        ];

        foreach ($formations as $formation) {
            Formation::create($formation);
        }

        $this->command->info('✅ ' . count($formations) . ' formations créées avec succès !');
    }
}
