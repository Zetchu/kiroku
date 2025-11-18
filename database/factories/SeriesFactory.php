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
            'imageUrl' => 'https://images.unsplash.com/photo-1628185567527-37771746c1ce?q=80&w=250&fit=crop',
            'type' => 'Anime',
            'status' => 'Finished',
        ],
        [
            'name' => 'Death Note',
            'synopsis' => 'A high school student discovers a supernatural notebook that allows him to kill anyone by writing their name in it, sparking a deadly game of cat and mouse.',
            'imageUrl' => 'https://images.unsplash.com/photo-1549491763-7188f58c743e?q=80&w=250&fit=crop',
            'type' => 'Anime',
            'status' => 'Finished',
        ],
        [
            'name' => 'Naruto',
            'synopsis' => 'A young ninja, shunned for the powerful fox demon sealed within him, dreams of becoming the strongest ninja and leader of his village.',
            'imageUrl' => 'https://images.unsplash.com/photo-1579783900882-c0d3ce7bcfae?q=80&w=250&fit=crop',
            'type' => 'Anime',
            'status' => 'Finished',
        ],
        [
            'name' => 'Fullmetal Alchemist: Brotherhood',
            'synopsis' => 'Two brothers search for the Philosopher\'s Stone after a failed alchemy experiment, leading them into a dark government conspiracy.',
            'imageUrl' => 'https://images.unsplash.com/photo-1607590829871-337580b06482?q=80&w=250&fit=crop',
            'type' => 'Anime',
            'status' => 'Finished',
        ],
        [
            'name' => 'One Piece',
            'synopsis' => 'Follows the adventures of Monkey D. Luffy and his pirate crew as they search for the ultimate treasure, the "One Piece", to become the next Pirate King.',
            'imageUrl' => 'https://images.unsplash.com/photo-1627958611910-3841e21b033d?q=80&w=250&fit=crop',
            'type' => 'Manga', // Set some as Manga
            'status' => 'Airing',
        ],
        [
            'name' => 'Jujutsu Kaisen',
            'synopsis' => 'A high school student joins a secret society of Jujutsu Sorcerers to fight cursed spirits after he becomes the host of a powerful curse.',
            'imageUrl' => 'https://images.unsplash.com/photo-1616212521990-2561937f374e?q=80&w=250&fit=crop',
            'type' => 'Anime',
            'status' => 'Airing',
        ],
        [
            'name' => 'Steins;Gate',
            'synopsis' => 'A self-proclaimed "mad scientist" discovers a way to send messages to the past, triggering a cascade of events that spiral out of his control.',
            'imageUrl' => 'https://images.unsplash.com/photo-1547846549-33d325c862a9?q=80&w=250&fit=crop',
            'type' => 'Anime',
            'status' => 'Finished',
        ],
        [
            'name' => 'Cowboy Bebop',
            'synopsis' => 'A crew of bounty hunters travels the solar system on their ship, the Bebop, trying to escape their pasts and make a living.',
            'imageUrl' => 'https://images.unsplash.com/photo-1582218044738-f9b7c845b4c1?q=80&w=250&fit=crop',
            'type' => 'Anime',
            'status' => 'Finished',
        ],
        [
            'name' => 'Demon Slayer: Kimetsu no Yaiba',
            'synopsis' => 'A young boy becomes a demon slayer after his family is slaughtered and his younger sister is turned into a demon.',
            'imageUrl' => 'https://images.unsplash.com/photo-1625907409249-14a05f958044?q=80&w=250&fit=crop',
            'type' => 'Anime',
            'status' => 'Airing',
        ],
        [
            'name' => 'My Hero Academia',
            'synopsis' => 'In a world where most people have superpowers, a boy born without them enrolls in a prestigious hero academy, determined to prove himself.',
            'imageUrl' => 'https://images.unsplash.com/photo-1612046835266-b33342371d9d?q=80&w=250&fit=crop',
            'type' => 'Manga',
            'status' => 'Airing',
        ],
        [
            'name' => 'Berserk',
            'synopsis' => 'A lone mercenary named Guts traverses a dark medieval world, battling demonic apostles in a quest for vengeance against his former friend.',
            'imageUrl' => 'https://images.unsplash.com/photo-1627993079035-779836940d9d?q=80&w=250&fit=crop',
            'type' => 'Manga',
            'status' => 'Airing',
        ],
        [
            'name' => 'Hunter x Hunter (2011)',
            'synopsis' => 'A young boy named Gon Freecss aspires to become a Hunter, an elite individual, in hopes of finding his father who was also a Hunter.',
            'imageUrl' => 'https://images.unsplash.com/photo-1626084478345-d8edb37c02b3?q=80&w=250&fit=crop',
            'type' => 'Anime',
            'status' => 'Finished',
        ],
        [
            'name' => 'Vinland Saga',
            'synopsis' => 'A young Icelandic boy named Thorfinn seeks revenge for his father\'s murder, joining the band of mercenaries led by his father\'s killer, Askeladd.',
            'imageUrl' => 'https://images.unsplash.com/photo-1608977826207-68b6d0563b7e?q=80&w=250&fit=crop',
            'type' => 'Manga',
            'status' => 'Airing',
        ],
        [
            'name' => 'Chainsaw Man',
            'synopsis' => 'A destitute young man makes a contract with a devil, merging with his pet to become a hybrid capable of transforming parts of his body into chainsaws.',
            'imageUrl' => 'https://images.unsplash.com/photo-1544652410-6be3e95079a4?q=80&w=250&fit=crop',
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
