<?php

namespace Database\Seeders;

use App\Models\Resource;
use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    public function run(): void
    {
        $resources = [
            // ========== ARTICLES ==========
            [
                'title' => 'Les 10 étapes clés pour réussir votre projet digital',
                'description' => 'Découvrez les étapes fondamentales pour mener à bien votre projet de transformation digitale, de l\'audit initial à la mise en production.',
                'type' => 'article',
                'category' => 'Digital',
                'file_url' => 'https://exemple.com/articles/guide-digital.pdf',
                'video_url' => null,
                'thumbnail' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=600&h=400&fit=crop',
                'is_active' => true,
                'is_featured' => true,
                'published_at' => '2024-01-15',
                'views' => 0,
                'downloads' => 0,
                'tags' => json_encode(['digital', 'transformation', 'stratégie'])
            ],
            [
                'title' => 'Guide pratique : Comment gérer une équipe à distance',
                'description' => 'Les meilleures pratiques pour manager efficacement une équipe distante, outils de collaboration et astuces de communication.',
                'type' => 'article',
                'category' => 'Management',
                'file_url' => 'https://exemple.com/articles/equipe-distance.pdf',
                'video_url' => null,
                'thumbnail' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=600&h=400&fit=crop',
                'is_active' => true,
                'is_featured' => false,
                'published_at' => '2024-01-20',
                'views' => 0,
                'downloads' => 0,
                'tags' => json_encode(['management', 'télétravail', 'leadership'])
            ],
            [
                'title' => 'Méthodologie Agile : Scrum vs Kanban',
                'description' => 'Comparaison détaillée des deux méthodologies agiles les plus utilisées avec leurs avantages et cas d\'usage.',
                'type' => 'article',
                'category' => 'Gestion de projet',
                'file_url' => 'https://exemple.com/articles/agile-scrum-kanban.pdf',
                'video_url' => null,
                'thumbnail' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=600&h=400&fit=crop',
                'is_active' => true,
                'is_featured' => false,
                'published_at' => '2024-02-01',
                'views' => 0,
                'downloads' => 0,
                'tags' => json_encode(['agile', 'scrum', 'kanban', 'gestion-projet'])
            ],
            [
                'title' => 'Les compétences du leader du 21e siècle',
                'description' => 'Quelles sont les compétences indispensables pour devenir un leader efficace dans un monde en constante évolution.',
                'type' => 'article',
                'category' => 'Leadership',
                'file_url' => 'https://exemple.com/articles/leadership-21e-siecle.pdf',
                'video_url' => null,
                'thumbnail' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=600&h=400&fit=crop',
                'is_active' => true,
                'is_featured' => false,
                'published_at' => '2024-02-10',
                'views' => 0,
                'downloads' => 0,
                'tags' => json_encode(['leadership', 'soft-skills', 'management'])
            ],

            // ========== VIDEOS ==========
            [
                'title' => 'Introduction à la gestion de projet agile',
                'description' => 'Formation complète sur les fondamentaux de la gestion de projet agile avec des exemples concrets.',
                'type' => 'video',
                'category' => 'Gestion de projet',
                'file_url' => null,
                'video_url' => 'https://www.youtube.com/watch?v=9L99B5-7a-U',
                'thumbnail' => 'https://img.youtube.com/vi/9L99B5-7a-U/maxresdefault.jpg',
                'is_active' => true,
                'is_featured' => true,
                'published_at' => '2024-01-10',
                'views' => 0,
                'downloads' => 0,
                'tags' => json_encode(['agile', 'scrum', 'formation', 'gestion-projet'])
            ],
            [
                'title' => 'Digitalisation des collectes de données',
                'description' => 'Tutoriel sur l\'utilisation des outils digitaux pour la collecte et l\'analyse de données terrain.',
                'type' => 'video',
                'category' => 'Digital',
                'file_url' => null,
                'video_url' => 'https://www.youtube.com/watch?v=oZt7_jjQMN0',
                'thumbnail' => 'https://img.youtube.com/vi/oZt7_jjQMN0/maxresdefault.jpg',
                'is_active' => true,
                'is_featured' => false,
                'published_at' => '2024-01-25',
                'views' => 0,
                'downloads' => 0,
                'tags' => json_encode(['digital', 'collecte-donnees', 'formation'])
            ],
            [
                'title' => 'Leadership et intelligence émotionnelle',
                'description' => 'Conférence sur le rôle de l\'intelligence émotionnelle dans le leadership moderne.',
                'type' => 'video',
                'category' => 'Leadership',
                'file_url' => null,
                'video_url' => 'https://www.youtube.com/watch?v=Y7m9eNoB3NU',
                'thumbnail' => 'https://img.youtube.com/vi/Y7m9eNoB3NU/maxresdefault.jpg',
                'is_active' => true,
                'is_featured' => false,
                'published_at' => '2024-02-05',
                'views' => 0,
                'downloads' => 0,
                'tags' => json_encode(['leadership', 'intelligence-emotionnelle', 'conférence'])
            ],
            [
                'title' => 'Maîtriser Excel pour l\'analyse de données',
                'description' => 'Tutoriel complet sur les fonctionnalités avancées d\'Excel pour l\'analyse de données professionnelle.',
                'type' => 'video',
                'category' => 'Technique',
                'file_url' => null,
                'video_url' => 'https://youtu.be/ZL08jtjGEz4',
                'thumbnail' => 'https://img.youtube.com/vi/ZL08jtjGEz4/maxresdefault.jpg',
                'is_active' => true,
                'is_featured' => false,
                'published_at' => '2024-02-15',
                'views' => 0,
                'downloads' => 0,
                'tags' => json_encode(['excel', 'analyse-donnees', 'tutoriel'])
            ],

            // ========== E-BOOKS ==========
            [
                'title' => 'Guide complet du chef de projet',
                'description' => 'Le guide ultime pour maîtriser la gestion de projet de A à Z, avec des modèles et des outils prêts à l\'emploi.',
                'type' => 'ebook',
                'category' => 'Gestion de projet',
                'file_url' => 'https://exemple.com/ebooks/guide-chef-projet.pdf',
                'video_url' => null,
                'thumbnail' => 'https://images.unsplash.com/photo-1532012197267-da84d127e765?w=600&h=400&fit=crop',
                'is_active' => true,
                'is_featured' => true,
                'published_at' => '2024-01-05',
                'views' => 0,
                'downloads' => 0,
                'tags' => json_encode(['gestion-projet', 'guide', 'ebook'])
            ],
            [
                'title' => 'Stratégie digitale pour les ONG',
                'description' => 'Comment les organisations non-gouvernementales peuvent tirer parti du digital pour maximiser leur impact.',
                'type' => 'ebook',
                'category' => 'Digital',
                'file_url' => 'https://exemple.com/ebooks/strategie-digitale-ong.pdf',
                'video_url' => null,
                'thumbnail' => 'https://images.unsplash.com/photo-1509099836639-18ba1795216d?w=600&h=400&fit=crop',
                'is_active' => true,
                'is_featured' => false,
                'published_at' => '2024-01-20',
                'views' => 0,
                'downloads' => 0,
                'tags' => json_encode(['digital', 'ong', 'stratégie'])
            ],
            [
                'title' => 'Leadership : Théories et pratiques',
                'description' => 'Une exploration des principales théories du leadership avec des études de cas et des exercices pratiques.',
                'type' => 'ebook',
                'category' => 'Leadership',
                'file_url' => 'https://exemple.com/ebooks/leadership-theories-pratiques.pdf',
                'video_url' => null,
                'thumbnail' => 'https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=600&h=400&fit=crop',
                'is_active' => true,
                'is_featured' => false,
                'published_at' => '2024-02-01',
                'views' => 0,
                'downloads' => 0,
                'tags' => json_encode(['leadership', 'théories', 'études-de-cas'])
            ],

            // ========== DOCUMENTS ==========
            [
                'title' => 'Modèle de cahier des charges technique',
                'description' => 'Un modèle professionnel de cahier des charges pour vos projets techniques et digitaux.',
                'type' => 'document',
                'category' => 'Technique',
                'file_url' => 'https://exemple.com/documents/cahier-charges-template.docx',
                'video_url' => null,
                'thumbnail' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=600&h=400&fit=crop',
                'is_active' => true,
                'is_featured' => false,
                'published_at' => '2024-01-18',
                'views' => 0,
                'downloads' => 0,
                'tags' => json_encode(['cahier-charges', 'template', 'technique'])
            ],
            [
                'title' => 'Grille d\'évaluation de projet',
                'description' => 'Un outil complet pour évaluer la performance et l\'impact de vos projets.',
                'type' => 'document',
                'category' => 'Gestion de projet',
                'file_url' => 'https://exemple.com/documents/grille-evaluation-projet.xlsx',
                'video_url' => null,
                'thumbnail' => 'https://images.unsplash.com/photo-1434626881859-194d67b2b86f?w=600&h=400&fit=crop',
                'is_active' => true,
                'is_featured' => false,
                'published_at' => '2024-02-08',
                'views' => 0,
                'downloads' => 0,
                'tags' => json_encode(['évaluation', 'projet', 'outil'])
            ],
            [
                'title' => 'Plan de communication stratégique',
                'description' => 'Modèle de plan de communication pour vos projets et campagnes.',
                'type' => 'document',
                'category' => 'Management',
                'file_url' => 'https://exemple.com/documents/plan-communication-strategique.docx',
                'video_url' => null,
                'thumbnail' => 'https://images.unsplash.com/photo-1521791136064-7986c2920216?w=600&h=400&fit=crop',
                'is_active' => true,
                'is_featured' => false,
                'published_at' => '2024-02-18',
                'views' => 0,
                'downloads' => 0,
                'tags' => json_encode(['communication', 'stratégie', 'plan'])
            ],
        ];

        foreach ($resources as $resource) {
            Resource::updateOrCreate([
                'title' => $resource['title'],
            ],
            $resource);
        }

        $this->command->info('✅ ' . count($resources) . ' ressources créées avec succès !');
        $this->command->info('📊 Détails :');
        $this->command->info('   📝 Articles: ' . count(array_filter($resources, fn($r) => $r['type'] === 'article')));
        $this->command->info('   🎥 Vidéos: ' . count(array_filter($resources, fn($r) => $r['type'] === 'video')));
        $this->command->info('   📚 E-books: ' . count(array_filter($resources, fn($r) => $r['type'] === 'ebook')));
        $this->command->info('   📄 Documents: ' . count(array_filter($resources, fn($r) => $r['type'] === 'document')));
    }
}
