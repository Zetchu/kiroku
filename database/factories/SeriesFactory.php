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
        ],
        [
            'name' => 'Death Note',
            'synopsis' => 'A high school student discovers a supernatural notebook that allows him to kill anyone by writing their name in it, sparking a deadly game of cat and mouse.',
        ],
        [
            'name' => 'Naruto',
            'synopsis' => 'A young ninja, shunned for the powerful fox demon sealed within him, dreams of becoming the strongest ninja and leader of his village.',
        ],
        [
            'name' => 'Fullmetal Alchemist: Brotherhood',
            'synopsis' => 'Two brothers search for the Philosopher\'s Stone after a failed alchemy experiment, leading them into a dark government conspiracy.',
        ],
        [
            'name' => 'One Piece',
            'synopsis' => 'Follows the adventures of Monkey D. Luffy and his pirate crew as they search for the ultimate treasure, the "One Piece", to become the next Pirate King.',
        ],
        [
            'name' => 'Jujutsu Kaisen',
            'synopsis' => 'A high school student joins a secret society of Jujutsu Sorcerers to fight cursed spirits after he becomes the host of a powerful curse.',
        ],
        [
            'name' => 'Steins;Gate',
            'synopsis' => 'A self-proclaimed "mad scientist" discovers a way to send messages to the past, triggering a cascade of events that spiral out of his control.',
        ],
        [
            'name' => 'Cowboy Bebop',
            'synopsis' => 'A crew of bounty hunters travels the solar system on their ship, the Bebop, trying to escape their pasts and make a living.',
        ],
        [
            'name' => 'Demon Slayer: Kimetsu no Yaiba',
            'synopsis' => 'A young boy becomes a demon slayer after his family is slaughtered and his younger sister is turned into a demon.',
        ],
        [
            'name' => 'My Hero Academia',
            'synopsis' => 'In a world where most people have superpowers, a boy born without them enrolls in a prestigious hero academy, determined to prove himself.',
        ],
        [
            'name' => 'Berserk',
            'synopsis' => 'A lone mercenary named Guts traverses a dark medieval world, battling demonic apostles in a quest for vengeance against his former friend.',
        ],
        [
            'name' => 'Hunter x Hunter (2011)',
            'synopsis' => 'A young boy named Gon Freecss aspires to become a Hunter, an elite individual, in hopes of finding his father who was also a Hunter.',
        ],
        [
            'name' => 'Vinland Saga',
            'synopsis' => 'A young Icelandic boy named Thorfinn seeks revenge for his father\'s murder, joining the band of mercenaries led by his father\'s killer, Askeladd.',
        ],
        [
            'name' => 'Chainsaw Man',
            'synopsis' => 'A destitute young man makes a contract with a devil, merging with his pet to become a hybrid capable of transforming parts of his body into chainsaws.',
        ],

    ];
    public function definition(): array
    {
        // Pick a random series from our predefined list
        $series = fake()->randomElement(self::$seriesData);

        return [
            'name' => $series['name'],
            'synopsis' => $series['synopsis'],

            // We will add here other columns about series when we get to it
        ];
    }
}
