<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Series>
 */
class SeriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static $seriesData = [
        [
            'name' => 'Attack on Titan',
            'synopsis' => 'After his hometown is destroyed, Eren Yeager vows to cleanse the earth of the giant humanoid Titans that have brought humanity to the brink of extinction.',
            'imageUrl' => 'https://m.media-amazon.com/images/M/MV5BZjliODY5MzQtMmViZC00MTZmLWFhMWMtMjMwM2I3OGY1MTRiXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg',
            'type' => 'Anime',
            'status' => 'Finished',
        ],
        [
            'name' => 'Death Note',
            'synopsis' => 'A high school student discovers a supernatural notebook that allows him to kill anyone by writing their name in it, sparking a deadly game of cat and mouse.',
            'imageUrl' => 'https://m.media-amazon.com/images/M/MV5BYTgyZDhmMTEtZDFhNi00MTc4LTg3NjUtYWJlNGE5Mzk2NzMxXkEyXkFqcGc@._V1_.jpg',
            'type' => 'Anime',
            'status' => 'Finished',
        ],
        [
            'name' => 'Naruto',
            'synopsis' => 'A young ninja, shunned for the powerful fox demon sealed within him, dreams of becoming the strongest ninja and leader of his village.',
            'imageUrl' => 'https://m.media-amazon.com/images/M/MV5BZTNjOWI0ZTAtOGY1OS00ZGU0LWEyOWYtMjhkYjdlYmVjMDk2XkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg',
            'type' => 'Anime',
            'status' => 'Finished',
        ],
        [
            'name' => 'Fullmetal Alchemist: Brotherhood',
            'synopsis' => 'Two brothers search for the Philosopher\'s Stone after a failed alchemy experiment, leading them into a dark government conspiracy.',
            'imageUrl' => 'https://upload.wikimedia.org/wikipedia/en/7/7e/Fullmetal_Alchemist_Brotherhood_key_visual.png',
            'type' => 'Anime',
            'status' => 'Finished',
        ],
        [
            'name' => 'One Piece',
            'synopsis' => 'Follows the adventures of Monkey D. Luffy and his pirate crew as they search for the ultimate treasure, the "One Piece", to become the next Pirate King.',
            'imageUrl' => 'https://m.media-amazon.com/images/M/MV5BMTNjNGU4NTUtYmVjMy00YjRiLTkxMWUtNzZkMDNiYjZhNmViXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg',
            'type' => 'Manga', // Set some as Manga
            'status' => 'Airing',
        ],
        [
            'name' => 'Jujutsu Kaisen',
            'synopsis' => 'A high school student joins a secret society of Jujutsu Sorcerers to fight cursed spirits after he becomes the host of a powerful curse.',
            'imageUrl' => 'https://cdn.displate.com/artwork/270x380/2025-05-26/9a579dd43af2c32371589d6e6ea49db1_ac80afab18a1544defda992138b2c732.jpg',
            'type' => 'Anime',
            'status' => 'Airing',
        ],
        [
            'name' => 'Steins;Gate',
            'synopsis' => 'A self-proclaimed "mad scientist" discovers a way to send messages to the past, triggering a cascade of events that spiral out of his control.',
            'imageUrl' => 'https://static.wikia.nocookie.net/steins-gate/images/d/db/Classics_CompleteSeries_Blu-ray_%28edited%29.jpg/revision/latest?cb=20220225192906',
            'type' => 'Anime',
            'status' => 'Finished',
        ],
        [
            'name' => 'Cowboy Bebop',
            'synopsis' => 'A crew of bounty hunters travels the solar system on their ship, the Bebop, trying to escape their pasts and make a living.',
            'imageUrl' => 'https://upload.wikimedia.org/wikipedia/en/a/a9/Cowboy_Bebop_key_visual.jpg',
            'type' => 'Anime',
            'status' => 'Finished',
        ],
        [
            'name' => 'Demon Slayer: Kimetsu no Yaiba',
            'synopsis' => 'A young boy becomes a demon slayer after his family is slaughtered and his younger sister is turned into a demon.',
            'imageUrl' => 'https://m.media-amazon.com/images/M/MV5BMWU1OGEwNmQtNGM3MS00YTYyLThmYmMtN2FjYzQzNzNmNTE0XkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg',
            'type' => 'Anime',
            'status' => 'Airing',
        ],
        [
            'name' => 'My Hero Academia',
            'synopsis' => 'In a world where most people have superpowers, a boy born without them enrolls in a prestigious hero academy, determined to prove himself.',
            'imageUrl' => 'https://m.media-amazon.com/images/M/MV5BY2QzODA5OTQtYWJlNi00ZjIzLThhNTItMDMwODhlYzYzMjA2XkEyXkFqcGc@._V1_.jpg',
            'type' => 'Manga',
            'status' => 'Airing',
        ],
        [
            'name' => 'Berserk',
            'synopsis' => 'A lone mercenary named Guts traverses a dark medieval world, battling demonic apostles in a quest for vengeance against his former friend.',
            'imageUrl' => 'https://theberserkmanga.com/wp-content/uploads/2025/08/download-3.webp',
            'type' => 'Manga',
            'status' => 'Airing',
        ],
        [
            'name' => 'Hunter x Hunter (2011)',
            'synopsis' => 'A young boy named Gon Freecss aspires to become a Hunter, an elite individual, in hopes of finding his father who was also a Hunter.',
            'imageUrl' => 'https://m.media-amazon.com/images/M/MV5BYzYxOTlkYzctNGY2MC00MjNjLWIxOWMtY2QwYjcxZWIwMmEwXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg',
            'type' => 'Anime',
            'status' => 'Finished',
        ],
        [
            'name' => 'Vinland Saga',
            'synopsis' => 'A young Icelandic boy named Thorfinn seeks revenge for his father\'s murder, joining the band of mercenaries led by his father\'s killer, Askeladd.',
            'imageUrl' => 'https://m.media-amazon.com/images/I/71pI5sI9NjL._AC_UF1000,1000_QL80_.jpg',
            'type' => 'Manga',
            'status' => 'Airing',
        ],
        [
            'name' => 'Chainsaw Man',
            'synopsis' => 'A destitute young man makes a contract with a devil, merging with his pet to become a hybrid capable of transforming parts of his body into chainsaws.',
            'imageUrl' => 'https://snworksceo.imgix.net/cds/5cfb9cca-68ee-42bc-aa29-760c168924e8.sized-1000x1000.jpg?w=1000&dpr=2',
            'type' => 'Anime',
            'status' => 'Airing',
        ],
    ];

    public function definition(): array
    {
        // Pick a random series from our predefined list
        $series = fake()->unique()->randomElement(self::$seriesData);

        return [
            'name' => $series['name'],
            'synopsis' => $series['synopsis'],
            'type' => $series['type'],
            'status' => $series['status'],
            'imageUrl' => $series['imageUrl'],

        ];
    }
}
